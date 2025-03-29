@extends('enterprise.parentLayouts.master')
@section('title', 'vivuvn | Tour')
@section('main_content')

    <div class="card">

        @if (session('message'))
            <h1 class="text-primary">{{ session('message') }}</h1>
        @endif
        <h1>
            Approved Tours
        </h1>
        <div>
            <a href="{{ route('product-create') }}" class="btn btn-primary">create</a>
        </div>
        <div>
            <table class="table table-hover">
                <tr>
                    <th>Id</th>
                    <th>Tour</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th></th>

                </tr>
                @foreach ($Approved_tour as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ number_format($item->price) }}₫</td>
                        <td style="color:#4caf50">{{ $item->status->name }}</td>
                        <td style="width :80px">
                            <a href="{{ route('product-edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('product-show', $item->id) }}" class="btn btn-info">Detail</a>

                        </td>
                        <td>
                            <form action="{{ route('product-soft_destroy', $item->id) }}" method="post">
                                @csrf
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $Approved_tour->links() }}
            <a href="{{ route('product-trash') }}" class="btn btn-secondary">Trash</a>
        </div>

    </div>
    <div style="padding: 10px;"></div>
    <div class="card">
    
        <h1>
            Pending Tours
        </h1>
        
        <div>
            <table class="table table-hover">
                <tr>
                    <th>Id</th>
                    <th>Tour</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th></th>
    
                </tr>
                @foreach ($Pending_tour as $item)
                    <tr >
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ number_format($item->price) }}₫</td>
                        <td style="color:#fb8c00">{{ $item->status->name }}</td>
                        <td style="width :80px">
                           
                            <a href="{{ route('product-show', $item->id) }}" class="btn btn-info">Detail</a>
    
                        </td>
                        <td>
                            <form action="{{ route('pending-delete', $item->id) }}" method="post" onsubmit="return confirmDelete()">
                                @csrf
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $Pending_tour->links() }}
        </div>
    
    </div>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this tour?");
        }
    </script>
@endsection




