<?php

namespace App\Jobs;

use App\Article;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendMailJob extends Job implements ShouldQueue {

    use InteractsWithQueue, SerializesModels;

    public $demo;

    public function __construct($demo) {
        $this->demo = $demo;
    }

    public function handle(Mailer $mailer) {
        Mail::send('email.email', $data, function($message)
        {
            $message->to('huy96cpqnvn@gmail.com', 'A/C')->subject('Welcome!');
        });
    }
}
