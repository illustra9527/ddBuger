<?php

namespace App\Http\Controllers;

use App\RecruitContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RecruitContentController extends Controller
{
    public function index(){

        $item = RecruitContent::first();

        return view('admin.recruit_content.index', compact('item'));
    }
    public function edit(){

        $item = RecruitContent::first();

        return view('admin.recruit_content.edit',compact('item'));
    }
    public function update(Request $request){

        $requestData = $request->all();
        $item = RecruitContent::first();

        if($request->hasFile('img')){
            $old_img = public_path('/storage/').$item->img;
            File::delete($old_img);

            $path = $request->file('img')->store('recruit','public');
            $requestData['img'] = $path;
        }

        $item->update($requestData);


        return redirect('admin/recruit_content');
    }
}
