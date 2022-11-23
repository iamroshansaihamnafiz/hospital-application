@section('title', 'News')
<!---------- Include Head File --------->
@include('frontend.head')

<body>
<style>
    p {
        font-family: "Nunito", sans-serif !important;
        line-height: 30px;
        text-align: justify;
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
                    <li class="breadcrumb-item"><a href="{{ url('/news') }}">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $blog['tag'] }}</li>
                </ol>
            </nav>
            <h1 class="font-weight-normal">News</h1>
        </div> <!-- .container -->
    </div> <!-- .banner-section -->
</div> <!-- .page-banner -->

<div class="page-section">
    <div class="container">
        <div class="row" style="margin-bottom: 90px">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-sm-8 py-3">
                        <div class="card-blogView">
                            <div class="header">
                                <img style="width: 700px" src="{{ asset('admin/images/upload-blog/'. $blog['image']) }}" alt="">
                            </div>
                            <div class="body">
                                <h5 class="post-title">
                                    {{ $blog['title'] }}
                                </h5>
                                <p>{!! $blog['description'] !!}</p>
                                <span class="mai-time"></span>
                                {{ $blog['created_at']->format('y-m-d') }}
                                ({{ $blog['created_at']->diffForHumans() }})

                                <div class="post-category mt-3">
                                    Category: <span style="color: #0ba1b5">{{ $blog['tag'] }}</span><br>
                                    <div class="site-info">
                                        <div class="avatar mr-2 mt-3">
                                            <div class="avatar-img">
                                                <img src="{{ asset('frontend/assets/img/person/person_1.jpg') }}"
                                                     alt="" style="width: 100% !important; height: 100% !important;">
                                            </div>
                                            <span>Admin</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .row -->
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="sidebar-block">
                        <h3 class="sidebar-title">Recent Blog</h3>
                        @foreach($recent_blogs as $recent_blog)
                            <div class="blog-item">
                                <a class="post-thumb" href="{{ url('blog-details/' . $recent_blog['id']) }}">
                                    <img src="{{ asset('admin/images/upload-blog/'. $recent_blog['image']) }}" alt="">
                                </a>
                                <div class="content">
                                    <h5 class="post-title">
                                        <a href="{{ url('blog-details/' . $recent_blog['id']) }}">
                                            {{ $recent_blog['title'] }}
                                        </a>
                                    </h5>
                                    <div class="meta">
                                        <a href="{{ url('blog-details/' . $recent_blog['id']) }}"><span
                                                class="mai-calendar"></span> {{ $recent_blog['created_at']->format('y-m-d') }}
                                        </a>
                                        <a href="{{ url('blog-details/' . $recent_blog['id']) }}"><span
                                                class="mai-person"></span> Admin</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
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
