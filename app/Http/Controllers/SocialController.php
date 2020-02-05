<?php

namespace App\Http\Controllers;

use App\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index(){

        $items = Social::all();

        return view('admin.social.index', compact('items'));

    }
    public function create(){

        return view('admin.social.create');

    }
    public function store(Request $request){

        Social::create($request->all());

        return redirect('/admin/social');

    }
    public function edit($id){

        $item = Social::find($id);

        return view('admin.social.edit', compact('item'));
    }
    public function update(Request $request, $id){

        $item = Social::find($id);
        $item->update($request->all());

        return redirect('/admin/social');

    }
    public function destroy($id){

        Social::destroy($id);

        return redirect('/admin/social');

    }
}
