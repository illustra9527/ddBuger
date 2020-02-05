@extends('layouts.app')

@section('css')

@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">社群貼文管理 - 新增</div>

                <div class="card-body">
                    <form method="post" action="/admin/social/store">
                        @csrf
                        <div class="form-group row">
                            <label for="yiyle" class="col-sm-2 col-form-label">標題</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="yiyle" class="col-sm-2 col-form-label">分類</label>
                            <div class="col-sm-10">
                                <textarea name="post" id="post" cols="30" rows="10" name="post" class="form-control" required>貼文請貼這</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sort" class="col-sm-2 col-form-label">排序</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="sort" name="sort" value="1">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">新增</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
@endsection
