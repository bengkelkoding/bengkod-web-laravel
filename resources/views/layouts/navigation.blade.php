@php
$tes = Auth::user()->roles()->pluck('name')->first();
if($tes == 'dosen') {
    $tes = 'lecture';
}
$dashboard = $tes == 'admin' ? '/dashboard' : $tes;
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
          @if ($tes == 'mahasiswa')
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Learning</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/dipelajari" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Materi Yang Dipelajari</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/diselesaikan" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Materi Yang Diselesaikan</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="kumpulkan" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Kumpulkan Tugas</span>
              </a>
            </li>
          </ul>
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Task</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="daftar-nilai" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Daftar Nilai</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="kontak" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Kontak Asisten</span>
              </a>
            </li>
          </ul>
          @elseif($tes == 'lecture')
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Organize</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('lecture.lecture-student-index') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Daftar & Kelola Mahasiswa</span>
              </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('lecture.assignment.index') }}" aria-expanded="false">
                  <span>
                      <i class="ti ti-users"></i>
                  </span>
                  <span class="hide-menu">Kelola Penugasan</span>
                </a>
              </li>
              <li class="sidebar-item">
                  <a class="sidebar-link" href="{{ route('lecture.log.index') }}" aria-expanded="false">
                  <span>
                      <i class="ti ti-users"></i>
                  </span>
                      <span class="hide-menu">Log Mahasiswa</span>
                  </a>
              </li>
          </ul>
          @else
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Organize</span>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('admin/course') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Daftar Kursus</span>
              </a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('admin/student') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Daftar & Kelola Mahasiswa</span>
              </a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('admin/lecture') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Daftar & Kelola Dosen</span>
              </a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('admin/assignment') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Daftar Tugas</span>
              </a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('admin/contact-assistant') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Kontak Asisten</span>
              </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('admin/log') }}" aria-expanded="false">
              <span>
                  <i class="ti ti-users"></i>
              </span>
                    <span class="hide-menu">Log Mahasiswa</span>
                </a>
            </li>
            <!-- <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('admin/course') }}" aria-expanded="false">
              <span>
                  <i class="ti ti-users"></i>
              </span>
                    <span class="hide-menu">Kelola Kursus</span>
                </a>
            </li> -->
          </ul>
          @endif
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
</aside>
