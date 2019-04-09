<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $name, $link_active, $activation_code, $id;
    /**
     * Create a new message instance.
     *
     * @return void
     */

    // public function __construct()
    // {
        
    // }
    public function __construct($name, $link_active, $activation_code, $id)
    {
        $this->name = $name;
        $this->link_active = $link_active;
        $this->activation_code = $activation_code;
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Kích hoạt tài khoản Tpack')->view('info-email')->with(['name' => $this->name, 'link_active' => $this->link_active, 'activation_code' => $this->activation_code, 'id' => $this->id]);
        // return $this->view('info-email');
    }
}