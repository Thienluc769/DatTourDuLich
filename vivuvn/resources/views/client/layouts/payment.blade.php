<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=1" />
    <title>vivuvn | Thanh toán</title>
    <style type="text/css">
        @media print {
            * {
                -webkit-print-color-adjust: exact !important;
                color-adjust: exact !important;
            }

            .form-section {
                display: inline !important
            }

            .form-pagebreak {
                display: none !important
            }

            .form-section-closed {
                height: auto !important
            }

            .page-section {
                position: initial !important
            }
        }
    </style>
    <link type="text/css" rel="stylesheet"
        href="https://cdn02.jotfor.ms/themes/CSS/5e6b428acc8c4e222d1beb91.css?v=3.3.53801&themeRevisionID=65660e4b326633110492e01a" />
    <link type="text/css" rel="stylesheet"
        href="https://cdn03.jotfor.ms/css/styles/payment/payment_styles.css?3.3.53801" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <div class="payment-container">
        <div class="payment-wrapper">
            <form action="{{ route('client-store', $tour->id) }}" method="POST">
                @csrf
                <div class="payment-header">
                    <h1><i class="fas fa-credit-card"></i> Thông Tin Thanh Toán</h1>
                </div>

                <!-- Thông tin khách hàng -->
                <div class="customer-info">
                    <h2><i class="fas fa-user"></i> Thông Tin Khách Hàng</h2>
                    <div class="info-grid">
                        <div class="info-item">
                            <label><i class="fas fa-user-circle"></i> Họ Tên</label>
                            <input type="hidden" name="nameCus" value="{{ $input['nameCus'] }}">
                            <p>{{ $input['nameCus'] }}</p>
                        </div>
                        <div class="info-item">
                            <label><i class="fas fa-calendar"></i> Năm Sinh</label>
                            <input type="hidden" name="year" value="{{ $input['year'] }}">
                            <p>{{ $input['year'] }}</p>
                        </div>
                        <div class="info-item">
                            <label><i class="fas fa-phone"></i> SĐT</label>
                            <input type="hidden" name="phone" value="{{ $input['phone'] }}">
                            <p>{{ $input['phone'] }}</p>
                        </div>
                        <div class="info-item">
                            <label><i class="fas fa-envelope"></i> Email</label>
                            <input type="hidden" name="email" value="{{ $input['email'] }}">
                            <p>{{ $input['email'] }}</p>
                        </div>
                        <div class="info-item full-width">
                            <label><i class="fas fa-map-marker-alt"></i> Địa Chỉ</label>
                            <input type="hidden" name="address" value="{{ $input['address'] }}">
                            <p>{{ $input['address'] }}</p>
                        </div>
                    </div>
                </div>

                <!-- Thông tin tour -->
                <div class="tour-info">
                    <h2><i class="fas fa-plane"></i> Thông Tin Tour</h2>
                    <div class="tour-details">
                        <table>
                            <tr>
                                <th><i class="fas fa-tag"></i> Tên Tour</th>
                                <th><i class="fas fa-dollar-sign"></i> Giá</th>
                                <th><i class="fas fa-building"></i> Công ty</th>
                                <th><i class="fas fa-hotel"></i> Khách Sạn</th>
                                <th><i class="fas fa-car"></i> Phương Tiện</th>
                                <th><i class="fas fa-users"></i> Số Lượng</th>
                                <th><i class="fas fa-calendar-alt"></i> Ngày Khởi Hành</th>
                            </tr>
                            <tr>
                                <td>{{ $tour->name }}</td>
                                <td>{{ number_format($tour->price) }}₫</td>
                                <td>{{ $tour->enterprise->enterprise_info->name }} </td>
                                <td>{{ $tour->hotel->name }}</td>
                                <td>{{ $tour->vehicle->name }}</td>
                                <td>
                                    <input type="hidden" name="quantity1" value="{{ $input['adultQuantity'] }}">
                                    <input type="hidden" name="quantity2" value="{{ $input['childQuantity'] }}">
                                    <p>{{ $input['adultQuantity'] }} Người lớn</p>
                                    <p>{{ $input['childQuantity'] }} Trẻ em</p>
                                </td>
                                <td>
                                    <input type="hidden"  value="{{ $tour->departure_date }}">
                                    {{ \Carbon\Carbon::parse($tour->departure_date)->format('d-m-Y') }}
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="total-amount">
                        <span>Tổng tiền:</span>
                        <input type="hidden" name="total" value="{{ $total }}">
                        <span class="amount">{{ number_format($total) }}₫</span>
                    </div>
                </div>

                <!-- Phương thức thanh toán -->
                <div class="payment-method">
                    <h2><i class="fas fa-money-check"></i> Phương Thức Thanh Toán</h2>
                    <div class="payment-options">
                        <div class="payment-option">
                            <input type="radio" name="payment_method" value="1" id="online">
                            <label for="online"><i class="fas fa-credit-card"></i> Thanh Toán Trực Tuyến</label>
                        </div>
                        <div class="payment-option">
                            <input type="radio" name="payment_method" value="2" id="offline">
                            <label for="offline"><i class="fas fa-money-bill-wave"></i> Thanh Toán Trực Tiếp</label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="confirm-button">
                    <i class="fas fa-check-circle"></i> Xác Nhận Đặt Tour
                </button>
            </form>
        </div>
    </div>

    <style>
        .payment-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .payment-wrapper {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .payment-header {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .payment-header h1 {
            font-size: 28px;
            color: #e46d30;
        }

        h2 {
            color: #333;
            font-size: 20px;
            margin-bottom: 20px;
            border-bottom: 2px solid #e46d30;
            padding-bottom: 10px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .info-item {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #e1e1e1;
        }

        .info-item.full-width {
            grid-column: 1 / -1;
        }

        .info-item label {
            display: block;
            color: #666;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .info-item p {
            margin: 0;
            color: #333;
            font-size: 16px;
        }

        .tour-details table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .tour-details th,
        .tour-details td {
            padding: 12px;
            text-align: left;
            border: 1px solid #e1e1e1;
        }

        .tour-details th {
            background: #f8f9fa;
            color: #333;
        }

        .total-amount {
            text-align: right;
            font-size: 20px;
            margin: 20px 0;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .amount {
            color: #e46d30;
            font-weight: bold;
            margin-left: 10px;
        }

        .payment-options {
            display: flex;
            gap: 20px;
            margin: 20px 0;
        }

        .payment-option {
            flex: 1;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
            border: 1px solid #e1e1e1;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .payment-option:hover {
            border-color: #e46d30;
        }

        .payment-option input[type="radio"] {
            margin-right: 10px;
        }

        .confirm-button {
            width: 100%;
            padding: 15px;
            background: #e46d30;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        .confirm-button:hover {
            background: #d45420;
        }

        i {
            margin-right: 8px;
        }

        @media (max-width: 768px) {
            .info-grid {
                grid-template-columns: 1fr;
            }

            .payment-options {
                flex-direction: column;
            }
        }
    </style>
</body>

</html>
