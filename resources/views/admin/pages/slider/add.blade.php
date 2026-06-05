@extends('admin.layout.main')

@section('title')
    Add New Slider
@endsection

@push('addon-style')
@endpush

@section('content')
    <div class="main-content mx-0">
        <div class="page-title-box pb-2 d-sm-flex align-items-start justify-content-between">
            <div>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Website Content</li>
                    <li class="breadcrumb-item"><a href="{{ route('module-slider.index') }}">Slider List</a></li>
                    <li class="breadcrumb-item active">Add New Slider</li>
                </ol>
                <h4 class="mb-sm-0 fw-bold font-size-22 mt-3">Add New Slider</h4>
                <p class="text-muted mt-1 text-opacity-50">Image slider list for website homepage</p>
            </div>
        </div>
        <div class="page-content mt-0 pt-0">
            <div class="row">
                <div class="col-xl-12 col-lg-12 p-0">
                    <form action="{{ route('module-slider.store') }}" method="post" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="tab-content">
                            <div class="tab-pane active" id="overview" role="tabpanel">
                                <div class="card">
                                    <div class="card-header bg-dark">
                                        <h5 class="card-title text-white mb-0">Create New Data</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group mb-4">
                                                    <label for="sl_title" class="font-weight-bolder">Title
                                                        <span class="text-danger">*</span></label>
                                                    <input required id="sl_title" class="form-control" type="text"
                                                        name="sl_title">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="form-group mb-4">
                                                    <label for="status">Status <span class="text-danger">*</span></label>
                                                    <select required id="status" class="form-select" name="status">
                                                        <option value="Published">Published</option>
                                                        <option value="Draft">Draft</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="sl_btn_caption" class="font-weight-bolder">Button
                                                        Caption</label>
                                                    <input id="sl_btn_caption" class="form-control" type="text"
                                                        name="sl_btn_caption">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="form-group mb-4">
                                                    <label for="sl_subtitle" class="font-weight-bolder">Subtitle</label>
                                                    <input id="sl_subtitle" class="form-control" type="text"
                                                        name="sl_subtitle">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="sl_btn_link" class="font-weight-bolder">Button
                                                        Link</label>
                                                    <input id="sl_btn_link" class="form-control" type="text"
                                                        name="sl_btn_link">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group mb-4">
                                                    <label for="sl_desc" class="font-weight-bolder">Description</label>
                                                    <textarea id="sl_desc" class="form-control" name="sl_desc"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-warning text-black btn-block w-100 btn-md" type="submit">
                                            <i class="fas fa-plus-circle icon-md"></i>&nbsp; Create New Data
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        new Choices(document.querySelector('#status'));
    </script>
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
