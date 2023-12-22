@php
$role = Auth::user()->roles()->pluck('name')->first();
if($role == 'lecture') {
    $role = 'lecture';
}
$dashboard = $role == 'admin' ? '/dashboard' : $role;
@endphp

<aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="{{ url('/') }}" class="text-nowrap logo-img">
            <img src="{{asset('assets/admin/images/logos/LogoBengkelKoding.png')}}" width="185" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url($dashboard) }}" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
          @if($role == 'lecture')
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Organize</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{url('lecture/classroom') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-package"></i>
                </span>
                    <span class="hide-menu">Kelas</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('lecture/log') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-receipt"></i>
                </span>
                    <span class="hide-menu">Log Ruangan</span>
                </a>
            </li>
          </ul>
          @elseif($role == 'admin')
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">User</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('admin/lecture') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Dosen</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('admin/student') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Mahasiswa</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('admin/assistant') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Asisten</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Organize</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('admin/course') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-books"></i>
                </span>
                <span class="hide-menu">Kursus</span>
              </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('admin/classroom') }}" aria-expanded="false">
              <span>
                  <i class="ti ti-package"></i>
              </span>
                    <span class="hide-menu">Kelas</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('admin/log') }}" aria-expanded="false">
              <span>
                  <i class="ti ti-receipt"></i>
              </span>
                    <span class="hide-menu">Log Mahasiswa</span>
                </a>
            </li>
          </ul>
          @elseif($role == 'assistant')
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Organize</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{url('lecture/classroom') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-package"></i>
                </span>
                    <span class="hide-menu">Kelas</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('lecture/room-log') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-receipt"></i>
                </span>
                    <span class="hide-menu">Log Ruangan</span>
                </a>
            </li>
          </ul>
          @endif
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
</aside>
