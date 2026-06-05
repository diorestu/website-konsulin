@extends('admin.layout.main')

@section('title')
    Add New Website Page
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
                    <li class="breadcrumb-item"><a href="{{ route('module-webpage.index') }}">Website Page List</a></li>
                    <li class="breadcrumb-item active">Add New Website Page</li>
                </ol>
                <h4 class="mb-sm-0 fw-bold font-size-22 mt-3">Add New Website Page</h4>
                <p class="text-muted mt-1 text-opacity-50">Dynamic section for website page</p>
            </div>
        </div>
        <div class="page-content mt-0 pt-0">
            <div class="row">
                <div class="col-xl-12 col-lg-12 p-0">
                    <form action="{{ route('module-webpage.store') }}" method="post" enctype="multipart/form-data">
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
                                                    <label for="wp_title" class="font-weight-bolder">Webpage Title
                                                        <span class="text-danger">*</span></label>
                                                    <input required id="wp_title" class="form-control" type="text"
                                                        name="wp_title">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="wp_url" class="font-weight-bolder">Webpage URL
                                                        <span class="text-danger">*</span></label>
                                                    <input id="wp_url" class="form-control" type="text"
                                                        name="wp_url">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="wp_meta_key" class="font-weight-bolder">Meta
                                                        Keywords</label>
                                                    <input id="wp_meta_key" class="form-control" type="text"
                                                        name="wp_meta_key">
                                                    <div class="text-muted font-10 mt-1">Keywords sperated with , (comma)
                                                        for web
                                                        SEO
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="form-group mb-4">
                                                    <label for="wp_subtitle" class="font-weight-bolder">Subtitle
                                                        <span class="text-danger">*</span></label>
                                                    <input id="wp_subtitle" class="form-control" type="text"
                                                        name="wp_subtitle">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="status">Status <span class="text-danger">*</span></label>
                                                    <select required id="status" class="form-select" name="status">
                                                        <option value="Published">Published</option>
                                                        <option value="Draft">Draft</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="wp_meta_desc" class="font-weight-bolder">Meta
                                                        Description</label>
                                                    <input id="wp_meta_desc" class="form-control" type="text"
                                                        name="wp_meta_desc">
                                                    <div class="text-muted font-10 mt-1">Short description for web SEO</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group mb-4">
                                                    <label for="wp_text1" class="font-weight-bolder">Webpage Description
                                                        <span class="text-danger">*</span></label>
                                                    <textarea id="wp_text1" class="cktextarea form-control" name="wp_text1"></textarea>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="wp_text2" class="font-weight-bolder">Webpage Description 2
                                                        (Alternative)
                                                        <span class="text-danger">*</span></label>
                                                    <textarea id="wp_text2" class="cktextarea form-control" name="wp_text2"></textarea>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script>
        new Choices(document.querySelector('#status'));
        ClassicEditor
            .create(document.querySelector('.cktextarea'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList'],
                heading: {
                    options: [{
                            model: 'paragraph',
                            title: 'Paragraph',
                            class: 'ck-heading_paragraph'
                        },
                        {
                            model: 'heading1',
                            view: 'h1',
                            title: 'Heading 1',
                            class: 'ck-heading_heading1'
                        },
                        {
                            model: 'heading2',
                            view: 'h2',
                            title: 'Heading 2',
                            class: 'ck-heading_heading2'
                        }
                    ]
                }
            })
            .catch(error => {
                alert(error);
            });
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
