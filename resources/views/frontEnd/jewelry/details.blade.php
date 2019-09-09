@extends('frontEnd.layout')

@section('content')

    <!-- START Page Map Title-->
    <div class="page_title parallax-window" data-parallax="scroll"
         data-image-src="{{url('frontEnd')}}/assets/images/banner/banner-1.png">
        <h1>{{ trans('frontLang.Rings') }}</h1>
    </div>
    <!-- //== END Page Map Title-->


    <!-- START Section Products Details -->
    <section class="sec_category_products product_details pt-5 pb-5">
        <div class="container-fluid pl-5 pr-5">

            <!-- Filter Products-->
            <div class="filter_products clearfix">
                <div class="float-left link_title">
                    <ul>
                        <li><a href="">Home</a> ></li>
                        <li><a href="{{url('subcat')}}/{{\App\Helpers\Helper::id_cat_sub($id)['category_id']}}">
                                {{\App\Helpers\Helper::name_categories(\App\Helpers\Helper::id_cat_sub($id)['category_id'])}}</a> ></li>
                        <li><a href="{{url('products')}}/{{\App\Helpers\Helper::id_cat_sub($id)['subcategory_id']}}">
                                {{\App\Helpers\Helper::name_sub_category(\App\Helpers\Helper::id_cat_sub($id)['subcategory_id'])}}</a> ></li>
                        <li><a  class="active">{{\App\Helpers\Helper::name_product($id)}}</a></li>
                    </ul>
                </div>
                <div class="float-right filter_cat">
                </div>
            </div>
            <!-- ////// -->

            <!-- Start Body Category Products -->
            <div class="mt-5">
                <div class="row">

                    <div class="col-lg-9">


                        <!-- View Product -->
                        <section class="details_product">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="slide_big_imgs">
                                        @foreach(@$products->images as $photo)
                                        <div>
                                            <img src="{{url('uploads')}}/topics/{{$photo->file ? $photo->file : $products->photo}}"
                                                 class="img-fluid" alt="">
                                                @if(@\App\FavouriteProduct::where("user_id",\Auth::user()->id)->where("product_id",$products->id)->first()->status == 0)
                                                    <a  class="heart_favorite aaf stat" data-id="{{@$products->id}}"><i class="far fa-heart fa-lg"></i></a>
                                                @elseif(\App\FavouriteProduct::where("user_id",\Auth::user()->id)->where("product_id",$products->id)->first()->status ==1)
                                                    <a class="heart_favorite aaf status" data-id="{{@$products->id}}"><i class="fas fa-heart fa-lg"></i></a>
                                                @endif



                                        </div>
                                            @endforeach
                                    </div>
                                    <div class="slider_thumb">
                                        @foreach(@$products->images as $photo)
                                        <div>
                                            <img src="{{url('uploads')}}/topics/{{$photo->file ? $photo->file : $products->photo}}"
                                                 class="img-fluid" alt="">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="product_info_right">
                                        <h5>
                                            @if(App::getLocale()  == 'en')
                                                {{@$products->name_en}}
                                            @else
                                                {{@$products->name_heb}}
                                            @endif
                                        </h5>
                                        <h6>
                                                <p>{{@$products->topic_name(@$products->standard_gold,App::getLocale())}}</p>

                                        </h6>
                                        <div class="rating mt-4 mb-4">
                                      <span>
                                      @for ($i = 1; $i <= @$products->rate[0]->stars; $i++)
                                              <i class="fas fa-star fa-lg"></i>
                                          @endfor
                                          @php
                                          $n=5-@$products->rate[0]->stars;
                                          @endphp
                                                  @for ($i = 1; $i <= $n; $i++)
                                                      <i class="far fa-star fa-lg"></i>
                                                  @endfor

                                      </span>
                                            <b>200 {{ trans('frontLang.People_review') }}</b>
                                        </div>
                                        <i class="find_i mb-3">{{ trans('frontLang.Find_your_ring_size') }}</i>
                                        <a  class="btn_det btn_cart_add" data_id="{{@$products->id}}" style="color: white;">{{ trans('frontLang.Add_To_Cart') }} <i
                                                    class="fa fa-shopping-cart"></i></a>

                                    </div>
                                </div>
                            </div>
                        </section>


                        <!-- PRODUCT DETAILS -->
                        <section class="sec_details_prod">
                            <div class="pl-5 pr-5 pt-3 pb-3 mt-5">
                                <h4 class="border_after">{{ trans('frontLang.PRODUCT_DETAILS') }}</h4>
                                <p>
                                    @if(App::getLocale()  == 'en')
                                        {!! @$products->details_en !!}
                                    @else

                                        {!! @$products->details_il !!}
                                    @endif


                                </p>
                            </div>
                        </section>

                        <!-- RELATED PRODUCTS -->
                        <section class="sec_related_prod mt-5">
                            <h4 class="border_after">{{ trans('frontLang.RELATED_PRODUCTS') }}</h4>
                            <div class="slide_related mt-5">
                                @foreach(@$prod_related as $key=> $prod_relate)
                                <div class="item clearfix">
                                    <div class="img_rings">
                                        <img src="{{url('uploads')}}/topics/{{@$prod_relate->photo}}" class="img-fluid"
                                             alt="">

                                        <span class="offers">{{@$prod_relate->promo_code->amount ? $prod_relate->promo_code->amount  : "%" }} Offer</span>

                                        @if(@\App\FavouriteProduct::where("user_id",\Auth::user()->id)->where("product_id",$prod_relate->id)->first()->status == 0)
                                            <a  class="heart_favorite aaf stat" data-id="{{@$prod_relate->id}}"><i class="far fa-heart fa-lg"></i></a>
                                        @elseif(\App\FavouriteProduct::where("user_id",\Auth::user()->id)->where("product_id",$prod_relate->id)->first()->status ==1)
                                            <a class="heart_favorite aaf status" data-id="{{@$prod_relate->id}}"><i class="fas fa-heart fa-lg"></i></a>
                                        @endif

{{--                                        <a class="heart_favorite"><i class="far fa-heart fa-lg"></i></a>--}}

                                    </div>
                                    <div class="txt_info">
                                        <div class="title text-center">
                                            <a href="{{url("product/details")}}/{{$prod_relate->id}}">
                                                @if(App::getLocale()  == 'en')
                                                    {{$prod_relate->name_en}}
                                                @else
                                                    {{$prod_relate->name_heb}}
                                                @endif
                                            </a>
                                                <p >{{@$prod_relate->topic_name(@$prod_relate->standard_gold,App::getLocale())}}</p>
                                        </div>
                                        <hr>
                                        <div class="price">
                                            <h4><span>{{$prod_relate->special_price}} $</span>
                                                <del>{{$prod_relate->price}} $</del>
                                            </h4>
                                        </div>
{{--                                        <a href="" class="add_to_cart"><i class="fa fa-shopping-cart fa-lg"></i></a>--}}
                                        <a  class="add_to_cart " data_id="{{@$prod_relate->id}}"><i class="fa fa-shopping-cart fa-lg"></i></a>

                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </section>

                    </div>

                    <div class="col-lg-3">
                        <aside class="">
                            <article>
                                <div class="title_best_seller">
                                    <h3>{{ trans('frontLang.Best_Seller') }}</h3>
                                </div>
                                @foreach($c as  $product_bs)
                                    @foreach($product_bs as  $product_b)

                                    <div class="item">
                                    <a href="" class="img_be"><img
                                                src="{{url('uploads')}}/topics/{{@$product_b->photo}}"
                                                class="img-fluid" alt=""></a>

                                    <div class="txt_info">
                                        <a href="{{url("product/details")}}/{{$product_b->id}}">
                                            @if(App::getLocale()  == 'en')
                                                {{@$product_b->name_en}}
                                            @else
                                                {{ @$product_b->name_heb }}
                                            @endif
                                        </a>
                                        <p>{{@$product_b->topic_name(@$product_b->standard_gold,App::getLocale())}}</p>
                                        <div class="price">
                                            <h5>
                                                <span>{{$product_b->special_price}} $</span>
                                                <del>{{$product_b->price}} $</del>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                                @endforeach

                            </article>

                            <article class="article_no_border">
                                <div class="adsds_sda">
                                    <a href="">
                                        <img src="{{url('uploads')}}/banners/{{@$banner->file_en}}"
                                                    class="img-fluid" alt="">
                                    </a>
                                </div>
                            </article>

                        </aside>
                    </div>

                </div>
            </div>
            <!-- ////// -->

        </div>
    </section>
    <!-- //== END Section Category Products -->


@endsection
