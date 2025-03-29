@extends('enterprise.parentLayouts.master')
@section('title', 'vivuvn | Tour')
@section('main_content')

    <div class="card">

        @if (session('message'))
            <h1 class="text-primary">{{ session('message') }}</h1>
        @endif
        <h1>
            Tour Trash
        </h1>
        <div>
            <table class="table table-hover">
                <tr>
                    <th>Id</th>
                    <th>Tour</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                @foreach ($tour as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ number_format($item->price) }}₫</td>
                        <td>
                            <a href="{{ route('product-restore', $item->id) }}" class="btn btn-success">Restore</a>
                            <a href="{{ route('product-destroy', $item->id) }}"
                                onclick="return confirm('are you sure you want to permanently delete ?')"
                                class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>

@endsection
