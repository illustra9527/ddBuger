<?php

namespace App\Http\Controllers;

use App\LocationCity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LocationCityController extends Controller
{
    public function index()
    {
        $items = LocationCity::all();
        return view('admin.location_city.index', compact('items'));

    }

    public function create()
    {

        return view('admin.location_city.create');

    }

    public function store(Request $request)
    {

        $requestDara = $request->all();
        $path = $request->file('img')->store('location_city','public');
        $requestDara['img'] = $path;

        LocationCity::create($requestDara);
        return redirect('admin/location_city');

    }

    public function edit($id)
    {

        $item = LocationCity::find($id);

        return view('admin/location_city/edit', compact('item'));

    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $item = LocationCity::find($id);

        if ($request->hasFile('img')){
            $old_img = public_path('storage/').$item->img;
            File::delete($old_img);

            $path = $request->file('img')->store('location_city','public');
            $requestData['img'] = $path;
        }

        $item->update($requestData);

        return redirect('admin/location_city');

    }

    public function destroy($id){

        $item = LocationCity::find($id);
        $old_img = public_path('storage/').$item->img;

        if (file_exists($old_img)){
            File::delete($old_img);
        }

        LocationCity::destroy($id);

        return redirect('admin/location_city');

    }
}
