@section('title', 'News')
<!---------- Include Head File --------->
@include('frontend.head')

<body>
<style>
    * {
        font-family: "Nunito", sans-serif !important;
    }

    p {
        line-height: 30px;
        text-align: justify;
    }

    .doctor-phone span {
        font-size: 15px;
    }

    .doctor-phone {
        margin-top: 20px;
    }

    .doctor-name span {
        font-size: 15px;
    }

    .doctor-name {
        margin-top: 20px;
    }

    .room-number span {
        font-size: 15px;
    }

    .room-number {
        margin-top: 20px;
    }
</style>
<!-- Back to top button -->
<div class="back-to-top"></div>

<!------- Include Navbar File --------->
@include('frontend.navbar')

<div class="page-banner overlay-dark bg-image"
     style="background-image: url('{{ asset('frontend/assets/img/bg_image_1.jpg') }}');">
    <div class="banner-section">
        <div class="container text-center wow fadeInUp">
            <nav aria-label="Breadcrumb">
                <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                    <li class="breadcrumb-item"><a href="{{ url('/our-doctor') }}">Doctor</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $doctor['doctor_name'] }}
                    </li>
                </ol>
            </nav>
            <h1 class="font-weight-normal">Doctor</h1>
        </div> <!-- .container -->
    </div> <!-- .banner-section -->
</div> <!-- .page-banner -->

<div class="page-section">
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row" style="margin-bottom: 90px">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-sm-8 py-3" style="flex: unset; max-width: none">
                        <div class="card-blogView">
                            <div class="header">
                                <img style="width: 400px; height: 400px"
                                     src="{{ asset('admin/images/upload-doctor/'. $doctor['image']) }}" alt="">
                            </div>
                            <div class="body">
                                <div class="doctor-name">
                                    <h5>Name:
                                        <span>{{ $doctor['doctor_name'] }}</span>
                                    </h5>
                                </div>

                                <div class="doctor-phone">
                                    <h5>Phone:
                                        <span>{{ $doctor['phone'] }}</span>
                                    </h5>
                                </div>

                                <div class="room-number">
                                    <h5>Room No:
                                        <span>{{ $doctor['room_number'] }}</span>
                                    </h5>
                                </div>

                                <div class="room-number">
                                    <h5>About:
                                        <p>{!! $doctor['description'] !!}</p>
                                    </h5>
                                </div>

                            </div>
                        </div>
                    </div> <!-- .row -->
                </div>
            </div>

            <div class="col-lg-6">
                <!-- .page-section -->
                <div class="page-section">
                    <div class="container">
                        <h1 class="text-center wow fadeInUp">Make an Appointment</h1>
                        <form class="main-form" action="{{ url('/appointment') }}" method="POST">
                            @csrf
                            <div class="row mt-5 ">
                                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                                    <input type="text" class="form-control" name="name" placeholder="Full name">
                                </div>
                                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                                    <input type="email" class="form-control" name="email" placeholder="Email address">
                                </div>
                                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                                    <input type="date" name="date" class="form-control">
                                </div>

                                <div class="col-6 col-sm-6 py-2 wow fadeInUp" data-wow-delay="300ms">
                                    <input type="text" name="phone" class="form-control" placeholder="Number">
                                </div>

                                <div class="col-12 col-sm-12 py-2 wow fadeInRight" data-wow-delay="300ms">
                                    <select name="doctor" id="departement" class="custom-select">
                                        <option value="{{ $doctor->doctor_name }}">
                                            {{ $doctor->doctor_name }}
                                            ----- Speciality ----- ( {{ $speciality->speciality_name }} )
                                        </option>
                                    </select>
                                </div>

                                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                                <textarea name="message" id="message" class="form-control" rows="6"
                                          placeholder="Enter message"></textarea>
                                </div>
                            </div>

                            <button type="submit" style="background: #00D9A5 !important; color: white"
                                    class="btn mt-3 wow zoomIn">
                                Submit Request
                            </button>
                        </form>
                    </div>
                </div> <!-- .page-section -->

            </div>
            <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- .page-section -->

<!----------- Include Application File ----------->
@include('frontend.home-partial.application')

<!---------- Include Footer File --------->
@include('frontend.footer')

<!---------- Include Script File --------->
@include('frontend.script')

</body>
</html>
