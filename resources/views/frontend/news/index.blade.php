@section('title', 'News')
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
                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                </ol>
            </nav>
            <h1 class="font-weight-normal">News</h1>
        </div> <!-- .container -->
    </div> <!-- .banner-section -->
</div> <!-- .page-banner -->

<div class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    @foreach($blogs as $blog)
                        <div class="col-sm-6 py-3">
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
                                    <h5 class="post-title">
                                        <a href="{{ url('blog-details/' . $blog['id']) }}">
                                            {{ $blog['title'] }}
                                        </a>
                                    </h5>
                                    <div class="site-info">
                                        <div class="avatar mr-2">
                                            <div class="avatar-img">
                                                <img src="{{ asset('frontend/assets/img/person/person_1.jpg') }}"
                                                     alt="">
                                            </div>
                                            <span>Admin</span>
                                        </div>
                                        <span class="mai-time"></span> {{ $blog['created_at']->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-12 my-5">
                        <nav aria-label="Page Navigation">
                            <ul class="pagination justify-content-center">
                                {{ $blogs->links() }}
                            </ul>

                        </nav>
                    </div>
                </div> <!-- .row -->
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="sidebar-block">
                        <h3 class="sidebar-title">Search</h3>
                        <div class="form-group">
                            <input type="text" id="searchBlog" onfocus="showBlogSearchResult()"
                                   onblur="hideBlogSearchResult()" class="form-control" placeholder="Blogs ...">
                        </div>
                        <div id="suggestBlog"
                             style="position: absolute; top: 170px; left: 0px; z-index: 21; border-radius: 8px; border: 1px solid #d9d9d9; box-shadow: 0 4px 12px rgb(154 159 151 / 20%); width: 725px; background: #fffefe">

                        </div>
                    </div>
                    <div class="sidebar-block">
                        <h3 class="sidebar-title">Categories</h3>
                        <ul class="categories">
                            <li><a href="#">Food <span>12</span></a></li>
                            <li><a href="#">Dish <span>22</span></a></li>
                            <li><a href="#">Desserts <span>37</span></a></li>
                            <li><a href="#">Drinks <span>42</span></a></li>
                            <li><a href="#">Ocassion <span>14</span></a></li>
                        </ul>
                    </div>

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
                                        <a href="{{ url('blog-details/' . $recent_blog['id']) }}"><span class="mai-person"></span> Admin</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .page-section -->

<div class="page-section banner-home bg-image"
     style="background-image: url('{{ asset('frontend/assets/img/banner-pattern.svg') }}');">
    <div class="container py-5 py-lg-0">
        <div class="row align-items-center">
            <div class="col-lg-4 wow zoomIn">
                <div class="img-banner d-none d-lg-block">
                    <img src="{{ asset('frontend/assets/img/mobile_app.png') }}" alt="">
                </div>
            </div>
            <div class="col-lg-8 wow fadeInRight">
                <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application</h1>
                <a href="#"><img src="{{ asset('frontend/assets/img/google_play.svg') }}" alt=""></a>
                <a href="#" class="ml-2"><img src="{{ asset('frontend/assets/img/app_store.svg') }}" alt=""></a>
            </div>
        </div>
    </div>
</div> <!-- .banner-home -->


<!---------- Include Footer File --------->
@include('frontend.footer')


<!---------- Include Script File --------->
@include('frontend.script')

</body>
</html>
<script>
    function showBlogSearchResult() {
        $('#suggestBlog').slideDown()
    }

    function hideBlogSearchResult() {
        $('#suggestBlog').slideUp()
    }
</script>
