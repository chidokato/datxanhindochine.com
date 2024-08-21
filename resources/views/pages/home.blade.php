@extends('layout.index')

@section('title') Công Ty Cổ Phần Bất Động Sản Indochine @endsection
@section('description') Công Ty Cổ Phần Bất Động Sản Indochine là công ty thành viên của Đất Xanh Miền Bắc - UY TÍN số 1 thị trường BĐS Việt Nam @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('content')
<div id="page_wrapper" class="bg-white">
    <!-- @include('layout.header') -->
        <!-- <div class="full-row p-0 overflow-hidden bg-light">
            <div class="owl-carousel owl-theme home_slider">
                @foreach($slider as $key => $val)
                <div class="item"><img alt="slide" src="data/home/{{$val->slider->img}}"></div>
                @endforeach
            </div>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <form class="banner-search-form shadow-sm bg-white mb-3 quick-search form-icon-right position-relative" action="#" method="post" style="margin-top: -60px; z-index: 1">
                            <div class="row row-cols-lg-4 row-cols-md-4 row-cols-1 g-4">
                                <div class="col">
                                    <input type="text" class="form-control" name="keyword" placeholder="{{__('lang.text1')}}...">
                                </div>
                                <div class="col">
                                    <select class="form-control select2">
                                        <option>-- {{__('lang.text2')}} --</option>
                                        @foreach($search_cat as $val)
                                        <option>{{$val->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-control select2">
                                        <option>-- {{__('lang.text3')}} --</option>
                                        @foreach($search_province as $val)
                                        <option>{{$val->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <button class="btn btn-primary w-100">{{__('lang.text31')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- =============== Counting ================-->

        <!--============== Recent Property Start ==============-->
        <!-- <div class="full-row bg-light project-home">
            <div class="container">
                <div class="row">
                    <div class="col mb-4">
                        <h2 class="title-line">{{__('lang.text4')}}</h2>
                    </div>
                </div>
                <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 g-4">
                    @foreach($Posts as $val)
                    <div class="col iteam-product">
                        <div class="property-grid-1 property-block bg-white transation-this border-radius">
                            <div class="overflow-hidden position-relative transation thumbnail-img bg-secondary hover-img-zoom ">
                                <a href="{{$val->catslug}}/{{$val->post->slug}}"><img class="img-col-3 lazyload" data-src="data/product/{{$val->post->img}}" alt="{{$val->name}}"></a>
                                <a href="{{$val->catslug}}" class="listing-ctg text-white"><i class="fa-solid fa-building"></i><span>{{$val->CategoryTranslation->name}}</span></a>
                                <ul class="position-absolute quick-meta">
                                    <li class="md-mx-none"><a data-fancybox="" href="https://www.youtube.com/watch?v=bh-klGboIg8" class="" style="z-index: 10"><i class="flaticon-zoom-increasing-symbol flat-mini"></i></a></li>
                                </ul>
                            </div>
                            <div class="property_text p-4">
                                <h5 class="listing-title line"><a href="{{$val->catslug}}/{{$val->post->slug}}">{{$val->name}}</a></h5>
                                <span class="listing-location"><i class="fas fa-map-marker-alt"></i> {{$val->WardTranslation->name}}, {{$val->DistrictTranslation->name}}, {{$val->ProvinceTranslation->name}} </span>
                                @if($val->price > 0)
                                <span class="listing-price"><small>{{__('lang.text5')}}: </small>{{$val->price}} {{$val->unit}}</span>
                                @else
                                <span class="listing-price"><small>{{__('lang.text5')}}: </small>{{__('lang.text6')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div> -->
        <!--============== Recent Property End ==============-->

        <!--============== Property Category Start ==============-->
        <div class="full-row bg-secondary secondary ">
            <div class="container">
                <div class="row">
                    <div class="col mb-5">
                        <h2 class="down-line w-50 mx-auto mb-4 text-center text-white w-sm-100">{{__('lang.dv')}}</h2>
                        <span class="d-table w-50 w-sm-100 sub-title text-white fw-normal mx-auto text-center">{{__('lang.dv1')}}</span>
                    </div>
                </div>
                <div class="row row-cols-lg-4 row-cols-sm-4 row-cols-1 g-3 justify-content-center">
                    <div class="col">
                        <a href="#" class="text-center d-flex flex-column align-items-center hover-text-white transation text-general hover-bg-primary h-100">
                            <img alt='dịch vụ' class="lazyload" data-src="frontend/assets/img/dich-vu-1.png">
                            <h4>{{__('lang.dv11')}}</h4>
                        </a>
                    </div>
                    <div class="col">
                        <a href="#" class="text-center d-flex flex-column align-items-center hover-text-white transation text-general hover-bg-primary h-100">
                            <img alt='dịch vụ' class="lazyload" data-src="frontend/assets/img/dich-vu-2.png">
                            <h4>{{__('lang.dv12')}}</h4>
                        </a>
                    </div>
                    <div class="col">
                        <a href="#" class="text-center d-flex flex-column align-items-center hover-text-white transation text-general hover-bg-primary h-100">
                            <img alt='dịch vụ' class="lazyload" data-src="frontend/assets/img/dich-vu-3.png">
                            <h4>{{__('lang.dv13')}}</h4>
                        </a>
                    </div>
                    <div class="col">
                        <a href="#" class="text-center d-flex flex-column align-items-center hover-text-white transation text-general hover-bg-primary h-100">
                            <img alt='dịch vụ' class="lazyload" data-src="frontend/assets/img/dich-vu-4.png">
                            <h4>{{__('lang.dv14')}}</h4>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
        <!--============== Property Category End ==============-->


         <!--============== Property Location Start ==============-->
        <div class="full-row">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="text-secondary text-center mb-5">
                            <h2 class="text-secondary mx-auto mb-4">{{__('lang.ttbds')}}</h2>
                            <!-- <span class="d-table w-50 w-sm-100 sub-title mx-auto text-center">Mauris primis turpis Laoreet magna felis mi amet quam enim curae. Sodales semper tempor dictum faucibus habitasse.</span> -->
                        </div>
                    </div>
                </div>
                <div class="row g-4 location-style-1">
                    @foreach($search_province as $key => $val)
                    @if($key == 0 || $key == 5)
                    <div class="col-md-6">
                        <div class="entry-wrapper hover-img-zoom position-relative h-100">
                            <div class="overflow-hidden transation thumbnail-img">
                                <img class="lazyload" data-src="frontend/assets/images/property/3.png" alt="{{$val->name}}">
                            </div>
                            <div class="d-flex position-absolute align-items-center bottom-0 p-4 w-100">
                                <h5 class="mb-0"><a class="btn btn-white font-700 rounded-pill text-nowrap" href="#">{{$val->name}}</a></h5>
                                <span class="d-table ms-4 fs-5 font-500 text-white">{{ count($val->PostTranslation) }} {{__('lang.ttbds1')}}</span>
                            </div>
                        </div>
                    </div>
                    @elseif($key < 6)
                    <div class="col-md-3">
                        <div class="entry-wrapper hover-img-zoom position-relative h-100">
                            <div class="overflow-hidden transation thumbnail-img">
                                <img class="lazyload" data-src="frontend/assets/images/property/4.png" alt="{{$val->name}}">
                            </div>
                            <div class="d-flex position-absolute align-items-center bottom-0 p-4 w-100">
                                <h5 class="transation"><a class="btn btn-white font-700 rounded-pill text-nowrap" href="#">{{$val->name}}</a></h5>
                                <span class="d-table ms-4 fs-5 font-500 text-white">{{ count($val->PostTranslation) }} {{__('lang.ttbds1')}}</span>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        <!--============== Property Location End ==============-->

        

        <!--============== Reg Banner Start ==============-->
        <div class="full-row bg-center paraxify" style="background-image: url(frontend/assets/images/background/bg-1.png); background-repeat: no-repeat; background-position: center top;">
            <div class="container position-relative z-index-9">
                <div class="row align-items-center">
                    <div class="col-lg-7 text-white">
                        <h3 class="text-white mb-3">{{__('lang.text7')}}</h3>
                        <p>{{__('lang.text8')}}</p>
                        <span class="h6 d-inline-block text-white">{{__('lang.Hotline')}}: 1800 6464 28</span>
                    </div>
                    <div class="col-lg-5">
                        <div class="simple-video-play d-flex">
                            <div class="position-relative d-inline-block">
                                <a data-fancybox href="https://www.youtube.com/watch?v=N5dT2TztcHg&t" class="rounded-circle position-relative bg-primary" style="z-index: 10"><i class="flaticon-play-button position-relative xy-center flat-mini rounded-circle text-white"></i></a>
                                <div class="loader position-absolute xy-center">
                                    <div class="loader-inner ball-scale-multiple">
                                        <div class="bg-primary"></div>
                                        <div class="bg-primary"></div>
                                    </div><span class="tooltip">
                                  <b>ball-scale-multiple</b></span>
                                </div>
                            </div>
                            <div class="ps-4 text-white font-medium">{{__('lang.text9')}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Reg Banner End ==============-->

        

        

        <!--============== Blog Section Start ==============-->
        <div class="full-row bg-light news-home">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <span class="pb-2 d-table w-50 w-sm-100 text-primary m-auto text-center tagline">{{__('lang.tintuc')}}</span>
                        <h2 class="down-line w-50 w-sm-100 mx-auto text-center mb-5">{{__('lang.tintuc1')}}</h2>
                    </div>
                </div>
                <div class="owl-carousel owl-theme home_slider_news">
                    @foreach($post_home->PostTranslation()->paginate(8) as $val)
                    <div class="item">
                        <div class="thumb-blog-overlay bg-white hover-text-PushUpBottom mb-4 border-radius-10">
                            <a href="{{$post_home->category->slug}}/{{$val->post->slug}}">
                                <div class="post-image position-relative overlay-secondary">
                                    <img class="lazyload" data-src="data/news/{{$val->post->img}}" alt="{{$val->name}}">
                                </div>
                            </a>
                            <div class="post-content p-10">
                                <h4 class="d-block font-400 mb-2 line-2"><a href="{{$post_home->category->slug}}/{{$val->post->slug}}" class="transation text-dark hover-text-primary">{{$val->name}}</a></h4>
                                <div class="post-meta text-uppercase">
                                    <a href="#"><span>By: Admin</span></a>
                                    <a href="#"><span>Dec 25, 2019</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!--============== Blog Section End ==============-->


        
@include('layout.footer')
</div>
@endsection


@section('script')

@endsection