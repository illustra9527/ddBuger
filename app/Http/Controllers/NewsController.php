<?php

namespace App\Http\Controllers;

use App\News;
use App\NewsType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    public function index()
    {

        $items = News::with('newsType')->get();

        return view('admin.news.index', compact('items'));
    }

    public function create()
    {

        $news_types = NewsType::all();
        return view('admin.news.create', compact('news_types'));
    }

    public function store(Request $request)
    {

        $requestData = $request->all();
        $path = $request->file('img')->store('news', 'public');
        $requestData['img'] = $path;

        News::create($requestData);

        return redirect('/admin/news');
    }

    public function edit($id)
    {

        $item = News::find($id);
        $news_types = NewsType::all();
        return view('admin.news.edit', compact('news_types', 'item'));
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $item = News::find($id);

        if($request->hasFile('img')){
            $old_img = public_path('/storage/').$item->img;
            File::delete($old_img);

            $path = $request->file('img')->store('news', 'public');
            $requestData['img'] = $path;
        }

        $item->update($requestData);
        return redirect('/admin/news');

    }
    public function destroy($id)
    {

        $item = News::find($id);
        $old_img = public_path('/storage/').$item->img;

        if(file_exists($old_img)){
            File::delete($old_img);
        }

        News::destroy($id);
        return redirect('/admin/news');

    }
}
