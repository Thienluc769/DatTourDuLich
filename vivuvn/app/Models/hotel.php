<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class hotel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'hotel'; 
    protected $primaryKey = 'id';
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';
    protected $fillable = [
        'name',
        'category_id',
        'star_rating',
    ];
    public function category()
    {
        return $this->belongsTo(hotel_category::class, 'category_id', 'id');
    }
}
