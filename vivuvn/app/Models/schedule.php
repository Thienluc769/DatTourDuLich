<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    use HasFactory;
    protected $table = 'schedule'; 
    protected $primaryKey = 'id';
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';
    protected $fillable = [
        'title1',
        'title2',
        'title3',
        'title4',
        'title5',
        'title6',
        'title7',
        'day1',
        'day2',
        'day3',
        'day4',
        'day5',
        'day6',
        'day7',
    ];

    public function getScheduleData()
    {
        $data = [];
        for ($i = 1; $i <= 7; $i++) {
            if (!empty($this->{"title$i"}) && !empty($this->{"day$i"})) {
                $data[] = [
                    'title' => $this->{"title$i"},
                    'day' => $this->{"day$i"}
                ];
            }
        }
        return $data;
    }
}
