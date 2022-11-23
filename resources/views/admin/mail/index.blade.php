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

                            <div class="py-3">
                                @if(session()->has('message'))
                                    <div class="alert alert-success py-3"
                                         style="font-family: monospace !important; margin-bottom: 0 !important; ">
                                        <button type="button" class="close" data-dismiss="alert">
                                            ✖
                                        </button>
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                            </div>
                            <h4 class="card-title">Send Mail Form</h4>
                            <p class="card-description">
                                Send E-Mail
                            </p>
                            <form class="forms-sample" action="{{ url('/send-email/'.$data->id) }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="doctor-name">Getting</label>
                                    <input type="text" class="form-control" name="greeting" id="greeting"
                                           placeholder="Hi From...">
                                </div>

                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="message" id="message" cols="30" rows="10"
                                              class="form-control"></textarea>
                                </div>


                                <div class="form-group">
                                    <label for="room-number">End Part</label>
                                    <input type="text" class="form-control" name="end_part" id="end_part"
                                           placeholder="Regards">
                                </div>

                                <button type="submit" style="background: #4B49AC" class="btn btn-primary mr-2">Submit
                                </button>
                                <a href="{{ url('/all-appointments') }}" class="btn btn-light">
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
