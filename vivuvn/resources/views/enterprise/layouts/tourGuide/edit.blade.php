@extends('enterprise.parentLayouts.master')
@section('title', 'vivuvn | Tour guide')
@section('main_content')
    <div class="card">
        <h1>Tour Guide Edit</h1>
        <div>
            <form action="{{ route('tourGuide-update', $tourGuide->id) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="input-group input-group-static mb-4">
                    <label>Name</label>
                    <input type="text" value="{{ $tourGuide->name }}" name="name" class="form-control">
                </div>

                <div class="input-group input-group-static mb-4">
                    <label class="ms-0">Gender</label>
                    <select name="gender_id" class="form-control">
                        <option value=""></option>
                        @foreach ($gender as $gender)
                            <option value="{{ $gender->id }}"
                                {{ $tourGuide->gender_id == $gender->id ? 'selected' : '' }}>
                                {{ $gender->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group input-group-static mb-4">
                    <label>Year of birth</label>
                    <input type="number" value="{{ $tourGuide->year_of_birth }}" name="year_of_birth" class="form-control">
                </div>

                <div class="input-group input-group-static mb-4">
                    <label>Phone</label>
                    <input type="number" value="{{ $tourGuide->phone }}" name="phone" class="form-control">
                </div>


                <button type="submit" class="btn btn-submit btn-primary">Submit</button>
            </form>
        </div>
    </div>


@endsection
