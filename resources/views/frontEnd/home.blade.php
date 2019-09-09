@extends('frontEnd.layout')

@section('content')

    <!-- start Home Slider -->
{{--    @include('frontEnd.includes.slider')--}}
    <!-- end Home Slider -->


    <!-- START Banner -->
    <section class="sec_banner parallax-window" data-parallax="scroll" data-image-src="frontEnd/assets/images/banner/banner-1.png">
        <div class="caption">
            <h1> {{ trans('frontLang.Shama') }} <br> {{ trans('frontLang.Jewelry') }} </h1>
            <h2>{{ trans('frontLang.Design_For') }}  <br> {{ trans('frontLang.Elegance') }}</h2>
            <a href="{{url("about/us")}}"> {{ trans('frontLang.See_More') }}</a>
        </div>
    </section>
    <!-- //== END Banner -->


    <!-- START About Us -->
    <section class="sec_about">
        <div class="container-fluid pl-5 pr-5 pl-5 pr-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="txt_about">
                        <h3 class="h3_style_1">{{ trans('frontLang.Shape_Our_Diamond') }}</h3>
                        <p>
                            {{ trans('frontLang.Shape_Our_Diamond_p') }}
                        </p>
                        <a href="{{url("cat")}}/13">{{ trans('frontLang.Start_Now') }}</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img_about">
                        <div class="img_jeww"></div>
                        <img class="img_btm" src="frontEnd/assets/images/about/ring2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //== END About Us -->


    <!-- START Service -->
    <section class="sec_services">
        <div class="container-fluid pl-5 pr-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="item">
                        <a href="{{'cat/38'}}">
                        <img src="frontEnd/assets/images/services/1.png" alt="">
                        <div class="txt_serv">
                            <h1>{{ trans('frontLang.DESIGN_COLLECTION') }}</h1>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <a href="{{'cat/59'}}">
                        <img src="frontEnd/assets/images/services/2.png" alt="">
                        <div class="txt_serv">
                            <h1>{{ trans('frontLang.WEDDING_JEWELRY') }} </h1>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <a href="{{'cat/11'}}">
                        <img src="frontEnd/assets/images/services/3.png" alt="">
                        <div class="txt_serv">
                            <h1>{{ trans('frontLang.FINE_JEWELRY') }}</h1>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //== END Service -->


    <!-- START Our Best Diamond -->
    <section class="sec_best_diamond">
        <div class="container-fluid pl-5 pr-5">
            <div class="sec_title">
                <h3 class="h3_style_2 text-center">{{ trans('frontLang.Show_Our_Best_Diamond') }}</h3>
            </div>
            <div class="best_diamond">
                @foreach($c as  $product_bs)
                @foreach($product_bs as  $product_b)
                <div>
                    <img src="{{url('uploads')}}/topics/{{@$product_b->photo}}" alt="">
                   <a href="{{url("product/details")}}/{{$product_b->id}}">
                       <h4>
                        @if(App::getLocale()  == 'en')
                            {{@$product_b->name_en}}
                        @else
                            {{ @$product_b->name_heb }}
                        @endif

                    </h4></a>
                </div>
                @endforeach
                @endforeach
            </div>
        </div>
    </section>
    <!-- //== END Our Best Diamond -->


    <!-- START THE CROWNING JEWELS -->
    <section class="sec_crowning">
        <div class="container-fluid pl-5 pr-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="title_crowning mt_100px">
                        <h2 class="h3_style_1">{{ trans('frontLang.THE_CROWNING_JEWELS') }}</h2>
                        <p>
                            {{ trans('frontLang.THE_CROWNING_JEWELS_p') }}
                        </p>
                    </div>
                    @php
                        $collection=\App\Topic::find(70);
                        $collection1=\App\Topic::find(71);
                        $collection2=\App\Topic::find(72);
                    @endphp

                    <div class="item item_left mt_160px">
                        <img src="{{url('uploads')}}/topics/{{$collection->photo_file}}" class="img-fluid" alt="">
                        <div class="txt_item_crowning">
                            <h6>
                                @if(App::getLocale()  == 'en')
                                    {{$collection->title_en}}
                                @else
                                    {{$collection->title_il}}
                                @endif

                            </h6>
                            <p>
                                @if(App::getLocale()  == 'en')
                                    {!!str_limit($collection2->details_en ,"300")  !!}
                                @else
                                    {!!str_limit($collection2->details_ar ,"300")  !!}
                                @endif
                            </p>
                            <a href="{{url('collection')}}/{{$collection->id}}" class="h3_style_3">{{ trans('frontLang.Explore') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="clearfix">
                        <div class="item item_right">
                            <img src="{{url('uploads')}}/topics/{{$collection1->photo_file}}" class="img-fluid" alt="">
                            <div class="txt_item_crowning">
                                <h6>
                                    @if(App::getLocale()  == 'en')
                                        {{$collection1->title_en}}
                                    @else
                                        {{$collection1->title_il}}
                                    @endif
                                </h6>
                                <p>
                                    @if(App::getLocale()  == 'en')
                                        {!!str_limit($collection2->details_en ,"300")  !!}
                                    @else
                                        {!!str_limit($collection2->details_ar ,"300")  !!}
                                    @endif

                                </p>
                                <a href="{{url('collection')}}/{{$collection1->id}}" class="h3_style_3">{{ trans('frontLang.Explore') }}</a>
                            </div>
                        </div>
                        <div class="item item_right mt_160px">
                            <img src="{{url('uploads')}}/topics/{{$collection2->photo_file}}" class="img-fluid" alt="">
                            <div class="txt_item_crowning">
                                <h6>
                                    @if(App::getLocale()  == 'en')
                                        {{$collection2->title_en}}
                                    @else
                                        {{$collection2->title_il}}
                                    @endif
                                </h6>
                                <p>
                                    @if(App::getLocale()  == 'en')
                                        {!!str_limit($collection2->details_en ,"300")  !!}
                                    @else
                                        {!!str_limit($collection2->details_ar ,"300")  !!}
                                    @endif
                                </p>
                                <a href="{{url('collection')}}/{{$collection2->id}}" class="h3_style_3">{{ trans('frontLang.Explore') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //== END THE CROWNING JEWELS -->


    <!-- START Our Gallery -->
    <section class="sec_gallery">
        <div class="container-fluid pl-5 pr-5">
            <div class="sec_title text-center">
                <h6 class="h3_style_4">{{ trans('frontLang.Our_Gallery') }} </h6>
                <h4>{{ trans('frontLang.Our_Gallery_h') }}</h4>
            </div>

            <div class="our_gallery">
                @foreach(\App\Topic::where("webmaster_id",22)->get() as $Gallery )

                <div>
                    <img src="{{url('uploads')}}/topics/{{$Gallery->photo_file}}" class="img-fluid" alt="">
                    <h5>
                        @if(App::getLocale()  == 'en')
                            {{$Gallery->title_en}}
                        @else
                            {{$Gallery->title_il}}
                        @endif
                    </h5>
                </div>
                @endforeach

            </div>

            <a href="{{url("Gallery")}}" class="btn_style">{{ trans('frontLang.See_More') }}</a>

        </div>
    </section>
    <!-- //== END  -->





@endsection
