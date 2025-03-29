@extends('enterprise.parentLayouts.master')
@section('title', 'vivuvn | Hotel')
@section('main_content')
    <div class="card">

        @if (session('message'))
            <h1 class="text-primary">{{ session('message') }}</h1>
        @endif

        <h1>Hotel Create</h1>
        <div>
            <form action="{{ route('hotel-store') }}" method="post">
                @csrf

                <div class="d-flex align-items-center gap-3">
                    <div class="input-group input-group-static mb-4 w-50 ">
                        <label>Category</label>
                        <select name="category" class="form-control">
                            <option value="">-- Choose Category --</option>
                            @foreach ($category as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="button" id="add-day" class="btn btn-submit btn-primary mb-4">
                        <i class="fas fa-plus-circle"></i> ADD NEW CATEGORY
                    </button>
                </div>

                <div class="input-group input-group-static mb-4">
                    <label>Name</label>
                    <input type="text" value="{{ old('name') }}" name="name" class="form-control">
                </div>

                <div class="input-group input-group-static mb-4">
                    <label>Star rating</label>
                    <input type="text" value="{{ old('tour_time') }}" name="star_rating" class="form-control">
                </div>

                <button type="submit" class="btn btn-submit btn-primary">Submit</button>
            </form>

        </div>
    </div>

    <div class="modal fade" id="categoryModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('category-create') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group-static mb-4">
                            <label>Category Name</label>
                            <input type="text" name="category_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('add-day').addEventListener('click', function() {
            var modal = new bootstrap.Modal(document.getElementById('categoryModal'));
            modal.show();
        });

        // document.getElementById('saveCategory').addEventListener('click', function() {
        //     // Chỉ đóng modal
        //     bootstrap.Modal.getInstance(document.getElementById('categoryModal')).hide();
        // });
    </script>
@endpush
