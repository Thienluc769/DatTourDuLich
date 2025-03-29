@extends('admin.parentLayouts.master')
@section('title', 'vivuvn | Review Registration')
@section('main_content')

<div class="card">
    @if (session('message'))
        <h1 class="text-primary">{{ session('message') }}</h1>
    @endif

    <div class="card-header d-flex justify-content-between align-items-center">
        <h1>List Registration</h1>
        <form action="{{ route('review-registration') }}" method="GET">
            <div class="input-group" style="width: 300px;">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Tìm kiếm..."
                    value="{{ request('search') }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th width="5%">Id</th>
                    <th width="25%"> Name</th>
                    <th width="15%">Tax Code</th>
                    <th width="20%">Email</th>
                    <th width="20%">Representative</th>
                    <th width="7%">Status</th>
                    <th width="8%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($enterprises as $enterprise)
                    <tr>
                        <td>{{ $enterprise->id }}</td>
                        <td style="white-space: normal; word-break: break-word;">
                            {{ $enterprise->enterprise_info->name }}
                        </td>
                        <td>{{ $enterprise->enterprise_info->tax_code }}</td>
                        <td style="white-space: normal; word-break: break-word;">
                            {{ $enterprise->enterprise_info->email }}
                        </td>
                        <td style="white-space: normal; word-break: break-word;">
                            {{ $enterprise->enterprise_info->representative->name }}
                        </td>
                        <td style="color: #fb8c00">{{ $enterprise->status->name }}</td>
                        <td>
                            <div class="d-flex gap-1" style="min-width: 200px;">
                                <a href="{{ route('registration-detail', $enterprise->id) }}"
                                    class="btn btn-info btn-sm">Details</a>

                                <form action="{{ route('registration-approve', $enterprise->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                </form>

                                <form action="{{ route('registration-reject', $enterprise->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $enterprises->links() }}
        </div>
    </div>
</div>

@endsection