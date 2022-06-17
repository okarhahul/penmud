{{-- <ul class="sub-menu dropdown-menu">
    @foreach ($parent as $parents)
        <li><a href="" class="dropdown-item">
            {{ $parents->name }} @if (count($parents->parent)&raquo) @endif
        </a>

        @if(count($parents->parent))
            @include('partials.parentcategoryjurnalistik', ['parent' => $parents->parent])
        @endif

        </li>
    @endforeach
</ul> --}}