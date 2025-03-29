<?php

namespace App\Http\Controllers\Enterprise;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tours\CreateTourRequest;
use App\Models\gender;
use App\Models\hotel;
use App\Models\image;
use Illuminate\Http\Request;
use App\Models\tour;
use App\Models\tour_guide;
use App\Models\tour_category;
use App\Models\vehicle;
use App\Models\schedule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    
    protected $tour;

    public function __construct(tour $tour)
    {
        $this->tour = $tour;
    }

    public function index()
    {
        $enterprise_id = Auth::guard('enterprises')->user()->id;

        $Approved_tour = tour::where('status_id', 2)
            ->where('enterprise_id', $enterprise_id)
            ->latest('id')
            ->paginate(4);

        $Pending_tour = tour::where('status_id', 1)
            ->where('enterprise_id', $enterprise_id) 
            ->latest('id')
            ->paginate(4);

        return view('enterprise.layouts.product.index',compact('Approved_tour','Pending_tour'));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotel = hotel::all();
        $tour_guide = tour_guide::all();
        $category = tour_category::all();
        $vehicle = vehicle::all();
        return view('enterprise.layouts.product.create',compact('hotel','tour_guide','category','vehicle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $days = $request->input('tour_time');
        $nights = $request->input('tour_time_night');
        $tourTime = $days . ' ngày ' . $nights . ' đêm';
        DB::beginTransaction();
        
        try {
            $schedule_input = [
                'title1' => $request->input('title1'),
                'title2' => $request->input('title2'),
                'title3' => $request->input('title3'),
                'title4' => $request->input('title4'),
                'title5' => $request->input('title5'),
                'title6' => $request->input('title6'),
                'title7' => $request->input('title7'),
                'day1' => $request->input('day1'),
                'day2' => $request->input('day2'),
                'day3' => $request->input('day3'),
                'day4' => $request->input('day4'),
                'day5' => $request->input('day5'),
                'day6' => $request->input('day6'),
                'day7' => $request->input('day7'),
            ];
            
            $schedule = schedule::create($schedule_input);

            $inputs = [
                'category_id' => $request->input('category'),
                'enterprise_id' => Auth::guard('enterprises')->user()->id,
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'tour_time' =>  $tourTime,
                'departure_date' => $request->input('departure_date'),
                'schedule_id' => $schedule->id,
                'hotel_id' => $request->input('hotel_id'),
                'vehicle_id' => $request->input('vehicle_id'),
                'price' => $request->input('price'),
                'status_id' => 1,
            ]; 
            
             $tour = tour::create($inputs);
            $filename = $request->image_main->getClientOriginalName();
            Storage::disk('public')->put('products/' . $filename, file_get_contents($request->image_main));
            image::create([
                'product_id'=>$tour->id,
                'name' => $filename,
            ]);  
            foreach($request->image as $value){
                if($value) {
                    $filenames = $value->getClientOriginalName();
                    Storage::disk('public')->put('products/' . $filenames, file_get_contents($value));
                    image::create([
                        'product_id'=>$tour->id,
                        'name'=>$filenames,
                    ]);    
                }           
            } 
            DB::commit();
            return redirect(route('product-index'))->with(['message' => 'Create success']);

        } catch (\Exception $th) {
            DB::rollBack();
            dd($th);
            \Log::error('Error creating tour: ' . $th->getMessage());
        
        return redirect()->back()
            ->withInput()
            ->with('error', 'Có lỗi xảy ra khi tạo tour: ' . $th->getMessage());
        }
    }
        

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tour = tour::where('id', $id)->first();
        $schedule = schedule::where('id', $tour->schedule_id)->first();
             
        return view('enterprise.layouts.product.details',['tour'=> $tour,'schedule'=> $schedule]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $hotel = hotel::all();
        $tour_guide = tour_guide::all();
        $tour = tour::find($id);
        $image = image::where('product_id',$id)->orderBy('id', 'asc')->get();
        return view('enterprise.layouts.product.edit',['tour' => $tour, 'hotel' => $hotel, 'tour_guide' => $tour_guide,'image' => $image]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateTourRequest $request,$id)
    {
        try {
            $a = [
                'name'=>$request->name,
                'description'=>$request->description,
                'tour_time'=>$request->tour_time,
                'hotel_id'=>$request->hotel_id,
                'tour_guide_id'=>$request->tour_guide_id,
                'price'=>$request->price
            ];
            $tour = tour::find($id);
            $tour->update($a);
        } catch (\Exception $th) {
            dd($th);
        }  
        
        return redirect(route('product-index'))->with(['message' => 'Update success']);
    }

    public function soft_destroy($id)
    {
        $tour= tour::find($id);
        $tour->delete();
        return redirect()->route('product-index')->with(['message' => 'Delete success']);
    }

    public function trash(){
        $tour = tour::onlyTrashed()->get();
        return view('enterprise.layouts.product.trash',['tour'=> $tour]);
    }

    public function restore($id){
        tour::withTrashed()->where('id',$id)->restore();
        return redirect()->route('product-index')->with(['message' => 'Restore success']);
    }

    public function pending_delete($id)
    {
        tour::where('id',$id)->forceDelete();   
        return redirect()->route('product-index')->with(['message' => 'Deleted']);
    }
    public function destroy($id)
    {
        tour::withTrashed()->where('id',$id)->forceDelete();   
        return redirect()->route('product-trash')->with(['message' => 'Deleted']);
    }
}
