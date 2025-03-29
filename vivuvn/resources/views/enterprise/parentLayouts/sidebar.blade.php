<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" "
            target=" _blank">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">

                <div class="ms-2">
                    <i class="material-icons opacity-10">person</i>
                    <span class="font-weight-bold text-white" style="font-size: 14px;">CÔNG TY TNHH</span>
                    <span class="font-weight-bold text-white d-block" style="font-size: 12px;">
                        {{ str_replace('CÔNG TY TNHH', '', Auth::guard('enterprises')->user()->enterprise_info->name) }}
                    </span>
                </div>
            </div>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('enterprise-index') ? 'bg-gradient-primary active' : '' }}"
                    href="{{ route('enterprise-index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('product-index') ? 'bg-gradient-primary active' : '' }}"
                    href="{{ route('product-index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">tour</i>
                    </div>
                    <span class="nav-link-text ms-1">Tour</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('hotel-index') ? 'bg-gradient-primary active' : '' }}"
                    href="{{ route('hotel-index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">hotel</i>
                    </div>
                    <span class="nav-link-text ms-1">Hotel</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('tourGuide-index') ? 'bg-gradient-primary active' : '' }}"
                    href="{{ route('tourGuide-index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">groups</i>
                    </div>
                    <span class="nav-link-text ms-1">Tour guide</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('invoice-index') ? 'bg-gradient-primary active' : '' }}"
                    href="{{ route('invoice-index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">receipt</i>
                    </div>
                    <span class="nav-link-text ms-1">Invoice</span>
                </a>
            </li>


            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('enterprise-logout') }}">
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
        document.addEventListener('DOMContentLoaded', function() {
            updateSidebarRegistrationCount();
            updateSidebarTourCount();
        });
    </script>
@endsection
