<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function send(Request $request)
    {
        $rules = [
            "name" => "required|string|min:3|max:191",
            "email" => "required|email",
            "message" => "required|string",
        ];
        $this->validate($request, $rules);
        $name = $request->name;
        $email = $request->email;
        $message = $request->message;
        Mail::to([env('MAIL_USERNAME')])->send(new ContactUs($name, $email, $message));
        return back();
    }
}