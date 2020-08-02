<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category'; // ตาราง category
    
    public function product() {
        return $this->hasMany('App\Product'); // เชื่อมความสัมพันธ์กับ Model product แบบ 1 to [many]
    }
}
