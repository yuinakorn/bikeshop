<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product; //ดึง model เข้ามาใช้
// use Input; // ใช้ input library มาช่วย
// use Config;

class ProductController extends Controller {    

    // $rp = result per page
    private $rp = 2;
     

    public function index() {
        $products = Product::all(); // เก็บสินค้าทั้งหมดในตัวแปร
        return view('product/index', compact('products'));
    }

    public function search(Request $request) {
        // $query = Input::get('q');
        $query = $request->input('q');
        if($query) {
            $products = Product::where('code', 'like', '%'.$query.'%')
                ->orWhere('name', 'like', '%'.$query.'%')
                ->paginate($this->rp);
                // ->get();
        } else {
            // $products = Product::all();
            $products = Product::paginate($this->rp);
        }

        return view('product/index', compact('products'));
    }

}
