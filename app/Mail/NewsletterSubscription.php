<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class NewsletterSubscription extends Mailable
{
    use Queueable, SerializesModels;

    public $coupon;
    public $user;


    public function __construct()
    {
//        $this->coupon = App\Coupon::where('discount', '=', '10')->first();
        $this->coupon = 'ac41tl8';
        $this->user = Auth::user();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('antokhi.stas@gmail.com')
            ->view('newsletter.subscription');

    }
}
