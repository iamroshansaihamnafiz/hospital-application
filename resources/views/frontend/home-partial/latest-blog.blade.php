<div class="page-section bg-light">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Latest News</h1>
        <div class="row mt-5">
            @foreach($blogs as $blog)
                <div class="col-lg-4 py-2 wow zoomIn">
                    <div class="card-blog">
                        <div class="header">
                            <div class="post-category">
                                <span>{{ $blog['tag'] }}</span>
                            </div>
                            <a href="{{ url('blog-details/' . $blog['id']) }}" class="post-thumb">
                                <img src="{{ asset('admin/images/upload-blog/'. $blog['image']) }}" alt="">
                            </a>
                        </div>
                        <div class="body">
                            <h5 class="post-title"><a href="{{ url('blog-details/' . $blog['id']) }}">{{ $blog['title'] }}</a></h5>
                            <div class="site-info">
                                <div class="avatar mr-2">
                                    <div class="avatar-img">
                                        <img src="{{ asset('frontend/assets/img/person/person_1.jpg') }}" alt="">
                                    </div>
                                    <span>Admin</span>
                                </div>
                                <span class="mai-time"></span> {{ $blog['created_at']->format('d-m-Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-12 text-center mt-4 wow zoomIn">
                <a href="{{ url('/news') }}" class="btn btn-primary">Read More</a>
            </div>

        </div>
    </div>
</div>
