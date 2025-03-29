<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    use HasFactory;
    protected $table = 'order_detail'; 
    protected $primaryKey = 'id';
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';
    protected $fillable = [
        'order_id',
        'customer_id',
        'tour_id',
    ];
    public function order()
    {
        return $this->belongsTo(order::class, 'order_id', 'id');
    }
    public function customer()
    {
        return $this->belongsTo(customer::class, 'customer_id', 'id');
    }
    public function tour()
    {
        return $this->belongsTo(tour::class, 'tour_id', 'id');
    }
}
