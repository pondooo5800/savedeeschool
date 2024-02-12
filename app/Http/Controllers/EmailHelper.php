<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OemsEmail;

class EmailHelper
{
    public static function composeEmail($data)
    {

        $toEmail    =  $data->student->email;
        // pass dynamic message to mail class
        Mail::to($toEmail)->send(new OemsEmail($data));

        if (Mail::failures() != 0) {
            return 'success';
        } else {
            return 'failed';
        }
    }
}
