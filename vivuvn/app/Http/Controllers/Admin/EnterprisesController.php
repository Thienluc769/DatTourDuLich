<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\enterprise;
use App\Models\tour;
class EnterprisesController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $enterprises = enterprise::with(['status', 'enterprise_info.representative'])
            ->where('status_id', 2)
            ->whereHas('enterprise_info', function($query) use ($search) {
                if($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                }
            })
            ->latest('id')
            ->paginate(5);

        $enterpriseCount = enterprise::where('status_id', 1)->count();
        $tourCount = tour::where('status_id', 1)->count();

        return view('admin.layouts.enterprises.index', compact('enterprises', 'enterpriseCount', 'tourCount'));
    }
}

