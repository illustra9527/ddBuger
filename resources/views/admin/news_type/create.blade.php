@extends('layouts.app')

@section('css')

@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">最新消息分類 新增</div>
                <div class="card-body">
                    <form method="post" action="/admin/news_type/store">
                        @csrf
                        <div class="form-group row">
                            <label for="type_name" class="col-sm-2 col-form-label">類別名稱</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="type_name" name="type_name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sort" class="col-sm-2 col-form-label">排序</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="sort" name="sort" value="1" required>
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
