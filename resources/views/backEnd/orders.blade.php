@extends('backEnd.layout')

@section('content')



    <div ui-view="" class="app-body" id="view">

        <!-- ############ PAGE START-->
        <div class="padding">
            <div class="box">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <div class="box-header dker">
                    <h3>{{ trans('backLang.orders') }}</h3>
                    <small>
                        <a href="{{url('orders')}}">{{ trans('backLang.home') }}</a> /
                        <a> {{ trans('backLang.orders') }}</a>
                    </small>
                </div>

                <form method="POST" action="" accept-charset="UTF-8"><input name="_token" type="hidden"
                                                                            value="hkdPcdkpLFBcnEINBm1cG9yPzgALyqhtZSm4cHRn">
                    <div class="table-responsive">
                        <div id="m-4" class="modal fade" data-backdrop="true">
                            <div class="modal-dialog" id="animate">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">تأكيد</h5>
                                    </div>
                                    <div class="modal-body text-center p-lg">
                                        <p>
                                            هل أنت متأكد أنك تريد الحذف بالفعل؟
                                            <br>
                                            <strong>[ DESIGN YOUR OWN ENGAGEMENT RING ]</strong>
                                        </p>
                                    </div>
                                <!--@foreach($orders as $user)-->

                                    <!--<div class="modal-footer">-->
                                    <!--    <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">لا</button>-->
                                <!--    <a href="{{url('users/delete')}}/{{$user->id}}" class="btn danger p-x-md">نعم</a>-->
                                    <!--</div>-->
                                    <!--@endforeach-->

                                </div><!-- /.modal-content -->
                            </div>

                        </div>
                        <table class="table table-striped  b-t">
                            <thead>
                            <tr>
                                <th style="width:20px;">
                                    <label class="ui-check m-a-0">
                                        <input id="checkAll" type="checkbox"><i></i>
                                    </label>
                                </th>
                                <th> {{ trans('backLang.n_order') }}</th>
                                <th> {{ trans('backLang.customer_name') }}</th>
                                <th class="text-center" style="width:200px;">{{ trans('backLang.total_price') }}</th>
                                <th class="text-center" style="width:200px;">{{ trans('backLang.Amount') }}</th>
                                <th class="text-center" style="width:200px;">{{ trans('backLang.date') }}</th>
                                <th class="text-center" style="width:200px;">{{ trans('backLang.payment_type') }}</th>
                                <th class="text-center" style="width:200px;">{{ trans('backLang.status') }}</th>
                                <th class="text-center" style="width:200px;">{{ trans('backLang.view') }}</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($orders as $key=> $order)

                                    <tr>
                                        <td><label class="ui-check m-a-0">
                                                <input type="checkbox" name="ids[]" value="4"><i class="dark-white"></i>
                                                <input class="form-control row_no" name="row_ids[]" type="hidden"
                                                       value="4">
                                            </label>
                                        </td>
                                        <td>
                                            <i class="text-center"></i>
                                            {{++$key}}
                                        </td>
                                        <td>
                                            <i class="text-center"></i>
                                            {{$order->user->name}}
                                        </td>

                                        <td class="text-center">
                                            <i>{{$order->total_price}}</i>
                                        </td>
                                        <td class="text-center">

                                            <i>
                                                {{\App\Helpers\Helper::price($order->id)}}
                                            </i>

                                        </td>

                                        <td class="text-center">
                                            <i>{{$order->order_date}}</i>
                                        </td>
                                        <td class="text-center">
                                            <i>{{$order->payment_type}}</i>
                                        </td>
                                        <td class="text-center">
                                            @if($order->status == "complete")
                                                <i class=" text-success inline">{{$order->status}}</i>
                                            @elseif($order->status == "pending")
                                                <i class=" text-warning inline">{{$order->status}}</i>
                                            @elseif($order->status == "cancel")
                                                <i class=" text-danger inline">{{$order->status}}</i>
                                            @elseif($order->status == "delivery")
                                                <i class=" text-success inline">{{$order->status}}</i>

                                            @endif

                                        </td>


                                        <td class="text-center">

                                            <!-- Button trigger modal -->
                                            <a href="{{url("orders/details")}}/{{@$order->id}}" class="action_view"><i class="fa fa-eye"></i> View</a>




                                        </td>
                                    </tr>
                            @endforeach
                            <!-- .modal -->

                            <!-- / .modal -->


                            </tbody>
                        </table>

                    </div>
                    <footer class="dker p-a">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs">
                                <!-- .modal -->
                                <div id="m-all" class="modal fade" data-backdrop="true">
                                    <div class="modal-dialog" id="animate">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">تأكيد</h5>
                                            </div>
                                            <div class="modal-body text-center p-lg">
                                                <p>
                                                    هل أنت متأكد أنك تريد الحذف بالفعل؟
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark-white p-x-md"
                                                        data-dismiss="modal">لا
                                                </button>
                                                <button type="submit" class="btn danger p-x-md">نعم</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div>
                                </div>
                                <!-- / .modal -->

                            </div>


                            <div class="col-sm-6 text-right text-center-xs">

                            </div>
                        </div>
                    </footer>
                </form>

            </div>
        </div>
        <!-- ############ PAGE END-->

    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal
                        title</h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="col-md-9">
                        <div class="user_info_content">
                            <h3>User Orders</h3>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">QTY</th>
                                        {{--                                    <th scope="col">image</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $key=> $order)
                                        @foreach($order->orderDetails as $key=> $order_details)
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close
                    </button>
                </div>
            </div>
        </div>
    </div>



@endsection
