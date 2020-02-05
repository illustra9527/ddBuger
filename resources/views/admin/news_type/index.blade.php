@extends('layouts.app')

@section('css')

@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">最新消息分類</div>
                <div class="card-body">
                    <a href="/admin/news_type/create" class="btn btn-primary">新增分類</a>
                    <hr>
                    <table id="news_type" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>類別名稱</th>
                                <th>排序</th>
                                <th style="width:120px;">功能</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->type_name }}</td>
                                <td>{{ $item->sort }}</td>
                                <td>
                                    <a href="/admin/news_type/edit/{{ $item->id }}" class="btn btn-sm btn-success">修改</a>
                                    <a href="#" class="btn btn-sm btn-danger" data-itemid="{{ $item->id }}">刪除</a>

                                    <form class="destroy-form" action="/admin/news_type/destroy/{{ $item->id }}"
                                        method="POST" style="display: none;" data-itemid="{{ $item->id }}">
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                            @endforeach
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
        $('#news_type').DataTable();

        $('#news_type').on('click','.btn-danger', function(){
            event.preventDefault();
            var r = confirm('你確定要刪除此項目嗎?');
            if (r == true){
                var itemid = $(this).data('itemid');
                $(`.destroy-form[data-itemid="${itemid}"]`).submit();
            }
        })
    } );
</script>
@endsection
