@extends('enterprise.parentLayouts.master')
@section('title', 'vivuvn | Create Tour')

@section('main_content')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Create Tour</h3>
                    <a href="javascript:history.back()" class="btn btn-primary btn-sm">
                        <i class="fas fa-arrow-left me-2"></i>Return
                    </a>
                </div>
            </div>

            <div class="card-body p-4">
                <form action="{{ route('product-store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                   

                    <!-- Basic Information -->
                    <div class="form-section mb-5">
                        <h5 class="form-section-title">
                            <i class="fas fa-info-circle me-2"></i>Basic Information
                        </h5>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter tour name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Tour Category</label>
                                    <select class="form-control" name="category">
                                        <option value="">-- Choose Tour Category --</option>
                                        @foreach ($category as $category)
                                            <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Images -->
                    <div class="form-section mb-5">
                        <h5 class="form-section-title">
                            <i class="fas fa-images me-2"></i>Images
                        </h5>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Image</label>
                                    <input type="file" accept="image/*" name="image_main" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Image Description</label>
                                    <input type="file" accept="image/*" name="image[]" multiple class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Images Section -->
                    <div class="form-section mb-5">
                        <h5 class="form-section-title">
                            <i class="fas fa-align-left me-2"></i>Description & Time
                        </h5>
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" cols="100" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Tour time</label>
                                    <div class="d-flex gap-2 align-items-center">
                                        <input type="text" value="{{ old('tour_time') }}" name="tour_time"
                                            class="form-control">
                                        <span>ngày</span>
                                        <input type="text" value="{{ old('tour_time_night') }}" name="tour_time_night">
                                        <span>đêm</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Ngày khởi hành</label>
                                    <input type="date" id="departure_date" name="departure_date" class="form-control"
                                        onkeydown="return false">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Schedule -->
                    <div class="form-section mb-5">
                        <h5 class="form-section-title">
                            <i class="fas fa-calendar-alt me-2"></i>Lịch trình
                        </h5>
                        <div id="schedule-container">
                            <div class="schedule-day mb-4">
                                <h6>NGÀY 1</h6>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="title1"
                                        placeholder="Nhập tiêu đề ngày (VD: TP.HCM – HÀ NỘI (Ăn trưa, chiều))">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="day1" rows="3" placeholder="Nhập chi tiết lịch trình ngày 1..."></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="addDay()">
                            <i class="fas fa-plus me-2"></i>Add Day
                        </button>
                    </div>

                    <!-- Additional Information -->
                    <div class="form-section mb-5">
                        <h5 class="form-section-title">
                            <i class="fas fa-cog me-2"></i>Additional Information
                        </h5>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Hotel</label>
                                    <select class="form-control" name="hotel_id">
                                        <option value="">-- Choose Hotel --</option>
                                        @foreach ($hotel as $hotel)
                                            <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Phương tiện</label>
                                    <select class="form-control" name="vehicle_id">
                                        <option value="">-- Choose Transport --</option>
                                        @foreach ($vehicle as $vehicle)
                                            <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Price</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="price"
                                            placeholder="Enter price">
                                        <span class="input-group-text"
                                            style="padding-left: 10px; padding-right: 10px;">VND</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Create Tour
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .form-section {
            background: #fff;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 0 20px rgba(0, 0, 0, .05);
        }

        .form-section-title {
            color: #344767;
            font-weight: 600;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #eee;
        }

        .form-label {
            color: #344767;
            font-weight: 600;
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
        }

        .form-control {
            border: 1px solid #d2d6da;
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            border-color: #e91e63;
            box-shadow: 0 0 0 2px rgba(233, 30, 99, .25);
        }

        .drop-zone {
            max-width: 100%;
            height: 200px;
            padding: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            cursor: pointer;
            color: #666;
            border: 2px dashed #ddd;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .drop-zone:hover {
            border-color: #e91e63;
            color: #e91e63;
        }

        .drop-zone__input {
            display: none;
        }

        .drop-zone__thumb {
            width: 100%;
            height: 100%;
            border-radius: 10px;
            overflow: hidden;
            background-color: #cccccc;
            background-size: cover;
            position: relative;
        }

        .btn-primary {
            background: #e91e63;
            border: none;
            box-shadow: 0 4px 6px rgba(233, 30, 99, .11), 0 1px 3px rgba(0, 0, 0, .08);
        }

        .btn-primary:hover {
            background: #d81b60;
            transform: translateY(-1px);
        }

        .schedule-day {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            border: 1px solid #eee;
            transition: all 0.3s ease;
        }

        .schedule-day:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, .05);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .schedule-day {
            animation: fadeIn 0.5s ease-out;
        }
    </style>

@endsection

@section('custom-js')
    <script>
        function addDay() {
            const container = document.getElementById('schedule-container');
            const dayCount = container.children.length + 1;

            const dayElement = document.createElement('div');
            dayElement.className = 'schedule-day';
            dayElement.innerHTML = `
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="mb-0">Ngày ${dayCount}</h6>
            ${dayCount > 1 ? `
                            <button type="button" class="btn btn-danger btn-sm" onclick="this.closest('.schedule-day').remove()">
                                <i class="fas fa-trash"></i>
                            </button>
                        ` : ''}
        </div>
        <div class="form-group mb-3">
            <input type="text" class="form-control" name="title${dayCount}" placeholder="Day title">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="day${dayCount}" rows="3" placeholder="Day description"></textarea>
        </div>
    `;

            container.appendChild(dayElement);
        }

        // Add first day by default
        document.addEventListener('DOMContentLoaded', () => {
            addDay();
        });

        // Handle drag and drop for images
        document.querySelectorAll('.drop-zone__input').forEach(inputElement => {
            const dropZoneElement = inputElement.closest('.drop-zone');

            dropZoneElement.addEventListener('click', e => {
                inputElement.click();
            });

            inputElement.addEventListener('change', e => {
                if (inputElement.files.length) {
                    updateThumbnail(dropZoneElement, inputElement.files[0]);
                }
            });

            dropZoneElement.addEventListener('dragover', e => {
                e.preventDefault();
                dropZoneElement.classList.add('drop-zone--over');
            });

            ['dragleave', 'dragend'].forEach(type => {
                dropZoneElement.addEventListener(type, e => {
                    dropZoneElement.classList.remove('drop-zone--over');
                });
            });

            dropZoneElement.addEventListener('drop', e => {
                e.preventDefault();
                if (e.dataTransfer.files.length) {
                    inputElement.files = e.dataTransfer.files;
                    updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
                }
                dropZoneElement.classList.remove('drop-zone--over');
            });
        });

        function updateThumbnail(dropZoneElement, file) {
            let thumbnailElement = dropZoneElement.querySelector('.drop-zone__thumb');

            if (dropZoneElement.querySelector('.drop-zone__prompt')) {
                dropZoneElement.querySelector('.drop-zone__prompt').remove();
            }

            if (!thumbnailElement) {
                thumbnailElement = document.createElement('div');
                thumbnailElement.classList.add('drop-zone__thumb');
                dropZoneElement.appendChild(thumbnailElement);
            }

            thumbnailElement.dataset.label = file.name;

            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = () => {
                    thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
                };
            }
        }

        // Thêm function để set min date
        function setMinDepartureDate() {
            const today = new Date();
            const minDate = new Date(today);
            minDate.setDate(today.getDate() + 2); // Thêm 2 ngày từ ngày hiện tại

            // Format date thành YYYY-MM-DD
            const formattedDate = minDate.toISOString().split('T')[0];

            // Set min date cho input
            const departureDateInput = document.getElementById('departure_date');
            departureDateInput.min = formattedDate;

            // Nếu ngày đã chọn nhỏ hơn ngày tối thiểu, reset về null
            if (departureDateInput.value && departureDateInput.value < formattedDate) {
                departureDateInput.value = '';
            }
        }

        // Chạy function khi load trang
        document.addEventListener('DOMContentLoaded', () => {
            setMinDepartureDate();

            // Cập nhật min date mỗi khi qua ngày mới
            setInterval(setMinDepartureDate, 1000 * 60 * 60); // Cập nhật mỗi giờ
        });

        // Thêm validation khi chọn ngày
        document.getElementById('departure_date').addEventListener('change', function() {
            const selectedDate = new Date(this.value);
            const today = new Date();
            const minDate = new Date(today);
            minDate.setDate(today.getDate() + 2);

            if (selectedDate < minDate) {
                alert('Vui lòng chọn ngày khởi hành cách ít nhất 2 ngày từ hôm nay');
                this.value = '';
            }
        });
    </script>
@endsection
