<?php

namespace App\Http\Controllers;

use App\Jobs\SendInvoice;
use App\Jobs\SuccessPay;
use Mail;
use App\Mail\InvoiceMail;
use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Customer;
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
        return view('checkout');
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

        dispatch(new SendInvoice($email, $ccEmail, $customer, $selectedServices));
        $customer->save();
        return redirect()->back()->with('message', 'Invoice sent successfully!');
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
