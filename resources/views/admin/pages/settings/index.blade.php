@extends('admin.layout.main')

@section('title')
    Company Settings
@endsection

@push('addon-style')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
    <link href="{{ asset('backend-assets/libs/croppie/croppie.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ asset('backend-assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend-assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" /> --}}
@endpush

@section('content')
    <div class="row px-0">
        <div class="col-12">
            <div class="page-title-box pb-2 d-sm-flex align-items-start justify-content-between">
                <div>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Settings</li>
                        <li class="breadcrumb-item active">Company Settings</li>
                    </ol>
                    <h4 class="fw-bold font-size-22 mt-3 mb-3">Company Settings</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <div class="card card-custom rounded-sm shadow-md">
                <div class="card-body px-4 py-4">
                    <h4 class="card-title my-3 ms-0 text-danger">Delete Account</h4>
                    <p><i>Once your account is deleted, all of its resources and data will be permanently deleted.
                            <br><br>Before
                            deleting your account, please download any data or information that you wish to retain</i></p>
                    <x-danger-button x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Delete Account') }}
                    </x-danger-button>
                    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                            @csrf
                            @method('delete')
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Are you sure you want to delete your account?') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                            </p>
                            <div class="mt-6">
                                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                                <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4"
                                    placeholder="{{ __('Password') }}" />

                                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                            </div>
                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Cancel') }}
                                </x-secondary-button>

                                <x-danger-button class="ml-3">
                                    {{ __('Delete Account') }}
                                </x-danger-button>
                            </div>
                        </form>
                    </x-modal>
                </div>
            </div>
        </div>

        <div class="col-8">
            <div class="card card-custom gutter-b rounded-sm shadow-sm">
                <div class="card-header bg-dark">
                    <h5 class="card-title text-white mb-0">Company Settings</h5>
                </div>
                <div class="card-body px-4 py-4">
                    <div class="col-12">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab"
                                    aria-selected="true">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Company Info</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab"
                                    aria-selected="false">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">Social Links</span>
                                </a>
                            </li>
                        </ul>
                        <form method="POST" action="{{ route('settings.update', $data->id) }}" id="formSetting"
                            class="py-3">
                            @csrf
                            @method('patch')
                            <div class="tab-content p-3 text-muted">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="row mb-4">
                                        <label for="nama_com" class="col-sm-3 col-form-label">Company Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nama_com"
                                                value="{{ $data->nama_com }}">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="brand_com" class="col-sm-3 col-form-label">Company Brand</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="brand_com"
                                                value="{{ $data->brand_com }}">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="phone_com1" class="col-sm-3 col-form-label">Phone</label>
                                        <div class="col-sm-9"><input type="text" class="form-control" name="phone_com1"
                                                value="{{ $data->phone_com1 }}"></div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="email_com1" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9"><input type="email" class="form-control"
                                                name="email_com1" value="{{ $data->email_com1 }}"></div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="alamat_com1" class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9"><input type="text" class="form-control"
                                                name="alamat_com1" value="{{ $data->alamat_com1 }}"></div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-sm-9">
                                            <div><button type="submit" class="btn btn-warning text-black w-md"><i
                                                        class="fa fa-save"></i>&nbsp; Save Changes</button></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="profile" role="tabpanel">
                                    <div class="row mb-4">
                                        <label for="social_fb" class="col-sm-3 col-form-label">Facebook</label>
                                        <div class="col-sm-9"><input type="text" class="form-control"
                                                name="social_fb" value="{{ $data->social_fb }}"></div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="social_ig" class="col-sm-3 col-form-label">Instagram</label>
                                        <div class="col-sm-9"><input type="text" class="form-control"
                                                name="social_ig" value="{{ $data->social_ig }}"></div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="social_yt" class="col-sm-3 col-form-label">Youtube</label>
                                        <div class="col-sm-9"><input type="text" class="form-control"
                                                name="social_yt" value="{{ $data->social_yt }}"></div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="social_tw" class="col-sm-3 col-form-label">Tik Tok</label>
                                        <div class="col-sm-9"><input type="text" class="form-control"
                                                name="social_tw" value="{{ $data->social_tw }}"></div>
                                    </div>

                                    <div class="row justify-content-end">
                                        <div class="col-sm-9">
                                            <div><button type="submit" class="btn btn-warning text-black w-md"><i
                                                        class="fa fa-save"></i>&nbsp; Save Changes</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    {{-- <script src="{{ asset('backend-assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend-assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script> --}}
    <script src="{{ asset('backend-assets/libs/croppie/croppie.js') }}"></script>
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
