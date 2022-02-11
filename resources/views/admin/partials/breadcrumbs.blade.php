@unless ($breadcrumbs->isEmpty())
    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
        <div class="pl-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    @foreach ($breadcrumbs as $breadcrumb)

                        @if(!is_null($breadcrumb->url) && $loop->first)
                            <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}"><i class='bx bx-home-alt'></i></a></li>
                        @elseif (!is_null($breadcrumb->url) && !$loop->last)
                            <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                        @else
                            <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
                        @endif

                    @endforeach
                </ol>
            </nav>
        </div>
    </div>
@endunless
