@extends('admin.layout.main')

@section('title')
    Edit Image Slider
@endsection

@push('addon-style')
    <link href="{{ asset('backend-assets/libs/croppie/croppie.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.3.0/css/lightgallery.min.css">
    <style>
        .gallery_wp img {
            border-radius: 5px;
            border: 5px solid #e0e0e0;
        }

        #uploadimageModal .modal-dialog {
            max-width: 1300px;
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
                    <li class="breadcrumb-item"><a href="{{ route('module-slider.index') }}">Slider List</a></li>
                    <li class="breadcrumb-item active">Edit Image Slider</li>
                </ol>
                <h4 class="mb-sm-0 fw-bold font-size-22 mt-3">Edit Image Slider</h4>
                <p class="text-muted mt-1 text-opacity-50">Image slider list for website homepage</p>
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
                                <span class="d-none d-sm-block">Slider Detail</span>
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
                            <form action="{{ route('module-slider.update', $data->id) }}" method="post"
                                enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                <div class="card">
                                    <div class="card-header bg-dark">
                                        <h5 class="card-title text-white mb-0">Edit Data</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group mb-4">
                                                    <label for="sl_title" class="font-weight-bolder">Title
                                                        <span class="text-danger">*</span></label>
                                                    <input required id="sl_title" class="form-control" type="text"
                                                        name="sl_title" value="{{ $data->sl_title }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="form-group mb-4">
                                                    <label for="status">Status <span class="text-danger">*</span></label>
                                                    <select required id="status" class="form-select" name="status">
                                                        <option @if ($data->news_status == 'Published') selected @endif
                                                            value="Published">Published</option>
                                                        <option @if ($data->news_status == 'Draft') selected @endif
                                                            value="Draft">Draft</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="sl_btn_caption" class="font-weight-bolder">Button
                                                        Caption</label>
                                                    <input id="sl_btn_caption" class="form-control" type="text"
                                                        name="sl_btn_caption" value="{{ $data->sl_btn_caption }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="form-group mb-4">
                                                    <label for="sl_subtitle" class="font-weight-bolder">Subtitle</label>
                                                    <input id="sl_subtitle" class="form-control" type="text"
                                                        name="sl_subtitle" value="{{ $data->sl_subtitle }}">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="sl_btn_link" class="font-weight-bolder">Button
                                                        Link</label>
                                                    <input id="sl_btn_link" class="form-control" type="text"
                                                        name="sl_btn_link" value="{{ $data->sl_btn_link }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group mb-4">
                                                    <label for="sl_desc" class="font-weight-bolder">Description</label>
                                                    <textarea id="sl_desc" class="form-control" name="sl_desc">{{ $data->sl_desc }}</textarea>
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
                                        @if ($data->sl_images != null)
                                            <div class="col-lg-3 offset-3 mx-2" style="position: relative;">
                                                <a class="gallery_wp"
                                                    data-src="{{ asset('storage/uploads/slider/' . $data->sl_images) }}"
                                                    data-sub-html="<p>News media and images<p>"
                                                    href="{{ asset('storage/uploads/slider/' . $data->sl_images) }}">
                                                    <img class="img-responsive w-100"
                                                        src="{{ asset('storage/uploads/slider/' . $data->sl_images) }}">
                                                </a>
                                                <form action="{{ route('module-slider.delimages', $data->id) }}"
                                                    method="POST">
                                                    @method('POST')
                                                    @csrf
                                                    <button type="submit" class="bg-danger btn btn-hapus-gambar"><i
                                                            class="fa fa-trash text-white"></i></button>
                                                </form>
                                            </div>
                                        @else
                                            <div class='col-lg-12'>
                                                <div class="card bg-warning border-warning text-black">
                                                    <div class="card-body">
                                                        <h5 class="mb-3 text-dark">No media and images found</h5>
                                                        <p class="card-text">Images and media will be shown here. To
                                                            add
                                                            media and images, use a uploader images
                                                            in "Upload Media" tab.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="profile" role="tabpanel">
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <h5 class="card-title text-white mb-0">Upload Images</h5>
                                </div>
                                <div class="card-body py-1 pt-0">
                                    <input type="file" class="inputfile inputfile-1" name="image" id="upload_image"
                                        accept="image/*" />
                                    <label for="upload_image"><i class="fas fa-camera"></i>&nbsp; Ganti Foto
                                        Profil</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="uploadimageModal" class="modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 center-block text-center">
                            <div class="center-block" id="image_demo" style="width:100%; margin-top:30px"></div>
                        </div>
                        <div class="col-md-12" style="padding-top:30px;">
                            <button class="btn btn-block w-100 btn-primary crop_image"><i class='fa fa-crop'></i> Crop &
                                Upload Image</button>
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
    <script src="{{ asset('backend-assets/libs/croppie/croppie.js') }}"></script>
    <script>
        $(document).ready(function() {
            var sl_width = 1200;
            var sl_height = 727;
            image_crop = $('#image_demo').croppie({
                enableExif: true,
                viewport: {
                    width: sl_width,
                    height: sl_height,
                    type: 'square' //circle
                },
                boundary: {
                    width: 1200,
                    height: 727
                }
            });
            $('#upload_image').on('change', function() {
                var reader = new FileReader();
                var base64data = reader.result;
                reader.onload = function(event) {
                    image_crop.croppie('bind', {
                        url: event.target.result
                    }).then(function() {
                        console.log('jQuery bind complete');
                    });
                }
                reader.readAsDataURL(this.files[0]);
                $('#uploadimageModal').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $('#uploadimageModal').modal('show');
            });
            $('.crop_image').click(function(event) {
                image_crop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function(response) {
                    var url = "{{ url('admin/module-slider/upload') }}";
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        url: url,
                        type: "POST",
                        data: {
                            '_token': $('meta[name="_token"]').attr('content'),
                            'image': response,
                            'id': {{ $data->id }}
                        },
                        success: function(data) {
                            $('#uploadimageModal').modal('hide');
                            if (data == 'ok') {
                                Swal.fire('Success', 'Images has been added',
                                    'success');
                            } else {
                                Swal.fire('Falied', data, 'error');
                            }

                        }
                    });
                })
            });
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
