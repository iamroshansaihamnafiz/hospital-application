<ul style="padding: 0; margin-bottom: 0 !important;">
    @forelse($doctors as $doctor)
        <a href="{{ url('/doctor-details/'. $doctor->id) }}">
            <li style="list-style: none; line-height: 180px">
                <img src="{{ asset('admin/images/upload-doctor/' .$doctor['image']) }}"
                     alt="" style="width: 140px; height: 160px">
                <strong style="margin-left: 25px;">
                    Dr. {{ $doctor['doctor_name'] }}
                </strong>
            </li>
        </a>
    @empty
        <li style="color: red; height: 75px; list-style: none;">
            <span style="position: absolute; top: 25px; left: 70px">Not Found</span>
        </li>
    @endforelse
</ul>
