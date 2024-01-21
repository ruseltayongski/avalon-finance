<?php

namespace App\Http\Controllers;

use App\Jobs\SendInvoice;
use Mail;
use App\Mail\InvoiceMail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  /*   public function __construct()
    {
        $this->middleware('auth');
    } */

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
    }

    public function sendEmail(Request $request) 
    {
        $email = $request->input('email1'); 
        $ccEmail = "ruseltayong@gmail.com";
        dispatch(new SendInvoice($email, $ccEmail, $request->all()));
        return redirect()->back()->with('message', 'Invoice sent successfully!');
    }
}
