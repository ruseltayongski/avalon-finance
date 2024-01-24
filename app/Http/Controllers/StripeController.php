<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Stripe\Checkout\Session;
use Stripe\Price;

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

        // \Stripe\Stripe::setApiKey(config('stripe.sk'));

        // $line_items = [];
        // $services = json_decode($request->input('services'), true);

        // foreach ($services as $row) {
        //     $line_items[] = [
        //         'price_data' => [
        //             'currency'     => 'USD',
        //             'product_data' => [
        //                 'name' => ucfirst($row['title']),
        //             ],
        //             'unit_amount'  => (int) round((float)str_replace(',', '', strval($row['price'])) * 100),
        //         ],
        //         'quantity'   => 1,
        //     ];
        // }

        // // Create a Price for the discount
        // $discountPrice = Price::create([
        //     'currency' => 'USD',
        //     'product_data' => [
        //         'name' => 'Discount',
        //     ],
        //     'unit_amount' => 500 * 100, // Adjust the amount based on your discount value
        // ]);

        // //return $discountPrice;

        // \Stripe\Stripe::setApiKey(config('stripe.sk'));

        // $session = Session::create([
        //     'line_items'  => array_merge($line_items, [['price' => $discountPrice->id, 'quantity' => 1]]),
        //     'mode'        => 'payment',
        //     'success_url' => route('welcome'),
        //     'cancel_url'  => route('checkout'),
        // ]);

        // return redirect()->away($session->url)->with('stripe_save', true);
        
    }
}
