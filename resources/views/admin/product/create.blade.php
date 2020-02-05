@extends('layouts.app')

@section('css')

@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">產品 Create</div>

                <div class="card-body">

                    <form method="post" action="/admin/product/store" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="type_id" class="col-sm-2 col-form-label">分類</label>
                            <div class="col-sm-10">
                                <select name="type_id" id="type_id" class="selectpicker form-control">
                                    <option value="0" disabled selected>--請選擇--</option>
                                    @foreach ($product_types as $product_type)
                                    <option value="{{ $product_type->id }}">{{ $product_type->type_name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">產品名稱</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="img" class="col-sm-2 col-form-label">產品主圖</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="img" name="img"
                                            aria-describedby="img" required>
                                        <label class="custom-file-label" for="img">選擇檔案</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">產品內容</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description" id="description" cols="30"
                                    rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-2 col-form-label">價錢</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="price" name="price" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sort" class="col-sm-2 col-form-label">排序</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="sort" name="sort" value="1">
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
