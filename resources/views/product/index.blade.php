@extends('layouts.master')

@section('title')BikeShop | รายการสินค้า @stop
    
{{-- @endsection --}}
@section('content')

<div class="col-md-10 col-lg-10 offset-1 mt-4">      
    <h2>รายการสินค้า</h2>
    <div class="card">
        <div class="card-header">
            <span>รายการ</span>
        </div>
        <div class="card-body">
            <form action="{{ URL::to('product/search') }}" method="POST" class="form-inline">
                {{ csrf_field() }}
                <input type="text" name="q" class="form-control" value="{{ Request::get('q') }}" placeholder="พิมพ์รหัสหรือชื่อเพื่อค้นหา">
                <button type="submit" class="btn btn-light ml-1">ค้นหา</button>
            </form>
            <table class="table table-bordered table-hover bs_table mt-4">
                <thead>
                    <tr class="text-center">
                    <th scope="col">รูปสินค้า</th>
                    <th scope="col">รหัส</th>
                    <th scope="col">ชื่อสินค้า</th>
                    <th scope="col">ประเภท</th>
                    <th scope="col">คงเหลือ</th>
                    <th scope="col">ราคาต่อหน่วย</th>
                    <th scope="col">การทำงาน</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $p)
                        
                    <tr>
                    <th scope="row"> {{ $p->image_url }} </th>
                    <td> {{ $p->code }} </td>
                    <td> {{ $p->name }} </td>
                    <td> {{ $p->category->name }} </td>
                    <td class="text-center"> {{ number_format($p->stock_qty,0) }} </td>
                    <td class="text-right"> {{ number_format($p->price,2) }} </td>
                    <td class="text-center"> 
                        <a href="#" class="btn btn-info"><i class="fa fa-edit"></i> แก้ไข</a>
                        <a href="#" class="btn btn-light"><i class="fa fa-trash"></i> ลบ</a>
                    </td>
                    </tr> 
                    @endforeach
    
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">รวม</th>
                        <th> {{ $products->sum('stock_qty') }} </th>
                        <th class="text-right"> {{ number_format($products->sum('price'),2) }} </th>
                        <th> </th>
                    </tr>
                </tfoot>
            </table>
        </div>        
        <div class="card card-footer">
            <span>แสดงข้อมูลจำนวน {{ count($products) }} รายการ</span>
        </div>                
    </div>  
    <div class="mt-4">
        {{ $products->links() }}  
    </div>
                                                      
</div>
    
@endsection