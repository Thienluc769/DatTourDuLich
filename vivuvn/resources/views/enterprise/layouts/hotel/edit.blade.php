@extends('enterprise.parentLayouts.master')
@section('title', 'vivuvn | Hotel')
@section('main_content')
    <div class="card">
        <h1>Hotel Edit</h1>
        <div>
            <form action="{{ route('product-update', $hotel->id) }}" method="post" enctype="multipart/form-data">
                @csrf


                <div class="input-group input-group-static mb-4">
                    <label>Name</label>
                    <input type="text" value="{{ $hotel->name }}" name="name" class="form-control">
                </div>

                <div class="input-group input-group-static mb-4">
                    <label>Star rating</label>
                    <input type="text" value="{{ $hotel->star_rating }}" name="tour_time" class="form-control">
                </div>

                <button type="submit" class="btn btn-submit btn-primary">Submit</button>
            </form>
        </div>
    </div>


@endsection
