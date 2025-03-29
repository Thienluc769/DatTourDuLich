<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\enterprise;
use App\Models\tour;
use App\Models\schedule;

class ReviewTourController extends Controller
{
    public function index(Request $request)
    {   
       
        $search = $request->input('search');
        
        $tours = tour::with(['status', 'enterprise.enterprise_info'])
            ->where('status_id', 1)
            ->whereHas('enterprise.enterprise_info', function($query) use ($search) {
                if($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                }
            })
            ->latest('id')
            ->paginate(5);
            $tourCount = tour::where('status_id', 1)->count();
            $enterpriseCount = enterprise::where('status_id', 1)->count();
        return view('admin.layouts.review-tour.index', compact('tours', 'tourCount', 'enterpriseCount'));
    }

    public function show($id)
    {   
        $tourCount = tour::where('status_id', 1)->count();
        $enterpriseCount = enterprise::where('status_id', 1)->count();
        $tour = tour::findOrFail($id);
        $schedule = schedule::where('id', $tour->schedule_id)->first();
        
        return view('admin.layouts.review-tour.details', compact('tour', 'tourCount', 'enterpriseCount', 'schedule'));
    }

    public function approve($id)
    {
        $tour = tour::findOrFail($id);
        $tour->update([
            'status_id' => 2
        ]);
        return redirect()->back()->with('message', 'Approved tour');
    }

    public function reject($id)
    {
        $tour = tour::findOrFail($id);
        $tour->update([
            'status_id' => 3
        ]);
        return redirect()->back()->with('message', 'Rejected enterprise');
    }
} 