@extends('frontEnd.layout')
@section('content')



    <!-- START Page Map Title-->
    <div class="page_title parallax-window" data-parallax="scroll" data-image-src="{{url("frontEnd")}}/assets/images/banner/banner-1.png">
        <h1>{{ trans('frontLang.Cart_View') }}</h1>
    </div>
    <!-- //== END Page Map Title-->


    <!-- START Section Cart View -->
    <section class="sec_category_products page_cart pt-5 pb-5">
        <div class="container-fluid pl-5 pr-5">

            <!-- Filter Products-->
            <div class="filter_products clearfix">
                <div class="float-left link_title">
                    <ul>
                        <li><a href="{{url('/')}}">{{ trans('frontLang.home') }}</a> > </li>
                        <li><a  class="active">{{ trans('frontLang.Cart_View') }}</a></li>
                    </ul>
                </div>
            </div>
            <!-- ////// -->

            <!-- Start Body Category Products -->
            <div class="mt-5">
                <div class="row">

                    <div class="col-md-9">
                        <div class="item_view">
                            @php
                                $sumtotal=0;
                            @endphp

                        @foreach(@$carts as $key=> $cart)
                                @php
                                $count =count($carts);
                                    $product_details=\App\product::where("id",$cart->product_id)->first();
                                  $sumtotal += ($cart->price_sp)*$cart->qty ?  ($cart->price_sp) *$cart->qty : ($cart->price_sp) *$cart->qty;
                                @endphp

                                <div class="item">
                                <div class="img_cart">
                                    <img src="{{url('uploads')}}/topics/{{$product_details->photo}}" class="img-fluid" alt="">
                                </div>
                                <div class="info_cart">
                                    <h5>
                                        @if(App::getLocale()  == 'en')
                                            {{$product_details->name_en}}
                                        @else
                                            {{$product_details->name_heb}}
                                        @endif
                                    </h5>
                                    <h6>
                                            {{\App\Helpers\Helper::standard_gold_name_to($cart->standard_gold_id)}}
                                    </h6>
                                    <h6>
                                            {{\App\Helpers\Helper::size_topic($cart->size_id) == 0
                                            ? "" :\App\Helpers\Helper::size_topic($cart->size_id) }}
                                    </h6>
{{--                                    <select data-show-content="true" class="select_style select_sizes form-control">--}}
{{--                                        <option data-content="Ring Size"></option>--}}
{{--                                        <option data-content=" 14 K ROSE GOLD"></option>--}}
{{--                                        <option data-content=" 14 K ROSE GOLD"></option>--}}
{{--                                    </select>--}}
                                    <div class="number_pl">
                                        <a  class="minus" dataid_min="{{$product_details->id}}" data_stand="{{$cart->standard_gold_id}}" data_size="{{$cart->size_id}}">
                                            <span class="">-</span></a>
                                        <input type="text" value="{{$cart->qty }}"/>
                                        <a  class="plus" dataid_plus="{{$product_details->id}}"
                                            data_stand="{{$cart->standard_gold_id}}" data_size="{{$cart->size_id}}">
                                            <span class="">+</span></a>
                                    </div>

                                </div>
                                <div class="cart_price">
                                    <a   class="trash"
                                         data_stand="{{$cart->standard_gold_id}}" data_size="{{$cart->size_id}}" dataid="{{$product_details->id}}" ><span class="cart_remove"><i class="fa fa-trash">

                                            </i>{{ trans('frontLang.Remove') }}</span></a>
                                    <h3>{{@($cart->price_sp)* $cart->qty ? (@$cart->price_sp )* $cart->qty : @
                                    ($cart->price_sp) * $cart->qty }} $</h3>
                                </div>
                            </div>

                            @endforeach

                        </div>
                    </div>
                    @php
                      $taxes_percent = \App\Helpers\Helper::Taxes();
                      $taxes = ($taxes_percent/100)*$sumtotal;
                    $shipping=  \App\Helpers\Helper::shipping();
                    $percent_org= $shipping->percent_org  ;
                    $percent_deliver=  $shipping->percent_delivery  ;
                     $ship_cost=$percent_org+$percent_deliver;
                    @endphp

                    <div class="col-md-3">
                        <div class="cart_prices_total">
                            <div class="item_num clearfix">
                                <span class="float-left">{{$count}} {{ trans('frontLang.Item') }}</span>
                                <span class="float-right">{{$sumtotal }} $</span>
                            </div>
                            <div class="item_taxes clearfix">
                                <p class="clearfix"><span class="float-left">{{ trans('frontLang.Taxes') }}</span> <span class="float-right">{{$taxes}} $</span></p>
                                <p class="clearfix"><span class="float-left">{{ trans('frontLang.Shipping') }}</span> <span class="float-right">{{$ship_cost}} $</span></p>
                            </div>
                            <div class="item_total clearfix">
                                <span class="float-left">{{ trans('frontLang.TOTAL') }}</span> <span class="float-right">{{($sumtotal)+$taxes+$ship_cost}} $</span>
                            </div>
                            <div class="item_btn_chk">
                                <a href="{{url('checkout')}}">{{ trans('frontLang.Checkout') }}</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- ////// -->

        </div>
    </section>
    <!-- //== END Section Category Products -->




@endsection
