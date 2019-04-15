<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailResetPassword extends Mailable
{
    use Queueable, SerializesModels;
    protected $token_reset;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token_reset)
    {
        $this->token_reset = $token_reset;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Xác nhận quên mật khẩu')->view('reset-password')->with(['token_reset' => $this->token_reset]);
    }
}
