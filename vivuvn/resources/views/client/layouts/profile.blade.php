@extends('client.parentLayouts.main')
@section('title', 'vivuvn | thông tin')
@section('main_content')



<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('client/assets') }}/all.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
  <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_purple.css" />
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="https://npmcdn.com/flatpickr/dist/l10n/vn.js"></script>
</head>

<body>
  <div class="container-account">
    <!-- Menu bên trái -->
    <div class="left-menu-account">
      <div class="container-left-menu-account">
        <div class="header-menu-account">
          <span class="avatar-client">TR</span>
          <div class="right-name-client">
            <h4>{{$account->name}}</h4>
            <p>Thành viên đồng (<b>0</b>)</p>
          </div>
        </div>
        <div class="left-account-menu-list">
          <ul>
            <li class="acc-active">
              <a href="{{ route('client-profile',Auth::guard('users')->user()->id) }}"><i class="fa fa-user"></i> Hồ sơ cá nhân</a>
              <div class="menu-divider"></div>
            </li>
            <li>
              <a href="{{ route('client-orders',Auth::guard('users')->user()->id) }}"><i class="fa-solid fa-clipboard-list"></i> Đơn hàng của tôi</a>
              <div class="menu-divider"></div>
            </li>
            <li>
              <a href="{{ route('client-logout',) }}"><i class="fa fa-sign-out"></i> Đăng xuất</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Nội dung bên phải -->
    <div class="right-content-account-page">
      <!-- Nội dung hồ sơ cá nhân -->
      <div id="profile-content">
        <h1>Tài khoản</h1>
        <div class="account-form-container">
          <div class="form-group">
            <label>Email</label>
            <div class="email-input-group">
              <input type="email" value="{{$account->email}}" readonly />

              <div class="change-password-wrapper">
                <button type="button" class="change-password-btn">
                  <div class="checkbox-wrapper">
                    <input type="checkbox" id="changePasswordCheckbox" name="changePassword" />
                    <label for="changePasswordCheckbox">Đổi mật khẩu</label>
                  </div>
                </button>
              </div>
            </div>
          </div>

          <div id="passwordFields" style="display: none">
            <div class="form-group">
              <label>Mật khẩu cũ</label>
              <input type="password" name="oldPassword" placeholder="Nhập mật khẩu cũ" />
            </div>
            <div class="form-group">
              <label>Mật khẩu mới</label>
              <input type="password" name="newPassword" placeholder="Nhập mật khẩu mới" />
            </div>
            <div class="form-group">
              <label>Xác nhận mật khẩu mới</label>
              <input type="password" name="confirmPassword" placeholder="Xác nhận mật khẩu mới" />
            </div>
          </div>

          <div class="form-row">
            <div class="form-group name-group">
              <div class="ho">
                <label>Họ và tên</label>
                <input type="text" placeholder="Nhập họ và tên" />
              </div>

            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label>Ngày sinh</label>
              <div class="input-date-account">
                <input type="text" id="birthday" name="birthday" placeholder="dd/mm/yyyy" class="date-input"
                  autocomplete="off" />
                <i class="fa-regular fa-calendar-days"></i>
              </div>
            </div>
            <div class="form-group">
              <label>Số điện thoại</label>
              <input type="tel" placeholder="Nhập số điện thoại" />
            </div>
          </div>

          <div class="form-group">
            <label>Quốc tịch</label>
            <select>
              <option value="">Chọn quốc tịch</option>
              <option value="VN">Việt Nam</option>
              <!-- Thêm các quốc gia khác -->
            </select>
          </div>

          <div class="form-group">
            <label>Địa chỉ</label>
            <input type="text" placeholder="Nhập địa chỉ" />
          </div>

          <button type="submit" class="save-btn">LƯU</button>
        </div>
      </div>
    </div>
  </div>
  <script src="{{asset('client/assets')}}/all.js"></script>
  
</body>




@endsection