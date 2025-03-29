@extends('enterprise.parentLayouts.master')
@section('title', 'vivuvn | Hotel')
@section('main_content')

    <div class="card">

        @if (session('message'))
            <h1 class="text-primary">{{ session('message') }}</h1>
        @endif
        <h1>
            Hotel List
        </h1>
        <div>
            <a href="{{ route('hotel-create') }}" class="btn btn-primary">create</a>
        </div>
        <div>
            <table class="table table-hover">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Star rating</th>
                    <th>Action</th>
                    <th></th>

                </tr>
                @foreach ($hotel as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->star_rating }}/5&#9733;</td>
                        <td style="width :60px"">
                            <a href="{{ route('hotel-edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('hotel-soft_destroy', $item->id) }}" method="post">
                                @csrf
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $hotel->links() }}
            <a href="{{ route('hotel-trash') }}" class="btn btn-secondary">Trash</a>
        </div>

    </div>

@endsection
