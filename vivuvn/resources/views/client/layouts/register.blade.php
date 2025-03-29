@extends('client.parentLayouts.main')
@section('title', 'vivuvn | Đăng ký')
@section('main_content')
    <div class="content" style="padding: 3rem 0 10rem 0;";">
        <div class="container">
            <div align="center">
                <div class="contents">
                    <div class="row justify-content-center">
                        <div class="">
                            <div>
                                <h3 style="font-weight:bold; color:#0a3c62">Đăng Ký</h3>
                            </div>
                            <form action="{{ route('client-regisAcc') }}" method="post" id="registerForm">
                                @csrf
                                <div class="form-group">
                                    <div class="label-wrapper">
                                        <label for="username">Họ tên</label>
                                    </div>
                                    <div class="input-wrapper">
                                        <input type="text" class="form-control" name="name" id="name" 
                                            placeholder="Tối thiểu 5 ký tự">
                                        <div class="validation-icon"></div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="label-wrapper">
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="input-wrapper">
                                        <input type="text" class="form-control" name="email" id="email" 
                                            placeholder="Nhập email (@gmail.com)">
                                        <div class="validation-icon"></div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="label-wrapper">
                                        <label for="password">Mật khẩu</label>
                                    </div>
                                    <div class="input-wrapper">
                                        <input type="password" class="form-control" name="pass" id="pass" 
                                            placeholder="Tối thiểu 5 ký tự, không chứa khoảng trắng">
                                        <div class="validation-icon"></div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="label-wrapper">
                                        <label for="re_password">Nhập lại mật khẩu</label>
                                    </div>
                                    <div class="input-wrapper">
                                        <input type="password" class="form-control" name="re_pass" id="re_pass" 
                                            placeholder="Nhập lại mật khẩu">
                                        <div class="validation-icon"></div>
                                    </div>
                                </div>
                                
                                <input style="width: 450px;" type="submit" value="Đăng Ký" class="btn btn-block btn-primary next-btn" disabled>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
    .form-group {
        margin-bottom: 20px;
        width: 450px;
        position: relative;
    }

    .label-wrapper {
        text-align: left;
        margin-bottom: 5px;
    }

    .label-wrapper label {
        font-weight: 500;
        color: #333;
    }

    .input-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }

    .form-control {
        width: 100%;
        padding: 10px 35px 10px 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        transition: all 0.3s;
    }

    .validation-icon {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
    }

    .next-btn {
        width: 100%;
        padding: 12px;
        background-color: #be2edd;
        border: none;
        border-radius: 4px;
        color: white;
        font-weight: 500;
        margin-top: 20px;
        transition: all 0.3s;
    }

    .next-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        background-color: #ccc;
    }

    .fa-check-circle {
        color: #28a745;
        font-size: 16px;
    }

    .fa-times-circle {
        color: #dc3545;
        font-size: 16px;
    }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputs = {
            name: document.getElementById('name'),
            email: document.getElementById('email'),
            pass: document.getElementById('pass'),
            re_pass: document.getElementById('re_pass')
        };

        const submitBtn = document.querySelector('.next-btn');

        function validateField(input, shouldShowError = false) {
            if (!input) return false;

            let value;
            if (input.id === 'name') {
                value = input.value.trim();
            } else if (input.id === 'email') {
                value = input.value.trim();
            } else {
                value = input.value;
            }

            let isValid = false;

            switch (input.id) {
                case 'name':
                    isValid = value.length >= 5;
                    break;
                case 'email':
                    isValid = /^[^\s@]+@gmail\.com$/.test(value);
                    break;
                case 'pass':
                    isValid = value.length >= 5 && value === value.trim();
                    break;
                case 're_pass':
                    isValid = value === inputs.pass.value && value !== '';
                    break;
            }

            let iconContainer = input.parentElement.querySelector('.validation-icon');
            
            if (!shouldShowError && value === '') {
                iconContainer.innerHTML = '';
                input.style.borderColor = '';
            } else {
                if (value === '') {
                    iconContainer.innerHTML = '<i class="fas fa-times-circle"></i>';
                    input.style.borderColor = '#dc3545';
                } else if (isValid) {
                    iconContainer.innerHTML = '<i class="fas fa-check-circle"></i>';
                    input.style.borderColor = '#28a745';
                } else {
                    iconContainer.innerHTML = '<i class="fas fa-times-circle"></i>';
                    input.style.borderColor = '#dc3545';
                    
                    if (input.id === 'pass' && value !== value.trim()) {
                        input.title = 'Mật khẩu không được ch���a khoảng trắng ở đầu hoặc cuối';
                    }
                }
            }

            return isValid;
        }

        function validateForm() {
            let isValid = true;
            Object.values(inputs).forEach(input => {
                if (!validateField(input)) {
                    isValid = false;
                }
            });

            submitBtn.disabled = !isValid;
            if (isValid) {
                submitBtn.style.opacity = '1';
                submitBtn.style.cursor = 'pointer';
            } else {
                submitBtn.style.opacity = '0.5';
                submitBtn.style.cursor = 'not-allowed';
            }
        }

        Object.values(inputs).forEach(input => {
            if (input) {
                let hasInteracted = false;
                
                input.addEventListener('blur', function() {
                    hasInteracted = true;
                    validateField(input, true);
                    validateForm();
                });

                input.addEventListener('input', function() {
                    if (hasInteracted) {
                        validateField(input, true);
                        validateForm();
                    }
                });
            }
        });
    });
    </script>
@endsection
