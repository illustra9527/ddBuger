<?php

namespace App\Http\Controllers;

use App\News;
use App\Banner;
use App\Social;
use App\Location;
use App\RecruitJob;
use App\ProductType;
use App\LocationCity;
use App\RecruitContent;
use Dotenv\Regex\Success;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){

        $banners = Banner::orderBy('sort','desc')->take(3)->get();
        $product_types = ProductType::with('products')->get();
        $locationCities = LocationCity::with('locations')->get();
        $social_medias = Social::all();
        // dd($product_types->first()->products->first()->title);

        $news = News::with('newsType')->orderBy('sort','desc')->take(3)->get();

        $recruit_content = RecruitContent::first();
        $recruit_jobs = RecruitJob::with('locationCity')->get();


        // dd($recruit_jobs->first()->locationCity->city_name); // 指到城市名稱
        // dd($recruit_jobs->first()->locationCity->locations->first()->title); // 指到店名

/*         dd($locationCities->first()->locations); */


        return view('front.index', compact('banners','product_types','locationCities','news','recruit_content','recruit_jobs','social_medias'));
    }


    public function select($id){

        $city = LocationCity::with('locations')->find($id);

        $recruit_jobs = RecruitJob::where('city_id',$id)->get();


        return "$recruit_jobs";


    }






}
