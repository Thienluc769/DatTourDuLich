<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gender extends Model
{
    use HasFactory;
    protected $table = 'gender'; 
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
    ];
    
    
}
