@extends('admin.Layouts')
@section('admin_content')
    <style>
        input {
            border: 1px solid #CED4DA !important;
        }
        p{
            font-family: Nunito !important;
            line-height: 30px;
            text-align: justify;
        }
    </style>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('/blogs') }}" class="btn btn-info btn-sm" style="float: right">
                            Back To Blog
                        </a>
                        <h4 class="card-title">Blog Details</h4>
                        <p class="card-description font-weight-bold">
                            Title:-
                        </p>
                        <h1 style="font-size: 20px">
                           {{ $blog['title'] }}
                        </h1>

                        <p class="card-description font-weight-bold mt-5">
                            Tag:-
                        </p>
                        <h1 style="font-size: 20px">
                            {{ $blog['tag'] }}
                        </h1>

                        <p class="card-description font-weight-bold mt-5">
                            Description:-
                        </p>
                        <h1>
                            {!! $blog['description'] !!}
                        </h1>

                        <p class="card-description font-weight-bold mt-5">
                            Image:-
                        </p>
                        <h1 style="font-size: 20px">
                            <img style="width: 550px; height: 400px"
                                 src="{{ asset('admin/images/upload-blog/'. $blog->image) }}"
                                 alt="image">
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
