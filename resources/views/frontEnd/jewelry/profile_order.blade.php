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
                            <ul>
                                <li class="active"><a href="{{url('profile')}}"><i class="fa fa-user-edit">

                                        </i>{{ trans('frontLang.User_Inforamtion') }}</a></li>
                                <li><a href="{{url('profile_order')}}"><i class="fa fa-list"></i> {{ trans('frontLang.Orders') }}</a></li>
                                <li><a href="{{url('logout/we')}}"><i class="fa fa-sign-out-alt"></i>{{ trans('frontLang.Log_Out') }} </a></li>
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
                                    <th scope="col">{{ trans('frontLang.Action') }}</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($orders as $key=> $order)
                                    @php
                                        use App\Helpers\Helper;$taxes_percent = Helper::Taxes();
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
                                        <td class="td_action">
                                            <a type="button" class="action_rate" data-toggle="modal"
                                               data-target=".bd-example-modal-sm"><i class="fa fa-star">

                                                </i>
                                                {{ trans('frontLang.Rate_Now') }}
                                            </a>
                                            <!-- modal Rating -->
                                            <div class="modal fade bd-example-modal-sm modal_rating" tabindex="-1"
                                                 role="dialog"
                                                 aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content text-center">
                                                        <h5>Add Your Rating</h5>
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

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="col-md-9">
                    <div class="user_info_content">
                        <h3>{{ trans('frontLang.User_Orders') }}</h3>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">{{ trans('frontLang.ID') }}</th>
                                    <th scope="col">{{ trans('frontLang.Product') }}</th>
                                    <th scope="col">{{ trans('frontLang.QTY') }}</th>
                                    {{--                                    <th scope="col">image</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $key=> $order)
                                    @foreach($order->orderDetails as $key=> $order_details)
                                        @php
                                            use App\product;$product_deils=product::where("id",$order_details->product_id)->first();
                                        @endphp
                                        <tr>
                                            <th scope="row">{{++$key}}</th>
                                            <th scope="row">
                                                @if(App::getLocale()  == 'en')
                                                    {{@$product_deils->name_en}}
                                                @else
                                                    {{@$product_deils->name_heb}}
                                                @endif

                                            </th>
                                            {{--                                            <td> imag{{$product_deils->photo}}</td>--}}
                                            <td>{{$order_details->qty}}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
