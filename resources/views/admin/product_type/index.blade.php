@extends('layouts.app')

@section('css')

@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">菜單分類管理</div>
                <div class="card-body">

                    <a class="btn btn-primary" href="/admin/product_type/create">新增分類</a>
                    <hr>

                    <table id="product_type" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>菜單類別</th>
                                <th>排序</th>
                                <th style="width:100px">功能</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->type_name }}</td>
                                <td>{{ $item->sort }}</td>
                                <td>
                                    <a href="/admin/product_type/edit/{{ $item->id }}"
                                        class="btn btn-success btn-sm">修改</a>
                                    <a class="btn btn-danger btn-sm" href="#" data-itemid="{{ $item->id }}">刪除</a>

                                    <form class="destroy-form" action="/admin/product_type/destroy/{{ $item->id }}"
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
        $('#product_type').DataTable({
            "sort": [1,"desc"]
        });

        $('#product_type').on('click','.btn-danger', function(){
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
