@extends('admin.Layouts')
@section('admin_content')
    <style>
        input {
            border: 1px solid #CED4DA !important;
        }

        p {
            font-family: Nunito !important;
        }
        h1{
            font-size: 17px !important;
        }
    </style>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('/all-appointments') }}" class="btn btn-info btn-sm" style="float: right">
                            Back To Appointment
                        </a>
                        <h4 class="card-title">Doctor Details</h4>
                        <p class="card-description font-weight-bold">
                            Customer Name:-
                        </p>
                        <h1 style="font-size: 20px">
                            {{ $appoint['name'] }}
                        </h1>

                        <p class="card-description font-weight-bold mt-5">
                            DR. Name:-
                        </p>
                        <h1 style="font-size: 20px">
                            {{ $appoint['doctor'] }}
                        </h1>

                        <p class="card-description font-weight-bold mt-5">
                            Email:-
                        </p>
                        <h1 style="font-size: 20px">
                            {{ $appoint['email'] }}
                        </h1>

                        <p class="card-description font-weight-bold mt-5">
                            Phone:-
                        </p>
                        <h1 style="font-size: 20px">
                            {{ $appoint['phone'] }}
                        </h1>

                        <p class="card-description font-weight-bold mt-5">
                            Date:-
                        </p>
                        <h1 style="font-size: 20px">
                            {{ $appoint['date'] }}
                        </h1>

                        <p class="card-description font-weight-bold mt-5">
                            Message:-
                        </p>
                        <h1 style="font-size: 20px">
                            {{ $appoint['message'] }}
                        </h1>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
