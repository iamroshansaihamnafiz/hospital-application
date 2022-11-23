<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use File;

class DoctorController extends Controller
{

    // Our Doctor Index View
    public function index()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 1) {
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

                return view('admin.doctor.index', compact('doctors'));
            } else {
                return redirect()->back();
            }

        } else {
            return redirect('/login');
        }
    }


    // Doctor Create View
    public function doctor_create()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 1) {
                // Get All Speciality
                $specialities = Speciality::all();
                return view('admin.doctor.create', compact('specialities'));
            } else {
                return redirect()->back();
            }

        } else {
            return redirect('/login');
        }
    }


    // Upload Doctor In Database
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $doctor = new Doctor();
            $request->validate([
                'doctor_name' => 'required',
                'description' => 'required',
                'phone' => 'required',
                'speciality' => 'required',
                'room_number' => 'required',
                'image' => 'required | image',
            ]);
            $doctor->doctor_name = $data['doctor_name'];
            $doctor->description = $data['description'];
            $doctor->phone = $data['phone'];
            $doctor->speciality_id = $data['speciality'];
            $doctor->room_number = $data['room_number'];

            // Doctor Image
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('admin/images/upload-doctor', $filename);
                $doctor->image = $filename;
            }
            $doctor->save();
            return redirect()->back()->with('message', "Doctor Created Successfully 🙂");
        }
    }


    // Update Doctor To First Get ID
    public function edit($id)
    {
        $doctor = Doctor::find($id);
        $specialities = Speciality::all();
        return view('admin.doctor.edit', compact('doctor', 'specialities'));
    }


    // Update Doctor In Database
    public function update(Request $request, $id)
    {
        $doctor = Doctor::find($id);
        $request->validate([
            'doctor_name' => 'required',
            'description' => 'required',
            'phone' => 'required',
            'room_number' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $path = 'admin/images/upload-doctor/' . $doctor->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('admin/images/upload-doctor', $filename);
            $doctor->image = $filename;
        }
        $doctor->doctor_name = $request->doctor_name;
        $doctor->description = $request->description;
        $doctor->phone = $request->phone;
        $doctor->speciality_id = $request->speciality;
        $doctor->room_number = $request->room_number;
        $doctor->update();
        return redirect('/doctors')->with('message', "Doctor Updated Successfully");
    }


    // Doctor View
    public function doctor_view($id)
    {
        // Get Doctor And Speciality
        $speciality = Speciality::find($id);
        $doctor = Doctor::find($id);

        return view('admin.doctor.doctor-view', compact('doctor', 'speciality'));
    }

    // Export Doctor PDF
    public function export_doctor_pdf()
    {
        // Get All Doctor
        $doctors = DB::table('doctors')
            ->join('specialities', 'doctors.speciality_id', '=', 'specialities.id')->select([
                'doctors.id',
                'doctors.doctor_name',
                'doctors.description',
                'doctors.phone',
                'doctors.room_number',
                'doctors.image',
                'doctors.status',
                'specialities.speciality_name',
            ])->get();

        $pdf = PDF::loadView('admin.doctor.doctor-pdf', compact('doctors'));
        return $pdf->download('doctor-pdf.pdf');
    }


    // Change Ststus Usign Ajax
    public function change_status(Request $request)
    {
        $doctor = Doctor::find($request->doctor_id);
        $doctor->status = $request->status;
        $doctor->save();
    }


    // Delete Doctor
    public function destroy($id)
    {
        $delete_data = Doctor::find($id);
        $delete_data->delete();
        if ($delete_data) {
            return redirect()->back()->with('message', "Doctor Deleted Successfully");
        }
    }

}
