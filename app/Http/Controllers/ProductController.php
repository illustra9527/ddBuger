<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(){

        $items = Product::with('productType')->get();
        $types = ProductType::all();
        return view('admin.product.index', compact('items','types'));
    }

    public function create(){

        $product_types = ProductType::all();

        return view('admin.product.create', compact('product_types'));
    }

    public function store(Request $request){

        /* 儲存有圖片的步驟(單張)
        (1)先存圖片 (2)把圖片路徑存回資料裡 (3)再把整筆Create至資料庫 */

        $requestData = $request->all();
        $path = $request->file('img')->store('product_imgs', 'public');
        $requestData['img'] = $path;

        Product::create($requestData);

        return redirect('/admin/product');

    }

    public function edit($id){

        $item = Product::find($id);
        $product_types = ProductType::all();
        return view('admin.product.edit', compact('item','product_types'));

    }

    public function update(Request $request, $id){

        $item =Product::find($id);
        $requestData = $request->all();

        if( $request->hasFile('img') ){
            $old_img = public_path('storage/').$item->img;

            File::delete($old_img);
            $path = $request->file('img')->store('product_imgs', 'public');
            $requestData['img'] = $path;
        }


        $item->update($requestData);
        return redirect('admin/product');

    }

    public function destroy($id){

        $item =Product::find($id);
        $old_img = public_path('storage/').$item->img;

        if (file_exists($old_img)){
            File::delete($old_img);
        }

        $item->delete();

        return redirect('admin/product');
    }


    public function select($type_name){

        $type = ProductType::where('type_name',$type_name)->first();
        $items = Product::where('type_id',$type->id)->get();

        $types = ProductType::all();

        return view('admin.product.index', compact('items','types'));

    }


}
