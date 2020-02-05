@extends('layouts.app')

@section('css')

@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">分店城市管理 edit</div>
                <div class="card-body">
                    <form method="post" action="/admin/location_city/update/{{ $item->id }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="city_name" class="col-sm-2 col-form-label">名稱</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="city_name" name="city_name"
                                    value="{{ $item->city_name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="img" class="col-sm-2 col-form-label">原始圖片</label>
                            <div class="col-sm-10">
                                <img src="{{ '/storage/'.$item->img }}" alt="圖片未正確顯示">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="img" class="col-sm-2 col-form-label">圖片<small
                                    style="color:red">尺寸:300*300px</small></label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="img" name="img"
                                            aria-describedby="img">
                                        <label class="custom-file-label" for="img">選擇檔案</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sort" class="col-sm-2 col-form-label">排序</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="sort" name="sort"
                                    value="{{ $item->sort }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">修改</button>
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
