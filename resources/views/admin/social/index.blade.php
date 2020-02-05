@extends('layouts.app')

@section('css')

@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">社群貼文管理</div>
                <div class="card-body">

                    <a class="btn btn-primary" href="/admin/social/create">新增貼文</a>
                    <hr>

                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>標題</th>
                                <th style="width:100px">排序</th>
                                <th style="width:100px">功能</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->sort }}</td>
                                <td>
                                    <a href="/admin/social/edit/{{ $item->id }}"
                                        class="btn btn-success btn-sm">修改</a>
                                    <a class="btn btn-danger btn-sm" href="#" data-itemid="{{ $item->id }}">刪除</a>

                                    <form class="destroy-form" action="/admin/social/destroy/{{ $item->id }}"
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
        $('#table').DataTable({
            "sort": [1,"desc"]
        });

        $('#table').on('click','.btn-danger', function(){
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
