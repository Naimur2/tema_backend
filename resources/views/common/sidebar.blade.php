<ul class="navbar-nav bg-gradient-primary1 sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-text mx-3">{{ config('app.name', 'Laravel') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Quick Access
    </div>

    

    {{-- Only for users --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fas fa-list-ul"></i>
            <span>Users</span>
        </a>
    </li> 

    <li class="nav-item">
        <a class="nav-link" href="{{ route('events.index') }}">
            <i class="fas fa-list-ul"></i>
            <span>Events</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('teams.index') }}">
            <i class="fas fa-list-ul"></i>
            <span>Teams</span>
        </a>
    </li> 

    <li class="nav-item">
        <a class="nav-link" href="{{ route('calendar') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Calendar</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('folders.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Gallery</span>
        </a>
    </li>

    @if(auth()->user()->userType == 0)
        <li class="nav-item">
            <a class="nav-link" href="{{ route('notifications.index') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Notifications</span>
            </a>
        </li>
    @endif

    

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>