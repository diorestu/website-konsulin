@extends('admin.layout.main')

@section('title')
    Add New Project
@endsection

@push('addon-style')
@endpush

@section('content')
    <div class="main-content mx-0">
        <div class="page-title-box pb-2 d-sm-flex align-items-start justify-content-between">
            <div>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('module-project.index') }}">Project List</a></li>
                    <li class="breadcrumb-item active">Add New Project</li>
                </ol>
                <h4 class="mb-sm-0 fw-bold font-size-22 mt-3">Add New Project</h4>
                <p class="text-muted mt-1 text-opacity-50">Project list for website project page</p>
            </div>
        </div>
        <div class="page-content mt-0 pt-0">
            <div class="row">
                <div class="col-xl-12 col-lg-12 p-0">
                    <form action="{{ route('module-project.store') }}" method="post" enctype="multipart/form-data">
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
                                            <div class="col-sm-12 col-md-6">
                                                <div class="form-group mb-4">
                                                    <label for="pf_name" class="font-weight-bolder">Project Title
                                                        <span class="text-danger">*</span></label>
                                                    <input required id="pf_name" class="form-control" type="text"
                                                        name="pf_name">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="pf_meta_key" class="font-weight-bolder">Meta
                                                        Keywords</label>
                                                    <input required id="pf_meta_key" class="form-control" type="text"
                                                        name="pf_meta_key">
                                                    <div class="text-muted font-10 mt-1">Keywords sperated with , (comma)
                                                        for web
                                                        SEO
                                                    </div>
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
                                                    <label for="pf_meta_desc" class="font-weight-bolder">Meta
                                                        Description</label>
                                                    <input required id="pf_meta_desc" class="form-control" type="text"
                                                        name="pf_meta_desc">
                                                    <div class="text-muted font-10 mt-1">Short description for web SEO</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group mb-4">
                                                    <label for="pf_desc" class="font-weight-bolder">Project Description
                                                        <span class="text-danger">*</span></label>
                                                    <textarea id="pf_desc" class="form-control" name="pf_desc"></textarea>
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
