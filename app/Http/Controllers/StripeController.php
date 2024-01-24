<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class StripeController extends Controller
{
    public function checkout()
    {
        return view('checkout');
    }

    public function session(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        

        $line_items = [];
        $services = json_decode($request->input('services'), true);
       /*  return $services; */
        foreach ($services as $row) {
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
