<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact.index');
    }


    public function sendEmail(Request $request)
    {
        if (Auth::id()) {

            $request->validate([
                'fullName' => 'required',
                'emailAddress' => 'required',
                'subject' => 'required',
                'message' => 'required',
            ]);
            $details = [
                'fullName' => $request->fullName,
                'emailAddress' => $request->emailAddress,
                'subject' => $request->subject,
                'message' => $request->message,
            ];

            Mail::to('mdroshannafizrecover@gmail.com')->send(new ContactMail($details));
            return redirect()->back()->with('message', 'Your Message Has Been Sent Successfully !');
        } else {
            return redirect('/login');
        }
    }
}
