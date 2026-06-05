<header id="page-topbar" style="background-color: #080b17 !important;">
    {{-- #C7393B --}}
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route('admin.dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        {{-- <img src="{{ asset('logo-new-white.png') }}" alt="" height="24"> --}}
                    </span>
                    <span class="logo-lg">
                        {{-- <img src="{{ asset('logo-new-white.png') }}" alt="" height="24"> --}}
                        <span class="logo-txt">Smart Panel</span>
                    </span>
                </a>
                <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">
                        {{-- <img src="{{ asset('logo-new-white.png') }}" alt="" height="36"> --}}
                    </span>
                    <span class="logo-lg">
                        {{-- <img src="{{ asset('logo-new-white.png') }}" alt="" height="36"> --}}
                        <span class="logo-txt">Smart Panel</span>
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">
            <div class="d-none d-sm-inline-block mx-1">
                <button type="button" class="btn header-item" id="mode-setting-btn">
                    <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                    <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    @if (Auth::user()->company_logo == '')
                        <img class="rounded-circle header-profile-user"
                            src="{{ asset('backend-assets/images/no-staff.jpg') }}" alt="Header Avatar">
                    @else
                        <img class="rounded-circle header-profile-user"
                            src="{{ asset('storage/uploads/users/' . Auth::user()->company_logo) }}" />
                    @endif
                    <span class="d-none d-xl-inline-block ms-1 fw-medium">{{ Auth::user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{ route('profile.edit') }}"><i
                            class="bx bxs-user-circle font-size-16 align-middle me-1 text-pink"></i> Profile</a>
                    <a class="dropdown-item" href="{{ route('profile.changePwd') }}"><i
                            class="bx bxs-lock-alt font-size-16 align-middle me-1 text-warning"></i> Change Password</a>
                    <a class="dropdown-item" href="{{ route('settings.index') }}"><i
                            class="bx bxs-cog font-size-16 align-middle me-1 text-primary"></i> Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-black fw-black bg-warning rounded" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>
