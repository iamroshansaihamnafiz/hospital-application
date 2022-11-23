<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '0') {
                // Get All Active Blog
                $blogs = Blog::where('status', 1)->limit(3)->get();

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
                    ])->get();
                return view('frontend.home', compact('doctors', 'blogs'));
            } else {
                return view('admin.home');
            }
        } else {
            return redirect()->back();
        }
    }


    public function index()
    {
        if (Auth::id()) {
            return redirect('/home');
        } else {
            // Get All Active Blog
            $blogs = Blog::where('status', 1)->limit(3)->get();

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
                ])->limit(6)->get();

            return view('frontend.home', compact('doctors', 'blogs'));
        }
    }

}
