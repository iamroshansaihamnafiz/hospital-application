<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    // All Appointments
    public function all_appointment()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 1) {
                $appointments = Appointment::all();
                return view('admin.appointment.index', compact('appointments'));
            } else {
                return redirect()->back();
            }

        } else {
            return redirect('/login');
        }
    }


    // Appointment Approved
    public function appoint_approved($id)
    {
        $data = Appointment::find($id);
        $data->status = 'Approved';
        $data->save();
        return redirect()->back();
    }


    // Appointment Cancel
    public function appoint_cancel($id)
    {
        $data = Appointment::find($id);
        $data->status = 'Cancel';
        $data->save();
        return redirect()->back();
    }

    // Appointment View
    public function appointment_view($id)
    {
        $appoint = Appointment::find($id);
        return view('admin.appointment.appointment-view', compact('appoint'));
    }

    // Appointment Delete
    public function destroy($id)
    {
        $delete_data = Appointment::find($id);
        $delete_data->delete();

        if($delete_data){
            return redirect()->back()->with('message', 'Appointment Deleted');
        }
    }
}
