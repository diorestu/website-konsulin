@extends('admin.layout.main')

@section('title')
    Change Passsword
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
                    <li class="breadcrumb-item active">Change Passsword</li>
                </ol>
                <h4 class="mb-sm-0 fw-bold font-size-22 mt-3">Change Passsword</h4>
            </div>
        </div>
        <div class="page-content mt-0 pt-0">
            <div class="row">
                <div class="col-xl-5 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a class="text-muted dropdown-toggle font-size-16" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true">
                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">See Profile</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div>
                                    <img src="{{ $user->company_logo == '' ? asset('backend-assets/images/no-staff.jpg') : asset('storage/uploads/users/' . $user->company_logo) }}"
                                        alt="" class="avatar-lg rounded-circle img-thumbnail">
                                </div>
                                <div class="flex-1 ms-3">
                                    <h5 class="font-size-15 mb-1"><a href="#"
                                            class="text-dark">{{ $user->name }}</a></h5>
                                </div>
                            </div>
                            <div class="mt-3 pt-1">
                                <p class="text-muted mb-0"><i class="icon-menu" data-feather="phone-call"></i>
                                    {{ $user->phone }}</p>
                                <p class="text-muted mb-0 mt-3"><i class="icon-menu" data-feather="mail"></i>
                                    {{ $user->email }}</p>
                                <p class="text-muted mb-0 mt-3"><i class="icon-menu" data-feather="award"></i>
                                    {{ $user->roles }}</p>
                                <p class="text-muted mb-0 mt-3"><i class="icon-menu" data-feather="log-in"></i>
                                    {{ $user->created_at }}</p>
                                <p class="text-muted mb-0 mt-3"><i class="icon-menu" data-feather="map-pin"></i>
                                    {{ $user->alamat }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <form action="{{ route('password.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="tab-content">
                            <!-- DATA DIRI -->
                            <div class="tab-pane active" id="overview" role="tabpanel">
                                <div class="card">
                                    <div class="card-header bg-dark">
                                        <h5 class="card-title text-white mb-0">Change Password</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group mb-4">
                                                    <label for="old-pass" class="font-weight-bolder">Current Password <span
                                                            class="text-danger">*</span></label>
                                                    <x-text-input id="current_password" name="current_password"
                                                        type="password" class="mt-1 block w-full"
                                                        autocomplete="current-password" />
                                                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-1" />
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="new-pass" class="font-weight-bolder">New Password <span
                                                            class="text-danger">*</span></label>
                                                    <x-text-input id="password" name="password" type="password"
                                                        class="mt-1 block w-full" autocomplete="new-password" />
                                                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-1" />
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="cnew-pass" class="font-weight-bolder">Confirm New Password
                                                        Baru <span class="text-danger">*</span></label>
                                                    <x-text-input id="password_confirmation" name="password_confirmation"
                                                        type="password" class="mt-1 block w-full"
                                                        autocomplete="new-password" />
                                                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-1" />
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-warning text-black btn-block w-100 btn-md mt-3"
                                            type="submit">
                                            <i class="fas fa-check-circle icon-md"></i>&nbsp; Change Password
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
    @if (session('status') === 'password-updated')
        <script type="text/javascript">
            Swal.fire('Saved', 'Your password has been changed', 'success')
        </script>
    @endif
    @if (Session::has('error'))
        <script type="text/javascript">
            Swal.fire('Gagal', '{{ \Session::get('error') }}', 'error')
        </script>
    @endif
@endpush
