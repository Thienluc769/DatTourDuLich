@extends('client.parentLayouts.main')
@section('title', 'vivuvn | Danh sách')
@section('main_content')
@section('content_name', 'Danh Sách')
<link rel="stylesheet" href="{{ asset('lib') }}/css/style.css">

<div class="untree_co-section">
    <div class="container">
        <main class="main">
            @if (session('message'))
                <h1 style="color: #e91e63;">{{ session('message') }}</h1>
            @endif
            <section class="tours-grid">
                <div class="container">
                    <div class="">
                        <div class="">
                            <div class="tours-grid__list">
                                <div class="babe-result">
                                    <div class="babe-result__search">

                                        <?php
$count = count($tour);
                                        ?>

                                        <div class="count-posts"> <strong class="count">{{ $count }}</strong>
                                            Tours
                                        </div>
                                    </div>
                                    <div class="babe-all-item">
                                        <div class="babe-block-inner">
                                            @foreach ($tour as $item)
                                                <div class="col-xl-3">
                                                    <div class="babe-item cloumn-item" style="height: 600px;">
                                                        <div class="babe-item__inner">
                                                            <div class="item-img">
                                                                <a href="{{ route('client-detail', $item->id) }}">
                                                                    <img src="{{ asset('storage/products') }}/{{ $item->images[0]->name }}"
                                                                        alt="" style="width: 250px; height: 250px;">
                                                                </a>
                                                                <button class="compare-btn"
                                                                    onclick="addToCompare({{ $item->id }}, '{{ $item->name }}', event)">
                                                                    <i class="fas fa-balance-scale"></i>
                                                                </button>
                                                            </div>
                                                            <div class="item-text">
                                                                <div class="item-location"> <span></span>
                                                                </div>
                                                                <div class="item-title"> <a style="font-size:23px;"
                                                                        href="{{ route('client-detail', $item->id) }}">{{ $item->name }}
                                                                    </a>
                                                                </div>

                                                                <div class="item-hotel mb-2">
                                                                    <i class="fas fa-hotel"></i>
                                                                    <span>{{ $item->hotel->name ?? 'Chưa có thông tin' }}</span>
                                                                    @if (isset($item->hotel))
                                                                        <div class="hotel-rating">
                                                                            @for ($i = 1; $i <= 5; $i++)
                                                                                @if ($i <= $item->hotel->star_rating)
                                                                                    <i class="fas fa-star text-warning"></i>
                                                                                @else
                                                                                    <i class="far fa-star text-warning"></i>
                                                                                @endif
                                                                            @endfor
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <div class="item-meta">
                                                                    <span class="item-days item-meta-value">
                                                                        <i class="fa-regular fa-clock"></i>
                                                                        <span>{{ $item->tour_time }}</span>
                                                                    </span>
                                                                </div>
                                                                <div class="item-meta">
                                                                    <span class="item-days item-meta-value">
                                                                        <i class="fa-regular fa-calendar"></i>
                                                                        <span>{{ Carbon\Carbon::parse($item->departure_date)->format('d/m/Y') ?? 'Chưa có thông tin' }}</span>
                                                                    </span>
                                                                </div>
                                                                <div class="item-bottom">
                                                                    <div class="item_info_price">
                                                                        <span class="item_info_price_new"><span
                                                                                class="currency_amount"
                                                                                data-amount="181"><span
                                                                                    class="currency_symbol"></span>{{ number_format($item->price) }}₫</span>
                                                                        </span>
                                                                    </div>
                                                                    <a class="read-more-item"
                                                                        href="{{ route('client-detail', $item->id) }}">
                                                                        <span>Chi tiết</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>

<div class="modal fade" id="compareDialog" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">So sánh tour</h5>
                <button type="button" class="close" onclick="closeModal(event)" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="selected-tours mb-4">
                    <div style="padding-bottom: 10px;" class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Tour đã chọn:</h6>
                        <button type="button" class="btn btn-primary" style="width: 90px;"
                            onclick="compareSelected()">So sánh</button>
                    </div>
                    <div id="selectedToursList"></div>
                </div>

                <div class="search-box mb-3">
                    <div class="input-group">
                        <input type="text" id="dialogSearchInput" class="form-control" placeholder="Tìm kiếm tour..."
                            style="height: 38px;">
                    </div>
                </div>

                <div id="dialogSearchResults" class="list-group" style="max-height: 400px; overflow-y: auto;">
                    <!-- Kết quả sẽ được hiển thị ở đây -->
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .item-img {
        position: relative;
    }

    .compare-btn {
        position: absolute;
        bottom: 10px;
        right: 10px;
        background: rgba(0, 123, 255, 0.8);
        color: white;
        border: none;
        padding: 8px;
        border-radius: 50%;
        cursor: pointer;
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .compare-btn:hover {
        background: rgba(0, 86, 179, 0.9);
        transform: scale(1.1);
    }

    .compare-btn i {
        font-size: 16px;
    }

    .modal {
        background: rgba(0, 0, 0, 0.5);
        z-index: 9999 !important;
    }

    .modal-dialog {
        z-index: 10000 !important;
    }

    .modal-content {
        background: white;
        color: #333;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        position: relative;
        z-index: 10001 !important;
        user-select: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }

    .modal-header {
        border-bottom: 1px solid #dee2e6;
        background: #f8f9fa;
    }

    .modal-title {
        color: #333;
        font-weight: bold;
        pointer-events: none;
    }

    .modal-body {
        padding: 20px;
    }

    #compareList {
        margin-bottom: 15px;
    }

    #compareList div {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        border-bottom: 1px solid #eee;
        margin-bottom: 5px;
    }

    #compareList button {
        background: #dc3545;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    #compareList button:hover {
        background: #c82333;
        transform: translateY(-2px);
    }

    .modal-header .btn-close {
        position: relative;
        z-index: 10002 !important;
    }

    /* Style cho các nút trong modal */
    .modal-body .btn-primary {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .modal-body .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    /* Style cho nút xóa trong danh sách */
    #compareList div {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        border-bottom: 1px solid #eee;
        margin-bottom: 5px;
    }

    #compareList button {
        background: #dc3545;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    #compareList button:hover {
        background: #c82333;
        transform: translateY(-2px);
    }

    /* Style cho nút thêm tour */
    .modal-body .btn-primary {
        margin-top: 15px;
        width: 100%;
        padding: 10px;
    }

    /* Ghi đè hiệu ứng mặc định của Bootstrap */
    .btn:focus,
    .btn:active,
    .btn:hover {
        outline: none !important;
        box-shadow: none !important;
        background-image: none !important;
    }

    /* Style mới cho các nút */
    .modal-body .btn-primary {
        position: relative;
        transition: all 0.3s ease;
        overflow: visible;
    }

    /* Style cho nút thêm tour */
    .modal-body .btn-primary {
        width: 100%;
        padding: 10px;
        margin-top: 15px;
        background-color: #007bff;
        color: white;
        border: none;
    }

    .modal-body .btn-primary:hover {
        background-color: #0056b3;
    }

    /* Style cho nút xóa trong danh sách */
    #compareList button {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    #compareList button:hover {
        background-color: #c82333;
    }

    /* Ghi đè hoàn toàn các hiệu ứng mặc định */
    .btn {
        position: relative;
        background-image: none !important;
        overflow: visible !important;
        text-decoration: none !important;
    }

    .btn::before,
    .btn::after {
        display: none !important;
    }

    /* Style cho nút thêm tour */
    .modal-body .btn-primary {
        width: 100%;
        padding: 10px;
        margin-top: 15px;
        background-color: #007bff !important;
        color: white !important;
        border: none !important;
    }

    .modal-body .btn-primary:hover {
        background-color: #0056b3 !important;
    }

    /* Loại bỏ mọi hiệu ứng phức tạp */
    .btn:focus,
    .btn:active,
    .btn:hover,
    .btn:before,
    .btn:after {
        outline: none !important;
        box-shadow: none !important;
        background-image: none !important;
        transform: none !important;
        transition: background-color 0.3s ease !important;
    }

    .compare-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        border-bottom: 1px solid #eee;
        margin-bottom: 5px;
    }

    .card {
        transition: transform 0.3s ease;
        height: 100%;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        font-size: 14px;
        margin-bottom: 10px;
        height: 40px;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .card-text {
        color: #007bff;
        font-weight: bold;
        margin-bottom: 10px;
    }

    #tourListDialog .modal-body {
        max-height: 70vh;
        overflow-y: auto;
    }

    .modal-title,
    .modal-body span,
    .modal-body h6 {
        pointer-events: none;
    }

    .input-group {
        align-items: stretch;
    }

    .input-group-append {
        display: flex;
    }

    .input-group .form-control {
        height: 38px;
    }

    .input-group .btn {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0.375rem 0.75rem;
    }

    .close {
        cursor: pointer;
    }

    .close:hover {
        opacity: 0.7;
    }

    /* CSS cho scroll */
    #dialogSearchResults::-webkit-scrollbar {
        width: 8px;
    }

    #dialogSearchResults::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }

    #dialogSearchResults::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 4px;
    }

    #dialogSearchResults::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    /* Đảm bảo modal không bị overflow */
    .modal-body {
        padding: 1rem;
        position: relative;
    }

    /* Style cho các item trong danh sách */
    .list-group-item {
        border: 1px solid #ddd;
        margin-bottom: 10px;
        border-radius: 4px;
    }

    .item-rating {
        display: flex;
        align-items: center;
    }

    .rating-stars {
        display: inline-flex;
        align-items: center;
    }

    .rating-count {
        margin-left: 8px;
        color: #666;
        font-size: 14px;
    }

    .item-hotel {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #555;
        font-size: 14px;
    }

    .hotel-rating {
        margin-left: auto;
    }

    .fa-hotel {
        color: #007bff;
    }

    .text-warning {
        color: #ffc107;
    }

    .read-more-item {
        display: inline-block !important;
        position: relative !important;
        z-index: 1 !important;
        max-width: fit-content !important;
    }
</style>

<script>
    let compareItems = [];
    let compareItemsInfo = [];

    function addToCompare(tourId, tourName, event) {
        event.preventDefault();
        event.stopPropagation();

        if (compareItems.length >= 2) {
            alert('Chỉ được chọn tối đa 2 tour để so sánh!');
            $('#compareDialog').modal('show');
            updateCompareList();
            return;
        }

        if (!compareItems.includes(tourId)) {
            compareItems.push(tourId);
            compareItemsInfo.push({
                id: tourId,
                name: tourName
            });
        }
        $('#compareDialog').modal('show');
        updateCompareList();
    }

    function updateCompareList() {
        let html = '';
        compareItemsInfo.forEach(item => {
            html += `
            <div class="selected-tour-item d-flex justify-content-between align-items-center mb-2">
                <span style="color: #e46d30; font-weight: bold;">${item.name}</span>
                <button class="btn btn-sm btn-danger" onclick="removeTour(${item.id}, event)">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;
        });
        $('#selectedToursList').html(html);
    }

    function addMoreTour(event) {
        if (event) {
            event.preventDefault();
            event.stopPropagation();
        }

        if (compareItems.length >= 2) {
            alert('Đã đạt giới hạn số tour có thể so sánh (tối đa 2 tour)!');
            return;
        }

        $('#compareDialog').modal('hide');
        $('#tourListDialog').modal('show');
    }

    function selectTourToCompare(tourId, tourName, event) {
        event.preventDefault();
        event.stopPropagation();

        if (compareItems.length >= 2) {
            alert('Chỉ được chọn tối đa 2 tour để so sánh!');
            return;
        }

        if (!compareItems.includes(tourId)) {
            compareItems.push(tourId);
            compareItemsInfo.push({
                id: tourId,
                name: tourName
            });

            // Cập nhật UI ngay lập tức
            updateButtonStates();
            updateCompareList();

            // Tải lại danh sách tour để cập nhật trạng thái
            loadDialogTours($('#dialogSearchInput').val().trim());
        } else {
            alert('Tour này đã được thêm vào danh sách so sánh!');
        }
    }

    function removeTour(id, event) {
        if (event) {
            event.preventDefault();
            event.stopPropagation();
        }

        // Xóa tour khỏi danh sách
        compareItems = compareItems.filter(item => item !== id);
        compareItemsInfo = compareItemsInfo.filter(item => item.id !== id);

        // Cập nhật danh sách đã chọn
        updateCompareList();

        // Tải lại danh sách tour để cập nhật trạng thái nút
        loadDialogTours($('#dialogSearchInput').val().trim());

        // Nếu không còn tour nào được chọn, hiển thị modal để chọn tour
        if (compareItems.length === 0) {
            $('#compareDialog').modal('show');
            loadDialogTours('');
        }
    }

    function compareSelected(event) {
        if (event) {
            event.preventDefault();
            event.stopPropagation();
        }
        if (compareItems.length < 2) {
            alert('Vui lòng chọn ít nhất 2 tour để so sánh');
            return;
        }

        // Tạo form ẩn và submit
        const form = document.createElement('form');
        form.method = 'GET';
        form.action = '{{ route('compare-tours') }}';

        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'tours';
        input.value = compareItems.join(',');

        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    }

    function closeModal(event) {
        if (event) {
            event.preventDefault();
            event.stopPropagation();
        }
        $('#compareDialog').modal('hide');
    }

    function closeTourListModal(event) {
        if (event) {
            event.preventDefault();
            event.stopPropagation();
        }
        $('#tourListDialog').modal('hide');
    }

    function loadDialogTours(searchQuery = '') {
        $.ajax({
            url: '{{ route('client-search') }}',
            method: 'GET',
            data: {
                search: searchQuery
            },
            success: function (response) {
                let html = '';
                if (response && response.length > 0) {
                    response.forEach(tour => {
                        // Kiểm tra xem tour có trong danh sách compareItems không
                        const isSelected = compareItems.includes(tour.id);
                        html += `
                        <div class="list-group-item tour-item" style="margin-bottom: 20px; padding: 15px;">
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
                                                    <span class="item-info-price-new">${tour.price}</span>
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
                                        <button class="btn ${isSelected ? 'btn-secondary' : 'btn-primary'}" 
                                                onclick="selectTourToCompare(${tour.id}, '${tour.name}', event)"
                                                ${isSelected ? 'disabled' : ''}
                                                data-tour-id="${tour.id}"
                                                style="float: right;">
                                            ${isSelected ? 'Đã chọn' : 'Chọn để so sánh'}
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
                $('#dialogSearchResults').html(html);

                // Cập nhật trạng thái các nút sau khi render
                updateButtonStates();
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
                $('#dialogSearchResults').html(
                    '<div class="alert alert-danger">Có lỗi xảy ra khi tải danh sách tour.</div>');
            }
        });
    }

    // Thêm hàm mới để cập nhật trạng thái các nút
    function updateButtonStates() {
        $('#dialogSearchResults button').each(function () {
            const tourId = parseInt($(this).data('tour-id'));
            const isSelected = compareItems.includes(tourId);

            const button = $(this);
            if (isSelected) {
                button
                    .addClass('btn-secondary')
                    .removeClass('btn-primary')
                    .prop('disabled', true)
                    .text('Đã chọn');
            } else {
                button
                    .addClass('btn-primary')
                    .removeClass('btn-secondary')
                    .prop('disabled', false)
                    .text('Chọn để so sánh');
            }
        });
    }

    // Cập nhật event handler khi mở modal
    $(document).ready(function () {
        let searchTimeout;

        $('#dialogSearchInput').on('input', function () {
            clearTimeout(searchTimeout);
            const searchQuery = $(this).val().trim();

            searchTimeout = setTimeout(() => {
                loadDialogTours(searchQuery);
            }, 300);
        });

        // Cập nhật khi mở modal
        $('#compareDialog').on('show.bs.modal', function () {
            $('#dialogSearchInput').val(''); // Reset ô tìm kiếm
            loadDialogTours(''); // Load tất cả tours với trạng thái mới nhất
        });

        // Thêm sự kiện khi đóng modal
        $('#compareDialog').on('hidden.bs.modal', function () {
            // Tải lại danh sách khi mở lại modal
            loadDialogTours('');
        });
    });

    // Thêm event listener khi document ready
    $(document).ready(function () {
        // Ngăn chặn sự kiện click cho tất cả các phần tử trong modal
        $('#compareDialog, #tourListDialog').on('click',
            'button, a, .card, .compare-item, .modal-title, .modal-body span, h6, p',
            function (event) {
                event.preventDefault();
                event.stopPropagation();
            });

        // Xử lý cho modal so sánh
        $('#compareDialog').on('click', function (event) {
            if ($(event.target).is('#compareDialog')) {
                event.preventDefault();
                event.stopPropagation();
                closeModal(event);
            }
        });

        // Xử lý cho modal chọn tour
        $('#tourListDialog').on('click', function (event) {
            if ($(event.target).is('#tourListDialog')) {
                event.preventDefault();
                event.stopPropagation();
                closeTourListModal(event);
            }
        });

        // Thêm xử lý cho toàn bộ nội dung trong modal
        $('.modal-content').on('click', '*', function (event) {
            event.preventDefault();
            event.stopPropagation();
            return false;
        });

        // Xử lý khi click nút X
        $('.modal .close').on('click', function (e) {
            closeModal(e);
        });

        // Xử lý khi bấm ESC
        $(document).on('keydown', function (e) {
            if (e.keyCode === 27) { // ESC key
                closeModal(e);
            }
        });

        // Xử lý khi click ra ngoài modal
        $('#compareDialog').on('click', function (e) {
            if ($(e.target).is('#compareDialog')) {
                closeModal(e);
            }
        });

        // Sửa lại phần xử lý nút X trong b��ng so sánh
        $('.remove-tour').click(function (event) {
            event.preventDefault();
            event.stopPropagation();

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
                // Nếu không còn tour nào, hiển thị modal để chọn tour
                compareItems = [];
                compareItemsInfo = [];
                $('#compareDialog').modal('show');
                loadDialogTours('');

                // Xóa tham số tours khỏi URL nhưng không reload trang
                searchParams.delete('tours');
                const newUrl =
                    `${window.location.pathname}${searchParams.toString() ? '?' + searchParams.toString() : ''}`;
                window.history.pushState({}, '', newUrl);
            }
        });

        // Thêm xử lý khi không có tour nào được chọn

    });
</script>

@endsection