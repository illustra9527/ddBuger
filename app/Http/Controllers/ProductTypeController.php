<?php

namespace App\Http\Controllers;

use App\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function index()
    {
        $items = ProductType::all();
        return view('admin.product_type.index', compact('items'));
    }

    public function create()
    {

        return view('admin.product_type.create');
    }

    public function store(Request $request)
    {
        /* 使用Model 在Model內新增了欄位之後($fillable)，可以直接用這個語法一次新增所有資料 ==> 批量賦予值
        但要注意: Model 欄位資料 == 填入表單時設定的 name=' ', 這是相對應的

        return view('admin.product_type.create'); << view 用.指向資料夾內資料去讀取資料
        return redirect('/admin/product_type'); << redirect 要指向路徑
        */

        ProductType::create($request->all());

        return redirect('/admin/product_type');
    }

    public function edit($id){

        $item = ProductType::find($id);
        return view('admin.product_type.edit', compact('item'));

    }

    public function update(Request $request, $id){
        
        $item = ProductType::find($id);
        $item->update($request->all());

        return redirect('admin/product_type');

    }

    public function destroy($id){

        ProductType::destroy($id);
        return redirect('admin/product_type');
    }
}
