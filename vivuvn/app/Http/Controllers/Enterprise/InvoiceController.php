<?php

namespace App\Http\Controllers\Enterprise;

use App\Http\Controllers\Controller;
use App\Models\customer;
use App\Models\customer_detail;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\order_detail;
use App\Models\tour_guide;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lấy enterprise_id của enterprise hiện tại
        $enterpriseId = Auth::guard('enterprises')->id();
    
        // Lấy tourGuide của enterprise hiện tại
        $tourGuide = tour_guide::where('enterprise_id', $enterpriseId)->get();
        
        // Lấy orderDetail có status_id là 1 và tour thuộc enterprise hiện tại
        $orderDetailStatus1 = order_detail::with([
            'order.payment_method',
            'customer',
            'tour',
        ])
        ->whereHas('order', function($query) {
            $query->where('status_id', 1);
        })
        ->whereHas('tour', function($query) use ($enterpriseId) {
            $query->where('enterprise_id', $enterpriseId);
        })
        ->latest('id')
        ->paginate(4);
        
        // Lấy orderDetail có status_id là 2 và tour thuộc enterprise hiện tại
        $orderDetailStatus2 = order_detail::with([
            'order.payment_method',
            'customer',
            'tour',
        ])
        ->whereHas('order', function($query) {
            $query->where('status_id', 2);
        })
        ->whereHas('tour', function($query) use ($enterpriseId) {
            $query->where('enterprise_id', $enterpriseId);
        })
        ->latest('id')
        ->paginate(4);
        
        return view('enterprise.layouts.invoice.index', [
            'orderDetailStatus1' => $orderDetailStatus1,
            'orderDetailStatus2' => $orderDetailStatus2,
            'tourGuide' => $tourGuide
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $orderDetail= order_detail::where('id',$id)->with([
            'order.payment_method',
            'customer',
            'tour'
        ])->first();
        $customerDetail= customer_detail::where('customer_id',$orderDetail->customer->id)->first();
        //dd($customerDetail);
        return view('enterprise.layouts.invoice.details',['orderDetail'=>$orderDetail,'customerDetail'=>$customerDetail]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function invoice_approve(Request $request, $id)
    {
        $order = order::where('id', $id);
        $order->update([
            'status_id' => 2,
            'tourGuide_id' => $request->input('tourGuide_id'),
        ]);
        return redirect(route('invoice-index'))->with(['message' => 'Approved']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function invoice_reject(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
