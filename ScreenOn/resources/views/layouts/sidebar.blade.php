<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Screen On</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('screen_owner.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Screen Owner</span>
        </a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{route('locations.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Locations</span>
        </a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{route('screens.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Screens</span>
        </a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('playlists.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Playlists</span>
        </a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{route('studios.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Studios</span>
        </a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{route('media.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Media</span>
        </a>
    </li>


</ul>
<!-- End of Sidebar -->
