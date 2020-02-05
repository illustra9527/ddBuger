@extends('layouts.app')

@section('css')

@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">分店城市管理 index</div>
                <div class="card-body">
                    <a href="/admin/location_city/create" class="btn btn-primary">新增城市</a>
                    <hr>
                    <table id="locationCity" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>城市</th>
                                <th>排序</th>
                                <th>功能</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->city_name }}</td>
                                <td>{{ $item->sort }}</td>
                                <td style="width:100px">
                                    <a href="/admin/location_city/edit/{{ $item->id }}" class="btn btn-sm btn-success">修改</a>
                                    <a href="#" class="btn btn-sm btn-danger" data-itemid="{{ $item->id }}">刪除</a>

                                    <form class="destroy-form" action="/admin/location_city/destroy/{{ $item->id }}"
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
        $('#locationCity').DataTable();

        $('#locationCity').on('click','.btn-danger', function(){
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
