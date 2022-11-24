<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegUser extends Mailable
{
    use Queueable, SerializesModels;

    public $reguser;

    public function __construct(RegUser $reguser)
    {
        $this->reguser = $reguser;
    }

    public function build()
    {
        return $this->view('mails.emergency_call');
    }
}
