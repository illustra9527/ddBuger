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

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <link rel="stylesheet" href="./css/index.css">
    <link rel="shortcut icon" href="./img/logo.ico" type="image/x-icon">
    <title>丹丹漢堡</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-nav fixed-top" id="nav">
        <div class="container">
            <a class="navbar-brand" href="/">
                <div class="nav_logo hvr-wobble-to-bottom-right">
                    <img src="./img/logo.svg" alt="">
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
                <ul class="navbar-nav ">
                    <li class="nav-item mr-3">
                        <a class="nav-link nav_font_style hvr-float-shadow" href="#section_2">菜單<span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item  mr-3">
                        <a class="nav-link nav_font_style hvr-float-shadow" href="#section_4">丹丹據點</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link nav_font_style hvr-float-shadow nav_news" href="#section_6">最新消息</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link nav_font_style hvr-float-shadow nav_about" href="#section_6">關於丹丹</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link nav_font_style hvr-float-shadow" href="#section_5">丹心獨具</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link nav_font_style hvr-float-shadow" href="#section_6">聯繫丹丹</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link nav_font_style hvr-float-shadow nav_job" href="#section_6">勇於成丹</a>
                    </li>
                </ul>
                <div class="nav_right navbar-nav mr-0">
                    <div class="nav_right_log d-flex">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link nav_logout" href="{{ route('login') }}">登入/註冊</a>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link nav_logout dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    登出
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest

                    </div>
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
                        <a href="/cart">
                            <img src="./img/cart.svg" alt="">
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
        {{-- Index Banner --}}
        <section id="section_1">
            <!-- Swiper -->
            <div class="swiper-container swiper_banner">
                <div class="swiper-wrapper">
                    @foreach ($banners as $banner)
                    <div class="swiper-slide"><img src="{{ '/storage/'.$banner->img }}" alt="{{ $banner->title }}">
                    </div>
                    @endforeach
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

        </section>


        {{-- Menu --}}
        <section id="section_2">

            <div>
                <a href="#section_1" class="go_to_top"><i class="fas fa-chevron-circle-up fa-3x hvr-bounce-in"></i></a>

            </div>

            <div class="container container_cus">
                <div class="section_2_title d-flex justify-content-end">
                    <div class="section_2_burger">
                        <img src="/img/float/chef-bird.png" alt="" data-aos="fade-up" data-aos-delay="1000"
                            data-aos-easing="ease-out-cubic" class="hvr-wobble-top">
                        <img src="/img/float/Groundhog.png" alt="" data-aos="fade-up" data-aos-delay="1500"
                            data-aos-easing="ease-out-cubic" class="hvr-bob">
                        <img src="/img/float/dog.png" alt="" data-aos="fade-up" data-aos-delay="1500"
                            data-aos-easing="ease-out-cubic" class="hvr-buzz">
                    </div>
                    <h2 data-aos="fade-up" data-aos-duration="500">菜單</h2>
                </div>
                <div class="section_2_menu">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @foreach ($product_types as $product_type)
                        <li class="nav-item">
                            <a class="nav-link {{ $loop->first ?  'active' : '' }} "
                                id="{{ 'menu_tab_'.$product_type->type_name }}" data-toggle="tab"
                                href="{{ '#menu_'.$product_type->type_name }}" role="tab"
                                aria-controls="{{ 'menu_'.$product_type->type_name }}"
                                aria-selected="true">{{ $product_type->type_name }}</a>
                        </li>

                        @endforeach
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        @foreach ($product_types as $product_type)

                        <div class="tab-pane fade show {{ $loop->first ?  'active' : '' }}"
                            id="{{ 'menu_'.$product_type->type_name }}" role="tabpanel"
                            aria-labelledby="{{ 'menu_tab_'.$product_type->type_name }}">

                            <div class="tab_content_container d-flex flex-wrap">
                                <div class="row">
                                    @foreach ($product_type->products as $product)
                                    <div class="col-6 col-md-4 col-lg-3">
                                        <div class="card">
                                            <div class="card_title">
                                                <h5>{{ $product->title }}</h5>
                                            </div>
                                            <img src="{{ '/storage/'.$product->img }}" class="card-img-top" alt="set-1">
                                            <div class="card-body py-2 card_btn">
                                                <button type="button"
                                                    class="btn btn-outline-primary btn-sm card_btn addcart"
                                                    data-productid="{{ $product->id }}"><span>加入購物車</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
                <div class="section_2_bot py-3 px-5">
                    <div class="section_2_bot_btns d-flex">
                        <button type="button" class="btn btn-info mr-3 menu_btn" data-toggle="modal"
                            data-target="#menu-full">完整菜單</button>
                        <a href="/cart" class="btn btn-success check_btn">點我結帳</a>
                    </div>
                </div>

            </div>

            <!-- Modal of Menu-->
            <div class="modal fade" id="menu-full" tabindex="-1" role="dialog" aria-labelledby="menu-fullLabel"
                aria-hidden="true">
                <div id="trigger-right" style="display:none;"></div>
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="menu-fullLabel">丹丹漢堡</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img src="./img/menu.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success">點我下載 pdf</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


        </section>


        {{-- Social Media --}}
        <section id="section_3">
            <div class="container container_cus">
                <div class="section_3_top">
                    <div class="section_3_float" data-aos="fade-up" data-aos-delay="2000"
                        data-aos-easing="ease-out-cubic">
                        <img src="/img/float/nuggets.png" alt="" class="hvr-wobble-top">
                    </div>
                    <h2>Social Media</h2>
                </div>

                <div class="section_3_swiper_container">
                    <!-- Swiper -->
                    <div class="swiper-container section_3_swiper">
                        <div class="swiper-wrapper">

                            @foreach ($social_medias as $social_media)
                            <div class="swiper-slide">
                                <iframe src="{{ $social_media->post.'embed' }}" width="320" height="400" frameborder="0"
                                    scrolling="no" allowtransparency="true"></iframe>
                            </div>
                            @endforeach

                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>

        </section>


        {{-- Locations --}}
        <section id="section_4">
            <!-- <div class="section_4_banner"></div> -->
            <div class="section_4_locations">
                <div class="container container_cus">
                    <div class="section_4_top">
                        <h2 data-aos="zoom-in-left" data-aos-duration="500">丹丹據點</h2>
                        <div class="section_4_float">
                            <img src="/img/float/lab_burger.png" alt="" data-aos="fade-up" data-aos-delay="1000"
                                data-aos-easing="ease-out-cubic">
                        </div>
                    </div>
                    <div class="section_4_locations_content d-flex justify-content-around mt-1">
                        @foreach ($locationCities as $locationCity)
                        <div class="location_city hvr-buzz-out" data-aos="flip-left">
                            <a data-toggle="modal" data-target="{{ '#'.$locationCity->city_name }}">
                                <div class="text-center">
                                    <h4>{{ $locationCity->city_name }}</h4>
                                </div>
                                <div class="location_img ">
                                    <img class="img-fluid " src="{{ '/storage/'.$locationCity->img }}"
                                        alt="{{ $locationCity->city_name }}">
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>


            @foreach ($locationCities as $locationCity)
            <div class="modal fade" id="{{ $locationCity->city_name }}" tabindex="-1" role="dialog"
                aria-labelledby="{{ $locationCity->city_name }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="{{ $locationCity->city_name }}">{{ $locationCity->city_name }}
                            </h5>
                            <button type="button " class="close modal_btn" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="{{ 'accordion'.$locationCity->city_name }}">
                                @foreach ($locationCity->locations as $location)
                                <div class="card">
                                    <div class="card-header" id="{{ $location->id }}">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse"
                                                data-target="{{ '#collapse_'.$locationCity->id.'_'.$location->id }}"
                                                aria-expanded="true"
                                                aria-controls="{{ 'collapse_'.$locationCity->id.'_'.$location->id }}">
                                                {{ $location->title }}
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="{{ 'collapse_'.$locationCity->id.'_'.$location->id }}" class="collapse"
                                        aria-labelledby="{{ $location->id }}"
                                        data-parent=" {{ '#accordion'.$locationCity->city_name }}">
                                        <div class="card-body">
                                            <div class="location_info">
                                                <span>店名：{{ $location->title }}</span><br>
                                                <span>地址：{{ $location->address }}</span><br>
                                                <span>電話：{{ $location->phone }}</span><br>
                                                <span>營業時間：{{ $location->opening }}</span><br>
                                                <span>固定店休：週二</span><br>
                                            </div>
                                            <div class="location_icon">
                                                <a href="{{ $location->fbLink }}" target="_blank"><img
                                                        src="./img/icons/FB-Icon.png" alt=""></a>
                                                <a href="{{ $location->mapLink }}" target="_blank"><img
                                                        src="./img/icons/Google_Maps_icon.svg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary modal_btn"
                                data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


        </section>


        {{-- Features --}}
        <section id="section_5">
            <div class="container container_cus">
                <h2>丹心獨具</h2>

                <div class="row px-3 section_5_content_top ">

                    <div class="section_5_features col-md-5 col-12 align-baseline" data-aos="fade-right"
                        data-aos-duration="1000" data-aos-offset="100"></div>
                    <div class="section_5_features  col-md-5 col-12 align-middle" data-aos="fade-up"
                        data-aos-anchor-placement="center-bottom" data-aos-duration="1500"></div>

                </div>

                <div class="row px-3 section_5_content_bot">
                    <div class="section_5_features col-md-5 col-12" data-aos="fade-up-right" data-aos-easing="linear"
                        data-aos-duration="1500"></div>
                    <div class="section_5_features  col-12 col-md-5 " data-aos="fade-up-left" data-aos-duration="1500">
                    </div>
                </div>
            </div>
        </section>

        {{-- Contact, News, About, Job --}}
        <section id="section_6">
            <div class="container container_cus">
                <div class="section_6_conten">
                    <div class="row ">
                        <div class="col-4 col-sm-3">
                            <div class="nav flex-column nav-pills title" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-contact-tab" data-toggle="pill"
                                    href="#v-pills-contact" role="tab" aria-controls="v-pills-contact"
                                    aria-selected="true">聯繫丹丹
                                </a>

                                <a class="nav-link" id="v-pills-about-tab" data-toggle="pill" href="#v-pills-about"
                                    role="tab" aria-controls="v-pills-about" aria-selected="false">關於丹丹</a>

                                <a class="nav-link modal_link" data-toggle="modal" data-target="#news_modal">最新消息

                                </a>

                                <a class="nav-link modal_link" data-toggle="modal" data-target="#recruit_modal">勇於成丹
                                </a>
                            </div>
                        </div>

                        <!-- Modal of news-->
                        <div class="modal fade" id="news_modal" tabindex="-1" role="dialog"
                            aria-labelledby="news_modalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="news_modalLabel">News</h5>
                                        <button type="button " class="close modal_btn" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="list-group">

                                            {{-- TEST --}}
                                            @foreach ($news as $item)

                                            <a data-toggle="modal" data-target="{{ '#news_content_model'.$item->id }}"
                                                class="list-group-item list-group-item-action {{ $loop->first ?  'active' : '' }}">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1">{{ $item->title }}</h5>
                                                    <small>{{ $item->newsType->type_name }}</small>
                                                </div>
                                                <p class="mb-1">{{ $item->title }}</p>
                                                <small>{{ $item->subtitle }}...點擊看更多</small>
                                            </a>
                                            @endforeach

                                            <!-- Modal in News-->
                                            @foreach ($news as $item)
                                            <div class="modal fade" id="{{ 'news_content_model'.$item->id }}"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="{{ 'news_content_model'.$item->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="{{ 'news_content_model'.$item->id }}">
                                                                {{ $item->title }}
                                                            </h5>
                                                            <button type="button" class="close news_close_btn"
                                                                aria-label="Close" data-itemid="{{ $item->id }}">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="{{ '/storage/'.$item->img }}" class="img-fluid"
                                                                style="width:300px" alt="">
                                                            <div> <span>{{ $item->description }}</span></div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                class="btn btn-secondary news_close_btn"
                                                                data-itemid="{{ $item->id }}">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary modal_btn"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal of recruit-->
                        <div class="modal fade" id="recruit_modal" tabindex="-1" role="dialog"
                            aria-labelledby="recruit_modalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="recruit_modalLabel">勇於成丹 - Wanted</h5>
                                        <button type="button" class="close modal_btn" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="recruit_content">
                                            <div class="recruit_content_img"><img
                                                    src="{{ '/storage/'.$recruit_content->img }}" class="img-fluid"
                                                    alt="job recruit"></div>

                                            <div class="recruit_content_job">
                                                <h5>{{ $recruit_content->title }}</h5>
                                                <hr>
                                                <div class="recruit_content_job_conditions">
                                                    <span>
                                                        {{ $recruit_content->description }}
                                                    </span>
                                                    <small style="color: red">
                                                        {{ $recruit_content->remark }}
                                                    </small>
                                                </div>

                                            </div>
                                        </div>
                                        <hr>
                                        <h5 class="mb-3">
                                            <button href="#" type="button"
                                                class="btn btn-outline-primary btn-sm">顯示全部</button>

                                            @foreach ($locationCities as $locationCity)
                                            <button type="button" href="#" type="button"
                                                class="btn {{ $loop->first ?  'btn-outline-danger' : 'btn-outline-info' }} btn-sm px-4"
                                                data-cityid="{{ $locationCity->id }}"
                                                name="job_locationCity_id">{{ $locationCity->city_name }}</button>
                                            @endforeach

                                        </h5>

                                        <div class="accordion" id="accordionRecruit">

                                            @foreach ($recruit_jobs as $recruit_job)
                                            <div class="card">
                                                <div class="card-header" id="{{'recruite'.$recruit_job->id}}">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link" type="button"
                                                            data-toggle="collapse"
                                                            data-target="{{'#recruit_'.$recruit_job->id }}"
                                                            aria-expanded="true"
                                                            aria-controls="{{'recruit_'.$recruit_job->id }}">
                                                            {{ $recruit_job->locationCity->city_name }}
                                                            {{ $recruit_job->locationCity->locations->find($recruit_job->shop_id)->title }}
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="{{'recruit_'.$recruit_job->id }}" class="collapse"
                                                    aria-labelledby="{{'recruite'.$recruit_job->id}}"
                                                    data-parent="#accordionRecruit">
                                                    <div class="card-body">
                                                        <span>
                                                            地址：{{ $recruit_job->locationCity->locations->find($recruit_job->shop_id)->address }}
                                                            <br>
                                                            電話：{{ $recruit_job->locationCity->locations->find($recruit_job->shop_id)->phone }}
                                                            <br>
                                                            聯絡人：{{ $recruit_job->contact_name }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary modal_btn"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Contact and about-->
                        <div class="col col-md-9">
                            <div class="tab-content contact_content " id="v-pills-tabContent">
                                <!-- contact -->
                                <div class="tab-pane fade show active" id="v-pills-contact" role="tabpanel"
                                    aria-labelledby="v-pills-contact-tab">
                                    <form>
                                        <div class="form-group">
                                            <label for="contact_name">姓名</label>
                                            <input type="text" class="form-control col-form-label-sm" id="contact_name"
                                                placeholder="張嘉航" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="contact_mail">Email</label>
                                            <input type="email" class="form-control form-control-sm" id="contact_mail"
                                                placeholder="填寫信箱 gg3b0@example.com">
                                        </div>
                                        <div class="form-group">
                                            <label for="contact_location">分店</label>
                                            <input type="text" class="form-control form-control-sm"
                                                id="contact_location" placeholder="高雄七賢店" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="contact_content">您的意見回饋</label>
                                            <textarea class="form-control" id="contact_content" rows="3"
                                                required></textarea>
                                            <small style="color: red">請注意此表單無法即時回覆，故無法用於點餐、訂位</small>
                                        </div>
                                        <div class="contact_form_btns d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary sub_btn px-3">Send</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- about -->
                                <div class="tab-pane fade" id="v-pills-about" role="tabpanel"
                                    aria-labelledby="v-pills-about-tab">
                                    <h4>關於丹丹</h4>
                                    <span>1984年起源高雄七賢，以台灣本土小吃為藍本開發，結合西方炸雞漢堡，創造出屬於台灣的平價速食餐點。深根台灣。</span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

    </main>


    <footer>
        <div class="footer_top">
            <div class="container">
                <!--  <div class="footer_links py-4">
                    <ul>
                        <li class="text-center">
                            <a class="py-1 d-block hvr-bob" href="">關於丹丹</a>
                        </li>
                        <li class="text-center">
                            <a class="py-1 d-block hvr-bob" href="">最新消息</a>
                        </li>
                        <li class="text-center">
                            <a class="py-1 d-block hvr-bob" href="">聯繫丹丹</a>
                        </li>
                        <li class="text-center">
                            <a class="py-1 d-block hvr-bob" href="">人才招募</a>
                        </li>
                    </ul>
                </div> -->
            </div>
        </div>
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

    <!-- Swiper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>

    <!-- AOS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true //只執行一次AOS
        })



    </script>

    <!-- IG -->
    <script async src="//www.instagram.com/embed.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
    {{-- 購物車 --}}
    <script>
        /* 加入購物車按鈕綁定 */
        $('.addcart').on('click',function () {
            var product_id = $(this).data('productid');
            console.log(product_id);
            $('.cartTotalQuantity').effect("bounce");    // 點擊加入購物車後抖動一下（利用套件）


             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: '/addCart',
                data: {product_id:product_id},
                success: function (res) {
                    console.log(res);

                    $('.cartTotalQuantity').text(res);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        });

    </script>

    <script>
        // Initialize Swiper
        var swiper_banner = new Swiper('.swiper_banner', {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        /* section_3_swiper */

        var swiper_ig = new Swiper('.section_3_swiper', {
            slidesPerView: 3,
            spaceBetween: 30,
            freeMode: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                768: {
                slidesPerView: 1,
                spaceBetween: 20,
                },
                1200: {
                slidesPerView: 2,
                spaceBetween: 20,
                },
            }
        });

        //
        $('.modal_link').on('click', function () {
            $(this).addClass('active');
            that = this
            setTimeout(function () {
                $(that).removeClass('active');
            }, 2000);
        })

        $('.modal_btn').on('click', function () {
            $('.modal_link').removeClass('active');

        })

    </script>


    <script>
        /* 底下的表格的button選項設定 */
        // 要先抓到屬於那個的按鈕(用data-attribute取得id)

        $(":button.news_close_btn").on('click', function(){
            var news_id = $(this).data('itemid');

            $(`#news_content_model${news_id}`).modal('hide');


        });

        $('.list-group-item').on('click', function(){
            $('.list-group-item').removeClass('active');
            $(this).addClass('active');
        })




        // 徵才資訊的地點篩選
        $(':button[name="job_locationCity_id"]').on('click', function(ev){

            var city_id = $(this).attr('data-cityid');
            // 抓到 city_id

            $.ajax({
            method: 'get',
            url: '/job/'+city_id, // 把資料傳送給後端 (然後執行route)
            data: {
            city_id:city_id
            },
            success: function (res) { //後端成功後 收到訊息 -> 執行以下功能

                console.log(res);
                var recruit_jobs = res.value();
                $("#accordionRecruit").empty();

                for (var recruit_job of recruit_jobs){
                    console.log(recruit_job);

                }
                // {"id":3,"city_id":1,"shop_id":"6","contact_name":"JIA-YUN","remark":"dzvfbvfb","sort":122,"created_at":"2020-01-04 10:07:24","updated_at":"2020-01-04 10:07:24"}
                // $("#accordionRecruit").load(recruit_jobs);

            },
            })

        });

        /* go to top */

        function top_icon() {

            let scrollH = document.documentElement.scrollTop;

            if (scrollH >= 200) {
                $('.go_to_top').addClass('visible')
            } else {
                $('.go_to_top').removeClass('visible')
            }

        }

        window.addEventListener('scroll', function () {
            top_icon();
        });





    </script>
</body>

</html>
