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
                    </ul>
                </div>
                
            </div>
            <!-- ////// -->

            <!-- Start Body Category Products -->
            <div class="body_cat mt-5">
                <div class="row">

                    <div class="col-lg-9">

                        <section class="sec_products">

                            <div class="row this_grid" id="seller">
                                 @if(!$licenses->isEmpty())
                                @foreach(@$licenses as $key=> $product)
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
                                                    <p>{{@$product->topic_name(@$product->standard_gold,App::getLocale())}}</p>

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
                                @else
                                
                                {{ trans('frontLang.no_data') }}
                                @endif
                                
                            </div>
                            {!! $licenses->render() !!}

                        </section>

                    </div>

                </div>
            </div>
            <!-- ////// -->

        </div>
    </section>
    <!-- //== END Section Category Products -->




@endsection
