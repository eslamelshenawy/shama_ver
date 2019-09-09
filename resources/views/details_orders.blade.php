@extends('frontEnd.layout')
@section('content')

    <div class="col-md-9">
    <div class="user_info_content">
        <h3>{{ trans('frontLang.User_Orders') }}</h3>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">{{ trans('frontLang.ID') }}</th>
                    <th scope="col">{{ trans('frontLang.Product') }}</th>
                    <th scope="col">{{ trans('frontLang.Price') }}</th>
                    <th scope="col">{{ trans('frontLang.Qty') }}</th>
                    {{--                                    <th scope="col">image</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach(@$orders as $key=> $order)

                    @foreach(@$order->orderDetails as $key=> $order_details)
                        @php
                            $product_deils=\App\product::where("id",$order_details->product_id)->first();
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
                            <th scope="row">
                                {{\App\Helpers\Helper::order_details_product_cart($order_details->product_id,$order_details->standard_gold_id,$order_details->size_id)['price_sp']}}

                            </th>
                            <td>{{$order_details->qty}}</td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection
