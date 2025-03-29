@extends('admin.parentLayouts.master')
@section('title', 'vivuvn | Tour Details')

@section('main_content')
<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header p-3">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Tour Details</h3>
                <a href="javascript:history.back()" class="btn btn-primary btn-smmb-0">
                    <i class="fas fa-arrow-left me-2"></i>Return
                </a>
            </div>
        </div>
        <div class="card-body p-4">
            {{-- Image Gallery Section --}}
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header p-3">
                            <h6 class="mb-0">Main Image</h6>
                        </div>
                        <div class="card-body p-3">
                            <img src="{{ asset('storage/products') }}/{{ $tour->images[0]->name }}"
                                class="img-fluid rounded shadow" alt="Main Tour Image">
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card h-100">
                        <div class="card-header p-3">
                            <h6 class="mb-0">Gallery</h6>
                        </div>
                        <div class="card-body p-3">
                            <div class="row g-3">
                                @for ($i = 1; $i < count($tour->images); $i++)
                                    <div class="col-md-4">
                                        <img src="{{ asset('storage/products') }}/{{ $tour->images[$i]->name }}"
                                            class="img-fluid rounded shadow" alt="Tour Image {{ $i }}">
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tour Information Section --}}
            <div class="row">
                <div class="col-12">
                    {{-- Basic Info Card --}}
                    <div class="card mb-4">
                        <div class="card-header p-3">
                            <h6 class="mb-0">Basic Information</h6>
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <p class="text-sm mb-1 text-muted">Category</p>
                                    <p class="mb-0 font-weight-bold">{{ $tour->category->name }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <p class="text-sm mb-1 text-muted">Tour Name</p>
                                    <p class="mb-0 font-weight-bold">{{ $tour->name }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <p class="text-sm mb-1 text-muted">Tour Duration</p>
                                    <p class="mb-0 font-weight-bold">{{ $tour->tour_time }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <p class="text-sm mb-1 text-muted">Departure Date</p>
                                    <p class="mb-0 font-weight-bold">
                                        {{ date('d/m/Y', strtotime($tour->departure_date)) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Tour Details Sidebar - Move to bottom on full width --}}
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header p-3">
                                <h6 class="mb-0">Tour Details</h6>
                            </div>
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <div class="info-item">
                                            <p class="text-sm mb-1 text-muted">Hotel</p>
                                            <p class="mb-0 font-weight-bold">{{ $tour->hotel->name }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="info-item">
                                            <p class="text-sm mb-1 text-muted">Vehicle</p>
                                            <p class="mb-0 font-weight-bold">{{ $tour->vehicle->name }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="info-item">
                                            <p class="text-sm mb-1 text-muted">Status</p>
                                            <span
                                                class="badge bg-{{ $tour->status->name == 'Approved' ? 'success' : 'warning' }}">
                                                {{ $tour->status->name }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="info-item">
                                            <p class="text-sm mb-1 text-muted">Price</p>
                                            <h4 class="text-primary mb-0">{{ number_format($tour->price) }}₫</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Description Card --}}
                    <div class="card mb-4">
                        <div class="card-header p-3">
                            <h6 class="mb-0">Description</h6>
                        </div>
                        <div class="card-body p-3">
                            <p class="text-justify mb-0">{{ $tour->description }}</p>
                        </div>
                    </div>

                    {{-- Schedule Card with Accordion --}}
                    <div class="card mb-4">
                        <div class="card-header p-3">
                            <h6 class="mb-0">Tour Schedule</h6>
                        </div>
                        <div class="card-body p-3">
                            @if($schedule)
                                <div class="accordion" id="scheduleAccordion">
                                    @foreach($schedule->getScheduleData() as $index => $item)
                                        <div class="accordion-item mb-3">
                                            <h2 class="accordion-header" id="heading{{ $index }}">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                                    aria-expanded="false" aria-controls="collapse{{ $index }}">
                                                    <span class="badge bg-gradient-primary me-3">Day {{ $index + 1 }}</span>
                                                    <strong>{{ $item['title'] }}</strong>
                                                </button>
                                            </h2>
                                            <div id="collapse{{ $index }}" class="accordion-collapse collapse"
                                                aria-labelledby="heading{{ $index }}" data-bs-parent="#scheduleAccordion">
                                                <div class="accordion-body">
                                                    <p class="schedule-description mb-0">{{ $item['day'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<style>
    .accordion-item {
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: 0.5rem;
        overflow: hidden;
    }

    .accordion-button {
        padding: 1rem 1.5rem;
        font-size: 1rem;
        color: #344767;
        background-color: #fff;
        box-shadow: none;
    }

    .accordion-button:not(.collapsed) {
        color: #344767;
        background-color: #f8f9fa;
        box-shadow: none;
    }

    .accordion-button:focus {
        box-shadow: none;
        border-color: rgba(0, 0, 0, .125);
    }

    .accordion-body {
        padding: 1.5rem;
        background-color: #fff;
    }

    .schedule-description {
        color: #67748e;
        line-height: 1.6;
        text-align: justify;
        white-space: pre-line;
    }

    .info-item {
        padding: 1.5rem;
        border-radius: 0.5rem;
        background-color: #f8f9fa;
        height: 100%;
    }

    .badge {
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
    }

    /* Container adjustments */
    .container-fluid {
        max-width: 100%;
        padding-right: 30px;
        padding-left: 30px;
    }

    .card {
        margin-bottom: 30px;
    }

    .card-body {
        padding: 2rem !important;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .container-fluid {
            padding-right: 15px;
            padding-left: 15px;
        }

        .card-body {
            padding: 1.5rem !important;
        }

        .info-item {
            padding: 1rem;
        }
    }
</style>
@endsection