<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" "
            target=" _blank">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">person</i>
                <span class="ms-1 font-weight-bold text-white">Admin</span>
            </div>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('admin-dashboard') ? 'bg-gradient-primary active' : '' }}"
                    href="{{ route('admin-dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('enterprises-index') ? 'active bg-gradient-primary' : 'text-white' }}"
                    href="{{ route('enterprises-index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">business</i>
                    </div>
                    <span class="nav-link-text ms-1">Enterprise</span>
                    <span id="sidebar-registration-count" class="badge"
                        style="background-color: #2196F3 !important; color: white; padding: 4px 8px; border-radius: 8px; font-size: 12px; font-weight: 600; margin-left: 5px;"></span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('review-registration') ? 'active bg-gradient-primary' : 'text-white' }}"
                    href="{{ route('review-registration') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">how_to_reg</i>
                    </div>
                    <span class="nav-link-text ms-1">Review Registration</span>
                    @php
                        $enterpriseCount = \App\Models\Enterprise::where('status_id', 1)->count();
                    @endphp
                    <span id="sidebar-registration-count" class="badge"
                        style="background-color: #2196F3 !important; color: white; padding: 4px 8px; border-radius: 8px; font-size: 12px; font-weight: 600; margin-left: 5px;">
                        {{ $enterpriseCount }}
                    </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('review-tour') ? 'active bg-gradient-primary' : 'text-white' }}"
                    href="{{ route('review-tour') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">rate_review</i>
                    </div>
                    <span class="nav-link-text ms-1">Review Tour</span>
                    @php
                        $tourCount = \App\Models\Tour::where('status_id', 1)->count();
                    @endphp
                    <span id="sidebar-tour-count" class="badge"
                        style="background-color: #2196F3 !important; color: white; padding: 4px 8px; border-radius: 8px; font-size: 12px; font-weight: 600; margin-left: 5px;">
                        {{ $tourCount }}
                    </span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('user-logout') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">logout</i>
                    </div>
                    <span class="nav-link-text ms-1">Sign Out</span>
                </a>
            </li>

        </ul>
    </div>
</aside>

@section('custom-js')
<script>
    // Hàm cập nhật số lượng cho Registration
    function updateSidebarRegistrationCount() {
        const registrationTable = document.getElementById('registration-table');
        if (registrationTable) {
            const count = registrationTable.rows.length - 1;
            document.getElementById('sidebar-registration-count').textContent = count;
        }
    }

    // Hàm cập nhật số lượng cho Tour
    function updateSidebarTourCount() {
        const tourTable = document.getElementById('tour-table');
        if (tourTable) {
            const count = tourTable.rows.length - 1;
            document.getElementById('sidebar-tour-count').textContent = count;
        }
    }

    // Chạy khi trang load xong
    document.addEventListener('DOMContentLoaded', function () {
        updateSidebarRegistrationCount();
        updateSidebarTourCount();
    });
</script>
@endsection