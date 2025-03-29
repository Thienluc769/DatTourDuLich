@extends('admin.parentLayouts.master')
@section('title', 'vivuvn | Enterprise')
@section('main_content')

    <div class="card">
        @if (session('message'))
            <h1 class="text-primary">{{ session('message') }}</h1>
        @endif

        <div class="card-header d-flex justify-content-between align-items-center">
            <h1>Enterprise List</h1>

            <!-- Form tìm kiếm -->
            <form action="{{ route('enterprises-index') }}" method="GET">
                <div class="input-group" style="width: 300px;">
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
            <table class="table table-hover">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Tax Code</th>
                    <th>Email</th>
                    <th>Representative</th>
                    <th>Status</th>
                    <th>Action</th>


                </tr>
                @foreach ($enterprises as $enterprise)
                    <tr>
                        <td>{{ $enterprise->id }}</td>
                        <td>{{ $enterprise->enterprise_info->name }}</td>
                        <td>{{ $enterprise->enterprise_info->tax_code }}</td>
                        <td>{{ $enterprise->enterprise_info->email }}</td>
                        <td>{{ $enterprise->enterprise_info->representative->name }}</td>
                        <td style="color: #4caf50">{{ $enterprise->status->name }}</td>
                        <td style="width :80px"">
                            <a href="{{ route('enterprises-detail', $enterprise->id) }}" class="btn btn-info">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $enterprises->links() }}
        </div>
    </div>

@endsection
