@extends('enterprise.parentLayouts.master')
@section('title', 'vivuvn | Tour guide')
@section('main_content')

    <div class="card">

        @if (session('message'))
            <h1 class="text-primary">{{ session('message') }}</h1>
        @endif
        <h1>
            Tour Guide List
        </h1>
        <div>
            <a href="{{ route('tourGuide-create') }}" class="btn btn-primary">create</a>
        </div>
        <div>
            <table class="table table-hover">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Year of birth</th>
                    <th>Phone</th>
                    <th>Action</th>
                    <th></th>

                </tr>

                @foreach ($tourGuide as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->gender->name }}</td>
                        <td>{{ $item->year_of_birth }}</td>
                        <td>{{ $item->phone }}</td>
                        <td style="width :60px"">
                            <a href="{{ route('tourGuide-edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('tourGuide-soft_destroy', $item->id) }}" method="post">
                                @csrf
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $tourGuide->links() }}
            <a href="{{ route('tourGuide-trash') }}" class="btn btn-secondary">Trash</a>
        </div>

    </div>

@endsection
