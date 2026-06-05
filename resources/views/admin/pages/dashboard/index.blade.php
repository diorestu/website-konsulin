@extends('admin.layout.main')

@section('title')
    Dashboard
@endsection

@push('addon-style')
@endpush

@section('content')
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card card-h-100 rounded-xs">
                <div class="card-body bg-dashboard"
                    style="background-image: url('{{ asset('frontend-assets/images/logos/logo.png') }}')">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="font-size-20 fw-bold mb-1 d-block text-truncate">Welcome back,
                                {{ ucwords(strtolower(Auth::user()->name)) }}</span>
                            <p class="text-muted mb-3">Today
                                {{ Carbon\Carbon::parse(now())->locale('id')->isoFormat('dddd, LL') }}</p>
                            <p class="text-muted mb-3"><em>Use the menu above to manage the available modules for your
                                    website needs.</em></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card card-h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Slider</span>
                            <h4 class="mb-3">
                                <span class="counter-value" data-target="{{ $slider }}">0</span> slider
                            </h4>
                            <div class="text-nowrap">
                                <a href="{{ route('module-slider.index') }}" class="badge bg-soft-success text-success">See
                                    Details</a>
                                <span class="ms-1 text-muted font-size-13">use in homepage</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Published Projects</span>
                            <h4 class="mb-3">
                                <span class="counter-value" data-target="{{ $portfolio }}">0</span> projects
                            </h4>
                            <div class="text-nowrap">
                                <a href="{{ route('module-project.index') }}" class="badge bg-soft-warning text-warning">See
                                    Detail</a>
                                <span class="ms-1 text-muted font-size-13">projects in website</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Published News</span>
                            <h4 class="mb-3">
                                <span class="counter-value" data-target="{{ $news }}">0</span> news
                            </h4>
                            <div class="text-nowrap">
                                <a href="{{ route('module-news.index') }}" class="badge bg-soft-danger text-danger">See
                                    Details</a>
                                <span class="ms-1 text-muted font-size-13">news this month</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Today Inbox</span>
                            <h4 class="mb-3">
                                <span class="counter-value" data-target="{{ $contact }}">0</span> message
                            </h4>
                            <div class="text-nowrap">
                                <a href="{{ route('module-contact.index') }}" class="badge bg-soft-primary text-primary">
                                    See Details</a>
                                <span class="ms-1 text-muted font-size-13">incoming message today</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    @if (Session::has('success'))
        <script type="text/javascript">
            Swal.fire('Berhasil', '{{ \Session::get('success') }}', 'success')
        </script>
    @endif
    @if (Session::has('error'))
        <script type="text/javascript">
            Swal.fire('Gagal', '{{ \Session::get('error') }}', 'error')
        </script>
    @endif
@endpush
