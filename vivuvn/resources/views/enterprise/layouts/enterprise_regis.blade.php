@extends('client.parentLayouts.main')
@section('title', 'vivuvn | đăng ký')
@section('main_content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Công Ty</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- CSS của bạn -->
    <link rel="stylesheet" href="{{ asset('client/assets') }}/all.css" />

    <!-- Thêm meta token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Thêm Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container-account">
        <div class="right-content-account-page">
            <h1 class="title-account-page">Đăng ký tài khoản</h1>

            <div class="progress-bar-container">
                <div class="progress-steps">
                    <div class="step active" data-step="1">
                        <div class="step-circle">1</div>
                        <div class="step-text">Thông tin cơ bản</div>
                    </div>
                    <div class="step" data-step="2">
                        <div class="step-circle">2</div>
                        <div class="step-text">Thông tin liên hệ</div>
                    </div>
                    <div class="step" data-step="3">
                        <div class="step-circle">3</div>
                        <div class="step-text">Thông tin tài khoản</div>
                    </div>
                    <div class="step" data-step="4">
                        <div class="step-circle">4</div>
                        <div class="step-text">Hoàn tất</div>
                    </div>
                </div>
                <div class="progress-line">
                    <div class="progress"></div>
                </div>
            </div>

            <div>
                @if ($errors->any())
                    <div style="color: red ; font-size:20px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <form action="{{ route('enterprise-post-regis') }}" method="post" id="enterprise-register-form">
                @csrf
                <div class="form-container">
                    <!-- Form 1: Thông tin cơ bản -->
                    <div style="font-weight: 600;" class="form-step" id="step1">
                        <h3>Thông tin cơ bản</h3>
                        <div class="form-group">
                            <label>Tên công ty/tổ chức <span class="required">*</span></label>
                            <input type="text" name="enterprise_name" placeholder="Tối thiểu 5 ký tự" />
                        </div>
                        <div class="form-group">
                            <label>Mã số thuế <span class="required">*</span></label>
                            <input type="number" name="tax_code" placeholder="Nhập mã số thuế (10 ký tự)" />
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ <span class="required">*</span></label>
                            <input type="text" name="address" placeholder="Tối thiểu 5 ký tự" />
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại <span class="required">*</span></label>
                            <input type="number" name="landline" placeholder="Nhập số điện thoại (10 số)" />
                        </div>
                        <div class="form-group">
                            <label>Email công ty <span class="required">*</span></label>
                            <input type="email" name="enterprise_email" id="enterprise_email"
                                placeholder="Nhập email (@gmail.com)" />
                        </div>

                        <button type="button" class="next-btn" onclick="nextStep(1)" disabled>
                            Tiếp theo
                        </button>
                    </div>

                    <!-- Form 2: Thông tin liên hệ -->
                    <div class="form-step" id="step2" style="display: none">
                        <h3>Thông tin liên hệ</h3>
                        <div class="form-group">
                            <label>Họ tên người đại diện <span class="required">*</span></label>
                            <input type="text" name="representative_name"
                                placeholder="Nhập họ tên người đại diện (trên 5 ký tự)" />
                        </div>
                        <div class="form-group">
                            <label>Chức vụ <span class="required">*</span></label>
                            <input type="text" name="position" placeholder="Nhập chức vụ , không được để trống" />
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại di động <span class="required">*</span></label>
                            <input type="number" name="phone" placeholder="Nhập số điện thoại di động (10 số)" />
                        </div>
                        <div class="form-group">
                            <label>Email liên hệ <span class="required">*</span></label>
                            <input type="email" name="representative_email" placeholder="Nhập email (@gmail.com)" />
                        </div>
                        <div class="button-group">
                            <button type="button" class="back-btn">Quay lại</button>
                            <button type="button" class="next-btn" disabled>Tiếp theo</button>
                        </div>
                    </div>

                    <!-- Form 3: Thông tin tài khoản -->
                    <div class="form-step" id="step3" style="display: none">
                        <h3>Thông tin tài khoản</h3>
                        <div class="form-group">
                            <label>Tên đăng nhập <span class="required">*</span></label>
                            <input type="text" name="username" readonly style="background-color: #e9ecef;" />
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu <span class="required">*</span></label>
                            <input type="password" name="password" placeholder="Nhập mật khẩu (trên 5 ký tự)" />
                        </div>
                        <div class="form-group">
                            <label>Xác nhận mật khẩu <span class="required">*</span></label>
                            <input type="password" name="re_password" placeholder="Nhập lại mật khẩu" />
                        </div>
                        <div class="button-group">
                            <button type="button" class="back-btn">Quay lại</button>
                            <button type="submit" class="save-btn">Đăng ký</button>
                        </div>
                    </div>

                    <!-- Form 4: Hoàn tất đăng ký -->
                    <div class="form-step" id="step4" style="display: none">
                        <div class="complete-message">
                            <div class="success-checkmark">
                                <div class="check-icon">
                                    <span class="icon-line line-tip"></span>
                                    <span class="icon-line line-long"></span>

                                    <div class="icon-fix"></div>
                                </div>
                            </div>
                            <h3>Đăng ký thành công!</h3>
                            <p>Chúc mừng bạn đã đăng ký tài khoản thành công</p>
                            <button type="button" class="btn-return-home">
                                <i class="fas fa-home"></i>
                                Về trang chủ
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('client/assets') }}/all.js"></script>

    <!-- Script xử lý đăng ký thành công -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('enterprise-register-form');

            // Xóa event listener cũ ở file all.js
            const oldSaveBtn = document.querySelector('.save-btn');
            if (oldSaveBtn) {
                oldSaveBtn.replaceWith(oldSaveBtn.cloneNode(true));
            }

            // Thêm event listener mới
            const saveBtn = document.querySelector('.save-btn');
            if (form && saveBtn) {
                form.addEventListener('submit', async function (e) {
                    e.preventDefault();

                    try {
                        const formData = new FormData(this);
                        const response = await fetch(this.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            }
                        });

                        if (response.ok) {
                            // Ẩn step3
                            const step3 = document.getElementById("step3");
                            if (step3) step3.style.display = "none";

                            // Hiện step4 
                            const step4 = document.getElementById("step4");
                            if (step4) step4.style.display = "block";

                            // Cập nhật progress
                            const steps = document.querySelectorAll('.step');
                            steps.forEach((step, index) => {
                                if (index < 4) {
                                    step.classList.add('active');
                                }
                            });

                            // Cập nhật progress bar
                            const progressBar = document.querySelector('.progress');
                            if (progressBar) {
                                progressBar.style.width = '100%';
                            }

                            // Chuyển hướng về trang chủ sau 2 giây
                            setTimeout(() => {
                                window.location.href = "{{ route('client-home') }}?registration=success";
                            }, 2000);
                        }
                    } catch (error) {
                        console.error('Error:', error);
                    }
                });
            }

            // Thêm hàm kiểm tra form
            function validateForm() {
                const password = form.querySelector('input[name="password"]').value;
                const rePassword = form.querySelector('input[name="re_password"]').value;
                const enterpriseName = form.querySelector('input[name="enterprise_name"]').value;
                const taxCode = form.querySelector('input[name="tax_code"]').value;
                const address = form.querySelector('input[name="address"]').value;
                const landline = form.querySelector('input[name="landline"]').value;
                const enterpriseEmail = form.querySelector('input[name="enterprise_email"]').value;
                const representativeName = form.querySelector('input[name="representative_name"]').value;
                const position = form.querySelector('input[name="position"]').value;
                const phone = form.querySelector('input[name="phone"]').value;
                const representativeEmail = form.querySelector('input[name="representative_email"]').value;

                // Kiểm tra các trường bắt buộc
                if (
                    enterpriseName.length >= 5 &&
                    taxCode.length === 10 &&
                    address.length >= 5 &&
                    landline.length === 10 &&
                    enterpriseEmail.includes('@') &&
                    representativeName.length >= 5 &&
                    position.length > 0 &&
                    phone.length === 10 &&
                    representativeEmail.includes('@') &&
                    password.length >= 5 &&
                    password === rePassword
                ) {
                    saveBtn.disabled = false;
                    saveBtn.style.opacity = '1';
                    saveBtn.style.cursor = 'pointer';
                } else {
                    saveBtn.disabled = true;
                    saveBtn.style.opacity = '0.5';
                    saveBtn.style.cursor = 'not-allowed';
                }
            }

            // Thêm event listener cho tất cả các input
            const inputs = form.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('input', validateForm);
            });
        });
    </script>
</body>

@endsection