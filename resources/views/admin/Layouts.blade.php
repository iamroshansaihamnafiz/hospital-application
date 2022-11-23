<!------------ Include Head File ------------>
@include('admin.head')

<body>
<div class="container-scroller">
    <!------------ Include Head File ------------>
    @include('admin.partial.navbar')

    <div class="container-fluid page-body-wrapper">

        <!---------- Include Setting File ------------>
    @include('admin.partial.setting')

    <!---------- Include Left-Sidebar File ------------>
        @include('admin.partial.left-sidebar')


    <!------------ Main Body Content --------->
    @yield('admin_content')
    <!------------ Main Body Content --------->


    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!----------- Include Script File ---------->
@include('admin.script')

</body>

</html>
