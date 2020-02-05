@extends('layouts.app')

@section('css')

@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">徵才訊息 - 新增</div>

                <div class="card-body">

                    <form method="post" action="/admin/recruit_job/store">
                        @csrf
                        <div class="form-group row">
                            <label for="city_id" class="col-sm-2 col-form-label">城市</label>
                            <div class="col-sm-2">
                                <select name="city_id" id="city_id" class="selectpicker form-control">
                                    <option value="0" disabled selected>--請選擇--</option>
                                    @foreach ($citys as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-8">
                                    <select name="shop_id" id="shop" class="selectpicker form-control">
                                        <option value="0" disabled selected>--請先選擇城市--</option>
                                    </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact_name" class="col-sm-2 col-form-label">聯絡人</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="contact_name" name="contact_name" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="remark" class="col-sm-2 col-form-label">備註</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="remark" id="remark" cols="30" rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sort" class="col-sm-2 col-form-label">排序</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="sort" name="sort" value="1">
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

<script>
    $(document).ready(function(){


    $('select[name="city_id"]').on('change',function(){
        var city_id = $(this).val();

        if (city_id){

            console.log('city_id=', city_id);


             $.ajax({
                method: 'get',
                url: '/admin/getShops/'+city_id, // 把資料傳送給後端 (然後執行route)
                dataType:'json',
                success: function (res) { //後端成功後 收到訊息 -> 執行以下功能
                    console.log('res=',res);
                    console.log('first log #shop select= ',$('#shop'));
                    /* $('select[name="shop_id"]').html(res.html); */

                    $('#shop').empty();
                    console.log('log #shop after empty=',$('#shop'));


                    $.each(res, function(value, key){

                        var option = new Option(key, value); $('#shop').append($(option));
                        $("#shop").selectpicker("refresh");

/*      way of 5 -> 有長option 沒有選項

                        $('#shop').append($('<option>', {value:key, text:value})); */
/*      way of 4 -> 有長option 沒有選項
                        $('#shop').append(new Option(key, value)); */

/* Ref: https://stackoverflow.com/questions/740195/adding-options-to-a-select-using-jquery */

/*      way of 3 -> 沒長
                       $("<option/>", {
                            "value": key,
                            "text": value
                        }).appendTo($("#shop"); */

                        /* $('select[id="shop"]').
                        append($("<option></option>").
                        attr("key", value).
                        text(value)); */

/*     way of 2 -> 有長option 沒有選項
                        $('.filter-option-inner').append(`<div class="filter-option-inner-inner">${value}</div>`) */

/*      way of 1 -> 有長option 沒有選項
                        var content = `<option value="${key}">${value}</option>`;
                        console.log(content);
                        $('select[id="shop"]').append(content); */

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
