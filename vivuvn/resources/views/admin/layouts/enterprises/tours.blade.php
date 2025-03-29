@extends('admin.parentLayouts.master')
@section('title', 'vivuvn | Enterprise Tours')
@section('main_content')
<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Tour list of {{ $enterprise->enterprise_info->name }}</h4>
            <a href="javascript:history.back()" class="btn btn-primary">Back</a>
        </div>
        <div class="card-body">
            @if($tours->isEmpty())
                <div class="alert alert-info">
                    No tour found.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tour Name</th>
                                <th>Time</th>
                                <th>Departure Date</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tours as $tour)
                                <tr>
                                    <td>{{ $tour->id }}</td>
                                    <td>{{ $tour->name }}</td>
                                    <td>{{ $tour->tour_time }}</td>
                                    <td>{{ $tour->departure_date }}</td>
                                    <td>{{ number_format($tour->price) }}đ</td>
                                    <td>
                                        <span class="badge bg-success">Approved</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('review-tour-details', $tour->id) }}" class="btn btn-info ">

                                            Details
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .card {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
    }

    .table th {
        font-weight: 600;
        padding: 12px;
    }

    .table td {
        padding: 12px;
        vertical-align: middle;
    }

    .badge {
        font-size: 0.875rem;
        padding: 0.5em 0.75em;
    }

    .btn-sm {
        padding: 0.25rem 0.5rem;
    }

    .material-icons {
        font-size: 18px;
        vertical-align: middle;
        margin-right: 2px;
    }
</style>
@endsection