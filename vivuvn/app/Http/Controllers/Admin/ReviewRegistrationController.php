<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enterprise;
use Illuminate\Support\Facades\Mail;
use App\Models\tour;

class ReviewRegistrationController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $enterprises = enterprise::with(['status', 'enterprise_info.representative'])
            ->where('status_id', 1)
            ->whereHas('enterprise_info', function($query) use ($search) {
                if($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                }
            })
            ->latest('id')
            ->paginate(5);
        $enterpriseCount = enterprise::where('status_id', 1)->count();
        $tourCount = tour::where('status_id', 1)->count();
        return view('admin.layouts.review-registration.index', compact('enterprises', 'enterpriseCount', 'tourCount'));
    }

    public function detail($id)
    {
        try {
            $enterprise = Enterprise::with(['enterprise_info', 'enterprise_info.representative', 'status'])
                ->findOrFail($id);

            \Log::info('Enterprise ID: ' . $id);

            $approvedTourCount = Tour::where('enterprise_id', $id)
                ->where('status_id', 2)
                ->count();

            \Log::info('Approved Tour Count: ' . $approvedTourCount);

            return view('admin.layouts.review-registration.detail', [
                'enterprise' => $enterprise,
                'approvedTourCount' => $approvedTourCount
            ]);
        } catch (\Exception $e) {
            \Log::error('Error in detail method: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Không tìm thấy thông tin doanh nghiệp');
        }
    }

    public function approve($id)
    {
        $enterprise = enterprise::findOrFail($id);
        $enterprise->update([
            'status_id' => 2
        ]);

       
        Mail::send([], [], function ($message) use ($enterprise) {
            $message->to($enterprise->enterprise_info->email)
                    ->subject('Thông báo từ Vivuvn')
                    ->html('
                        <p>Xin chào ' . $enterprise->enterprise_info->name . ',</p>
                        <p>Tài khoản của bạn đã được duyệt. Từ giờ bạn có thể đăng nhập vào website vivuvn.</p>
                        <p>Cảm ơn đã sử dụng trang web của chúng tôi.</p>
                        <p>Trân trọng,<br>Đội ngũ Vivuvn</p>
                    ');
        });

        return redirect()->route('review-registration')->with('message', 'Approved enterprise');
    }

    public function reject($id)
    {
        $enterprise = enterprise::findOrFail($id);
        $enterprise->update([
            'status_id' => 3
        ]);
        return redirect()->route('review-registration')->with('message', 'Rejected enterprise');
    }

    public function enterpriseTours($id)
    {
        try {
            $enterprise = Enterprise::findOrFail($id);

            // Debug để kiểm tra ID
            \Log::info('Checking tours for enterprise_id: ' . $id);

            // Sửa lại query để lấy tour
            $tours = Tour::where('enterprise_id', $enterprise->id)
                ->where('status_id', 2)
                ->get();

            \Log::info('SQL Query: ' . Tour::where('enterprise_id', $enterprise->id)
                ->where('status_id', 2)
                ->toSql());
            \Log::info('Found tours: ' . $tours->count());

            if ($tours->isEmpty()) {
                \Log::info('No tours found for enterprise_id: ' . $id);
            }

            return view('admin.layouts.enterprises.tours', [
                'enterprise' => $enterprise,
                'tours' => $tours
            ]);
        } catch (\Exception $e) {
            \Log::error('Error in enterpriseTours: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            return redirect()->back()->with('error', 'Không tìm thấy danh sách tour');
        }
    }
} 