@php
$tes = Auth::user()->roles()->pluck('name')->first();
$dashboard = $tes == 'admin' ? '/dashboard' : $tes;
@endphp

<aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="{{ url('/') }}" class="text-nowrap logo-img">
            <img src="{{asset('admin/images/logos/LogoBengkelKoding.png')}}" width="185" />
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
              <a class="sidebar-link" href="{{ $dashboard }}" aria-expanded="false">
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
          @elseif($tes == 'dosen')
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Organize</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="daftar-kelola" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu"></span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="daftar-materi" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Daftar Materi</span>
              </a>
            </li>
          </ul>
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Other</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="log-aktivitas" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Log Aktivitas</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="kontak-asisten" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Kontak Asisten</span>
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
              <a class="sidebar-link" href="{{ url('admin/student') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Daftar & Kelola Mahasiswa</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('admin/assign') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-book-upload"></i>
                </span>
                <span class="hide-menu">Tugas Terkirim</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('admin/assignincomplete') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-book-off"></i>
                </span>
                <span class="hide-menu">Tugas Belum Dinilai</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('admin/assigncomplete') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-book"></i>
                </span>
                <span class="hide-menu">Tugas Sudah Dinilai</span>
              </a>
            </li>
          </ul>
          @endif
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
</aside>
