@extends('admin.layout.main')

@section('title')
    Edit Website Page
@endsection

@push('addon-style')
    <link href="{{ asset('backend-assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.3.0/css/lightgallery.min.css">
    <style>
        .map {
            height: 200px;
            display: block;
        }

        .gallery_wp img {
            border-radius: 5px;
            border: 5px solid #e0e0e0;
        }

        .btn-hapus-gambar {
            width: 30px;
            height: 30px;
            border-radius: 80px;
            position: absolute;
            text-align: center;
            right: -10px;
            top: -10px;
            line-height: 3px
        }

        .btn-hapus-gambar i {
            margin-left: -4px;
        }
    </style>
@endpush

@section('content')
    <div class="main-content mx-0">
        <div class="page-title-box pb-2 d-sm-flex align-items-start justify-content-between">
            <div>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Website Content</li>
                    <li class="breadcrumb-item"><a href="{{ route('module-webpage.index') }}">Website Page List</a></li>
                    <li class="breadcrumb-item active">Edit Website Page</li>
                </ol>
                <h4 class="mb-sm-0 fw-bold font-size-22 mt-3">Edit Website Page</h4>
                <p class="text-muted mt-1 text-opacity-50">Dynamic section for website page</p>
            </div>
        </div>
        <div class="page-content mt-0 pt-0">
            <div class="row">
                <div class="col-xl-12 col-lg-12 p-0">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab"
                                aria-selected="true">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Webpage Detail</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#media" role="tab" aria-selected="false">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">Media &amp; Images</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab" aria-selected="false">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">Upload Media</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content pb-3 text-muted">
                        <div class="tab-pane active" id="home" role="tabpanel">
                            <form action="{{ route('module-webpage.update', $data->id) }}" method="post"
                                enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                <div class="card">
                                    <div class="card-header bg-dark">
                                        <h5 class="card-title text-white mb-0">Edit Data</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="form-group mb-4">
                                                    <label for="wp_title" class="font-weight-bolder">Webpage Title
                                                        <span class="text-danger">*</span></label>
                                                    <input required id="wp_title" class="form-control" type="text"
                                                        name="wp_title" value="{{ $data->wp_title }}">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="wp_url" class="font-weight-bolder">Webpage URL
                                                        <span class="text-danger">*</span></label>
                                                    <input id="wp_url" class="form-control" type="text" name="wp_url"
                                                        value="{{ $data->wp_url }}">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="wp_meta_key" class="font-weight-bolder">Meta
                                                        Keywords</label>
                                                    <input id="wp_meta_key" class="form-control" type="text"
                                                        name="wp_meta_key" value="{{ $data->wp_meta_key }}">
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
                                                        name="wp_subtitle" value="{{ $data->wp_subtitle }}">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="status">Status <span class="text-danger">*</span></label>
                                                    <select required id="status" class="form-select" name="status">
                                                        <option @if ($data->wp_status == 'Published') selected @endif
                                                            value="Published">Published</option>
                                                        <option @if ($data->wp_status == 'Draft') selected @endif
                                                            value="Draft">Draft</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="wp_meta_desc" class="font-weight-bolder">Meta
                                                        Description</label>
                                                    <input required id="wp_meta_desc" class="form-control" type="text"
                                                        name="wp_meta_desc" value="{{ $data->wp_meta_desc }}">
                                                    <div class="text-muted font-10 mt-1">Short description for web
                                                        SEO</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group mb-4">
                                                    <label for="wp_text1" class="font-weight-bolder">Webpage
                                                        Description
                                                        <span class="text-danger">*</span></label>
                                                    <textarea id="wp_text1" class="cktextarea form-control" name="wp_text1">{{ $data->wp_text1 }}</textarea>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="wp_text2" class="font-weight-bolder">Webpage Description 2
                                                        (Alternative)
                                                        <span class="text-danger">*</span></label>
                                                    <textarea id="wp_text2" class="cktextarea form-control" name="wp_text2">{{ $data->wp_text2 }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-warning text-black btn-block w-100 btn-md" type="submit">
                                            <i class="fas fa-check icon-md"></i>&nbsp; Save Changes
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="media" role="tabpanel">
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <h5 class="card-title text-white mb-0">Media &amp; Images </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row" id="animated-thumbnails-gallery">
                                        @forelse ($data_image as $img)
                                            <div class="col-lg-2 mx-2" style="position: relative;">
                                                <a class="gallery_wp"
                                                    data-src="{{ asset('storage/uploads/pages/' . $img->wp_images) }}"
                                                    data-sub-html="<p>Website page media and images<p>"
                                                    href="{{ asset('storage/uploads/pages/' . $img->wp_images) }}">
                                                    <img class="img-responsive w-100"
                                                        src="{{ asset('storage/uploads/pages/' . $img->wp_images) }}">
                                                </a>
                                                <form action="{{ route('module-webpage.delimages', $img->id) }}"
                                                    method="POST">
                                                    @method('POST')
                                                    @csrf
                                                    <button type="submit" class="bg-danger btn btn-hapus-gambar"><i
                                                            class="fa fa-trash text-white"></i></button>
                                                </form>
                                            </div>
                                        @empty
                                            <div class='col-lg-12'>
                                                <div class="card bg-warning border-warning text-black">
                                                    <div class="card-body">
                                                        <h5 class="mb-3 text-dark">No media and images found</h5>
                                                        <p class="card-text">Images and media will be shown here. To add
                                                            media and images, use a dropper images
                                                            in "Upload Media" tab.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="profile" role="tabpanel">
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <h5 class="card-title text-white mb-0">Upload Images</h5>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <form action="{{ route('module-webpage.upload', $data->id) }}" method="POST"
                                            class="dropzone">
                                            @csrf
                                            @method('POST')
                                            <div class="fallback">
                                                <input name="file" type="file" multiple="multiple">
                                            </div>
                                            <div class="dz-message needsclick">
                                                <div class="mb-3">
                                                    <i class="display-4 text-muted bx bx-cloud-upload"></i>
                                                </div>

                                                <h5>Drop files here or click to upload.</h5>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.3.0/lightgallery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.3.0/plugins/thumbnail/lg-thumbnail.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.3.0/plugins/zoom/lg-zoom.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.3.0/plugins/rotate/lg-rotate.min.js"></script>
    <script src="{{ asset('backend-assets/libs/dropzone/min/dropzone.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            lightGallery(document.getElementById('animated-thumbnails-gallery'), {
                selector: '.gallery_wp',
                thumbnail: true,
                rotate: true,
                rotateLeft: true,
                rotateRight: true,
            });
            $('.btn-hapus-gambar').on('click', function(e) {
                e.preventDefault();
                var form = $(this).parents('form');
                Swal.fire({
                    title: 'Delete Confirmation',
                    text: 'Are you sure want to delete this image?',
                    icon: 'question',
                    confirmButtonText: '<i class="fas fa-trash"></i>&nbsp; Delete',
                    confirmButtonColor: '#e83f3f',
                    showConfirmButton: 'true',
                    showCancelButton: 'true',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
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
