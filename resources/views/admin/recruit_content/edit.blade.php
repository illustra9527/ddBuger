@extends('layouts.app')

@section('css')

@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">徵才條件管理</div>

                <div class="card-body">

                    <form method="post" action="/admin/recruit_content/update" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">標題</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title" required value="{{ $item->title }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="img" class="col-sm-2 col-form-label">原始圖片</label>
                            <div class="col-sm-10">
                                <img src="{{ '/storage/'.$item->img }}" alt="圖片未正確顯示">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="img" class="col-sm-2 col-form-label">圖片</label>
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
                            <label for="sort" class="col-sm-2 col-form-label">徵才條件</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description" id="description" cols="30"
                                    rows="10">{{ $item->description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="remark" class="col-sm-2 col-form-label">備註</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="remark" id="remark" cols="30" rows="5">{{ $item->remark }}</textarea>
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

<script>


</script>
@endsection
