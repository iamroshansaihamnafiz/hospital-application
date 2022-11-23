@extends('admin.Layouts')
@section('admin_content')
    <style>
        input {
            border: 1px solid #CED4DA !important;
        }
    </style>
    <div class="main-panel">
        <div class="content-wrapper">w
            <div class="row mt-3 pl-5">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="pdf" style="padding-bottom: 30px">
                                <a href="{{ url('/export-doctor-pdf') }}" class="btn btn-info ml-2 btn-sm"
                                   style="float: right;">
                                    Export PDF
                                    <svg style="display: inline !important;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                              d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
                                    </svg>
                                </a>

                                <a href="{{ url('/doctor-create') }}" class="btn btn-sm"
                                   style="float: right; color: white; background: #7d5fff">
                                    Add Doctor
                                    <svg style="display: inline !important;" xmlns="http://www.w3.org/2000/svg"
                                         width="16" height="16" fill="currentColor"
                                         class="bi bi-plus-lg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                              d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                                    </svg>
                                </a>
                            </div>
                            <h4 class="card-title">Our Doctors</h4>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>
                                            DR. Name
                                        </th>
                                        <th>
                                            Speciality
                                        </th>
                                        <th>
                                            Phone
                                        </th>
                                        <th>
                                            Room Number
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Image
                                        </th>
                                        <th>
                                            View
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($doctors as $doctor)
                                        <tr>
                                            <td>
                                                Dr. {{ $doctor->doctor_name }}
                                            </td>

                                            <td>
                                                {{ $doctor->speciality_name }}
                                            </td>

                                            <td>
                                                {{ $doctor->phone }}
                                            </td>

                                            <td>
                                                {{ $doctor->room_number }}
                                            </td>

                                            <td>
                                                <input data-id="{{ $doctor->id }}" class="toggle-class-doctor"
                                                       type="checkbox" data-onstyle="success" data-offstyle="danger"
                                                       data-toggle="toggle-doctor" data-on="Active"
                                                       data-off="Inactive" {{ $doctor->status ? 'checked' : '' }}>
                                            </td>

                                            <td class="py-1">
                                                <img style="width: 70px; height: 70px"
                                                     src="{{ asset('admin/images/upload-doctor/'. $doctor->image) }}"
                                                     alt="image">
                                            </td>

                                            <td>
                                                <a href="{{ url('doctor-view/' . $doctor->id) }}"
                                                   class="btn mt-1"
                                                   style="padding: 10px 13px; background: #4B49AC; color: white">
                                                    View
                                                </a>
                                            </td>

                                            <td class="row">
                                                <div class="col-md-3">
                                                    <a href="{{ url('doctor-edit/' . $doctor->id) }}"
                                                       class="btn mt-1"
                                                       style="padding: 10px 13px; background: #ff9f43; color: white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                             fill="currentColor" class="bi bi-pencil-square"
                                                             viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd"
                                                                  d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                        </svg>
                                                    </a>
                                                </div>
                                                <div class="col-md-2">
                                                    <form action="{{ url('doctor-delete/' . $doctor->id) }}"
                                                          method="POST" class="mt-1">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn"
                                                                style="padding: 10px 13px; background: red; color: white">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16"
                                                                 fill="currentColor" class="bi bi-trash3"
                                                                 viewBox="0 0 16 16">
                                                                <path
                                                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
