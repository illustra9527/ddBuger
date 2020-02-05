<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css">
    <!-- hover.css -->
    <link href="https://cdn.bootcss.com/hover.css/2.3.1/css/hover-min.css" rel="stylesheet" media="all">

    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link rel="stylesheet" href="/css/index.css">
    <link rel="shortcut icon" href="{{ asset('img/logo.ico') }}" type="image/x-icon">
    <title>丹丹漢堡 - 購買資訊填寫</title>

    <style>
        .cart_container {
            padding-top: 60px;
            min-height: calc(100vh - 78px);
        }

        .cus_style{
            text-align: center;
        }

        footer {
            width: 100%;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-nav fixed-top" id="nav">
        <div class="container">
            <a class="navbar-brand" href="/">
                <div class="nav_logo hvr-wobble-to-bottom-right">
                    <img src="{{ asset('img/logo.svg') }}" alt="">
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
                <ul class="navbar-nav ">
                    <li class="nav-item mr-3">
                        <a class="nav-link nav_font_style hvr-float-shadow" href="/#section_2">菜單<span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item  mr-3">
                        <a class="nav-link nav_font_style hvr-float-shadow" href="/#section_4">丹丹據點</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link nav_font_style hvr-float-shadow" href="/#section_6">最新消息</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link nav_font_style hvr-float-shadow" href="/#section_6">關於丹丹</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link nav_font_style hvr-float-shadow" href="/#section_5">丹心獨具</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link nav_font_style hvr-float-shadow" href="/#section_6">聯繫丹丹</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link nav_font_style hvr-float-shadow" href="/#section_6">勇於成丹</a>
                    </li>
                </ul>
                <div class="nav_right navbar-nav mr-0">
                    <div class="nav-item dropdown nav_right_lang">
                        <a class="nav-link dropdown-toggle nav_font_style" href="#" id="navbarDropdownMenuLink"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            中文
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item nav_toggle_font_style " href="#">English</a>
                            <a class="dropdown-item nav_toggle_font_style " href="#">日本語</a>
                        </div>
                    </div>
                    <div class="nav_right_card">
                        <a href="">
                            <img src="/img/cart.svg" alt="">
                            <span class="cartTotalQuantity">
                                @guest
                                0
                                @else
                                <?php
                                    $userId = auth()->user()->id;
                                    $cartTotalQuantity = \Cart::session($userId)->getTotalQuantity();
                                    echo $cartTotalQuantity;
                                ?>
                                @endguest

                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main>

        <div class="container">
            <div class="cart_container">
                <h2 class="mt-3 mb-3">付款成功~</h2>
                <h5>商品明細</h5>
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
                        @foreach ($new_contents->orderItems as $item)
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
                            <td><b>{{ $new_contents->total_price }}</b></td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <h5 class="mb-2">訂購人資訊</h5>
                <form method="post" action="/cartPayment">
                    @csrf
                    <div class="row">
                        <div class="col-10">
                            <div class="form-group row">
                                <label for="recipient_name" class="col-sm col-form-label cus_style">姓&emsp;&emsp;名</label>
                                <div class="col-sm-10">
                                        {{ $new_contents->recipient_name }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="recipient_phone" class="col-sm col-form-label cus_style">手&emsp;&emsp;機</label>
                                <div class="col-sm-10">
                                        {{ $new_contents->recipient_phone }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="recipient_addresss" class="col-sm col-form-label cus_style">地&emsp;&emsp;址</label>
                                <div class="col-sm-10">
                                        {{ $new_contents->recipient_addresss }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="recipient_email" class="col-sm col-form-label cus_style">信&emsp;&emsp;箱</label>
                                <div class="col-sm-10">
                                        {{ $new_contents->recipient_email }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="recipient_time" class="col-sm col-form-label cus_style">收貨時間</label>
                                <div class="col-sm-10 d-flex">
                                        {{ $new_contents->recipient_time }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="receipt" class="col-sm col-form-label cus_style">發票類型</label>
                                <div class="col-sm-10 d-flex">
                                        {{ $new_contents->receipt }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="recipient_remark" class="col-sm col-form-label cus_style">備&emsp;&emsp;註</label>
                                <div class="col-sm-10">
                                        {{ $new_contents->remark }}
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </main>


    <footer>
        <!-- Copyright -->
        <div class="footer_bot">
            <div class="footer-copyright text-center py-1">© 2019 Copyright:
                <a href="#" class="text-decoration-none"> illustra9527</a>
            </div>

        </div>

    </footer>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>


</body>

</html>
