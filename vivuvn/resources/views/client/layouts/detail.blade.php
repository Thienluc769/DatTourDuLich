@extends('client.parentLayouts.main')
@section('title', 'vivuvn | Chi tiết')
@section('main_content')
@section('content_name', 'Chi Tiết')
<link rel="stylesheet" href="{{ asset('lib') }}/css/style.css">

<section class="details-tour">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-lg-8">
                <div class="details-tour__main">
                    {{-- <div class="header-meta">
                        <div class="header-meta__inner header-address">
                            <div class="single-address">
                                <span>Sigiriya, Colombo</span>
                            </div>
                        </div>
                    </div> --}}
                    <h1 class="heading-title"><b>{{ $tour->name }}</b></h1>
                    <div class="meta">
                        <div class="meta-inner">
                            <div class="meta-inner__item">
                                <div class="inner">
                                    <div class="item-info-price">
                                        <label>Giá </label>
                                        <span class="item-info-price-new">
                                            <span class="currency-amount" data-amount="181">
                                                <span class="currency-symbol"></span>{{ number_format($tour->price) }}₫

                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="meta-inner__item">
                                <div class="inner">
                                    <div class="meta-feild-inner">
                                        <label>Thời Gian </label>
                                        <div class="item-meta-value">
                                            <span>{{ $tour->tour_time }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="meta-inner__item">
                            </div>
                        </div>
                    </div>
                    <div class="tour-slideshow" style="height: 660px;">
                        <div class="tour-slideshow__inner">
                            <div class="gallery-wrapper">
                                <div class="details-tour-gallery">
                                    <div class="item">
                                        <a href="{{ asset('storage/products') }}/{{ $tour->images[0]->name }}"
                                            data-fancybox="gallery">
                                            <img src="{{ asset('storage/products') }}/{{ $tour->images[0]->name }}"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <?php
                                $row = count($tour->images);
                                ?>
                                <div class="details-tour-thumb">
                                    @for ($i = 1; $i < $row; $i++)
                                        <div class="item"
                                            style="width: 150px; height: 150px; float: left; margin: 5px;">
                                            <a href="{{ asset('storage/products') }}/{{ $tour->images[$i]->name }}"
                                                data-fancybox="gallery">
                                                <img src="{{ asset('storage/products') }}/{{ $tour->images[$i]->name }}"
                                                    alt="" style="width: 120%; height: 70%;">
                                            </a>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-tabs">
                        <ul class="nav nav-tabs" id="myTab" role="tablist" style="clear: both;">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#tab1"
                                    role="tab" aria-controls="home" aria-selected="true">Tổng Quan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tab2" role="tab"
                                    aria-controls="profile" aria-selected="false">Kế Hoạch</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#tab3" role="tab"
                                    aria-controls="contact" aria-selected="false">Địa Điểm</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#tab4" role="tab"
                                    aria-controls="contact" aria-selected="false">Reviews</a>
                            </li> --}}
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="content">
                                    <h2 class="heading-title">Mô Tả</h2>
                                    <div class="single-content">
                                        <textarea name="" id="" cols="80" rows="14" style="border: 0px; height: 300px;">{{ $tour->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="tour-plan">
                                    <h2 class="heading-title">Kế Hoạch</h2>
                                    <div class="inner">
                                        @php $day = 1; @endphp
                                        @while ($tour->schedule->{'title' . $day} !== null && $tour->schedule->{'day' . $day} !== null)
                                            <div class="block-step">
                                                <div class="block-step__title"
                                                    onclick="toggleSchedule({{ $day }})">
                                                    <span class="icon"></span>
                                                    <div class="step-title">
                                                        {{ $tour->schedule->{'title' . $day} }}
                                                        <i class="fa fa-chevron-down"></i>
                                                    </div>
                                                </div>
                                                <div class="block-step__content" id="schedule-{{ $day }}">
                                                    <div class="schedule-details">
                                                        <p>
                                                            {{ $tour->schedule->{'day' . $day} }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            @php    $day++; @endphp
                                        @endwhile


                                        <!-- Có thể thêm các ngày tiếp theo tương tự -->

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="location">
                                    <h2 class="heading-title">Địa Điểm</h2>
                                    <div class="gg-map-address">
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8088443707425!2d105.77226895064041!3d21.04033328592339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454c563dba4eb%3A0xc3161d468d77f9aa!2zSUlUIFRFQ0hDT00gLSBDw7RuZyB0eSBUTkhIIEPDtG5nIG5naOG7hyB2w6AgdHJ1eeG7gW4gdGjDtG5nIElJVA!5e0!3m2!1svi!2s!4v1661220051007!5m2!1svi!2s"
                                            width="600" height="450" style="border:0;" allowfullscreen=""
                                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="booking-form__block">
                    <form action="{{ route('client-payment', $tour->id) }}" class="booking-form" method="post">
                        <h6 class="post-title">Đặt Tour Này</h6>
                        @csrf

                        <!-- Thông tin tour -->
                        <div class="tour-info-block">
                            <div class="info-item">
                                <i class="fas fa-building"></i>
                                <div class="info-content">
                                    <label>Công ty:</label>
                                    <span><b>{{ $tour->enterprise->enterprise_info->name }}</b></span>
                                </div>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-car"></i>
                                <div class="info-content">
                                    <label>Phương tiện:</label>
                                    <span>{{ $tour->vehicle->name }}</span>
                                </div>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-calendar-alt"></i>
                                <div class="info-content">
                                    <label>Ngày khởi hành:</label>
                                    <span>{{ \Carbon\Carbon::parse($tour->departure_date)->format('d/m/Y') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="quantity-section">
                            <h6>Số Lượng</h6>
                            <div class="quantity-item">
                                <label>Người lớn</label>
                                <div class="price">{{ number_format($tour->price) }}đ/ Người</div>
                                <input type="number" id="quantity" name="quantity1" min="0"
                                    value="0">
                            </div>
                            <div class="quantity-item">
                                <label>Trẻ em (0-5 tuổi)</label>
                                <div class="price">Miễn phí</div>
                                <input type="number" name="quantity2" min="0" value="0">
                            </div>
                        </div>

                        <!-- Form thông tin khách hàng -->
                        <div id="userForm" style="display: none;">
                            <h6>Thông tin khách hàng</h6>
                            <div class="form-group">
                                <input type="text" name="nameCus" id="nameCus"
                                    placeholder="Họ tên (tối thiểu 6 ký tự)" required minlength="6">
                            </div>
                            <div class="form-group">
                                <input type="text" name="year" id="year" placeholder="Năm sinh (4 số)"
                                    required pattern="\d{4}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" id="phone"
                                    placeholder="Số điện thoại (10 số)" required pattern="\d{10}">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="address" id="address"
                                    placeholder="Địa chỉ (tối thiểu 6 ký tự)" required minlength="6">
                            </div>
                        </div>

                        <div class="total-section">
                            <label>Tổng tiền:</label>
                            <input style="width:170px" readonly name="total" id="total" value="0₫">
                        </div>

                        <button type="button" class="btn booking-form__submit" id="submitButton" disabled>
                            Đặt Ngay
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <script>
            document
                .getElementById("quantity")
                .addEventListener("input", function() {
                    const quantity = parseInt(this.value);
                    const userForm = document.getElementById("userForm");
                    if (quantity > 0) {
                        userForm.style.display = "block";
                    } else {
                        userForm.style.display = "none";
                    }
                });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                const quantityInput = document.getElementById('quantity');
                const totalInput = document.getElementById('total');

                function updateTotal() {
                    const quantity = parseInt(quantityInput.value) || 0;
                    const total = quantity * {{ $tour->price }};
                    totalInput.value = total.toLocaleString('vi-VN') + ' ₫';;
                }
                quantityInput.addEventListener('input', updateTotal);
                quantityInput.addEventListener('change', updateTotal);
            });
        </script>
    </div>
    <div class="more-tour-list">
        <div class="more-inner">
            <h2 class="heading-title">
                Bạn Có Thể Sẽ Thích
            </h2>
            <div>
                @php
                    $randomTours = \App\Models\tour::where('status_id', 2)
                        ->inRandomOrder()
                        ->limit(3)
                        ->with(['images', 'hotel'])
                        ->get();
                @endphp

                <div class="row">
                    @foreach ($randomTours as $tour)
                        <div class="col">
                            <div class="card h-100">
                                <img src="{{ asset('storage/products/' . ($tour->images->first() ? $tour->images->first()->name : '')) }}"
                                    class="card-img-top" alt="{{ $tour->name }}"
                                    style="height: 200px; object-fit: cover;">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $tour->name }}</h5>
                                    <div class="item-hotel">
                                        <i class="fas fa-hotel"></i>
                                        <span>{{ $tour->hotel->name }}</span>
                                    </div>
                                    <p style="color: #e46d30; font-weight: bold;" class="card-text mt-2">
                                        {{ number_format($tour->price) }}₫
                                    </p>
                                    <div class="mt-auto">
                                        <a href="{{ route('client-detail', $tour->id) }}"
                                            class="btn booking-form__submit w-100"
                                            style="position: relative; overflow: hidden;">
                                            <span style="position: relative; z-index: 1;">Chi tiết</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


</section>
<div>
    <div style="text-align:center">
        <a class="toggle-note" style="font-weight: bold; font-size: 25px; text-align: center;">
            <i class="fas fa-exclamation-triangle" style="color: #e46d30;"></i>
            Chú ý
        </a>
    </div>
    <div class="note-content" style="max-width: 80%; margin: 0 auto;">
        <ul>
            <li>Khi đăng ký tour khách hàng bắt buộc phải gởi giấy tờ tùy thân cho đơn vị du lịch để vào tên xuất vé và
                mua bảo hiểm du lịch. Những giấy tờ cá nhân của khách hàng (CMND hoặc Passport) thuộc về trách nhiệm của
                khách hàng. Mọi vấn đề như hình ảnh, thông tin giấy tờ trong bản gốc bị mờ, không rõ ràng; Passport,
                CMND hết hạn,… không đúng quy định của pháp luật Việt Nam, Du Lịch Việt sẽ không chịu trách nhiệm và sẽ
                không hoàn trả bất cứ chi phí phát sinh nào.</li>
            <li>Đối với khách Nước ngoài/Việt Kiều: Khi đi tour phải mang theo đầy đủ Passport (Hộ Chiếu), Visa Việt Nam
                bản chính còn hạn sử dụng làm thủ tục lên máy bay theo qui định hàng không.</li>
            <li>Trẻ em (dưới 12 tuổi) khi đi du lịch mang theo giấy khai sinh (bản chính hoặc sao y có thị thực còn hạn
                sử dụng) để làm thủ tục hàng không.</li>
            <li>Quý khách từ 14 tuổi bắt buộc phải có CMND hoặc Passport (còn hạn sử dụng), KHÔNG SỬ DỤNG GIẤY KHAI
                SINH. Nếu Quý khách từ 14 tuổi chưa có CMND hoặc Passport bắt buộc phải có Giấy xác nhận nhân thân (Có
                xác nhận chính quyền (còn hạn sử dụng)) + Giấy khai sinh.</li>
            <li>Một số thứ tự, chi tiết trong chương trình; giờ bay; giờ xe lửa; giờ tàu cao tốc có thể thay đổi để
                phù
                hợp với tình hình thực tế của chuyến đi (thời tiết, giao thông…)</li>
            <li>Qui định nhận & trả phòng tại các khách sạn/resort: nhận phòng sau 14H00 và trả phòng trước 12H00.</li>
            <li>Hành lý và tư trang du khách tự bảo quản trong quá trình du lịch.</li>
            <li>Vì lý do sức khỏe và an toàn vệ sinh thực phẩm, Quý Khách vui lòng không mang thực phẩm từ bên ngoài vào
                nhà hàng, khách sạn. Đối với thức uống khi mang vào phải có sự đồng ý của nhà hàng, khách sạn và bị tính
                phí nếu có.</li>
        </ul>
    </div>
</div>
<style>
    /* Styling for the "Chú ý" section */
    .note-content {
        background-color: #fff3e6;
        border: 1px solid #e46d30;
        border-radius: 5px;
        padding: 20px;
        margin-top: 15px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .note-content ul {
        list-style-type: none;
        padding-left: 0;
        margin: 0;
    }

    .note-content ul li {
        margin-bottom: 15px;
        padding-left: 25px;
        position: relative;
        line-height: 1.6;
        color: #333;
    }

    .note-content ul li:before {
        content: "\f06a";
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        position: absolute;
        left: 0;
        color: #e46d30;
    }

    .toggle-note {
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 25px;
        font-weight: bold;
        color: #333;
        text-decoration: none;
        margin-bottom: 10px;
        transition: color 0.2s;
    }

    .toggle-note:hover {
        color: #e46d30;
    }

    .toggle-note i {
        font-size: 30px;
        margin-right: 10px;
    }

    /* Animation for content */
    .note-content {
        transition: all 0.3s ease-in-out;
    }

    .tour-info-block {
        background-color: #f8f9fa;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .tour-info-block table {
        width: 100%;
    }

    .tour-info-block td {
        padding: 8px 0;
        color: #333;
    }

    .tour-info-block td:first-child {
        width: 40%;
        font-weight: 500;
    }

    .tour-info-block i {
        margin-right: 10px;
    }

    .booking-form__block {
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
    }

    .tour-info-block {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 25px;
        border: 1px solid #e1e1e1;
    }

    .tour-info-block table {
        width: 100%;
    }

    .tour-info-block td {
        padding: 12px 0;
        color: #333;
        border-bottom: 1px solid #f0f0f0;
    }

    .tour-info-block tr:last-child td {
        border-bottom: none;
    }

    .tour-info-block td:first-child {
        width: 40%;
        font-weight: 500;
    }

    .tour-info-block i {
        margin-right: 10px;
        width: 20px;
        text-align: center;
    }

    .post-title {
        margin-bottom: 25px;
        color: #333;
        border-bottom: 2px solid #e46d30;
        padding-bottom: 15px;
    }

    /* Style cho sidebar tổng thể */
    .sidebar {
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
        width: 450px;
        margin: 0 auto;
    }

    /* Style chung cho các input và button trong form */
    .booking-form input,
    .booking-form select,
    .booking-form button {
        border-radius: 5px;
        border: 1px solid #e1e1e1;
        padding: 10px 15px;
        width: 100%;
        margin-bottom: 15px;
    }

    .booking-form button {
        background: #e46d30;
        color: #fff;
        border: none;
        transition: all 0.3s ease;
    }

    .booking-form button:hover {
        background: #d45420;
    }

    /* Style cho form thông tin khách hàng */
    #userForm {
        width: 100%;
        padding: 15px;
    }

    #userForm table {
        width: 100%;
    }

    #userForm input {
        width: 100% !important;
        max-width: 100%;
        margin-bottom: 10px;
    }

    /* Điều chỉnh layout cho các input */
    .input-group {
        width: 100%;
    }

    .booking-block {
        width: 100%;
        margin-bottom: 20px;
    }

    /* Điều chỉnh style cho bảng thông tin */
    .tour-info-block td {
        padding: 12px 10px;
        word-break: break-word;
    }

    /* Responsive adjustments */
    @media (max-width: 992px) {
        .sidebar {
            width: 100%;
            max-width: 450px;
        }
    }

    /* Các style khác giữ nguyên */
    .tour-info-block table {
        width: 100%;
    }

    .tour-info-block td {
        padding: 12px 0;
        color: #333;
        border-bottom: 1px solid #f0f0f0;
    }

    .tour-info-block tr:last-child td {
        border-bottom: none;
    }

    .tour-info-block td:first-child {
        width: 40%;
        font-weight: 500;
    }

    .tour-info-block i {
        margin-right: 10px;
        width: 20px;
        text-align: center;
    }

    .post-title {
        margin-bottom: 25px;
        color: #333;
        border-bottom: 2px solid #e46d30;
        padding-bottom: 15px;
    }

    .booking-form input,
    .booking-form select,
    .booking-form button {
        border-radius: 5px;
        border: 1px solid #e1e1e1;
        padding: 10px 15px;
        width: 100%;
        margin-bottom: 15px;
    }

    .booking-form button {
        background: #e46d30;
        color: #fff;
        border: none;
        transition: all 0.3s ease;
    }

    .booking-form button:hover {
        background: #d45420;
    }

    .booking-form__block {
        background: #fff;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .post-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #e46d30;
    }

    .tour-info-block {
        margin-bottom: 25px;
    }

    .info-item {
        display: flex;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid #eee;
    }

    .info-item:last-child {
        border-bottom: none;
    }

    .info-item i {
        color: #e46d30;
        font-size: 18px;
        width: 30px;
    }

    .info-content {
        flex: 1;
        margin-left: 10px;
    }

    .info-content label {
        font-weight: 500;
        margin-right: 8px;
        color: #666;
    }

    .quantity-section,
    .total-section {
        margin: 20px 0;
        padding: 15px 0;
        border-top: 1px solid #eee;
    }

    .quantity-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 15px;
    }

    .quantity-item input {
        width: 80px;
        padding: 5px;
        border: 1px solid #ddd;
        border-radius: 4px;
        text-align: center;
    }

    .price {
        color: #e46d30;
        font-weight: 500;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        transition: border-color 0.3s;
    }

    .form-group input:focus {
        border-color: #e46d30;
        outline: none;
    }

    .total-section {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 18px;
        font-weight: bold;
    }

    .total-section input {
        border: none;
        text-align: right;
        font-weight: bold;
        color: #e46d30;
    }

    .booking-form__submit {
        width: 100%;
        padding: 12px;
        background: #e46d30;
        color: white;
        border: none;
        border-radius: 4px;
        font-weight: 500;
        cursor: pointer;
        transition: background 0.3s;
    }

    .booking-form__submit:hover {
        background: #d45420;
    }

    .booking-form__submit:disabled {
        background: #ccc;
        cursor: not-allowed;
    }
</style>




<script>
    function toggleSchedule(day) {
        const content = document.getElementById(`schedule-${day}`);
        const icon = content.previousElementSibling.querySelector('.fa-chevron-down');

        if (content.style.maxHeight) {
            content.style.maxHeight = null;
            icon.style.transform = 'rotate(0deg)';
        } else {
            content.style.maxHeight = content.scrollHeight + "px";
            icon.style.transform = 'rotate(180deg)';
        }
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const quantityInput = document.getElementById('quantity');
        const submitButton = document.getElementById('submitButton');
        const userForm = document.getElementById('userForm');

        // Lấy tất cả các trường input trong form
        const nameInput = document.getElementById('nameCus');
        const yearInput = document.getElementById('year');
        const phoneInput = document.getElementById('phone');
        const emailInput = document.getElementById('email');
        const addressInput = document.getElementById('address');

        function validateInputs() {
            // Kiểm tra số lượng người lớn
            const quantity = parseInt(quantityInput.value) || 0;

            if (quantity < 1) {
                userForm.style.display = 'none';
                submitButton.disabled = true;
                return false;
            }

            userForm.style.display = 'block';

            // Kiểm tra các điều kiện của từng trường input
            const isNameValid = nameInput.value.length >= 6;
            const isYearValid = /^\d{4}$/.test(yearInput.value);
            const isPhoneValid = /^\d{10}$/.test(phoneInput.value);
            const isEmailValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value);
            const isAddressValid = addressInput.value.length >= 6;

            // Chỉ enable nút khi tất cả điều kiện đều thỏa mãn
            submitButton.disabled = !(isNameValid && isYearValid && isPhoneValid &&
                isEmailValid && isAddressValid);

            return true;
        }

        // Thêm sự kiện input cho tất cả các trường
        quantityInput.addEventListener('input', validateInputs);
        nameInput.addEventListener('input', validateInputs);
        yearInput.addEventListener('input', validateInputs);
        phoneInput.addEventListener('input', validateInputs);
        emailInput.addEventListener('input', validateInputs);
        addressInput.addEventListener('input', validateInputs);

        // Thêm sự kiện click cho nút "Đặt Ngay"
        submitButton.addEventListener('click', function() {
            const quantity = parseInt(quantityInput.value) || 0;

            if (quantity < 1) {
                alert('Vui lòng chọn số lượng người lớn.');
                return;
            }

            // Kiểm tra từng trường và hiển thị thông báo tương ứng
            if (nameInput.value.length < 6) {
                alert('Vui lòng nhập họ tên tối thiểu 6 ký tự.');
                nameInput.focus();
                return;
            }

            if (!/^\d{4}$/.test(yearInput.value)) {
                alert('Vui lòng nhập năm sinh đúng định dạng (4 số).');
                yearInput.focus();
                return;
            }

            if (!/^\d{10}$/.test(phoneInput.value)) {
                alert('Vui lòng nhập số điện thoại đúng định dạng (10 số).');
                phoneInput.focus();
                return;
            }

            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value)) {
                alert('Vui lòng nhập email hợp lệ.');
                emailInput.focus();
                return;
            }

            if (addressInput.value.length < 6) {
                alert('Vui lòng nhập địa chỉ tối thiểu 6 ký tự.');
                addressInput.focus();
                return;
            }

            // Nếu tất cả điều kiện đều thỏa mãn, submit form
            document.querySelector('form').submit();
        });
    });
</script>

@endsection
