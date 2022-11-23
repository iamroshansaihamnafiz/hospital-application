@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="page-hero bg-image overlay-dark"
     style="background-image: url('{{ asset('frontend/assets/img/bg_image_1.jpg') }}');">
    <div class="hero-section">
        <div class="container text-center wow zoomIn">
            <span class="subhead">Let's make your life happier</span>
            <h1 class="display-4">Healthy Living</h1>
            <a href="{{ url('/contact-us') }}" class="btn btn-primary">Let's Consult</a>
        </div>
    </div>
</div>
