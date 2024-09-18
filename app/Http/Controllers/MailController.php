<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendMail;

class MailController extends Controller
{
    public function presenceMailEmployee($detailMailEmployee, $recipient)
    {
        Mail::to($recipient)->send(new SendMail($detailMailEmployee));
    }

    public function presenceMailHRD($detailMailHRD)
    {
        Mail::to('hokjikril020@gmail.com')->send(new SendMail($detailMailHRD));
    }
}
