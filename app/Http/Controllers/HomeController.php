<?php

namespace App\Http\Controllers;

use App\Jobs\SendInvoice;
use Mail;
use App\Mail\InvoiceMail;
use Illuminate\Http\Request;
use App\Models\Services;
use Illuminate\Support\Facades\DB;

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

    // public function __construct() {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        return view('home');
    }

    public function checkout() 
    {
        $services = Services::select("id","title",DB::raw("false as selected"),"picture")->get();
        return view('checkout',[
            'services' => $services
        ]);
    }

    public function sendEmail(Request $request) 
    {
        return Services::whereIn("id", $request->services)->get();
        $email = $request->input('email1'); 
        $ccEmail = "ruseltayong@gmail.com";
        dispatch(new SendInvoice($email, $ccEmail, $request->all()));
        return redirect()->back()->with('message', 'Invoice sent successfully!');
    }
}
