@extends('client.parentLayouts.main')
@section('title', 'So sánh tour | vivuvn')
@section('main_content')

<div class="container my-5" style="padding: 0 0 10rem 0">
    <h2 style="font-size: 3rem; font-weight:bold " class="text-center mb-4">So sánh Tour</h2>
    
    <!-- Thêm nút thêm tour mới -->
    <div class="d-flex justify-content-end mb-3">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addTourModal">
            <i class="fas fa-plus"></i> Thêm tour để so sánh
        </button>
    </div>

    <div class="comparison-table">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 20%">Tiêu chí</th>
                    @foreach($tours as $tour)
                        <th style="width: 40%">
                            {{ $tour->name }}
                            <!-- Thêm nút xóa -->
                            <button class="btn btn-sm btn-danger ml-2 remove-tour" 
                                    data-tour-id="{{ $tour->id }}">
                                <i class="fas fa-times"></i>
                            </button>
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <!-- Hình ảnh -->
                <tr>
                    <td>Hình ảnh</td>
                    @foreach($tours as $tour)
                        <td>
                            <img src="{{ asset('storage/products') }}/{{ $tour->images[0]->name }}" 
                                 alt="{{ $tour->name }}"
                                 class="img-fluid"
                                 style="max-height: 200px; width: auto;">
                        </td>
                    @endforeach
                </tr>

                <!-- Giá -->
                <tr>
                    <td>Giá</td>
                    @foreach($tours as $tour)
                        <td style="color:#e46d30;" class="font-weight-bold">
                            {{ number_format($tour->price) }}₫
                        </td>
                    @endforeach
                </tr>

                <!-- Thời gian tour -->
                <tr>
                    <td>Thời gian</td>
                    @foreach($tours as $tour)
                        <td>{{ $tour->tour_time }}</td>
                    @endforeach
                </tr>

                <!-- Điểm khởi hành -->
                <tr>
                    <td>Ngày khởi hành</td>
                    @foreach($tours as $tour)
                        <td>{{ \Carbon\Carbon::parse($tour->departure_date)->format('d/m/Y') }}</td>
                    @endforeach
                </tr>

                
                <!-- Phương tiện di chuyển -->
                <tr>
                    <td>Phương tiện</td>
                    @foreach($tours as $tour)
                        <td>{{ $tour->vehicle->name }}</td>
                    @endforeach
                </tr>

                <!-- Khách sạn -->
                <tr>
                    <td>Khách sạn</td>
                    @foreach($tours as $tour)
                        <td>{{ $tour->hotel->name }} {{ $tour->hotel->star_rating }}/5&#9733</td>
                    @endforeach
                </tr>

                <!-- Mô tả -->
                <tr>
                    <td>Mô tả</td>
                    @foreach($tours as $tour)
                        <td>{{ Str::limit($tour->description, 300) }}</td>
                    @endforeach
                </tr>

                <!-- Nút đặt tour -->
                <tr>
                    <td>Hành động</td>
                    @foreach($tours as $tour)
                        <td>
                            <a href="{{ route('client-detail', $tour->id) }}" 
                               class="btn btn-primary">Xem chi tiết</a>
                        </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal thêm tour -->
<div class="modal fade" id="addTourModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm tour để so sánh</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Ô tìm kiếm -->
                <div class="search-box mb-4">
                    <div class="input-group">
                        <input type="text" 
                               id="searchInput" 
                               class="form-control" 
                               placeholder="Tìm kiếm tour..."
                               style="height: 38px;">
                    </div>
                </div>
                
                <!-- Kết quả tìm kiếm có scroll -->
                <div id="searchResults" class="list-group" style="max-height: 400px; overflow-y: auto;">
                    <!-- Kết quả sẽ được hiển thị ở đây -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Thêm đoạn JavaScript -->
<script>
$(document).ready(function() {
    let searchTimeout;
    
    // Hàm kiểm tra số lượng tour
    function checkTourLimit() {
        const currentUrl = new URL(window.location.href);
        const searchParams = new URLSearchParams(currentUrl.search);
        let tourIds = searchParams.get('tours')?.split(',') || [];
        
        if (tourIds.length >= 2) {
            Swal.fire({
                title: 'Đã đạt giới hạn!',
                text: 'Bạn đã có 2 tour để so sánh. Vui lòng xóa bớt tour để thêm tour mới!',
                icon: 'warning',
                confirmButtonText: 'Đã hiểu',
                confirmButtonColor: '#3085d6'
            });
            return true; // Đã đạt giới hạn
        }
        return false; // Chưa đạt giới hạn
    }

    // Xử lý tìm kiếm tự động khi gõ
    $('#searchInput').on('input', function() {
        clearTimeout(searchTimeout);
        const searchQuery = $(this).val().trim();
        
        // Đợi 300ms sau khi người dùng ngừng gõ mới thực hiện tìm kiếm
        searchTimeout = setTimeout(() => {
            loadTours(searchQuery);
        }, 300);
    });

    // Xử lý khi click vào nút "Thêm tour"
    $('.compare-btn, [data-target="#addTourModal"]').click(function(e) {
        e.preventDefault();
        if (checkTourLimit()) {
            return false; // Không mở modal nếu đã đạt giới hạn
        }
        $('#addTourModal').modal('show');
    });

    // Xử lý khi mở modal
    $('#addTourModal').on('show.bs.modal', function (e) {
        if (checkTourLimit()) {
            e.preventDefault(); // Ngăn modal hiển thị
            return false;
        }
        
        $('#searchInput').val(''); // Reset ô tìm kiếm
        loadTours(); // Load tất cả tours
    });

    // Hàm load tours
    function loadTours(searchQuery = '') {
        $.ajax({
            url: '{{ route("client-search") }}',
            method: 'GET',
            data: { search: searchQuery },
            success: function(response) {
                let html = '';
                if (response && response.length > 0) {
                    // Lấy danh sách tour đã chọn
                    const currentUrl = new URL(window.location.href);
                    const searchParams = new URLSearchParams(currentUrl.search);
                    let selectedTourIds = searchParams.get('tours')?.split(',') || [];

                    response.forEach(tour => {
                        // Kiểm tra xem tour đã được chọn chưa
                        const isSelected = selectedTourIds.includes(tour.id.toString());
                        
                        html += `
                            <div class="list-group-item tour-item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{ asset('storage/products') }}/${tour.images}" 
                                             alt="${tour.name}"
                                             class="img-fluid" 
                                             style="width: 100%; height: 150px; object-fit: cover;">
                                    </div>
                                    <div class="col-md-8">
                                        <h5 class="mb-2"><b>${tour.name}</b></h5>
                                        <div class="meta-inner" style="margin-bottom: 10px;">
                                            <div class="meta-inner__item">
                                                <div class="inner">
                                                    <div class="item-info-price">
                                                        <label>Giá: </label>
                                                        <span class="item-info-price-new">
                                                            ${tour.price}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="meta-inner__item">
                                                <div class="inner">
                                                    <div class="meta-feild-inner">
                                                        <label>Thời Gian: </label>
                                                        <span>${tour.tour_time}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="margin-top: 10px;">
                                            <button class="btn ${isSelected ? 'btn-secondary' : 'btn-primary'} add-tour" 
                                                    data-tour-id="${tour.id}"
                                                    ${isSelected ? 'disabled' : ''}
                                                    style="float: right;">
                                                ${isSelected ? 'Đã chọn' : 'Thêm vào so sánh'}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                    });
                } else {
                    html = '<div class="alert alert-info">Không tìm thấy tour nào phù hợp.</div>';
                }
                $('#searchResults').html(html);
            }
        });
    }

    // Xử lý thêm tour
    $(document).on('click', '.add-tour', function(e) {
        e.preventDefault();
        if (checkTourLimit()) {
            return false;
        }

        const tourId = $(this).data('tour-id');
        const currentUrl = new URL(window.location.href);
        const searchParams = new URLSearchParams(currentUrl.search);
        let tourIds = searchParams.get('tours')?.split(',') || [];
        
        // Kiểm tra tour đã được chọn chưa
        if (tourIds.includes(tourId.toString())) {
            Swal.fire({
                title: 'Tour đã được chọn!',
                text: 'Tour này đã có trong danh sách so sánh.',
                icon: 'info',
                confirmButtonText: 'Đã hiểu',
                confirmButtonColor: '#3085d6'
            });
            return false;
        }
        
        // Nếu chưa có thì thêm vào
        tourIds.push(tourId);
        searchParams.set('tours', tourIds.join(','));
        currentUrl.search = searchParams.toString();
        window.location.href = currentUrl.toString();
    });

    // Sửa lại phần xử lý xóa tour
    $('.remove-tour').click(function(e) {
        e.preventDefault();
        const tourId = $(this).data('tour-id');
        const currentUrl = new URL(window.location.href);
        const searchParams = new URLSearchParams(currentUrl.search);
        
        // Lấy danh sách tour hiện tại
        let tourIds = searchParams.get('tours')?.split(',') || [];
        
        // Xóa tour được chọn
        tourIds = tourIds.filter(id => id != tourId);
        
        // Cập nhật URL và reload trang với danh sách tour mới
        if (tourIds.length > 0) {
            searchParams.set('tours', tourIds.join(','));
            currentUrl.search = searchParams.toString();
            window.location.href = currentUrl.toString();
        } else {
            // Nếu không còn tour nào, mở modal để chọn tour mới
            searchParams.delete('tours');
            const newUrl = `${window.location.pathname}${searchParams.toString() ? '?' + searchParams.toString() : ''}`;
            window.history.pushState({}, '', newUrl);
            
            // Mở modal thêm tour
            $('#addTourModal').modal('show');
            loadTours(''); // Load danh sách tour
        }
    });

    // Thêm hàm kiểm tra và hiển thị modal khi không có tour
    function checkAndShowAddTourModal() {
        const currentUrl = new URL(window.location.href);
        const searchParams = new URLSearchParams(currentUrl.search);
        const tourIds = searchParams.get('tours')?.split(',').filter(Boolean) || [];
        
        if (tourIds.length === 0) {
            $('#addTourModal').modal('show');
            loadTours('');
        }
    }

    // Kiểm tra và hiển thị modal khi trang load
    checkAndShowAddTourModal();
    
    // Xóa sự kiện onbeforeunload để không hiện thông báo
    window.onbeforeunload = null;

    // Hàm đóng modal
    function closeAddTourModal() {
        $('#addTourModal').modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    }

    // Xử lý đóng modal khi click nút X
    $('.close').click(function(e) {
        e.preventDefault();
        closeAddTourModal();
    });

    // Xử lý đóng modal khi click ra ngoài
    $(document).on('click', '.modal-backdrop, #addTourModal', function(e) {
        if ($(e.target).is('.modal-backdrop') || $(e.target).is('#addTourModal')) {
            closeAddTourModal();
        }
    });

    // Xử lý đóng modal khi nhấn ESC
    $(document).keydown(function(e) {
        if (e.keyCode === 27) { // ESC key
            closeAddTourModal();
        }
    });
});
</script>

<!-- Thêm SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
.comparison-table {
    background: white;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
    overflow: hidden;
}

.table {
    margin-bottom: 0;
}

.table th {
    background: #f8f9fa;
    font-weight: 600;
    text-align: center;
    padding: 15px;
}

.table td {
    padding: 15px;
    vertical-align: middle;
    text-align: center;
}

.table tr:nth-child(even) {
    background: #f8f9fa;
}

.table tr:hover {
    background: #f1f3f5;
}

.btn-primary {
    padding: 8px 20px;
    border-radius: 4px;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,123,255,0.3);
}

.font-weight-bold {
    font-weight: 600;
}

.text-primary {
    color: #007bff;
}

.tour-item {
    border: 1px solid #ddd;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.tour-item:hover {
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.meta-inner__item {
    margin-bottom: 8px;
}

.meta-inner__item label {
    font-weight: bold;
    margin-right: 5px;
}

#searchResults {
    max-height: 600px;
    overflow-y: auto;
}

.modal-dialog {
    max-width: 800px;
}

/* CSS cho scroll */
#searchResults::-webkit-scrollbar {
    width: 8px;
}

#searchResults::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}

#searchResults::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 4px;
}

#searchResults::-webkit-scrollbar-thumb:hover {
    background: #555;
}

/* Style cho các item trong danh sách */
.list-group-item {
    border: 1px solid #ddd;
    margin-bottom: 10px;
    border-radius: 4px;
}

.modal-body {
    padding: 1rem;
    position: relative;
}

/* Đảm bảo modal backdrop hoạt động đúng */
.modal-backdrop {
    opacity: 0.5;
}

.modal {
    background-color: rgba(0, 0, 0, 0.5);
}

/* Cho phép click vào backdrop để đóng modal */
.modal-backdrop, .modal {
    cursor: pointer;
}

.modal-content {
    cursor: default;
}
</style>

@endsection 