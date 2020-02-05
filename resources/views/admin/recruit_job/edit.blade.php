@extends('layouts.app')

@section('css')

@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">徵才訊息 - 修改</div>

                <div class="card-body">

                    <form method="post" action="/admin/recruit_job/update/{{ $shop_detail->id }}">
                        @csrf
                        <div class="form-group row">
                            <label for="city_id" class="col-sm-2 col-form-label">城市</label>
                            <div class="col-sm-2">
                                <select name="city_id" id="city_id" class="selectpicker form-control" data-cityid="{{ $shop_detail->city_id }}">
                                    <option value="0" disabled selected>--請選擇--</option>
                                    @foreach ($citys as $key => $value)
                                        <option value="{{ $key }}"
                                        @if (  $key == $shop_detail->city_id) selected
                                        @endif>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-8">
                                <select name="shop_id" id="shop" class="selectpicker form-control" data-shopid="{{ $shop_detail->shop_id }}">
                                    <option value="0" disabled selected>--請先選擇城市--</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact_name" class="col-sm-2 col-form-label">聯絡人</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="contact_name" name="contact_name" required value="{{ $shop_detail->contact_name }}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="remark" class="col-sm-2 col-form-label">備註</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="remark" id="remark" cols="30" rows="5">{{ $shop_detail->remark }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sort" class="col-sm-2 col-form-label">排序</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="sort" name="sort" value="{{ $shop_detail->sort }}">
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
    $(document).ready(function(){
        var shop_id = $('select[name="shop_id"]').attr('data-shopid') ; // 找到這個徵才資訊的真實資料shop_id
        var city_id = $('select[name="city_id"]').attr('data-cityid') ; // 找到這個徵才資訊的真實資料city_id
        // 要抓到這筆資料的舊資料，最快的方法就是塞 data-attribute

        // 載入舊資料，就必須先在網頁跑好時先跑一次 ajax 去抓舊資料
        $.ajax({
            method: 'get',
            url: '/admin/getShops/'+city_id, // 把資料傳送給後端 (然後執行route)
            dataType:'json',
            success: function (res) { //後端成功後 收到訊息 -> 執行以下功能

                // 接收到資料後
                // (1) 清空第二欄所有選項
                // (2) 長出所有的選項
                // (3) 判斷式，如果資料符合時被選擇

                $('#shop').empty();

                $.each(res, function(value, key){
                    var option = new Option(key, value);
                    $('#shop').append($(option));
                    $("#shop").selectpicker("refresh");

                });


                if (shop_id == $(`#shop option[value=${shop_id}]`).val() ) {
                    $(`#shop option[value=${shop_id}]`).prop("selected", true);
                    $("#shop").selectpicker("refresh");
                }else{
                    $('#shop').empty();
                }

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error(textStatus + " " + errorThrown);
            }
        })




    $('select[name="city_id"]').on('change',function(){
        var city_id = $(this).val();

        if (city_id){

            $.ajax({
                method: 'get',
                url: '/admin/getShops/'+city_id, // 把資料傳送給後端 (然後執行route)
                dataType:'json',
                success: function (res) { //後端成功後 收到訊息 -> 執行以下功能

                    $('#shop').empty();

                    $.each(res, function(value, key){

                        var option = new Option(key, value); $('#shop').append($(option));
                        $("#shop").selectpicker("refresh");

                    });

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        }else{
            $('select[name="shop_id"]').empty();
        }
    });





});

</script>

@endsection
