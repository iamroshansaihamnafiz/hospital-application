<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function index()
    {
        // Get All Doctor
        $doctors = DB::table('doctors')
            ->join('specialities', 'doctors.speciality_id', '=', 'specialities.id')->select([
                'doctors.id',
                'doctors.doctor_name',
                'doctors.phone',
                'doctors.room_number',
                'doctors.image',
                'doctors.status',
                'specialities.speciality_name',
            ])->inRandomOrder()->limit(6)->get();
        return view('frontend.doctor.index', compact('doctors'));

    }


    // Doctor Details
    public function doctor_details($id)
    {
        // Get Doctor And Speciality
        $speciality = Speciality::find($id);
        $doctor = Doctor::find($id);

        return view('frontend.doctor.doctor-details', compact('doctor', 'speciality'));
    }
}
