<?php

namespace App\Actions\Users;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmailAction
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function execute($user)
    {

        Mail::to($user->email)->queue(new \App\Mail\NewUserMail($user));
    }
}
