<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tour extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tour'; 
    protected $primaryKey = 'id';
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';
    protected $fillable = [
        'category_id',
        'enterprise_id',
        'name',
        'description',
        'tour_time',
        'departure_date',
        'schedule_id',
        'hotel_id',
        'vehicle_id',
        'price',
        'status_id',
        'approved_by'
    ];
    public function category()
    {
        return $this->belongsTo(tour_category::class, 'category_id', 'id');
    }

    public function enterprise()
    {
        return $this->belongsTo(enterprise::class, 'enterprise_id', 'id');
    }

    public function schedule()
    {
        return $this->belongsTo(schedule::class, 'schedule_id', 'id');
    }


    public function hotel()
    {
        return $this->belongsTo(hotel::class, 'hotel_id', 'id');
    }

    
    public function tourGuide()
    {
        return $this->belongsTo(tour_guide::class, 'tour_guide_id','id');
    }

    public function vehicle()
    {
        return $this->belongsTo(vehicle::class, 'vehicle_id','id');
    }

    public function images()
    {
        return $this->hasMany(image::class, 'product_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(status::class, 'status_id', 'id');
    }
    
}
