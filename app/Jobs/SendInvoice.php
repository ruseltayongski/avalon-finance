<?php

namespace App\Jobs;

use Mail;
use App\Mail\InvoiceMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendInvoice implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    protected $email;
    protected $mailData;
    protected $ccEmail;
    protected $selectedServices;
    protected $coupon;
    public function __construct($email, $ccEmail, $mailData, $selectedServices, $coupon)
    {
        $this->email = $email;
        $this->mailData = $mailData;
        $this->ccEmail = $ccEmail;
        $this->selectedServices = $selectedServices;
        $this->coupon = $coupon;
    }

    /** 
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)
             ->cc($this->ccEmail)
             ->send(new InvoiceMail($this->mailData, $this->selectedServices, $this->coupon));
    }
}
