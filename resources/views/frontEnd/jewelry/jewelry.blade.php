@extends('frontEnd.layout')

@section('content')
    <!-- START Section Category Products -->
    <section class="sec_category_products pt-5 pb-5">
        <div class="container-fluid pl-5 pr-5">

            <!-- Filter Products-->
            <div class="filter_products clearfix">
                <div class="float-left link_title">
                    <ul>
                        <li><a href="{{url("/")}}">{{ trans('frontLang.home') }}</a> > </li>
                        <li><a href="{{url('subcat')}}/{{\App\Helpers\Helper::id_cat($id)['category_id']}}">
                                {{\App\Helpers\Helper::name_categories(\App\Helpers\Helper::id_cat($id)['category_id'])}}</a> > </li>
                        <li><a class="active">{{\App\Helpers\Helper::name_sub_category($id)}}</a></li>
                    </ul>
                </div>
                                <div class="float-right filter_cat">
                                    <span>Sort By</span>
                                    <select name="" id="" class="form-control">
                                        <option value="">{{ trans('frontLang.Best_Seller') }}</option>
                                        <option value="">{{ trans('frontLang.Low_Seller') }}</option>
                                        <option value="">{{ trans('frontLang.High_Seller') }}</option>
                                    </select>
                                </div>
            </div>
            <!-- ////// -->

            <!-- Start Body Category Products -->
            <div class="body_cat mt-5">
                <div class="row">
                    <div class="col-lg-3">
                        <aside class="">
                            <div class="title_aside text-center">
                                <h3> {{ trans('frontLang.Filteration') }}</h3>
                            </div>
                            <article>
                                <div class="this_select_kind clearfix">
                                    <a href="{{url("products")}}/{{$id}}/2" class="active">
                                        <i class="fa fa-user fa-2x"></i>
                                        <h5>{{ trans('frontLang.Form_Women') }}</h5>
                                    </a>
                                    <a href="{{url("products")}}/{{$id}}/1">
                                        <i class="fa fa-user fa-2x"></i>
                                        <h5>{{ trans('frontLang.Form_Men') }}</h5>
                                    </a>
                                </div>

                                <div class="this_select_style">
                                    <h4>Style</h4>
                                    <div class="styles_select">
                                        @php
                                            $counter=0;
                                            $limit=2;
                                            $subcategory=\App\Topic::where("webmaster_id",16)->get();
                                                                    $count= count($subcategory);
                                                                   if($count != 1 ){
                                                                   if ($count == 4 || $count == 3|| $count == 2|| $count == 1){
                                                                   $limits=2;
                                                                   }else{
                                                                    $limits=(int)round($count/3);
                                                                   }
                                                                   }else{
                                                                   $limits=2;
                                                                   }
                                        @endphp
                                        @foreach(\App\Topic::where("webmaster_id",16)->offset(0)->take($limits)->get() as $styl)
                                            <a href="{{url("products")}}/{{$id}}/type=/stand=/{{$styl->id}}" class="active">
                                                <span class="border_cirlce"><i></i></span>
                                                <h6>
                                                    @if(App::getLocale()  == 'en')
                                                        {{$styl->title_en}}
                                                    @else
                                                        {{$styl->title_il}}
                                                    @endif

                                                </h6>
                                            </a>
                                        @endforeach
                                        @foreach(\App\Topic::where("webmaster_id",16)->skip($limits)->take($limits)->get() as $styl)

                                        <a href="{{url("products")}}/{{$id}}/type=/stand=/{{$styl->id}}">
                                                <span class="border_white"></span>
                                                <h6>
                                                    @if(App::getLocale()  == 'en')
                                                        {{$styl->title_en}}
                                                    @else
                                                        {{$styl->title_il}}
                                                    @endif
                                                </h6>
                                            </a>
                                        @endforeach
                                        @foreach(\App\Topic::where("webmaster_id",16)->skip($limits*2)->take($limits*2)->get() as $styl)
                                        <a href="{{url("products")}}/{{$id}}/type=/stand=/{{$styl->id}}">
                                                <span class="border_cirlce_many"><i></i><i></i><i></i><i></i><i></i><i></i></span>
                                                <h6>
                                                    @if(App::getLocale()  == 'en')
                                                        {{$styl->title_en}}
                                                    @else
                                                        {{$styl->title_il}}
                                                    @endif
                                                </h6>
                                            </a>

                                        @endforeach

                                    </div>
                                </div>

                                <div class="this_types_select">
                                    <h4>Types</h4>
                                    <div class="types_select">
                                        @php
                                            $counter=0;
                                            $skip = 2;

                                            $subcategory=\App\Topic::where("webmaster_id",16)->get();
                                                                    $count= count($subcategory);
                                                                   if($count != 1 ){
                                                                   if ($count == 4 || $count == 3|| $count == 2|| $count == 1){
                                                                   $limit = $count - $skip;
                                                                   }else{
                                                                   $limit = $count - $skip;
                                                                    // the limit
/*                                                                    $limits=(int)round($count/5);
*/
                                                                    }
                                                                   }else{
                                                                   $limit = $count - $skip;
                                                                   }
                                        @endphp
                                        @foreach(\App\Topic::where("webmaster_id",15)->offset(0)->take($skip)->get() as $stan)
                                            <a href="{{url("products")}}/{{$id}}/type=/{{$stan->id}}">
                                                <span class="bg_color1"></span>
                                                <h6>
                                                    @if(App::getLocale()  == 'en')
                                                        {{$stan->title_en}}
                                                    @else
                                                        {{$stan->title_il}}
                                                    @endif
                                                </h6>
                                            </a>
                                        @endforeach
                                    @foreach(\App\Topic::where("webmaster_id",15)->skip($skip)->take($skip)->get() as $stan)
                                        <a href="{{url("products")}}/{{$id}}/type=/{{$stan->id}}">
                                                <span class="bg_color2"></span>
                                                <h6>
                                                    @if(App::getLocale()  == 'en')
                                                        {{$stan->title_en}}
                                                    @else
                                                        {{$stan->title_il}}
                                                    @endif
                                                </h6>
                                            </a>
                                        @endforeach
                                        @foreach(\App\Topic::where("webmaster_id",15)->skip($skip+$skip)->take($skip)->get() as $stan)

                                        <a href="{{url("products")}}/{{$id}}/type=/{{$stan->id}}">
                                                <span class="bg_color3"></span>
                                                <h6>
                                                    @if(App::getLocale()  == 'en')
                                                        {{$stan->title_en}}
                                                    @else
                                                        {{$stan->title_il}}
                                                    @endif

                                                </h6>
                                            </a>
                                        @endforeach
                                        @foreach(\App\Topic::where("webmaster_id",15)->skip($skip+$skip+$skip)->take($skip)->get() as $stan)
                                        <a href="{{url("products")}}/{{$id}}/type=/{{$stan->id}}">
                                                <span class="bg_color4"></span>
                                                <h6>
                                                    @if(App::getLocale()  == 'en')
                                                        {{$stan->title_en}}
                                                    @else
                                                        {{$stan->title_il}}
                                                    @endif

                                                </h6>
                                            </a>
                                        @endforeach
                                        @foreach(\App\Topic::where("webmaster_id",15)->skip($skip+$skip+$skip+$skip)->take($skip)->get() as $stan)

                                        <a href="{{url("products")}}/{{$id}}/type=/{{$stan->id}}">
                                                <span class="bg_color5"></span>
                                                <h6>
                                                    @if(App::getLocale()  == 'en')
                                                        {{$stan->title_en}}
                                                    @else
                                                        {{$stan->title_il}}
                                                    @endif

                                                </h6>
                                            </a>

                                        @endforeach
                                    </div>
                                </div>
                            </article>
                            @php
                               $total_price= 0;
                            @endphp

                        @foreach(\App\product::get() as $key=> $product)

                            @php
                            $price=$product->price;
                                $total_price+=$price;
                            $price_sel ? $price_sel : 0;
                            @endphp
                            @endforeach

                            <article>
                                <div class="this_select_price">
                                    <h4>{{ trans('frontLang.Price') }}</h4>
                                    <div class="form-group col-md-12 col-sm-12">
                                        <div id="Range_price" class="range-slider">
                                            <input value="{{$price_sel ? $price_sel  : \App\product::get()[3]->price}}" min="0" max="{{$total_price}}"
                                                   data_id="{{$id}}" step="50" type="range" id="rang_price" />
                                            <input value="{{$total_price}}" min="0" max="{{$total_price}}" step="50" type="range" id="rang_price" />
                                            <svg width="100%" height="24">
                                                <!-- <line x1="4" y1="0" x2="300" y2="0" stroke="#444" stroke-width="12" stroke-dasharray="1 28"></line> -->
                                            </svg>
                                            <div>
                        <span class="float-left">
                          <!-- <label>From : </label> -->
                          <input type="number" value="{{$price_sel ? $price_sel : \App\product::get()[3]->price}}" min="0" max="{{$total_price}}" />
                        </span>
                                                <span class="float-right">
                          <!-- <label>To : </label> -->
                          <input type="number" value="{{$total_price}}" min="0" max="{{$total_price}}" />
                        </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="article_no_border">
                                <div class="adsds_sda">
                                    <a href=""><img src="{{url("frontEnd")}}/assets/images/adddss/1.png" class="img-fluid" alt=""></a>
                                </div>
                            </article>
                        </aside>
                    </div>

                    <div class="col-lg-9">

                        <section class="sec_products">

                            <!-- Title Info -->
                            <div class="txt_info text-center mb-5">
                                <p>{{ trans('frontLang.Eternity_Rings') }}</p>
                                <p>
                                    {{ trans('frontLang.Eternity_Rings1') }}
                                </p>
                                <p>
                                    {{ trans('frontLang.Eternity_Rings2') }}
                                </p>
                            </div>

                            <div class="row this_grid">
                                @foreach(@$products as $key=> $product)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="item clearfix">
                                        <div class="img_rings">
                                            <img src="{{url('frontEnd')}}/assets/images/products/1.png" class="img-fluid" alt="">
                                            <span class="offers">{{@$product->promo_code->amount ? $product->promo_code->amount  : "%" }} Offer</span>
                                            @if(@\App\FavouriteProduct::where("user_id",\Auth::user()->id)->where("product_id",$product->id)->first()->status == 0)
                                            <a  class="heart_favorite aaf stat" data-id="{{@$product->id}}"><i class="far fa-heart fa-lg"></i></a>
                                                @elseif(\App\FavouriteProduct::where("user_id",\Auth::user()->id)->where("product_id",$product->id)->first()->status ==1)
                                                <a class="heart_favorite aaf status" data-id="{{@$product->id}}"><i class="fas fa-heart fa-lg"></i></a>
                                            @endif
                                        </div>
                                        <div class="txt_info">
                                            <div class="title text-center">
                                                <a href="{{url("product/details")}}/{{$product->id}}">
                                                    @if(App::getLocale()  == 'en')
                                                        {{$product->name_en}}
                                                    @else
                                                        {{$product->name_heb}}
                                                    @endif
                                                </a>
                                                    <p>{{$product->topic_name($product->standard_gold,App::getLocale())}}</p>

                                            </div>
                                            <hr>
                                            <div class="price">
                                                <h4><span>{{@$product->special_price}} $</span> <del>{{@$product->price}}$</del></h4>
                                            </div>
                                            <a  class="add_to_cart" data_id="{{@$product->id}}"><i class="fa fa-shopping-cart fa-lg"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </section>

                    </div>

                </div>
            </div>
            <!-- ////// -->

        </div>
    </section>
    <!-- //== END Section Category Products -->


@endsection
