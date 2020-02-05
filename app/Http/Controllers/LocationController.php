<?php

namespace App\Http\Controllers;

use App\Location;
use App\LocationCity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LocationController extends Controller
{
    public function index(){

        $items = Location::with('locationCity')->get();

        return view('admin.location.index', compact('items'));
    }

    public function create(){

        $locationCities = LocationCity::all();

        return view('admin.location.create', compact('locationCities'));
    }

    public function store(Request $request){

        $requestData = $request->all();
        $path = $request->file('img')->store('location','public');
        $requestData['img'] = $path;

        Location::create($requestData);

        return redirect('admin/location');

    }

    public function edit($id){

        $item = Location::find($id);
        $locationCities = LocationCity::all();

        return view('admin.location.edit', compact('item','locationCities'));
    }


    public function update(Request $request, $id){

        $item = Location::find($id);
        $requestData = $request->all();

        if ($request->hasFile('img')){

            $old_img = public_path('storage/').$item->img;
            File::delete($old_img);

            $path = $request->file('img')->store('location','public');
            $requestData['img'] = $path;

        }

        $item->update($requestData);

        return redirect('admin/location');

    }

    public function destroy($id){

        $item = Location::find($id);
        $old_img = public_path('storage/').$item->img;

        if (file_exists($old_img)){
            File::delete($old_img);
        }

        Location::destroy($id);

        return redirect('admin/location');

    }

}
