<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class enterprise extends Authenticatable
{
    use HasFactory;
    protected $table = 'enterprise'; 
    protected $primaryKey = 'id';
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';
    protected $fillable = [
        'username',
        'password',
        'status_id',
        'id_info',
        'approved_by',
    ];
    public function status()
    {
        return $this->belongsTo(status::class, 'status_id', 'id');
    }

    public function enterprise_info()
    {
        return $this->belongsTo(enterprise_info::class, 'id_info', 'id');
    }

     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];
}
