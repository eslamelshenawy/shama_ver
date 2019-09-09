@extends('frontEnd.layout')
@section('content')


    <!-- START Page Map Title-->
    <div class="page_title parallax-window" data-parallax="scroll" data-image-src="{{url("frontEnd")}}/assets/images/banner/banner-1.png">
        <h1>Checkout </h1>
    </div>
    <!-- START Checkout -->
    <section class="page_checkout">
        <!-- Filter Products-->


        <div class="filter_products clearfix" style="margin-top: 48px;
    margin-left: 123px; margin-right: 60px;">
            <div class="float-left link_title">
                <ul>
                    <li><a href="">{{ trans('frontLang.home') }}</a> ></li>
                    <li><a href="" class="active">{{ trans('frontLang.Checkout') }}</a></li>
                </ul>
            </div>
        </div>

        <div class="container" style="    margin-top: 80px;">


             @if($carts->isEmpty())
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert" >
                        {{ Session::get('success') }}
                    </div>
                @endif

            @else

            <div class="card">
                <div class="card_head">
                    <h3 class="llin">{{ trans('frontLang.Order_Summary') }}</h3>
                </div>
                <div class="card_body">
                    <div class="row">
                        <hr>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr class="he">
                                        <th>#</th>
                                        <th>{{ trans('frontLang.Item(s)') }}</th>
                                        <th>{{ trans('frontLang.Qty') }}</th>
                                        <th>{{ trans('frontLang.Price') }}</th>
                                        <th>{{ trans('frontLang.Total') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $sumtotal=0;
                                        $total=0;
                                    $a=array();
                                    @endphp

                                    @foreach(@$carts as $key=> $cart)
                                        @php

                                                $product_details=\App\product::where("id",$cart->product_id)->first();
                                              $sumtotal = $cart->price_sp ;
                                              $total += ($cart->price_sp) * $cart->qty ;
                                            array_push($a,$cart->product_id);

                                        @endphp

                                        <tr style="font-size: smaller;">

                                        <th scope="row">{{++$key}}</th>
                                        <td>
                                            @if(App::getLocale()  == 'en')
                                                {{@$product_details->name_en}}
                                            @else
                                                {{@$product_details->name_heb}}
                                            @endif

                                        </td>
                                        <td>{{$cart->qty}}</td>
                                        <td>
                                            {{$cart->price_sp}}
                                        </td>
                                        <td>{{@$sumtotal *$cart->qty }}</td>

                                    </tr>
                                        <input type="hidden" value="{{$total}}" >
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
                    @php
                            $string=implode(",",$a);

                    @endphp


            <div class="card">
                <div class="card_head" >
                    <h3 class="llin">{{ trans('frontLang.Delivery_payment') }}</h3>
                </div>
                <div class="card_body">
                    <form action="{{url('/store/order')}}">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="para">
                                {{ trans('frontLang.Select_your_payment_method') }}

                            </p>
                            <input type="hidden" name="standard_gold_id"  id="standard_gold_id" value="{{$cart->standard_gold_id}}" id="">
                            <input type="hidden" name="" id="size_id" value="{{$cart->size_id}}">
                            <div class="mt-2 ml-4 img_debit_cart">

                                    <h2>{{ trans('frontLang.have_promocode') }}</h2>

                                <div class="radio-box card-popup-btn" style="display: block;margin-bottom: 10px;font-weight: bold;color: #777;padding: 5px;background-color: #f8f8f8;border: 1px solid #EEE;">
                                    <input type="radio" class="btn btn-info" data-toggle="collapse" data-target="#demo">
                                    <div id="demo" class="collapse">

                                        <input type="text" name="promocode" id="promocode" placeholder="{{ trans('frontLang.promo_code') }}">
{{--                                        <button type="button" class="btn btn-info" id="check">{{ trans('frontLang.Check') }}</button>--}}
                                        <input type="hidden" value="{{$string}}" name="data_product" id="data_product">

                                    </div>
                                </div>
                                <a class="radio-box card-popup-btn" style="    display: block;margin-bottom: 10px;font-weight: bold;color: #777;padding: 5px;background-color: #f8f8f8;border: 1px solid #EEE;">
                                    <input type="radio" value="card" name="payment_type" id="pay1-1" required>
                                    <label for="pay1-1">
                                        <span><img src="{{url("frontEnd")}}/assets/images/card.png" alt="" style="width: 30px;height: 20px;">
                                            {{ trans('frontLang.Debit_Credit_Card') }}</span>
                                    </label>
                                </a>
                                <a class="radio-box card-popup-btn" style="    display: block;margin-bottom: 10px;font-weight: bold;color: #777;padding: 5px;background-color: #f8f8f8;border: 1px solid #EEE;">
                                    <input type="radio" value="cash" name="payment_type" id="pay1-2">
                                    <label for="pay1-2">
                                        <span><img src="{{url("frontEnd")}}/assets/images/cash.png" alt="" style="    width: 30px;
    height: 20px;">{{ trans('frontLang.Cash') }}
                                            </span>
                                    </label>
                                </a>
                            </div>

                        </div>
                        <div class="col-md-4" style="      margin-top: 11px;  border-radius: 10% 25% 50% 42%;">
                            <div class="table-responsive">
                                <table class="table table_card_chk">
                                    <tbody>
                                    @php
                                        $taxes_percent = \App\Helpers\Helper::Taxes();
                                        $taxes = ($taxes_percent/100)*$total;
                                      $shipping=  \App\Helpers\Helper::shipping();
                                      $percent_org= $shipping->percent_org  ;
                                      $percent_deliver=  $shipping->percent_delivery  ;
                                       $ship_cost=$percent_org+$percent_deliver;
                                    @endphp

                                    <tr>
                                        <td scope="row">{{ trans('frontLang.Subtotal') }}</td>
                                        <td>{{@$total}}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">{{ trans('frontLang.Service_Charge') }}</td>
                                        <td>{{@$ship_cost}}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">{{ trans('frontLang.VAT') }}</td>
                                        <td>{{@$taxes}}</td>
                                    </tr>
                                    <tr class="brd_1">
                                        <th scope="row">{{ trans('frontLang.Total_Amount') }}</th>
                                        <th>{{@$total+$taxes+$ship_cost}}</th>
                                        <input type="hidden" name="totalPrice_before_vat_char" value="{{@$total}}">
                                        <input type="hidden" name="totalPrice" value="{{@$total+$taxes+$ship_cost}}">
                                        <input type="hidden" name="taxes" value="{{@$taxes}}">
                                        <input type="hidden" name="ship_cost" value="{{@$ship_cost}}">

                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <th colspan="2" class="text-center">
                                        <button type="submit" class="btn_table_chk">{{ trans('frontLang.Place_Order') }}</button>
                                    </th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </section>
    <!-- //==END Checkout -->


@endsection
