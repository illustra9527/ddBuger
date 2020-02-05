@extends('layouts.app')

@section('css')

@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">產品 Index</div>

                <div class="card-body">
                    <a href="/admin/product/create" class="btn btn-primary">新增產品</a>
                    <hr>
                    <h4><a href="/admin/product" class="badge badge-primary">顯示全部</a>
                        <a href="/admin/product/select/{{ $types->first()->type_name }}"
                            class="badge badge-secondary">{{ $types->first()->type_name }}</a>
                        <a href="/admin/product/select/{{ $types->skip(1)->first()->type_name }}"
                            class="badge badge-secondary">{{ $types->skip(1)->first()->type_name }}</a>
                        <a href="/admin/product/select/{{ $types->skip(2)->first()->type_name }}"
                            class="badge badge-secondary">{{ $types->skip(2)->first()->type_name }}</a>
                        <a href="/admin/product/select/{{ $types->skip(3)->first()->type_name }}"
                            class="badge badge-secondary">{{ $types->skip(3)->first()->type_name }}</a></h4>
                    <hr>
                    <table id="items" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:50px">分類</th>
                                <th style="width:80px">產品名稱</th>
                                <th>產品內容</th>
                                <th style="width:50px">價格</th>
                                <th style="width:50px;">排序</th>
                                <th style="width:100px">功能</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->productType->type_name }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->sort }}</td>
                                <td>
                                    <a href="/admin/product/edit/{{ $item->id }}" class="btn btn-sm btn-success">修改</a>
                                    <a href="#" class="btn btn-sm btn-danger" data-itemid="{{ $item->id }}">刪除</a>
                                    <form class="destroy-form" action="/admin/product/destroy/{{ $item->id }}"
                                        method="POST" style="display: none;" data-itemid="{{ $item->id }}">
                                        @csrf
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')

<script>
    $(document).ready(function() {
        $('#items').DataTable({
            "sort": [1,"desc"]
        });

        $('#items').on('click','.btn-danger', function(){
            event.preventDefault();
            var r = confirm("你確定要刪除此項目嗎?");
            if (r == true ){
                var itemid = $(this).data("itemid");
                $(`.destroy-form[data-itemid="${itemid}"]`).submit();
            }

        });
    });

</script>
@endsection
