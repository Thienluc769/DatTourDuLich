@extends('admin.parentLayouts.master')
@section('title', 'vivuvn | Review Tour')
@section('main_content')

    <div class="card">
        @if (session('message'))
            <h1 class="text-primary">{{ session('message') }}</h1>
        @endif
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1>
                Tour Review List
            </h1>

            <form action="{{ route('review-tour') }}" method="GET">
                <div class="input-group" style="width: 300px;"> <!-- Điều chỉnh width -->
                    <input type="text" name="search" class="form-control form-control-sm"
                        placeholder="Tìm kiếm theo tên công ty..." value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div>
            <table class="table table-hover" id="tour-table">
                <tr>
                    <th>Id</th>
                    <th>Tour</th>
                    <th>Enterprise</th>
                    <th>Price</th>
                    <th>Departure Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                @foreach ($tours as $tour)
                <tr>
                    <td>{{ $tour->id }}</td>
                    <td>{{ $tour->name }}</td>
                    <td>{{ $tour->enterprise->enterprise_info->name }}</td>
                    <td>{{ number_format($tour->price) }}</td>
                    <td>{{ date('d/m/Y', strtotime($tour->departure_date)) }}</td>
                    <td style="color: #fb8c00">{{ $tour->status->name }}</td>
                    <td style="width: 200px">
                        <a href="{{ route('review-tour-details', $tour->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <form action="{{ route('review-tour-approve', $tour->id) }}" method="POST"
                            style="display:inline">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Approve</button>
                        </form>
                        <form action="{{ route('review-tour-reject', $tour->id) }}" method="POST"
                            style="display:inline">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                        </form>
                        
                    </td>
                </tr>
                @endforeach 
            </table>
            {{ $tours->links() }}
        </div>
    </div>

@endsection
