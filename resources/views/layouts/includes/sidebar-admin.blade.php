<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-user"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#barangays"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder"></i>
            <span>Slider</span>
        </a>
        <div id="barangays" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{ url('slider') }}">Slider</a>
                <a class="collapse-item" href="{{ url('restore-slider') }}">Archive</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#news"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder"></i>
            <span>News</span>
        </a>
        <div id="news" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{ url('news') }}">News</a>
                <a class="collapse-item" href="{{ url('restore-news') }}">Draft</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#events"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder"></i>
            <span>Events</span>
        </a>
        <div id="events" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{ url('events') }}">Events</a>
                <a class="collapse-item" href="{{ url('restore-events') }}">Draft</a>
            </div>
        </div>
    </li>

    {{-- Videos --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#videos"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder"></i>
            <span>Videos</span>
        </a>
        <div id="videos" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{ url('videos') }}">Videos</a>
                <a class="collapse-item" href="{{ url('restore-videos') }}">Draft</a>
            </div>
        </div>
    </li>

      {{-- Awards --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#awards"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder"></i>
            <span>Awards</span>
        </a>
        <div id="awards" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{ url('awards') }}">Awards</a>
                <a class="collapse-item" href="{{ url('restore-awards') }}">Draft</a>
            </div>
        </div>
    </li>

     {{-- About Us --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#About"
            aria-expanded="true" aria-controls="About">
            <i class="fas fa-fw fa-folder"></i>
            <span>About City</span>
        </a>
        <div id="About" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">About Components:</h6>
                {{-- <a class="collapse-item" href="{{ url('how-to-get-there-list') }}">How to Get to Talusan</a> --}}
                <a class="collapse-item" href="{{ url('city-council-list') }}">Elected City Officials</a>
                <a class="collapse-item" href="{{ url('restore-city-council') }}">Draft</a>
                {{-- <a class="collapse-item" href="{{ url('restore-maps') }}">Draft-Maps</a> --}}
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder"></i>
            <span>Barangays</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Barangays Components:</h6>
                <a class="collapse-item" href="{{ url('barangay') }}">Barangay</a>
                <a class="collapse-item" href="{{ url('restore-barangay') }}">Draft</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tourism"
            aria-expanded="true" aria-controls="tourism">
            <i class="fas fa-fw fa-folder"></i>
            <span>Tourism</span>
        </a>
        <div id="tourism" class="collapse" aria-labelledby="tourism" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tourism Components:</h6>
                <a class="collapse-item" href="{{ url('destinations') }}">Destinations</a>
                <a class="collapse-item" href="{{ url('traditions-list') }}">Traditions</a>
                <a class="collapse-item" href="{{ url('foods-list') }}">Foods</a>
                <a class="collapse-item" href="{{ url('restore-destinations') }}">Draft-Destination</a>
                <a class="collapse-item" href="{{ url('restore-traditions') }}">Draft-Traditions</a>
                <a class="collapse-item" href="{{ url('restore-foods') }}">Draft-Foods</a>
            </div>
        </div>
    </li>

    
    <!-- Divider -->
    <hr class="sidebar-divider">
     <!-- Heading -->
     <div class="sidebar-heading">
        Admin Settings
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admin"
            aria-expanded="true" aria-controls="admin">
            <i class="fas fa-fw fa-folder"></i>
            <span>Users</span>
        </a>
        <div id="admin" class="collapse" aria-labelledby="admin" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Admin list:</h6>
                <a class="collapse-item" href="{{ url('admin-list') }}">Users list</a>
                @if ( auth()->user()->super_admin == 'super_admin')
                <a class="collapse-item" href="{{ url('restore-admin') }}">Draft</a>
                @endif
            </div>
        </div>
    </li>
</ul>