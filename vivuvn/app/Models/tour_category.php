<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tour_category extends Model
{
    use HasFactory;
    protected $table = 'tour_category'; 
    protected $primaryKey = 'id';
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';
    protected $fillable = [
        'name',
    ];
}
