<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class order extends Model
{
    use HasFactory;
    protected $table = 'order'; 
    protected $primaryKey = 'id';
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';
    protected $fillable = [
        'payment_method_id',
        'booking_date',
        'total_price',
        'status_id',
        'tourGuide_id',
    ];
    public function payment_method()
    {
        return $this->belongsTo(payment_method::class, 'payment_method_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(status::class, 'status_id', 'id');
    }

    public function tourGuide()
    {
        return $this->belongsTo(tour_guide::class, 'tourGuide_id', 'id');
    }

    public function setBookingDateAttribute($value)
    {
        $this->attributes['booking_date'] = Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
    }
}
