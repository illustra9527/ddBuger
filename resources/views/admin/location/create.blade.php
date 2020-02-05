@extends('layouts.app')

@section('css')



@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">分店管理 create</div>
                <div class="card-body">
                    <form method="post" action="/admin/location/store" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="city_id" class="col-sm-2 col-form-label">城市</label>
                            <div class="col-sm-10">
                                <select name="city_id" id="city_id" class="form-control">
                                    <option value="0" disabled selected>--請選擇--</option>
                                    @foreach ($locationCities as $item)
                                    <option value="{{ $item->id }}">{{ $item->city_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">店名</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="img" class="col-sm-2 col-form-label">店照</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="img" name="img"
                                            aria-describedby="img" required>
                                        <label class="custom-file-label" for="img">選擇檔案</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">地址</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">電話</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="opening" class="col-sm-2 col-form-label">營業時間</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="opening" name="opening" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="holiday" class="col-sm-2 col-form-label ">固定店休</label>
                            <div class="col-sm-10 d-flex" >
                                    <select class="selectpicker form-control" name="holiday" multiple>
                                        <option value="1">無休</option>
                                        <option>週一</option>
                                        <option>週二</option>
                                        <option>週三</option>
                                        <option>週四</option>
                                        <option>週五</option>
                                        <option>週六</option>
                                        <option>週日</option>
                                    </select>


                                {{-- <div class="form-check mr-2">
                                    <input class="form-check-input holidayCheckBox" id="monday" type="checkbox">
                                    <label class="form-check-label" for="monday">週一</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input holidayCheckBox" id="tuesday" type="checkbox">
                                    <label class="form-check-label" for="tuesday">週二</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input holidayCheckBox" id="wednesday" type="checkbox">
                                    <label class="form-check-label" for="wednesday">週三</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input holidayCheckBox" id="thursday" type="checkbox">
                                    <label class="form-check-label" for="thursday">週四</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input holidayCheckBox" id="friday" type="checkbox">
                                    <label class="form-check-label" for="friday">週五</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input holidayCheckBox" id="saturdau" type="checkbox">
                                    <label class="form-check-label" for="saturdau">週六</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input holidayCheckBox" id="sunday" type="checkbox">
                                    <label class="form-check-label" for="sunday">週日</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input holidayCheckBox" id="nonOff" type="checkbox">
                                    <label class="form-check-label" for="nonOff">無公休</label>
                                </div>
                                <input type="text" name="holiday" for="holiday" id="holiday"> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fbLink" class="col-sm-2 col-form-label">Facebook</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fbLink" name="fbLink" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mapLink" class="col-sm-2 col-form-label">Google map</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="mapLink" name="mapLink" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sort" class="col-sm-2 col-form-label">排序</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="sort" name="sort" value="1" required>
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



/*     $('.holidayCheckBox').on('change', function(){
        // 當checkbox 被check時，取得該label的值塞到真正的input裡面
        if(this.checked){
            var offday = $('label[for="' + this.id + '"]').html();

            $('#holiday').val(offday);

        }

    }) */

</script>
@endsection
