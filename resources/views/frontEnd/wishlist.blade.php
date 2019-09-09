@extends('frontEnd.layout')
@section('content')



    <!-- START Page Map Title-->
    <div class="page_title parallax-window" data-parallax="scroll" data-image-src="{{url("frontEnd")}}/assets/images/banner/banner-1.png">
        <h1>Favorite List</h1>
    </div>
    <!-- //== END Page Map Title-->


    <!-- START Section Products Details -->
    <section class="sec_category_products product_details pt-5 pb-5">
        <div class="container-fluid pl-5 pr-5">

            <!-- Filter Products-->
            <div class="filter_products clearfix">
                <div class="float-left link_title">
                    <ul>
                        <li><a href="{{url('/')}}">{{ trans('frontLang.home') }}</a> > </li>
                        <li><a  class="active">{{ trans('frontLang.Favorite_List') }}</a></li>
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
            <div class="mt-5">
                <div class="row">

                    <div class="col-lg-9">
                        <section class="sec_products">
                            <h4 class="border_after mb-4">{{ trans('frontLang.Favorite_List') }}</h4>
                            <div class="row this_grid">
                                @foreach(@$products_fav as $key=> $product_fav)
                                    @php
                                    $product_details=\App\product::where("status","1")->where("id",$product_fav->product_id)->first();
                                    @endphp
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="item clearfix">
                                        <div class="img_rings">
                                            <img src="{{url("frontEnd")}}/assets/images/products/1.png" class="img-fluid" alt="">

                                            <span class="offers">{{@$product_details->promo_code->amount ? $product_details->promo_code->amount  : "%" }} Offer</span>
                                                <a class="heart_favorite aaf status" data-id="{{@$product_details->id}}"><i class="fas fa-heart fa-lg"></i></a>
                                        </div>

                                        <div class="txt_info">
                                            <div class="title text-center">
                                                <a href="product-details.html">
                                                    @if(App::getLocale()  == 'en')
                                                        {{$product_details->name_en}}
                                                    @else
                                                        {{$product_details->name_heb}}
                                                    @endif
                                                </a>

                                            @foreach(@$product_details->standardgold  as  $te)
                                                    <p>{{$product_details->topic_name($te->standard_gold,App::getLocale())}}</p>
                                                @endforeach
                                            </div>
                                            <hr>
                                            <div class="price">
                                                <h4><span>{{@$product_details->special_price}} $</span> <del>{{@$product_details->price}}$</del></h4>
                                            </div>
                                            <a href="" class="add_to_cart" data_id="{{@$product_details->id}}"><i class="fa fa-shopping-cart fa-lg"></i></a>
                                        </div>
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
                                    <a href=""><img src="{{url("frontEnd")}}/assets/images/adddss/1.png" class="img-fluid" alt=""></a>
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
