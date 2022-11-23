<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
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
            ])->inRandomOrder()->limit(3)->get();
        return view('frontend.about.index', compact('doctors'));
    }
}
