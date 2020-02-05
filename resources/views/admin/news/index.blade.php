@extends('layouts.app')

@section('css')

@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">最新消息管理</div>
                <div class="card-body">
                    <a href="/admin/news/create" class="btn btn-primary">新增消息</a>
                    <hr>
                    <table id="news" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:150px;">分類</th>
                                <th>標題</th>
                                <th style="width:50px;">排序</th>
                                <th style="width:120px;">功能</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->newsType->type_name }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->sort }}</td>
                                <td>
                                    <a href="/admin/news/edit/{{ $item->id }}" class="btn btn-sm btn-success">修改</a>
                                    <a href="#" class="btn btn-sm btn-danger" data-itemid="{{ $item->id }}">刪除</a>

                                    <form class="destroy-form" action="/admin/news/destroy/{{ $item->id }}"
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
        $('#news').DataTable();

        $('#news').on('click','.btn-danger', function(){
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
