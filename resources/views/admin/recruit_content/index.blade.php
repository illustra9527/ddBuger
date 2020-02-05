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

                    <a class="btn btn-primary" href="/admin/recruit_content/edit">修改</a>
                    <hr>

                    <table id="recruit_content" class="table table-striped table-bordered" style="width:100%">
                        <tbody>
                            <tr>
                                <td style="width:100px">標題</td>
                                <td>{{ $item->title }}</td>
                            </tr>
                            <tr>
                                <td>圖片</td>
                                <td><img src="{{ '/storage/'.$item->img }}" alt="圖片未正確顯示"></td>
                            </tr>
                            <tr>
                                <td>徵才條件</td>
                                <td>{{ $item->description }}</td>
                            </tr>
                            <tr>
                                <td>備註</td>
                                <td>{{ $item->remark }}</td>
                            </tr>
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


</script>
@endsection
