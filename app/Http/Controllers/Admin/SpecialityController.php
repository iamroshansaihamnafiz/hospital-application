<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    // Our Speciality Index View
    public function index()
    {
        // Get All Speciality
        $specialities = Speciality::all();
        return view('admin.speciality.index', compact('specialities'));
    }


    // Speciality Create View
    public function speciality_create()
    {
        return view('admin.speciality.create');
    }


    // Upload Doctor In Database
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $speciality = new Speciality();
            $request->validate([
                'speciality_name' => 'required',
            ]);
            $speciality->speciality_name = $data['speciality_name'];
            $speciality->save();
            return redirect()->back()->with('message', "Speciality Created Successfully 🙂");
        }
    }


    // Update Speciality To First Get ID
    public function edit($id)
    {
        $speciality = Speciality::find($id);
        return view('admin.speciality.edit', compact('speciality'));
    }


    // Update Doctor In Database
    public function update(Request $request, $id)
    {
        $speciality = Speciality::find($id);
        $request->validate([
            'speciality_name' => 'required',
        ]);
        $speciality->speciality_name = $request->speciality_name;
        $speciality->update();
        return redirect('/specialities')->with('message', "Speciality Updated Successfully");
    }


    // Delete Speciality
    public function destroy($id)
    {
        $delete_data = Speciality::find($id);
        $delete_data->delete();
        if ($delete_data) {
            return redirect()->back()->with('message', "Speciality Deleted Successfully");
        }
    }
}
