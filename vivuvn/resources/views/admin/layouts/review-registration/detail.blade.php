@extends('admin.parentLayouts.master')
@section('title', 'vivuvn | Enterprise')
@section('main_content')
<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Enterprise Details</h4>
            <div>
                <a href="{{ route('enterprise-tours', $enterprise->id) }}" class="btn btn-info me-2">
                    <i class="material-icons opacity-10 me-2">list</i>
                    View tour list
                </a>
                <a href="javascript:history.back()" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="card-body">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="enterprise-info mb-4">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="mb-3">Enterprise Information</h5>
                        <p><strong>Enterprise Name:</strong> {{ $enterprise->enterprise_info->name }}</p>
                        <p><strong>Tax Code:</strong> {{ $enterprise->enterprise_info->tax_code }}</p>
                        <p><strong>Address:</strong> {{ $enterprise->enterprise_info->address }}</p>
                        <p><strong>Email:</strong> {{ $enterprise->enterprise_info->email }}</p>
                        <p><strong>Landline:</strong> {{ $enterprise->enterprise_info->landline }}</p>
                        <p><strong>Status:</strong>
                            <span class="badge {{ $enterprise->status->id == 1 ? 'bg-warning' : 'bg-success' }}">
                                {{ $enterprise->status->name }}
                            </span>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="mb-3">Representative Information</h5>
                        <p><strong>Name:</strong> {{ $enterprise->enterprise_info->representative->name }}</p>
                        <p><strong>Position:</strong> {{ $enterprise->enterprise_info->representative->position }}</p>
                        <p><strong>Phone Number:</strong>
                            {{ $enterprise->enterprise_info->representative->phone_number }}</p>
                        <p><strong>Email:</strong> {{ $enterprise->enterprise_info->representative->email }}</p>
                    </div>
                </div>
            </div>

            <div class="tour-stats mt-4 p-3 bg-light rounded">
                <div class="d-flex align-items-center">
                    <i class="material-icons text-info me-2">tour</i>
                    <div>
                        <h6 class="mb-0">Number of tours approved</h6>
                        <h4 class="mb-0 text-info">{{ $approvedTourCount }} tour</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
    }

    .enterprise-info p {
        margin-bottom: 0.75rem;
        font-size: 0.95rem;
    }

    .tour-stats {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
    }

    .badge {
        font-size: 0.875rem;
        padding: 0.5em 0.75em;
    }
</style>
@endsection