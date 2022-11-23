@extends('admin.Layouts')
@section('admin_content')
    <style>
        input {
            border: 1px solid #CED4DA !important;
        }
    </style>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row mt-3 pl-5">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h4 class="card-title">Edit Doctor Form</h4>
                            <p class="card-description">
                                Edit Doctors
                            </p>
                            <form class="forms-sample" action="{{ '/doctor-update/'. $doctor['id'] }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="doctor-name">Doctor Name</label>
                                    <input type="text" class="form-control" name="doctor_name"
                                           value="{{ $doctor['doctor_name'] }}" id="doctor_name"
                                           placeholder="Doctor Name">
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="phone" class="form-control" value="{{ $doctor['phone'] }}" name="phone"
                                           id="phone"
                                           placeholder="Phone">
                                </div>

                                <div class="form-group">
                                    <label for="speciality">Speciality</label>
                                    <select style="color: black !important;" name="speciality" class="form-control"
                                            id="speciality">
                                        @foreach ($specialities as $speciality)
                                            <option value="{{ $speciality->id }}"
                                                {{ $speciality->id == $doctor->speciality_id ? 'selected' : '' }}>
                                                {{ $speciality->speciality_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="room-number">Room Number</label>
                                    <input type="number" class="form-control" value="{{ $doctor['room_number'] }}"
                                           name="room_number" id="room_number"
                                           placeholder="Room Number">
                                </div>

                                <div style="padding: 30px 0px !important;">
                                    <span>Old Image</span>
                                    @if ($doctor->image)
                                        <img style="width: 80px; height: 80px; padding-top: 15px"
                                             src="{{ asset('admin/images/upload-doctor/'. $doctor->image) }}"
                                             alt="">
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="dropify" name="image" id="image">
                                </div>
                                <button type="submit" style="background: #4B49AC" class="btn btn-primary mr-2">Submit
                                </button>
                                <a href="{{ url('/doctors') }}" class="btn btn-light">
                                    Cancel
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
