@extends('enterprise.parentLayouts.master')
@section('title', 'vivuvn | Tour guide')
@section('main_content')

    <div class="card">

        @if (session('message'))
            <h1 class="text-primary">{{ session('message') }}</h1>
        @endif
        <h1>
            Tour Guide Trash
        </h1>
        <div>
            <table class="table table-hover">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Year of birth</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
                @foreach ($tourGuide as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->gender->name }}</td>
                        <td>{{ $item->year_of_birth }}</td>
                        <td>{{ $item->phone }}</td>
                        <td style="width :60px"">
                            <a href="{{ route('tourGuide-restore', $item->id) }}" class="btn btn-success">Restore</a>
                            <a href="{{ route('tourGuide-destroy', $item->id) }}"
                                onclick="return confirm('are you sure you want to permanently delete ?')"
                                class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>

@endsection
