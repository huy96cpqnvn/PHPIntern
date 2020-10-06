<?php


namespace App\Mail;
use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;


class TestMail extends Mailable
{
    use Queueable, SerializesModels;
    public function __construct()
    {
        //
    }

}
