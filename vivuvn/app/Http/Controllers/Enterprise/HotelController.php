<?php

namespace App\Http\Controllers\Enterprise;

use App\Http\Controllers\Controller;
use App\Models\hotel;
use App\Models\hotel_category;
use Illuminate\Http\Request;


class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotel = hotel::latest('id')->paginate(4);
        return view('enterprise.layouts.hotel.index',['hotel'=>$hotel]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = hotel_category::all();
        return view('enterprise.layouts.hotel.create',['category'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $hotel = [
            'category_id' => $request->input('category'),
            'name' => $request->input('name'),
            'star_rating' => $request->input('star_rating'),
        ];
        hotel::create($hotel);
        return redirect()->route('hotel-index')->with(['message' => 'Create success']);
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
        $hotel = hotel::find($id);
        return view('enterprise.layouts.hotel.edit',['hotel'=>$hotel]);
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
        $hotel= hotel::find($id);
        $hotel->delete();
        
        return redirect()->route('hotel-index')->with(['message' => 'Delete success']);
    }

    public function trash(){
        $hotel = hotel::onlyTrashed()->get();
        return view('enterprise.layouts.hotel.trash',['hotel'=> $hotel]);
    }

    public function restore($id){
        hotel::withTrashed()->where('id',$id)->restore();
        return redirect()->route('hotel-index')->with(['message' => 'Restore success']);
    }



    public function destroy($id)
    {
        hotel::withTrashed()->where('id',$id)->forceDelete();   
        return redirect()->route('hotel-trash')->with(['message' => 'Deleted']);
    }

    public function category(Request $request)
    {
        $category = [
            'name' => $request->input('category_name'),
        ];
        hotel_category::create($category);
        return redirect()->route('hotel-create')->with(['message' => 'Create success']);
    }

}
