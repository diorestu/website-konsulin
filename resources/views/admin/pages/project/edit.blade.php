@extends('admin.layout.main')

@section('title')
    Edit Project
@endsection

@push('addon-style')
    <link href="{{ asset('backend-assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.3.0/css/lightgallery.min.css">
    <style>
        .gallery_wp img {
            border-radius: 5px;
            border: 5px solid #e0e0e0;
        }

        .btn-hapus-gambar,
        .btn-set-front {
            width: 30px;
            height: 30px;
            border-radius: 80px;
            position: absolute;
            text-align: center;
            top: -10px;
            line-height: 3px
        }

        .btn-hapus-gambar {
            right: -10px;
        }

        .btn-set-front {
            right: 30px;
        }

        .btn-hapus-gambar i,
        .btn-set-front i {
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
                    <li class="breadcrumb-item"><a href="{{ route('module-project.index') }}">Project List</a></li>
                    <li class="breadcrumb-item active">Edit Project</li>
                </ol>
                <h4 class="mb-sm-0 fw-bold font-size-22 mt-3">Edit Project</h4>
                <p class="text-muted mt-1 text-opacity-50">Project list for website project page</p>
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
                                <span class="d-none d-sm-block">Project Detail</span>
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
                            <form action="{{ route('module-project.update', $data->id) }}" method="post"
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
                                                    <label for="pf_name" class="font-weight-bolder">Project Title
                                                        <span class="text-danger">*</span></label>
                                                    <input required id="pf_name" class="form-control" type="text"
                                                        name="pf_name" value="{{ $data->pf_name }}">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="pf_meta_key" class="font-weight-bolder">Meta
                                                        Keywords</label>
                                                    <input required id="pf_meta_key" class="form-control" type="text"
                                                        name="pf_meta_key" value="{{ $data->pf_meta_key }}">
                                                    <div class="text-muted font-10 mt-1">Keywords sperated with ,
                                                        (comma)
                                                        for web
                                                        SEO
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="form-group mb-4">
                                                    <label for="status">Status <span class="text-danger">*</span></label>
                                                    <select required id="status" class="form-select" name="status">
                                                        <option @if ($data->pf_status == 'Published') selected @endif
                                                            value="Published">Published</option>
                                                        <option @if ($data->pf_status == 'Draft') selected @endif
                                                            value="Draft">Draft</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="pf_meta_desc" class="font-weight-bolder">Meta
                                                        Description</label>
                                                    <input required id="pf_meta_desc" class="form-control" type="text"
                                                        name="pf_meta_desc" value="{{ $data->pf_meta_desc }}">
                                                    <div class="text-muted font-10 mt-1">Short description for web
                                                        SEO</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group mb-4">
                                                    <label for="pf_desc" class="font-weight-bolder">Project
                                                        Description
                                                        <span class="text-danger">*</span></label>
                                                    <textarea id="pf_desc" class="form-control" name="pf_desc">{{ $data->pf_desc }}</textarea>
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
                                                    data-src="{{ asset('storage/uploads/portfolio/' . $img->pf_images) }}"
                                                    data-sub-html="<p>Project media and images<p>"
                                                    href="{{ asset('storage/uploads/portfolio/' . $img->pf_images) }}">
                                                    <img class="img-responsive w-100"
                                                        src="{{ asset('storage/uploads/portfolio/' . $img->pf_images) }}">
                                                </a>
                                                <form action="{{ route('module-project.delimages', $img->id) }}"
                                                    method="POST">
                                                    @method('POST')
                                                    @csrf
                                                    <button type="submit" class="bg-danger btn btn-hapus-gambar"><i
                                                            class="fa fa-trash text-white"></i></button>
                                                </form>
                                                <a class="bg-primary btn btn-set-front"
                                                    href="{{ route('module-project.frontimg', $img->id) }}"><i
                                                        class="fa fa-image text-white"></i></a>
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
                                        <form action="{{ route('module-project.upload', $data->id) }}" method="POST"
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
