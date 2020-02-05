@extends('layouts.app')

@section('css')

@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">訂單詳情 - {{ $order->order_no }}</div>
                <div class="card-body">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">餐點</th>
                                <th scope="col">價錢</th>
                                <th scope="col">數量</th>
                                <th scope="col">小計</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderItems as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->product->title }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->qty * $item->price }}</td>
                            </tr>
                            @endforeach
                            <tr class="table-warning">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b>總計</b></td>
                                <td><b>{{ $order->total_price }}</b></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <h5 class="mb-2">訂購人資訊</h5>
                        <div class="row">
                            <div class="col-10">
                                <div class="form-group row">
                                    <label for="recipient_name"
                                        class="col-sm col-form-label cus_style">姓&emsp;&emsp;名</label>
                                    <div class="col-sm-10">
                                        {{ $order->recipient_name }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="recipient_phone"
                                        class="col-sm col-form-label cus_style">手&emsp;&emsp;機</label>
                                    <div class="col-sm-10">
                                        {{ $order->recipient_phone }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="recipient_addresss"
                                        class="col-sm col-form-label cus_style">地&emsp;&emsp;址</label>
                                    <div class="col-sm-10">
                                        {{ $order->recipient_addresss }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="recipient_email"
                                        class="col-sm col-form-label cus_style">信&emsp;&emsp;箱</label>
                                    <div class="col-sm-10">
                                        {{ $order->recipient_email }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="recipient_time" class="col-sm col-form-label cus_style">收貨時間</label>
                                    <div class="col-sm-10 d-flex">
                                        {{ $order->recipient_time }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="receipt" class="col-sm col-form-label cus_style">發票類型</label>
                                    <div class="col-sm-10 d-flex">
                                        {{ $order->receipt }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="recipient_remark"
                                        class="col-sm col-form-label cus_style">備&emsp;&emsp;註</label>
                                    <div class="col-sm-10">
                                        {{ $order->remark }}
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
@endsection
