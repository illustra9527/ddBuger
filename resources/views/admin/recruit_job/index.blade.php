@extends('layouts.app')

@section('css')

@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">徵才分店管理</div>
                <div class="card-body">
                    <a class="btn btn-primary" href="/admin/recruit_job/create">新增徵才資訊</a>
                    <hr>

                    <table id="recruit_job" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>城市</th>
                                <th>分店</th>
                                <th>聯絡人</th>
                                <th>排序</th>
                                <th style="width:150px">功能</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->locationCity->city_name }}</td>
                                <td> {{-- 如果 地點的id 等於 這個item的shop_id時，顯示 地點的店名 --}}
                                    @foreach ($locations as $location)
                                        @if ( $location->id == $item->shop_id )
                                            {{ $location->title }}
                                        @endif
                                    @endforeach
                                    {{-- {{ $item->shop_id }} --}}</td>
                                <td>{{ $item->contact_name }}</td>
                                <td>{{ $item->sort }}</td>
                                <td>
                                    <a href="/admin/recruit_job/edit/{{ $item->id }}"
                                        class="btn btn-success btn-sm">修改</a>
                                    <a class="btn btn-danger btn-sm" href="#" data-itemid="{{ $item->id }}">刪除</a>

                                    <form class="destroy-form" action="/admin/recruit_job/destroy/{{ $item->id }}"
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
        $('#recruit_job').DataTable({
            "sort": [1,"desc"]
        });

        $('#recruit_job').on('click','.btn-danger', function(){
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
