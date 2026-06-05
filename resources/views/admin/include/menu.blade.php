<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="{{ route('admin.dashboard') }}"
                            id="topnav-dashboard" role="button">
                            <i data-feather="home"></i><span data-key="t-dashboard">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="{{ route('module-slider.index') }}"
                            id="topnav-dashboard" role="button">
                            <i data-feather="image"></i><span data-key="t-dashboard">Slider</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="javascript:void(0);" id="topnav-master"
                            role="button">
                            <i data-feather="layout"></i><span data-key="t-master">Website Content</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-master">
                            <a href="{{ route('module-slider.index') }}" class="dropdown-item" data-key="t-pegawai">
                                <i class="icon-menu" data-feather="image"></i> Slider
                            </a>
                            <a href="{{ route('module-webpage.index') }}" class="dropdown-item" data-key="t-pegawai">
                                <i class="icon-menu" data-feather="layout"></i> Web Page
                            </a>
                        </div>
                    </li> --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="{{ route('module-project.index') }}"
                            id="topnav-master" role="button">
                            <i data-feather="briefcase"></i><span data-key="t-master">Project</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-master">
                            <a href="{{ route('module-project.create') }}" class="dropdown-item" data-key="t-pegawai">
                                <i class="icon-menu" data-feather="plus-circle"></i> Add New Project
                            </a>
                            <a href="{{ route('module-project.index') }}" class="dropdown-item" data-key="t-pegawai">
                                <i class="icon-menu" data-feather="briefcase"></i> Project List
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="{{ route('module-news.index') }}"
                            id="topnav-master" role="button">
                            <i data-feather="file"></i><span data-key="t-master">News</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-master">
                            <a href="{{ route('module-news.create') }}" class="dropdown-item" data-key="t-pegawai">
                                <i class="icon-menu" data-feather="plus-circle"></i> Add News
                            </a>
                            <a href="{{ route('module-news.index') }}" class="dropdown-item" data-key="t-pegawai">
                                <i class="icon-menu" data-feather="file"></i> News List
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle arrow-none" href="{{ route('module-contact.index') }}"
                            id="topnav-contact" role="button">
                            <i data-feather="inbox"></i><span data-key="t-contact">Contact</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
