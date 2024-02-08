<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use App\Mail\SuccessMail;
use Illuminate\Http\Request;
use App\Models\Customer;
use Stripe\Checkout\Session;
use Stripe\Price;
use Mail;

class StripeController extends Controller
{
    public function checkout()
    {
        return view('checkout');
    }

    public function session(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $promoCode = [];
        $discount = 0;
        $coupon = null;
        if($request->has('promoCode')) {
            if($request->promoCode) {
                foreach(explode(",", $request->promoCode) as $row) {
                    // $promoCode[] = [
                    //     "coupon" => str_replace(" ", "", $row)
                    // ];
                    $discount += (float)\Stripe\Coupon::retrieve(str_replace(" ", "", $row))->amount_off / 100;
                }
            }
    
            $coupon = \Stripe\Coupon::create([
                'amount_off' => $discount * 100,
                'currency' => 'usd',
                'duration' => 'once',
            ]);
        }

       /*  return $coupon; */

        $line_items = [];
        foreach (json_decode($request->services, true) as $row) {
            $price = (float)str_replace(',', '', strval($row['price'])) * 100; // Convert to cents
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
            'success_url' =>'https://avalonhouse.us/',
            'cancel_url' => route('checkout')
        ];

     
        if($request->promoCode) {
            $session['discounts'] = [['coupon' => $coupon->id]];
        }

        $session = \Stripe\Checkout\Session::create($session);

        /* if('stripe_save') {
            try {
                $this->successMail($request->client_email, $request->client_name);
            } catch(\Exception $ex) {
                \Log::error($ex);
            }
        } */
        return redirect()->away($session->url)->with('stripe_save', true);

        if ($request->session()->get('stripe_save')) {
            return $request->all();
            try {
                $this->successMail($request->client_email, $request->client_name);
            } catch (\Exception $ex) {
                \Log::error($ex);
            }
        }

        // $line_items = [];
        // $services = json_decode($request->input('services'), true);

        // foreach ($services as $row) {
        //     $line_items[] = [
        //         'price_data' => [
        //             'currency'     => 'USD',
        //             'product_data' => [
        //                 'name' => ucfirst($row['title']),
        //             ],
        //             'unit_amount'  => (float)str_replace(',', '', strval($row['price'])) * 100,
        //         ],
        //         'quantity'   => 1,
        //     ];
        // }
        
        // \Stripe\Stripe::setApiKey(config('stripe.sk'));
        
        // $session = \Stripe\Checkout\Session::create(    
        //     [
        //         'line_items'  => $line_items,
        //         'mode'        => 'payment',
        //         'success_url' => route('welcome'),
        //         'cancel_url'  => route('checkout'),
        //     ]
        // );
        
        // return redirect()->away($session->url)->with('stripe_save', true);
    }

    public function successMail($client_email, $client_name) { 

        $name = $client_name;
        $email = $client_email;
        $ccEmail = "production@avalonhouse.us";
      
        return Mail::to($email)->cc($ccEmail)->send(new SuccessMail($name));
    }
}
