<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class SearchDoctorController extends Controller
{
    // Search Doctors
    public function find_doctor(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ]);

        $doctors = Doctor::where("doctor_name", "LIKE", "%" . $request->search . "%")
            ->orWhere('phone', "LIKE", "%" . $request->search . "%")
            ->orWhere('room_number', "LIKE", "%" . $request->search . "%")
            ->take(5)->get();
        return view('frontend.search.search-doctor', compact('doctors'));
    }
}
