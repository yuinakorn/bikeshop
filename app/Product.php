<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product'; // ตาราง product

    protected $fillable = ['name', 'price']; // กำหนดเพื่อให้ใช้คำสั่ง update แบบย่อได้

    public function category() {
        return $this->belongsTo('App\Category'); // เชื่อมความสัมพันธ์กับ Model Category แบบ [1] to many
    }
}
