@extends('layouts.app')

@section('css')

@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">最新消息 新增</div>
                <div class="card-body">
                    <form method="post" action="/admin/news/update/{{ $item->id }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">消息類別</label>
                            <div class="col-sm-10">
                                <select name="type_id" id="type_id" class="form-control">
                                    <option value="" disabled selected>--請選擇--</option>
                                    @foreach ($news_types as $news_type)
                                    <option value="{{ $news_type->id }}" @if ( $news_type->id == $item->type_id )
                                        selected

                                        @endif>{{ $news_type->type_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">標題</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title" required
                                    value="{{ $item->title }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="subtitle" class="col-sm-2 col-form-label">小標題</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="subtitle" name="subtitle"
                                    value="{{ $item->subtitle }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="img" class="col-sm-2 col-form-label">原圖</label>
                            <div class="col-sm-10">
                                <img src="{{ '/storage/'.$item->img }}" alt="圖片未正確顯示" class="img-fluid">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="img" class="col-sm-2 col-form-label">圖</label>
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
                            <label for="description" class="col-sm-2 col-form-label">內容</label>
                            <div class="col-sm-10">
                                <textarea name="description" class="form-control" id="description" cols="30" rows="5"
                                    required>{{ $item->description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sort" class="col-sm-2 col-form-label">排序</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="sort" name="sort" value="1" required
                                    value="{{ $item->sort }}">
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
