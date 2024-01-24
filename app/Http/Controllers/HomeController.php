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
        $promoCode = PromoCode::get();
        return view('checkout',[
            'promoCode' => $promoCode
        ]);
        // $services = Services::select("id","title",DB::raw("false as selected"),"picture")->get();
        // return view('checkout',[
        //     'services' => $services
        // ]);
    }

    public function sendEmail(Request $request) 
    {
        //return $request->all();
        $user = Auth::user();
     

        $selectedServices = Services::whereIn("id", $request->services)->get();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["sendInvoice"])) {
             
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
                $ccEmail = "ruseltayong@gmail.com";
                $customer->save();
        
                $mailData = $request->all();
                Mail::to($email)->cc($ccEmail)->send(new InvoiceMail($mailData, $selectedServices));
                return redirect()->back()->with('message', 'Invoice sent successfully!');
            } elseif (isset($_POST["proceedButton"])) {
                foreach ($selectedServices as $row) {
                    $line_items[] = [
                        'price_data' => [
                            'currency'     => 'USD',
                            'product_data' => [
                                'name' => ucfirst($row['title']),
                            ],
                            'unit_amount'  => (float)str_replace(',', '', strval($row['price'])) * 100,
                        ],
                        'quantity'   => 1,
                    ];
                }
                
                \Stripe\Stripe::setApiKey(config('stripe.sk'));
                
                $session = \Stripe\Checkout\Session::create(    
                    [
                        'line_items'  => $line_items,
                        'mode'        => 'payment',
                        'success_url' => route('welcome'),
                        'cancel_url'  => route('checkout'),
                    ]
                );
                
                return redirect()->away($session->url)->with('stripe_save', true);
            }
        }
      
    }
    public function successMail(Request $request) { 

        /* return $request->all(); */
        $name = $request->name;
        $email = $request->email;
        $ccEmail = "ruseltayong@gmail.com";
        dispatch(new SuccessPay($email, $ccEmail, $name));

        return redirect()->back();
    }
}
