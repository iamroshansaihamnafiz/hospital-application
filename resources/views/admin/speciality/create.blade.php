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
                            <h4 class="card-title">Add Speciality Form</h4>
                            <p class="card-description">
                                Add Speciality
                            </p>
                            <form class="forms-sample" action="{{ '/speciality-store' }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="doctor-name">Speciality Name</label>
                                    <input type="text" class="form-control" name="speciality_name" id="speciality_name"
                                           placeholder="Speciality Name">
                                </div>

                                <button type="submit" style="background: #4B49AC" class="btn btn-primary mr-2">Submit
                                </button>
                                <a href="{{ url('/specialities') }}" class="btn btn-light">
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
