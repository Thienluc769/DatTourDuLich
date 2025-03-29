<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enterprise_info extends Model
{
    use HasFactory;
    protected $table = 'enterprise_info'; 
    protected $primaryKey = 'id';
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';
    protected $fillable = [
        'name',
        'id_repre',
        'tax_code',
        'address',
        'landline',
        'email',
    ];
    public function representative()
    {
        return $this->belongsTo(representative::class, 'id_repre', 'id');
    }
}
