<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\InvoiceMail;
use App\Mail\SuccessMail;

class SuccessPay implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $email;
    protected $ccEmail;
    protected $mailData;
    public function __construct($email, $ccEmail, $mailData)
    {
        $this->email = $email;
        $this->ccEmail = $ccEmail;
        $this->mailData = $mailData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)
             ->cc($this->ccEmail)
             ->send(new SuccessMail());
    }
}
