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
                            <h4 class="card-title">Add Doctor Form</h4>
                            <p class="card-description">
                                Add Doctors
                            </p>
                            <form class="forms-sample" action="{{ '/doctor-store' }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="doctor-name">Doctor Name</label>
                                    <input type="text" class="form-control" name="doctor_name" id="doctor_name"
                                           placeholder="Doctor Name">
                                </div>

                                <div class="form-group">
                                    <label for="doctor-name">Description</label>
                                    <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="phone" class="form-control" name="phone" id="phone"
                                           placeholder="Phone">
                                </div>

                                <div class="form-group">
                                    <label for="speciality">Speciality</label>
                                    <select style="color: black !important;" name="speciality" class="form-control"
                                            id="speciality">
                                        <option>-- Select --</option>
                                        @foreach($specialities as $speciality)
                                            <option
                                                value="{{ $speciality['id'] }}">{{ $speciality['speciality_name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="room-number">Room Number</label>
                                    <input type="number" class="form-control" name="room_number" id="room_number"
                                           placeholder="Room Number">
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
