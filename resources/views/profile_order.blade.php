@extends('frontEnd.layout')

@section('content')
    <!-- START Page Map Title-->
    <div class="page_title parallax-window" data-parallax="scroll"
         data-image-src="{{url("frontEnd")}}/assets/images/banner/banner-1.png">
        <h1>{{ trans('frontLang.Profile') }}</h1>
    </div>
    <h1>{{ trans('frontLang.Profile_Orders') }}</h1>
    </div>
    <!-- //== END Page Map Title-->


    <!-- START Section Products Details -->
    <section class="page_profile pt-5 pb-5">
        <div class="container-fluid pl-5 pr-5">

            <div class="row">
                <div class="col-md-3">
                    <div class="img_profile">
                        <!-- <img src="assets/images/user.png" class="img-fluid" alt=""> -->
                        <div class="info_view text-center mt-4">
                            <h3 class="mb-3">{{@Auth::user()->name}}</h3>
                            <p class="m-2"><i class="fa fa-envelope"></i> {{@Auth::user()->email}} </p>
                            <p class="m-2"><i class="fa fa-phone"></i> {{@Auth::user()->phone}} </p>
                        </div>
                        <div class="tabs_profile text-center">
                            <ul id="navi">
                                <li ><a href="{{url('profile')}}" class="menu"><i class="fa fa-user-edit">

                                        </i>{{ trans('frontLang.User_Inforamtion') }}</a></li>
                                <li><a href="{{url('profile_order')}}" class="menu"><i class="fa fa-list"></i> {{ trans('frontLang.Orders') }}</a></li>
                                <li><a href="{{url('logout/we')}}" class="menu"><i class="fa fa-sign-out-alt"></i>{{ trans('frontLang.Log_Out') }} </a></li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-md-9">
                    <div class="user_info_content">
                        <h3> {{ trans('frontLang.User_Orders') }}</h3>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">{{ trans('frontLang.ID') }}</th>
                                    <th scope="col">{{ trans('frontLang.Payment_Type') }}</th>
                                    <th scope="col">{{ trans('frontLang.status') }}</th>
                                    <th scope="col">{{ trans('frontLang.Total_Price') }}</th>
                                    <th scope="col">{{ trans('frontLang.Service_Charge') }}</th>
                                    <th scope="col">{{ trans('frontLang.VAT') }}</th>
                                    <th scope="col">{{ trans('frontLang.Rate') }}</th>
                                    <th scope="col">{{ trans('frontLang.Action') }}</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($orders as $key=> $order)

                                        @php
                                        $taxes_percent = \App\Helpers\Helper::Taxes();
                                        $taxes = $taxes_percent*$order->total_price;
                                      $shipping=  Helper::shipping();
                                      $percent_org= $shipping->percent_org *$order->total_price ;
                                      $percent_deliver=  $shipping->percent_delivery *$order->total_price ;
                                       $ship_cost=$percent_org+$percent_deliver;
                                    @endphp
                                    <tr>
                                        <th scope="row">{{++$key}}</th>
                                        <th scope="row">{{$order->payment_type}}</th>
                                        <td>{{$order->status}}</td>
                                        <td>{{$order->total_price}}</td>
                                        <td>{{$order->delivery_fees}}</td>
                                        <td>{{$order->taxes}}</td>
                                        <td>
                                            @if(($order->rate) == null)

                                                <div class="starrating risingstar d-flex flex-row-reverse m-auto">
                                                    <input type="radio" class="star" id="star5" name="rating"
                                                           data_id="{{@$order->id}}" value="5"/><label
                                                            for="star5" title="5 star"></label>
                                                    <input type="radio" class="star" id="star4" name="rating"
                                                           data_id="{{@$order->id}}" value="4"/><label
                                                            for="star4" title="4 star"></label>
                                                    <input type="radio" class="star" id="star3" name="rating"
                                                           data_id="{{@$order->id}}" value="3"/><label
                                                            for="star3" title="3 star"></label>
                                                    <input type="radio" class="star" id="star2" name="rating"
                                                           data_id="{{@$order->id}}" value="2"/><label
                                                            for="star2" title="2 star"></label>
                                                    <input type="radio" class="star" id="star1" name="rating"
                                                           data_id="{{@$order->id}}" value="1"/><label
                                                            for="star1" title="1 star"></label>
                                                </div>
                                            @else
                                                <div class="rating mt-4 mb-4">
                                                              <span>
                                                                    @for ($i = 1; $i <= @$order->rate->stars; $i++)
                                                                      <i class="fas fa-star fa-lg"></i>
                                                                  @endfor
                                                              </span>
                                                </div>
                                            @endif


                                        </td>
                                        <td class="td_action">
{{--                                            <a type="button" class="action_rate" data-toggle="modal"--}}
{{--                                               data-target=".bd-example-modal-sm"><i class="fa fa-star">--}}

{{--                                                </i>--}}
{{--                                                {{ trans('frontLang.Rate_Now') }}--}}
{{--                                            </a>--}}

                                            <!-- modal Rating -->
                                            <div class="modal fade bd-example-modal-sm modal_rating" tabindex="-1"
                                                 role="dialog"
                                                 aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content text-center">
                                                        @if(($order->rate) == null)
                                                            <h5> {{ trans('frontLang.Add_Your_Rating') }}</h5>

                                                        @else
                                                            <h5> {{ trans('frontLang.Your_Rating') }}</h5>

                                                            <div class="rating mt-4 mb-4">
                                                              <span>
                                                                    @for ($i = 1; $i <= @$order->rate->stars; $i++)
                                                                      <i class="fas fa-star fa-lg"></i>
                                                                  @endfor
                                                              </span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Button trigger modal -->
                                            <a href="{{url("details/orders")}}/{{@$order->id}}" class="action_view"><i
                                                        class="fa fa-eye"></i>{{ trans('frontLang.View') }} </a>
                                            <a class="action_del" order_id="{{@$order->id}}"><i class="fa fa-times"></i>
                                                {{ trans('frontLang.Delete') }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div> <!-- //== END Container -->
    </section> <!-- //== END Section Category Products -->

    <!-- Large modal -->


@endsection
