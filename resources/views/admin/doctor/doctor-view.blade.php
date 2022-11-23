@extends('admin.Layouts')
@section('admin_content')
    <style>
        input {
            border: 1px solid #CED4DA !important;
        }

        p {
            font-family: Nunito !important;
        }
    </style>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('/doctors') }}" class="btn btn-info btn-sm" style="float: right">
                            Back To Doctor
                        </a>
                        <h4 class="card-title">Doctor Details</h4>
                        <p class="card-description font-weight-bold">
                            DR Name:-
                        </p>
                        <h1 style="font-size: 20px">
                            {{ $doctor['doctor_name'] }}
                        </h1>

                        <p class="card-description font-weight-bold mt-5">
                            Speciality:-
                        </p>
                        <h1 style="font-size: 20px">
                            {{ $speciality['speciality_name'] }}
                        </h1>

                        <p class="card-description font-weight-bold mt-5">
                            Description:-
                        </p>
                        <h1 style="font-size: 18px; line-height: 30px; text-align: justify">
                            {!! $doctor['description'] !!}
                        </h1>

                        <p class="card-description font-weight-bold mt-5">
                            Phone:-
                        </p>
                        <h1 style="font-size: 20px">
                            {{ $doctor['phone'] }}
                        </h1>

                        <p class="card-description font-weight-bold mt-5">
                            Room NO:-
                        </p>
                        <h1 style="font-size: 20px">
                            {{ $doctor['room_number'] }}
                        </h1>

                        <p class="card-description font-weight-bold mt-5">
                            Image:-
                        </p>
                        <h1 style="font-size: 20px">
                            <img style="width: 400px; height: 400px"
                                 src="{{ asset('admin/images/upload-doctor/'. $doctor->image) }}"
                                 alt="image">
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
