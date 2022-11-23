<!---------- Include Head File --------->
@include('frontend.head')

<body>

<!-- Back to top button -->
<div class="back-to-top"></div>

<!------- Include Navbar File --------->
@include('frontend.navbar')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">

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

            @if($appoints->count())
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Doctor Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Message</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($appoints as $appoint)
                        <tr>
                            <th scope="row">{{ $appoint['doctor'] }}</th>
                            <td>{{ $appoint['date'] }}</td>
                            <td>{{ $appoint['message'] }}</td>
                            <td>{{ $appoint['status'] }}</td>
                            <td>
                                <a onclick="return confirm('Are You Sure To Delete')"
                                   href="{{ url('/cancel-appoint/'. $appoint['id']) }}"
                                   class="btn btn-danger btn-sm">Cancel</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h2 style="text-align: center; font-size: 25px">You Don't Have Any Appointments</h2>
            @endif
        </div>
    </div>
</div>


<!----------- Include Application File ----------->
@include('frontend.home-partial.application')

<!---------- Include Footer File --------->
@include('frontend.footer')


<!---------- Include Script File --------->
@include('frontend.script')

</body>
</html>
