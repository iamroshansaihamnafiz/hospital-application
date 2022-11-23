<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ 'home' == request()->path() ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/home') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item {{ 'send-mail/'.request()->route('id') == request()->path() ? 'active' : '' }} {{ 'all-appointments' == request()->path() ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <i class="icon-bar-graph menu-icon"></i>
                <span class="menu-title">Appointment</span>
                <i class="menu-arrow"></i>
            </a>
            <div
                class="collapse {{ 'send-mail/'.request()->route('id') == request()->path() ? 'show' : '' }} {{ 'all-appointments' == request()->path() ? 'show' : '' }}"
                id="charts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/all-appointments') }}">Appointments</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item {{ 'doctor-edit/'.request()->route('id') == request()->path() ? 'active' : '' }} {{ 'doctors' == request()->path() ? 'active' : '' }} {{ 'doctor-create' == request()->path() ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Doctor</span>
                <i class="menu-arrow"></i>
            </a>
            <div
                class="collapse {{ 'doctor-edit/'.request()->route('id') == request()->path() ? 'show' : '' }} {{ 'doctors' == request()->path() ? 'show' : '' }} {{ 'doctor-create' == request()->path() ? 'show' : '' }}"
                id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="/doctors">Our Doctor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/doctor-create') }}">Add Doctor</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item {{ 'specialities' == request()->path() ? 'active' : '' }} {{ 'speciality-create' == request()->path() ? 'active' : '' }} {{ 'speciality-edit/'.request()->route('id') == request()->path() ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
               aria-controls="form-elements">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Speciality</span>
                <i class="menu-arrow"></i>
            </a>
            <div
                class="collapse {{ 'specialities' == request()->path() ? 'show' : '' }} {{ 'speciality-create' == request()->path() ? 'show' : '' }} {{ 'speciality-edit/'.request()->route('id') == request()->path() ? 'show' : '' }}"
                id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/specialities') }}">Our Speciality</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/speciality-create') }}">Add Speciality</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item {{ 'blogs' == request()->path() ? 'active' : '' }} {{ 'blog-view/'.request()->route('id') == request()->path() ? 'active' : '' }} {{ 'blog-edit/'.request()->route('id') == request()->path() ? 'active' : '' }} {{ 'blog-create' == request()->path() ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Blog</span>
                <i class="menu-arrow"></i>
            </a>
            <div
                class="collapse {{ 'blogs' == request()->path() ? 'show' : '' }} {{ 'blog-view/'.request()->route('id') == request()->path() ? 'show' : '' }} {{ 'blog-edit/'.request()->route('id') == request()->path() ? 'show' : '' }} {{ 'blog-create' == request()->path() ? 'show' : '' }}"
                id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/blogs') }}"> Our Blog </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/blog-create') }}"> Add Blog </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
<!-- partial -->
