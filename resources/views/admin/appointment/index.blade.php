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
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Our Doctors</h4>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>
                                            Customer Name
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Phone
                                        </th>
                                        <th>
                                            Doctor Name
                                        </th>
                                        <th>
                                            Date
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Approve
                                        </th>
                                        <th>
                                            Canceled
                                        </th>
                                        <th>
                                            Delete
                                        </th>
                                        <th>
                                            View
                                        </th>
                                        <th>
                                            Send Mail
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($appointments as $appointment)
                                        <tr>
                                            <td>
                                                {{ $appointment->name }}
                                            </td>

                                            <td>
                                                {{ $appointment->email }}
                                            </td>

                                            <td>
                                                {{ $appointment->phone }}
                                            </td>

                                            <td>
                                                {{ $appointment->doctor }}
                                            </td>

                                            <td>
                                                {{ $appointment->date }}
                                            </td>

                                            <td>
                                                {{ $appointment->status }}
                                            </td>

                                            <td>
                                                <a href="{{ url('/appoint-approved/'.$appointment->id) }}"
                                                   style="padding: 10px 10px" class="btn btn-success">Approved</a>
                                            </td>

                                            <td>
                                                <a href="{{ url('/appoint-cancel/'.$appointment->id) }}"
                                                   style="padding: 10px 10px" class="btn btn-danger">Cancel</a>
                                            </td>

                                            <td>
                                                <form action="{{ url('/appoint-delete/'.$appointment->id) }}"
                                                      method="POST" class="mt-1">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn"
                                                            style="padding: 10px 13px; background: red; color: white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                             fill="currentColor" class="bi bi-trash"
                                                             viewBox="0 0 16 16">
                                                            <path
                                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                            <path fill-rule="evenodd"
                                                                  d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>

                                            <td>
                                                <a href="{{ url('appointment-view/' . $appointment->id) }}"
                                                   class="btn mt-1"
                                                   style="padding: 10px 13px; background: #4B49AC; color: white">
                                                    View
                                                </a>
                                            </td>

                                            <td>
                                                <a href="{{ url('/send-mail/'.$appointment->id) }}"
                                                   style="padding: 10px 10px" class="btn btn-info">
                                                    Send Mail
                                                </a>
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
