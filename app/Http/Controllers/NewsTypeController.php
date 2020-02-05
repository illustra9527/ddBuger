<?php

namespace App\Http\Controllers;

use App\NewsType;
use Illuminate\Http\Request;

class NewsTypeController extends Controller
{
    public function index(){

        $items = NewsType::all();

        return view('admin.news_type.index', compact('items'));
    }

    public function create(){

        return view('admin.news_type.create');
    }

    public function store(Request $request){

        NewsType::create($request->all());

        return redirect('admin/news_type');
    }

    public function edit($id){

        $item = NewsType::find($id);

        return view('admin.news_type.edit', compact('item'));

    }
    public function update(Request $request, $id){

        $item = NewsType::find($id);
        $item->update($request->all());

        return redirect('admin/news_type');

    }
    public function destroy($id){

        NewsType::destroy($id);

        return redirect('admin/news_type');
    }
}
