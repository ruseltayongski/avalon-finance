<?php

namespace App\Http\Controllers;

use App\Jobs\SendInvoice;
use App\Jobs\SuccessPay;
use Mail;
use App\Mail\InvoiceMail;
use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Customer;
use App\Models\PromoCode;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('home');
    }

    public function checkout() 
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $allCoupons = \Stripe\Coupon::all(['limit' => 99999999])->data;

        foreach ($allCoupons as $coupon) {
            if ($coupon->duration === 'once') {
                $coupon->delete();
            }
        }

        $foreverCoupons = array_filter($allCoupons, function ($coupon) {
            return $coupon->duration === 'forever';
        });

        return view('checkout',[
            'promoCode' => $foreverCoupons
        ]);
    }

    public function sendEmail(Request $request) 
    {
     
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $user = Auth::user();
        $selectedServices = Services::whereIn("id", $request->services)->get();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["sendInvoice"])) {

                $discount = 0;
                $coupon = null;
                if($request->has('promoCode')) {
                    if ($request->promoCode) {
                        foreach ($request->promoCode as $row) {
                            $discount += (float)\Stripe\Coupon::retrieve(str_replace(" ", "", $row))->amount_off / 100;
                        }
                    }
                    
                    $coupon = \Stripe\Coupon::create([
                        'amount_off' => $discount * 100,
                        'currency' => 'usd',
                        'duration' => 'once',
                    ]);
                }
              

                $customer = new Customer();
                $customer->processed_by = $user->id;
                $customer->fullname = $request->fullName;
                $customer->email_one = $request->email1;
                $customer->email_two = $request->email2;
                $customer->billing_address = $request->billingAddress;
                $customer->country = $request->country;
                $customer->city = $request->city;
                $customer->post_code = $request->postCode;
                $customer->payment_type = $request->typeOfPayment;
                $customer->service_id = $request->serviceId;
                $customer->status = "pending";
                $customer->total_amount = $request->totalAmount;
                $customer->subtotal = $request->subTotal;
               
                $email = $request->input('email1'); 
                $ccEmails = [
                    "production@avalonhouse.us",
                    "info@avalonhouse.us"

                ];
    
                $customer->save();
    
                $mailData = [
                    'id' => $customer->id,
                    'fullName' => $request->fullName,
                    'email1' => $request->has('email1') ? $request->email1 : null,
                    'totalAmount' => $request->totalAmount,
                    'subTotal' => $request->subTotal,
                    'promoCode' => $request->promoCode
                ];

               /*  dd($mailData); */
                
                Mail::to($mailData['email1'])->cc($ccEmails)->send(new InvoiceMail($mailData, $selectedServices, $coupon));
               /*  dispatch(new SendInvoice($mailData, $ccEmail, $selectedServices, $coupon)); */
                return redirect()->back()->with('message', 'Invoice sent successfully!');
            } 
            elseif (isset($_POST["proceedButton"])) {
                $discount = 0;
                $coupon = null;
                if($request->has('promoCode')) {
                    if ($request->promoCode) {
                        foreach ($request->promoCode as $row) {
                            $discount += (float)\Stripe\Coupon::retrieve(str_replace(" ", "", $row))->amount_off / 100;
                        }
                    }
                    
                    $coupon = \Stripe\Coupon::create([
                        'amount_off' => $discount * 100,
                        'currency' => 'usd',
                        'duration' => 'once',
                    ]);
                }

                $line_items = [];
                foreach ($selectedServices as $row) {
                    $price = (float)str_replace(',', '', strval($row['price'])) * 100;
                    $line_items[] = [
                        'price_data' => [
                            'currency' => 'USD',
                            'product_data' => [
                                'name' => ucfirst($row['title']),
                            ],
                            'unit_amount' => $price,
                        ],
                        'quantity' => 1,
                    ];
                }
            
                $session = [
                    'line_items' => $line_items,
                    'mode' => 'payment',
                    'success_url' => route('checkout'),
                    'cancel_url' => route('checkout')
                ];
                
                if($request->promoCode) {
                    $session['discounts'] = [['coupon' => $coupon->id]];
                }

                $session = \Stripe\Checkout\Session::create($session);
                return redirect()->away($session->url)->with('stripe_save', true);
            }
        }
      
    }
    public function successMail(Request $request) { 

        $name = $request->name;
        $email = $request->email;
        $ccEmail = "production@avalonhouse.us";
        dispatch(new SuccessPay($email, $ccEmail, $name));

        return redirect()->route('checkout')->with('payment_cancelled', true);
    }
}
