<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $table = 'customer'; 
    protected $primaryKey = 'id';
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';
    protected $fillable = [
        'account_id',
        'name',
        'year_of_birth',
        'phone',
        'email',
        'address',
    ];

    public function account()
    {
        return $this->belongsTo(account::class, 'account_id', 'id');
    }

}
