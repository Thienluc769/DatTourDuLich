@extends('enterprise.parentLayouts.master')
@section('title', 'vivuvn | Hotel')
@section('main_content')

    <div class="card">

        @if (session('message'))
            <h1 class="text-primary">{{ session('message') }}</h1>
        @endif
        <h1>
            Hotel Trash
        </h1>
        <div>
            <table class="table table-hover">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Star rating</th>
                    <th>Action</th>
                </tr>
                @foreach ($hotel as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->star_rating }}/5&#9733;</td>
                        <td>
                            <a href="{{ route('hotel-restore', $item->id) }}" class="btn btn-success">Restore</a>
                            <a href="{{ route('hotel-destroy', $item->id) }}"
                                onclick="return confirm('are you sure you want to permanently delete ?')"
                                class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>

@endsection
