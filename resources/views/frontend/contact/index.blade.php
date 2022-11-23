@section('title', 'Contact')
<!---------- Include Head File --------->
@include('frontend.head')

<body>

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
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                </ol>
            </nav>
            <h1 class="font-weight-normal">Contact</h1>
        </div> <!-- .container -->
    </div> <!-- .banner-section -->
</div> <!-- .page-banner -->

<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Get in Touch</h1>
        <div class="py-3">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
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
        <form method="POST" action="{{ url('/send-message') }}" class="contact-form mt-5">
            @csrf
            <div class="row mb-3">
                <div class="col-sm-6 py-2 wow fadeInLeft">
                    <label for="fullName">Name</label>
                    <input type="text" name="fullName" class="form-control" placeholder="Full name..">
                </div>
                <div class="col-sm-6 py-2 wow fadeInRight">
                    <label for="emailAddress">Email</label>
                    <input type="text" name="emailAddress" class="form-control" placeholder="Email address..">
                </div>
                <div class="col-12 py-2 wow fadeInUp">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" class="form-control" placeholder="Enter subject..">
                </div>
                <div class="col-12 py-2 wow fadeInUp">
                    <label for="message">Message</label>
                    <textarea name="message" class="form-control" rows="8" placeholder="Enter Message.."></textarea>
                </div>
            </div>
            <button type="submit" style="background: #00D9A5 !important; color: white" class="btn wow zoomIn">Send Message</button>
        </form>
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
