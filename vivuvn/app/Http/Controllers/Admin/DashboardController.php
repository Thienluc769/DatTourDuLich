<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\enterprise;
use App\Models\tour;
class DashboardController extends Controller
{
    public function index()
    {
        \Log::info('Dashboard accessed');
        $tourCount = tour::where('status_id', 1)->count();
        $enterpriseCount = enterprise::where('status_id', 1)->count();
        return view('admin.layouts.dashboard.index', compact('tourCount', 'enterpriseCount'));
    }

    public function login()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        if(Auth::guard('admin')->attempt([
            'email'=>$request->input('username'),
            'password'=> $request->input('password')
        ]))
        {
            return redirect()->route('admin-dashboard');
        }
        return redirect()->back()->with('err','Thông tin đăng nhập sai');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('user-login');
    }
}
