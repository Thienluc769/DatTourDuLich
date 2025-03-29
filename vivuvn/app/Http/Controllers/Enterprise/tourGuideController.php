<?php

namespace App\Http\Controllers\Enterprise;

use App\Http\Controllers\Controller;
use App\Models\gender;
use App\Models\tour_guide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class tourGuideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enterpriseId = Auth::guard('enterprises')->id();
        $tourGuide = tour_guide::with(['gender'])
        ->where('enterprise_id', $enterpriseId)
        ->latest('id')->paginate(4);
        if ($tourGuide->isEmpty()) {
            return view('enterprise.layouts.tourGuide.index', ['tourGuide' => $tourGuide]);
        }
        return view('enterprise.layouts.tourGuide.index', ['tourGuide' => $tourGuide]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $gender = gender::all();
        return view('enterprise.layouts.tourGuide.create',['gender'=>$gender]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $enterprise_id = Auth::guard('enterprises')->user()->id;
        $tourGuide = [
            'enterprise_id' => $enterprise_id,
            'name' => $request->input('name'),
            'gender_id' => $request->input('gender_id'),
            'year_of_birth' => $request->input('year_of_birth'),
            'phone' => $request->input('phone'),
        ];
        tour_guide::create($tourGuide);
        return redirect()->route('tourGuide-index')->with(['message' => 'Create success']);

        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $gender = gender::all();
        $tourGuide = tour_guide::where('id', $id)->with([
            'gender',
            ])->first();

        return view('enterprise.layouts.tourGuide.edit',['tourGuide'=>$tourGuide , 'gender' => $gender]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }


    public function soft_destroy($id)
    {
        $tourGuide= tour_guide::find($id);
        $tourGuide->delete();
        
        return redirect()->route('tourGuide-index')->with(['message' => 'Delete success']);
    }

    public function trash(){
        $tourGuide = tour_guide::onlyTrashed()->get();
        return view('enterprise.layouts.tourGuide.trash',['tourGuide'=> $tourGuide]);
    }

    public function restore($id){
        tour_guide::withTrashed()->where('id',$id)->restore();
        return redirect()->route('tourGuide-index')->with(['message' => 'Restore success']);
    }

    public function destroy(string $id)
    {
        tour_guide::withTrashed()->where('id',$id)->forceDelete();   
        return redirect()->route('tourGuide-trash')->with(['message' => 'Deleted']);
    }
}
