<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Notification;

class SendMailController extends Controller
{
    public function index($id)
    {
        $data = Appointment::find($id);
        return view('admin.mail.index', compact('data'));
    }


    // Send Email
    public function send_email(Request $request, $id)
    {
        $data = Appointment::find($id);
        $details = [
            'greeting' => $request->greeting,
            'message' => $request->message,
            'end_part' => $request->end_part,
        ];
        Notification::send($data, new SendEmailNotification($details));
        return redirect()->back()->with('message', 'Email Send Successfully');
    }
}
