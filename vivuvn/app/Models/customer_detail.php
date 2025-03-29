<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer_detail extends Model
{
    use HasFactory;
    protected $table = 'customer_detail'; 
    protected $primaryKey = 'id';
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';
    protected $fillable = [
        'customer_id',
        'adult',
        'children',
    ];
    public function customer()
    {
        return $this->belongsTo(customer::class, 'customer_id', 'id');
    }

}
