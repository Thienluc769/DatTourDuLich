@extends('enterprise.parentLayouts.master')
@section('title', 'vivuvn | Invoice')
@section('main_content')
    <div class="card">
        <h1>Invoice Detail</h1>
        <?php
        //dd($orderDetail->customer->name);
        ?>
        <div>
            <div style="width:600px; float: left;">
                <h4 style="color: #e91e63">Customer Information</h4>
                <div class="input-group input-group-static mb-4">
                    <label class="col-4">Name</label>
                    <label>{{ $orderDetail->customer->name }}</label>
                </div>
                <div class="input-group input-group-static mb-4">
                    <label class="col-4">Year of birth</label>
                    <label>{{ $orderDetail->customer->year_of_birth }}</label>
                </div>
                <div class="input-group input-group-static mb-4">
                    <label class="col-4">Phone</label>
                    <label>{{ $orderDetail->customer->phone }}</label>
                </div>
                <div class="input-group input-group-static mb-4">
                    <label class="col-4">Email</label>
                    <label>{{ $orderDetail->customer->email }}</label>

                </div>
                <div class="input-group input-group-static mb-4">
                    <label class="col-4">Address</label>
                    <label>{{ $orderDetail->customer->address }}</label>
                </div>
            </div>

            <div style="width:600px; float: left;">
                <h4 style="color: #e91e63">Invoice Detail</h4>
                <div class="input-group input-group-static mb-4">
                    <label class="col-4">Create at</label>
                    <label>{{ $orderDetail->order->create_at }}</label>
                </div>
                <div class="input-group input-group-static mb-4">
                    <label class="col-4">Id</label>
                    <label>{{ $orderDetail->order->id }}</label>
                </div>
                <div class="input-group input-group-static mb-4">
                    <label class="col-4">Tour name</label>
                    <label>{{ $orderDetail->tour->name }}</label>
                </div>
                <div class="input-group input-group-static mb-4">
                    <label class="col-4">Adult</label>
                    <label>{{ $customerDetail->adult }}</label>
                </div>
                <div class="input-group input-group-static mb-4">
                    <label class="col-4">Children</label>
                    <label>{{ $customerDetail->children }}</label>

                </div>
                <div class="input-group input-group-static mb-4">
                    <label class="col-4">Total price</label>
                    <label>{{ number_format($orderDetail->order->total_price) }}₫</label>
                </div>
                <div class="input-group input-group-static mb-4">
                    <label class="col-4">Star day</label>
                    <label>{{ $orderDetail->order->booking_date }}</label>
                </div>
            </div>
        </div>
        <div>
            <a href="{{ route('invoice-index') }}" class="btn btn-submit btn-primary">return</a>
        </div>

    </div>


@endsection
