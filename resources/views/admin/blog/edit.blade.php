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
                            <h4 class="card-title">Edit Blog Form</h4>
                            <p class="card-description">
                                Edit Blog
                            </p>
                            <form class="forms-sample" action="{{ '/blog-update/'. $blog['id'] }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title">Doctor Name</label>
                                    <input type="text" class="form-control" name="title"
                                           value="{{ $blog['title'] }}" id="title"
                                           placeholder="Title">
                                </div>

                                <div class="form-group">
                                    <label for="tag">Tag</label>
                                    <input type="text" class="form-control" value="{{ $blog['tag'] }}" name="tag"
                                           id="tag"
                                           placeholder="Tag">
                                </div>


                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="textEditor"
                                              class="form-control">{{ $blog['description'] }}</textarea>
                                </div>

                                <div style="padding: 30px 0px !important;">
                                    <span>Old Image</span>
                                    @if ($blog->image)
                                        <img style="width: 80px; height: 80px; padding-top: 15px"
                                             src="{{ asset('admin/images/upload-blog/'. $blog->image) }}"
                                             alt="">
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="dropify" name="image" id="image">
                                </div>
                                <button type="submit" style="background: #4B49AC" class="btn btn-primary mr-2">Submit
                                </button>
                                <a href="{{ url('/blogs') }}" class="btn btn-light">
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
