<?php

namespace App\Http\Controllers\Client;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\account;
use App\Models\customer;
use App\Models\customer_detail;
use App\Models\enterprise;
use App\Models\gender;
use App\Models\tour;
use App\Models\image;
use App\Models\order;
use App\Models\order_detail;
use App\Models\payment_method;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{

    public function login()
    {   
        return view('client.layouts.login');

        
    }

    public function register()
    {
        return view('client.layouts.register');
    }

    public function index()
    {
        return view('client.layouts.home');
    }

    public function regisAccount(Request $request)
    {
        $emailExists = account::where('email', $request->input('email'))->exists();
        if ($emailExists) {
            return redirect()->back()->withErrors(['email' => 'Email đã tồn tại']);
        }
        $account = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' =>$request->input('pass'),
        ];
        account::create($account);
        return redirect()->route('client-login');
    }

    public function tour_list()
    {
        $tour = tour::with([
            'hotel',
            'images'
        ])
        ->where('status_id', 2)
        ->orderBy('id','desc')
        ->paginate(20);

        return view('client.layouts.tourList',['tour'=>$tour]);
    }


    public function detail($id)
    {
        $method = payment_method::all();
        $gender = gender::all();
        $tour = tour::where('id', $id)
            ->with([
                'hotel',
                'tourGuide', 
                'images',
                'schedule',
                'enterprise',
            ])->first();
            
            
        return view('client.layouts.detail',['tour'=>$tour, 'gender'=>$gender,'method'=>$method]);
    }

    public function payment(Request $request, $id)
    {
        $tour = tour::where('id', $id)->with([
            'hotel',
            'tourGuide',
            ])->first();
        $input =[
            'adultQuantity' => $request->input('quantity1'),
            'childQuantity' => $request->input('quantity2'),
            'nameCus' => $request->input('nameCus'),
            'year' => $request->input('year'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'total' => $request->input('total')
        ];
        $totalWithoutFormat = str_replace('.', '', $input['total']);
        $totalWithoutFormat = str_replace('₫', '', $totalWithoutFormat);
        $total = intval($totalWithoutFormat);
        return view('client.layouts.payment',['tour' =>$tour, 'input'=>$input, 'total'=>$total]);
    }

    public function store(Request $request, $id)
    {
        DB::beginTransaction();
        
        try {
            
                $customer = [
                    'account_id'=> Auth::guard('users')->id(),
                    'name' => $request->input('nameCus'),
                    'year_of_birth' => $request->input('year'),
                    'phone' => $request->input('phone'),
                    'email' => $request->input('email'),
                    'address' => $request->input('address'),
                ]; 
                $createCus = customer::create($customer);

                $customerDetail =[
                    'customer_id' => $createCus->id,
                    'adult' => $request->input('quantity1'),
                    'children' => $request->input('quantity2'),
                ];
                customer_detail::create($customerDetail);

                $order = [
                    'payment_method_id' => $request->input('payment_method'),
                    'booking_date' => Carbon::now()->format('Y-m-d'), 
                    'total_price' => $request->input('total'),
                    'status_id' => 1,
                ];
                
                $createOrder = order::create($order);

                $orderDetail = [
                    'order_id' => $createOrder->id,
                    'customer_id' => $createCus->id,
                    'tour_id' => $id,
                ];
                order_detail::create($orderDetail);

            DB::commit();
            return redirect()->route('client-tourList')->with(['message' => 'Book tour thành công']);

        } catch (\Exception $th) {
            // dd($th);
            DB::rollBack();
        }
    }

    public function services()
    {
        return view('client.layouts.services');
    }
    public function about()
    {
        return view('client.layouts.about');
    }
    public function contact()
    {
        return view('client.layouts.contact');
    }

    public function search_Tour(Request $request){
        DB::enableQueryLog(); 
        $tour =tour::where('name','like','%'.$request->input('keyWord').'%')->get();
        return view('client.layouts.tourList',['tour'=>$tour]);
    }

    public function postLogin(Request $request){
        $email = $request->input('email');
        $password = $request->input('pass');

        $account = account::where('email', $email)->first();
        $enterprise = enterprise::whereHas('enterprise_info', function($query) use ($email) {
            $query->where('email', $email);
        })->where('status_id', 2)->first();

        
        if (!$account && !$enterprise) {
            return redirect()->back()->withErrors(['email' => 'Email không tồn tại']);
        }

        if($enterprise){
            if(!Hash::check($password, $enterprise->password)){
                return redirect()->back()->withErrors(['password' => 'Mật khẩu không đúng']);
            }
            if(Auth::guard('enterprises')->attempt(['username' => $email, 'password' => $password])){
                return redirect()->route('enterprise-index');
            }
        }

        if ($account) {
            
            if (!Hash::check($password, $account->password)) {
                return redirect()->back()->withErrors(['password' => 'Mật khẩu không đúng']);
            }

            if (Auth::guard('users')->attempt(['email' => $email, 'password' => $password])) {
                return redirect()->route('client-home');
            }
        } 
        
    }

    public function logout()
    {
        Auth::guard('users')->logout();
        return redirect()->route('client-home');
    }

    public function profileIndex($id)
    {
        
        $account = account::where('id', $id)->first();
        return view('client.layouts.profile',['account'=>$account]);
    }

    public function search(Request $request)
    {
        try {
            $search = $request->input('search', '');
            
            // Query cơ bản
            $query = Tour::query();
            
            // Thêm điều kiện tìm kiếm nếu có
            if (!empty($search)) {
                $query->where('name', 'like', "%{$search}%");
            }
            
            // Lấy tours với images, chỉ lấy các cột cần thiết
            $tours = $query->with('images')
                          ->select('id', 'name', 'price', 'tour_time')  // Bỏ departure_location
                          ->get();
            
            // Format dữ liệu trả về
            $formattedTours = $tours->map(function($tour) {
                return [
                    'id' => $tour->id,
                    'name' => $tour->name,
                    'price' => number_format($tour->price) . '₫',
                    'tour_time' => $tour->tour_time,
                    'images' => $tour->images->first() ? $tour->images->first()->name : null
                ];
            });
            
            return response()->json($formattedTours);
            
        } catch (\Exception $e) {
            \Log::error('Tour search error: ' . $e->getMessage());
            return response()->json(['error' => 'Có lỗi xảy ra khi tải danh sách tour'], 500);
        }
    }


    public function compare_tours(Request $request)
    {
        $tourIds = explode(',', $request->query('tours'));
        $tours = Tour::with(['images', 'hotel'])->whereIn('id', $tourIds)->get();
        
        return view('client.layouts.compareTours', compact('tours'));
    }
 
    public function myOrders()
{
    // Lấy thông tin tài khoản của người dùng đang đăng nhập
    $accountId = Auth::guard('users')->id();
    
    // Lấy tất cả đơn hàng của tài khoản đang đăng nhập thông qua customer
    $orders = order_detail::with([
        'order.payment_method',
        'customer',
        'tour',
        'order.tourGuide'
    ])
    ->whereHas('order', function($query) use ($accountId) {
        $query->where('status_id', 2)
              ->whereIn('customer_id', function($subQuery) use ($accountId) {
                  $subQuery->select('id')
                            ->from('customer')
                            ->where('account_id', $accountId); // Lọc theo account_id trong bảng customers
              });
    })
    ->get();

    return view('client.layouts.my-orders', [
        'orders' => $orders,
        'account' => $accountId // Truyền thông tin tài khoản
    ]);
}
}
