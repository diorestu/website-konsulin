@extends('admin.layout.main')

@section('title')
    Admin Profile
@endsection

@push('addon-style')
    <link href="{{ asset('backend-assets/libs/croppie/croppie.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="main-content mx-0">
        <div class="page-title-box pb-2 d-sm-flex align-items-start justify-content-between">
            <div class="mb-3">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Settings</li>
                    <li class="breadcrumb-item active">Admin Profile</li>
                </ol>
                <h4 class="mb-sm-0 fw-bold font-size-22 mt-3">Admin Profile</h4>
            </div>
        </div>
        <div class="page-content mt-0 pt-0">
            <div class="row">
                <div class="col-xl-12 col-lg-12 p-0">
                    <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="tab-content">
                            <!-- DATA DIRI -->
                            <div class="tab-pane active" id="overview" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div id="uploaded_image">
                                                    @if ($user->company_logo == '')
                                                        <img src="{{ asset('backend-assets/images/no-staff.jpg') }}"
                                                            class="d-block w-100" />
                                                    @else
                                                        <img src="{{ asset('storage/uploads/users/' . $user->company_logo) }}"
                                                            class="d-block w-100" />
                                                    @endif
                                                </div>
                                                <input type="file" class="inputfile inputfile-1" name="image"
                                                    id="upload_image" accept="image/*" />
                                                <label for="upload_image"><i class="fas fa-camera"></i>&nbsp; Change
                                                    Photo</label>
                                            </div>
                                            <div class="col-sm-12 col-md-5">
                                                <div class="form-group mb-4">
                                                    <label for="name" class="font-weight-bolder">Admin Name <span
                                                            class="text-danger">*</span></label>
                                                    <x-text-input id="name" name="name" type="text"
                                                        class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus
                                                        autocomplete="name" />
                                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="gender" class="font-weight-bolder">Admin Email <span
                                                            class="text-danger">*</span></label>
                                                    <x-text-input id="email" name="email" type="email"
                                                        class="mt-1 block w-full" :value="old('email', $user->email)" required
                                                        autocomplete="username" />
                                                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                                                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                                        <div>
                                                            <p class="text-sm mt-2 text-gray-800">
                                                                {{ __('Your email address is unverified.') }}

                                                                <button form="send-verification" class="btn btn-primary">
                                                                    Click here to re-send the verification email
                                                                </button>
                                                            </p>
                                                            @if (session('status') === 'verification-link-sent')
                                                                <p class="mt-2 font-medium text-sm text-green-600">
                                                                    A new verification link has been sent to your email
                                                                    address
                                                                </p>
                                                            @endif
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-5">
                                                <div class="form-group mb-4">
                                                    <label for="phone" class="font-weight-bolder">Admin Phone <span
                                                            class="text-danger">*</span></label>
                                                    <x-text-input id="phone" name="phone" type="text"
                                                        class="mt-1 block w-full" :value="old('phone', $user->phone)" required autofocus
                                                        autocomplete="phone" />
                                                    <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="alamat" class="font-weight-bolder">Admin Address <span
                                                            class="text-danger">*</span></label>
                                                    <x-text-input id="alamat" name="alamat" type="text"
                                                        class="mt-1 block w-full" :value="old('alamat', $user->alamat)" required autofocus
                                                        autocomplete="alamat" />
                                                    <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-warning text-black btn-block w-100 btn-md mt-3"
                                            type="submit">
                                            <i class="fas fa-check-circle icon-md"></i>&nbsp; Update Profile
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

    <div id="uploadimageModal" class="modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 center-block text-center">
                            <div class="center-block" id="image_demo" style="width:100%; margin-top:30px"></div>
                        </div>
                        <div class="col-md-12" style="padding-top:30px;">
                            <button class="btn btn-block btn-success crop_image">Crop & Upload Image</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script src="{{ asset('backend-assets/libs/croppie/croppie.js') }}"></script>
    <script>
        $(document).ready(function() {
            image_crop = $('#image_demo').croppie({
                enableExif: true,
                viewport: {
                    width: 300,
                    height: 300,
                    type: 'square' //circle
                },
                boundary: {
                    width: 450,
                    height: 450
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
                    var url = "{{ route('profile.upload') }}";
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        url: url,
                        type: "POST",
                        data: {
                            '_token': $('meta[name="_token"]').attr('content'),
                            'image': response,
                            'id': {{ $user->id }}
                        },
                        success: function(data) {
                            $('#uploadimageModal').modal('hide');
                            $('#uploaded_image').html(data);
                        }
                    });
                })
            });
        });
    </script>
    @if (session('status') === 'profile-updated')
        <script type="text/javascript">
            Swal.fire('Saved', 'All changes has been saved', 'success')
        </script>
    @endif
    @if (Session::has('error'))
        <script type="text/javascript">
            Swal.fire('Gagal', '{{ \Session::get('error') }}', 'error')
        </script>
    @endif
@endpush
