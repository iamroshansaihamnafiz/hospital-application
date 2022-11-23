@section('title', 'Home')
<!---------- Include Head File --------->
@include('frontend.head')

<body>

<!-- Back to top button -->
<div class="back-to-top"></div>

<!------- Include Navbar File --------->
@include('frontend.navbar')


<!------- Include Banner File --------->
@include('frontend.home-partial.banner')


<!------- Include Banner File --------->
@include('frontend.home-partial.wellcome')


<!----------- Include Doctor File ----------->
@include('frontend.home-partial.doctor')


<!----------- Include Latest-Blog File ----------->
@include('frontend.home-partial.latest-blog')


<!----------- Include Appointment File ----------->
@include('frontend.home-partial.appointment')


<!----------- Include Application File ----------->
@include('frontend.home-partial.application')


<!---------- Include Footer File --------->
@include('frontend.footer')


<!---------- Include Script File --------->
@include('frontend.script')

</body>
</html>
