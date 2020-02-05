<?php

namespace App\Http\Controllers;

use App\Location;
use App\RecruitJob;
use App\LocationCity;
use Illuminate\Http\Request;

class RecruitJobController extends Controller
{
    public function index(){

        $items = RecruitJob::with('locationCity')->get();
        $locations = Location::all();
        // 把地點的資料先塞進去，再做迴圈以判斷式的方式抓到單筆資料->顯示

        return view('admin.recruit_job.index', compact('items','locations'));
    }

    public function create(){



        $citys = LocationCity::all()->pluck('city_name','id');
        /* $location_city = LocationCity::with('locations')->get(); */
/*         dd($location_city->first()->locations->first()->title);
 */
        return view('admin.recruit_job.create', compact('citys'));
    }

    public function getShops($id){

        $shops = Location::where('city_id',$id)->pluck('title','id');


        return json_encode($shops);

/*         $html = '';
        $shops = Location::where('city_id', $id)->get();
        foreach ($shops as $shop) {
            $html .= '<option value="'.$shop->id.'">'.$shop->title.'</option>';
        };

        return response()->json(['html' => $html]);
 */
    }


    public function store(Request $request){

        RecruitJob::create($request->all());

        return redirect('admin/recruit_job');
    }


    public function edit($id){

        $citys = LocationCity::all()->pluck('city_name','id');
        $locations = Location::all();

        $shop_detail = RecruitJob::with('locationCity')->find($id);



        return view('admin.recruit_job.edit', compact('citys','locations','shop_detail'));
    }


    public function update(Request $request, $id){

        RecruitJob::find($id)->update($request->all());

        return redirect('admin/recruit_job');
    }


    public function destroy($id){

        RecruitJob::destroy($id);

        return redirect()->back();
    }

}
