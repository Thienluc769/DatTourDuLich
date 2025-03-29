<?php

namespace App\Http\Controllers\Enterprise;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\enterprise;
use App\Models\enterprise_info;
use App\Models\status;
use App\Models\representative;
use Illuminate\Support\Facades\Auth;

class EnterpriseController extends Controller
{
    public function index()
    {
        return view('enterprise.layouts.dashboard.index');
    }

    public function enterprise_regis(){
        return view('enterprise.layouts.enterprise_regis');
    }

    public function enterprise_post_register(Request $request)
    {
        
        $inputs_representative = [
            'name' => $request->input('representative_name'),
            'position' => $request->input('position'),
            'phone_number' => $request->input('phone'),
            'email' => $request->input('representative_email'),
        ];

        $representative = representative::create($inputs_representative);

        $inputs_enterInfo = [
            'name' => $request->input('enterprise_name'),
            'id_repre' => $representative->id,
            'tax_code' => $request->input('tax_code'),
            'address' => $request->input('address'),
            'landline' => $request->input('landline'),
            'email' => $request->input('enterprise_email'),
        ];
        $enterInfo = enterprise_info::create($inputs_enterInfo);

        $emailExists = enterprise::where('username', $request->input('enterprise_email'))->exists();
        if ($emailExists) {
            return redirect()->back()->withErrors(['email' => 'Email đã tồn tại']);
        }
        $enterprise = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'status_id' => status::first()->id,
            'id_info' => $enterInfo->id,
        ];
        enterprise::create($enterprise);

        return redirect()->route('client-home');

    }

    public function logout()
    {
        Auth::guard('enterprises')->logout();
        return redirect()->route('client-login');
    }
}
