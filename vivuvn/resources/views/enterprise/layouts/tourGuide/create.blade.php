@extends('enterprise.parentLayouts.master')
@section('title', 'vivuvn | Tour guide')
@section('main_content')
    <div class="card">
        <h1>Tour Guide Create</h1>
        <div>
            <form action="{{ route('tourGuide-store') }}" method="post">
                @csrf

                <div class="input-group input-group-static mb-4">
                    <label>Name</label>
                    <input type="text" value="{{ old('name') }}" name="name" class="form-control">
                </div>


                <label class="ms-0">Gender</label>
                <select name="gender_id" class="form-control">
                    <option value=""></option>
                    @foreach ($gender as $gender)
                        <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                    @endforeach
                </select>


                <div class="input-group input-group-static mb-4">
                    <label>Year_of_birth</label>
                    <input type="number" value="{{ old('tour_time') }}" name="year_of_birth" class="form-control">
                </div>

                <div class="input-group input-group-static mb-4">
                    <label>phone</label>
                    <input type="number" value="" name="phone" class="form-control">
                </div>

                <button type="submit" class="btn btn-submit btn-primary">Submit</button>
            </form>
        </div>
    </div>


@endsection
