<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function index()
    {
        $items = Banner::all();
        return view('admin.banner.index', compact('items'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $requsetData = $request ->all();
        $file_name = $request->file('img')->store('banners','public');
        $requsetData['img'] = $file_name;

        Banner::create($requsetData);

        return redirect('/admin/banner');

    }

    public function edit($id){

        $item = Banner::find($id);
        return view('admin.banner.edit', compact('item'));

    }

    public function update(Request $request, $id)
    {
        $item = Banner::find($id);
        $requestData = $request->all();

        if ( $request->hasFile('img')){
            $old_img = public_path('storage/'.$item->img);
            File::delete($old_img);

            $file_name = $request->file('img')->store('','public');
            $requestData['img'] = $file_name;

        }

        $item->update($requestData);
        return redirect('/admin/banner');
    }

    public function destroy($id){

        $item = Banner::find($id);
        $old_img = public_path('storage/'.$item->img);
        if (file_exists($old_img)){
            File::delete($old_img);
        }

        Banner::destroy($id);
        return redirect('/admin/banner');

    }


}
