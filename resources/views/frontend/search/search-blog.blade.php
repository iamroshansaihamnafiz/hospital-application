<ul style="padding: 0; margin-bottom: 0 !important;">
    @forelse($blogs as $blog)
        <a href="{{ url('blog-details/' . $blog['id']) }}">
            <li style="list-style: none; line-height: 120px">
                <img src="{{ asset('admin/images/upload-blog/' .$blog['image']) }}"
                     alt="" style="width: 130px; height: 80px">
                <strong style="margin-left: 25px;">
                    Dr. {{ $blog['title'] }}
                </strong>
            </li>
        </a>
    @empty
        <li style="color: red; height: 75px; list-style: none;">
            <span style="position: absolute; top: 25px; left: 70px">Not Found</span>
        </li>
    @endforelse
</ul>
