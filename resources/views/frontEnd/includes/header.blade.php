@php
    $sections=App\Topic::where("webmaster_id","13")
    ->select("topics.title_en as sectionname_en ","topics.title_il as sectionname_heb ","topics.id as id")->get();
                        $carts =\App\Cart::where("user_id",@\Auth::user()->id)->get();

@endphp

<!-- START Preloader -->
<div class="preloader">
    <img src="{{url("frontEnd")}}/assets/images/logo-footer.png" class="img-fluid logo_loader" alt="">
    <div class="loader">
        <div class="ancl" data-js="loader--alpha"></div>
    </div>
</div>
<!-- //== END Preloader -->

<!-- START Header -->
<header class="">

    <!-- Head Offers -->
    <div class="head_offers">
        <p>{{ trans('frontLang.ho_h') }}</p>
    </div>
    <!-- //== Head Offers -->
@php
    $Setting = \App\Setting::find(1);

@endphp
    <!-- Head -->
    <div class="head_top">
        <div class="container-fluid pl-5 pr-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="left_head">
                        <a href="mailto:{{$Setting->contact_t6}}"><i class="far fa-envelope fa-lg"></i>
                            {{$Setting->contact_t6}}</a>
                        <a href="tel:{{$Setting->contact_t3}}"><i class="fa fa-phone fa-lg"></i> {{$Setting->contact_t3}}</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right_head float-right">
                        @if(\Auth::check())
                            <a href="{{url('profile')}}" class=""> <i class="fa fa-user"></i>{{ trans('frontLang.Profile') }}  </a>
                            <a href="{{url('wishlist')}}" class="">{{ trans('frontLang.Wishlist') }} </a>
                            <a href="{{url("about/us")}}" class="">{{ trans('frontLang.About_Us') }}</a>
                            <a href="{{url("logout/we")}}" class="">Logout</a>
                        @else
                            <a href="{{url("login/we")}}" class="">{{ trans('frontLang.Login') }}</a>
                            <a href="{{url("register/we")}}" class=""> {{ trans('frontLang.Sign_Up') }}</a>
                            <a href="{{url("about/us")}}" class="">{{ trans('frontLang.About_Us') }}</a>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //== Head -->
    <!-- Navbar Menu -->
    <div class="container-fluid pl-5 pr-5">
        <div class="clearfix nav_menu">
            <a class="navbar-brand float-left mt-3" href="{{url('/')}}">
                <img src="{{url("frontEnd")}}/assets/images/logo.png" class="img-fluid" alt="">
            </a>


            <nav class="navbar navbar-expand-lg navbar-light float-left">
                <button class="navbar-toggler show_nav" type="button">
                    <span class="fa fa-bars"></span>
                </button>

                <div class="nav_links mx-5" id="">
                    <i id="close_nav" class="fa fa-times fa-2x"></i>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link active" href="{{url("/")}}">{{ trans('frontLang.home') }} <span class="sr-only">(current)</span></a>
                        </li>

                        @php
                        $counter=0;
                        $limit=4;
                        @endphp

                    @foreach($sections as  $section)
                            <li class="nav-item">
                                <a class="nav-link drop_mega" href="{{url('cat')}}/{{$section["id"]}}">
                                                      @if(App::getLocale()  == 'en')
                                                     {{$section["sectionname_en "]}}
                                                      @else
                                                     {{$section["sectionname_heb "]}}
                                                     @endif

                                    @php
                                        $subcategory=\App\category::where("type_id",$section["id"])->get();
                                                                $count= count($subcategory);
                                                             /*  $models_res = $count / 3 +3; */
                                                               if($count != 1 ){
                                                               if ($count == 4 || $count == 3|| $count == 2|| $count == 1){
                                                               $limits=4;
                                                               }else{
                                                                $limits=(int)round($count/3);
                                                              /*  if($limits < 4 ){
                                                                $limits+=4;
                                                                }*/
                                                               }
                                                               }else{
                                                               $limits=4;
                                                               }
                                    @endphp
                                </a>

                                <div class="mega_menu">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="item">
                                                @foreach(\App\category::where("type_id",$section["id"])->offset(0)->take($limits)->get()  as $type )
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            <a href="{{url('subcat')}}/{{$type->id}}" >
                                                                <img src="{{url("frontEnd")}}/assets/images/mega-menu/engagement.png"
                                                                     alt=""/>
                                                                @if(App::getLocale()  == 'en')
                                                                    {{$type->name_en}}
                                                                @else
                                                                    {{$type->name_heb}}
                                                                @endif
                                                            </a>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            </div>
                                        </div>
                                        @php
                                        $counter++;
                                         $models_res = $count % $limit;
                                        @endphp
                                        @if($models_res == 0)
                                            <div style="clear:both;"></div>
                                        @endif
                                        <div class="col-lg-3">
                                            <div class="item">
                                                @foreach(\App\category::where("type_id",$section["id"])->skip($limits)->take($limits)->get()  as $type )
                                                    <ul class="list-unstyled">
                                                        <li><a href="{{url('subcat')}}/{{$type->id}}"
                                                               class="">
                                                                <img src="{{url("frontEnd")}}/assets/images/mega-menu/engagement.png" alt="">
                                                                @if(App::getLocale()  == 'en')
                                                                    {{$type->name_en}}
                                                                @else
                                                                    {{$type->name_heb}}
                                                                @endif
                                                            </a></li>
                                                        <li>
                                                    </ul>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="item no_border">
                                                @foreach(\App\category::where("type_id",$section["id"])->skip($limits*2)->take($limits*2)->get()  as $type )
                                                    <ul class="list-unstyled">
                                                        <li><a href="{{url('subcat')}}/{{$type->id}}"
                                                               class="">
                                                                <img src="{{url("frontEnd")}}/assets/images/mega-menu/engagement.png" alt="">
                                                                @if(App::getLocale()  == 'en')
                                                                    {{$type->name_en}}
                                                                @else
                                                                    {{$type->name_heb}}
                                                                @endif
                                                            </a></li>
                                                        <li>
                                                    </ul>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="item no_border">
                                                <img class="img_show_mega"
                                                     src="{{url("frontEnd")}}/assets/images/mega-menu/1-rings.png"
                                                     class="img-fluid" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('contact/us')}}">{{ trans('frontLang.contact_us') }} </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="right_controler_head float-right my-4 pt-2">
                <div class="btn_search">
                    <a href="" id="show_search_modal"><i class="fa fa-search"></i></a>
                    <div class="modal_search">
                        <i id="close_search_modal" class="fa fa-times fa-3x"></i>
                        <form action="{{url('search/general')}}" method="get">
                                                    <!--{{csrf_field()}}-->
                            <input type="text" name="q" id="" placeholder="Type Your Search">
                            <button class="">{{ trans('frontLang.Search_Now') }}</button>
                        </form>
                    </div>
                </div>
                <div class="cart">
                    @if(\Auth::check())
                    <a href="" class="btn_cart"><i class="fa fa-shopping-cart fa-lg"></i>
                        <span>{{\App\Cart::where("user_id",\Auth::user()->id)->count()}}</span>
                    </a>
                        @else
                        <a href="" class="btn_cart"><i class="fa fa-shopping-cart fa-lg"></i>
                            <span>0</span>
                        </a>
                    @endif
                        @php
                    $sumtotal=0;
                        $carts =\App\Cart::where("user_id",@\Auth::user()->id)->get();


                        @endphp

                            <div class="cart_menu">
                                    <ul class="list-unstyled" >
                                        @foreach(@$carts as $key=> $cart)
                                            @php
                                    $product_details=\App\product::where("id",$cart->product_id)->first();
                                                        if(@\App\Helpers\Helper::price_product_cart($cart->product_id,$cart->standard_gold_id,$cart->size_id)['date_end_price'] > \Carbon\Carbon::now()){
                                  $sumtotal += \App\Helpers\Helper::price_product_cart($cart->product_id,$cart->standard_gold_id,$cart->size_id)['special_price'] ? \App\Helpers\Helper::price_product_cart($cart->product_id,$cart->standard_gold_id,$cart->size_id)['special_price'] :\App\Helpers\Helper::price_product_cart($cart->product_id,$cart->standard_gold_id,$cart->size_id)['price'] ;

                                                        }
                                                        else{
                                  $sumtotal += \App\Helpers\Helper::price_product_cart($cart->product_id,$cart->standard_gold_id,$cart->size_id)['price'] ;
                                                        }

                                             dump(\App\Helpers\Helper::price_product_cart($cart->product_id,$cart->standard_gold_id,$cart->size_id)['price']);
                                                $price=\App\Helpers\Helper::price_product_cart($cart->product_id,$cart->standard_gold_id,$cart->size_id)['price'];
                                                $specail_price=\App\Helpers\Helper::price_product_cart($cart->product_id,$cart->standard_gold_id,$cart->size_id)['special_price'];
                                            @endphp
                                <li>
                                <img src="{{url('uploads')}}/topics/{{@$product_details->photo}}" class="img-fluid float-left"
                                     alt="">
                                <div class="info_item_120 float-left">
                                    <strong>
                                        @if(App::getLocale()  == 'en')
                                            {{@$product_details->name_en}}
                                        @else
                                            {{@$product_details->name_heb}}
                                        @endif
                                    </strong>
                                    <span>
                                        {{\App\Helpers\Helper::standard_gold_name_to($cart->standard_gold_id)}}
                                    </span>
                                    <p class="price_cart clearfix">
                                        <b>{{@$specail_price ? $specail_price : $price }} $</b>
{{--                                        <del class="ml-3">{{@$product_details->price}} $</del>--}}
                                    </p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                            @if(!$carts->isEmpty())
                        <div class="sub_total">
                            <h5 class="pl-3 pr-3 pt-1 pb-1">{{ trans('frontLang.Sub_Total') }} : <span class="float-right">{{@$sumtotal}}  $</span></h5>
                            <div class="btn_chk_cart row">
                                <a href="{{url("checkout")}}" class="col-md-6">{{ trans('frontLang.Checkout') }} </a>
                                <a href="{{url("view/cart")}}" class="active_color col-md-6"> {{ trans('frontLang.View_Cart') }} </a>
                            </div>
                        </div>
                            @else

                            <div>
                                <p>

                                    {{ trans('frontLang.Cart_is_Empty') }}
                                </p>
                            </div>
                            @endif

                    </div>
                </div>
                <div class="langs">
                    @if(App::getLocale()=="he")
                        <a class="btn_langs" href="{{url('en')}}"><i
                                    class="fa fa-language" aria-hidden="true">{{ trans('frontLang.lang_r') }}   </i>
                        </a>
                    @else

                        <a class="btn_langs" href="{{url('he')}}"><i
                                    class="fa fa-language" aria-hidden="true">{{ trans('frontLang.lang_r') }}  </i>
                        </a>
                        @endif

                        </a>

                </div>
            </div>
        </div>
    </div>
    <!-- //== Navbar Menu -->

</header>
<!-- //== END Header -->


