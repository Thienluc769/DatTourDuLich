@extends('enterprise.parentLayouts.master')
@section('title', 'vivuvn | Invoice')
@section('main_content')
    <div class="card">

        @if (session('message'))
            <h1 class="text-primary">{{ session('message') }}</h1>
        @endif
        <h1>
            Invoice List
        </h1>
        <div>
            <table class="table table-hover">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Tour</th>
                    <th>Total Payment</th>
                    <th>Payment Method</th>
                    <th>Status</th>
                    <th>Create at</th>
                    <th>Action</th>
                </tr>
                @foreach ($orderDetailStatus1 as $item)
                    <?php
                    //dd($item->order);
                    ?>
                    <tr>
                        <td>{{ $item->order_id }}</td>
                        <td>{{ $item->customer->name }}</td>
                        <td>{{ $item->tour->name }}</td>
                        <td>{{ number_format($item->order->total_price) }}₫</td>
                        <td>{{ $item->order->payment_method->method }}</td>
                        <td style="color: #fb8c00">{{ $item->order->status->name }}</td>
                        <td>{{ $item->order->create_at }}</td>
                        <td>
                            <div class="d-flex gap-1" style="min-width: 200px;">


                                <button type="submit" class="btn btn-success btn-sm"
                                    onclick="showGuideModal('DH001')">Approve</button>


                                <form action="{{ route('invoice-reject', $item->order_id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="rejectOrder('DH001')">Reject</button>
                                </form>
                            </div>
                        </td>
                    </tr>

            </table>
            {{ $orderDetailStatus1->links() }}
        </div>

    </div>

    <!-- Thêm modal chọn hướng dẫn viên -->
    <div class="modal fade" id="guideModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">
                        <i class="fas fa-user-tie me-2"></i>
                        Chọn Hướng Dẫn Viên
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="{{ route('invoice-approve', $item->order_id) }}" method="POST">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="form-group">
                            <label class="form-label fw-bold mb-2">Chọn hướng dẫn viên cho tour:</label>
                            <select class="form-select form-select-lg mb-3" id="guideSelect" name="tourGuide_id">
                                <option value="" selected disabled>-- Chọn hướng dẫn viên --</option>
                                @foreach ($tourGuide as $tourGuide)
                                    <option value="{{ $tourGuide->id }}">{{ $tourGuide->name }}</option>
                                @endforeach
                            </select>
                            <div id="noGuidesMessage" class="alert alert-warning d-none">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                Hiện không có hướng dẫn viên nào khả dụng cho tour này!
                            </div>
                            <div id="busyGuideMessage" class="alert alert-info d-none">
                                <i class="fas fa-info-circle me-2"></i>
                                Hướng dẫn viên này đã được phân công cho tour khác trong thời gian này!
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times me-2"></i>Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-check me-2"></i>Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <div style="padding: 10px;"></div>

    <style>
        .modal-content {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            padding: 1rem 1.5rem;
        }

        .modal-body {
            padding: 2rem;
        }

        .form-select {
            padding: 0.8rem 1rem;
            border-radius: 8px;
            border: 2px solid #dee2e6;
            font-size: 1rem;
            transition: all 0.2s;
        }

        .form-select:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, .25);
        }

        .modal-footer {
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            padding: 1rem 1.5rem;
        }

        .btn {
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            border-radius: 6px;
        }

        .form-select option[data-busy="true"] {
            color: #6c757d;
            font-style: italic;
        }

        .alert {
            margin-top: 1rem;
            padding: 0.75rem 1rem;
            border-radius: 6px;
        }
    </style>


    <div class="card">
        

        <div>
            <table class="table table-hover">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Tour</th>
                    <th>Total Payment</th>
                    <th>Payment Method</th>
                    <th>Status</th>
                    <th>Tour Guide Name</th>
                    <th>Create at</th>
                </tr>
                @foreach ($orderDetailStatus2 as $item)
                    <?php
                    //dd($item->order);
                    ?>
                    <tr>
                        <td>{{ $item->order_id }}</td>
                        <td>{{ $item->customer->name }}</td>
                        <td>{{ $item->tour->name }}</td>
                        <td>{{ number_format($item->order->total_price) }}₫</td>
                        <td>{{ $item->order->payment_method->method }}</td>
                        <td style="color: #208139">{{ $item->order->status->name }}</td>
                        <td>{{ optional($item->order->tourGuide)->name }}</td>
                        <td>{{ $item->order->create_at }}</td>
                    </tr>
                @endforeach
            </table>
            {{ $orderDetailStatus2->links() }}
        </div>

    </div>



    <script>
        let currentOrderId = null;

        function showGuideModal(orderId) {
            currentOrderId = orderId;
            const guideSelect = document.getElementById('guideSelect');
            const noGuidesMessage = document.getElementById('noGuidesMessage');

            // Kiểm tra nếu không có hướng dẫn viên nào
            if (guideSelect.options.length <= 1) {
                noGuidesMessage.classList.remove('d-none');
                guideSelect.disabled = true;
            } else {
                noGuidesMessage.classList.add('d-none');
                guideSelect.disabled = false;
            }

            const modal = new bootstrap.Modal(document.getElementById('guideModal'));
            modal.show();
        }

        function confirmApprove() {
            const guideSelect = document.getElementById('guideSelect');
            const selectedOption = guideSelect.options[guideSelect.selectedIndex];

            if (!guideSelect.value) {
                alert('Vui lòng chọn hướng dẫn viên!');
                return;
            }

            // Kiểm tra hướng dẫn viên có đang bận không
            if (selectedOption.dataset.busy === 'true') {
                document.getElementById('busyGuideMessage').classList.remove('d-none');
                return;
            }


        }

        // Thêm event listener cho select để ẩn thông báo khi chọn lại
        document.getElementById('guideSelect').addEventListener('change', function() {
            document.getElementById('busyGuideMessage').classList.add('d-none');
        });

        function rejectOrder(orderId) {
            if (confirm('Bạn có chắc chắn muốn từ chối đơn hàng này?')) {
                // Xử lý reject
                alert('Đã từ chối đơn hàng ' + orderId);
            }
        }
    </script>

@endsection
