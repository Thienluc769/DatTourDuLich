<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tour_guide extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tour_guide'; 
    protected $primaryKey = 'id';
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';
    protected $fillable = [
        'enterprise_id',
        'name',
        'gender_id',
        'year_of_birth',
        'phone',
    ];
    public function enterprise()
    {
        return $this->belongsTo(enterprise::class,'enterprise_id','id');
    }

    public function gender()
    {
        return $this->belongsTo(gender::class,'gender_id','id'); 
    }

}
