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

                <form method="POST" action="" accept-charset="UTF-8"><input name="_token" type="hidden" value="hkdPcdkpLFBcnEINBm1cG9yPzgALyqhtZSm4cHRn">
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

                        </div><table class="table table-striped  b-t">
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
                                {{dump($order->orderDetails[$key]->product_details)}}

                                <tr>
                                    <td><label class="ui-check m-a-0">
                                            <input type="checkbox" name="ids[]" value="4"><i class="dark-white"></i>
                                            <input class="form-control row_no" name="row_ids[]" type="hidden" value="4">
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
                                        <i >{{$order->total_price}}</i>
                                    </td>
                                    <td class="text-center">

                                        <i >
                                            @if($order->orderDetails->isEmpty())

                                                {{$price ="0" }}
                                        </i>
                                        @else
                                        {{$order->orderDetails[$key]->product_details->special_price ?
                                 $order->orderDetails[$key]->product_details->special_price : $order->orderDetails[$key]->product_details->price }}
                                        @endif

                                        </i>

                                    </td>

                                    <td class="text-center">
                                        <i >{{$order->order_date}}</i>
                                    </td>
                                    <td class="text-center">
                                        <i >{{$order->payment_type}}</i>
                                    </td>
                                    <td class="text-center">
                                        @if($order->status == "complete")
                                            <i class="fa fa-check text-success inline">{{$order->status}}</i>
                                        @elseif($order->status == "pending")
                                            <i class="fa fa-times text-warning inline">{{$order->status}}</i>
                                        @elseif($order->status == "cancel")
                                            <i class="fa fa-times text-danger inline">{{$order->status}}</i>
                                        @elseif($order->status == "delivery")
                                            <i class="fa fa-times text-info inline">{{$order->status}}</i>

                                        @endif

                                    </td>


                                    <td class="text-center">

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            <i class="fa fa-eye"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="box-body box-profile">
                                                            @if($orders[$key]->orderDetails->isEmpty())

                                                                <img  style="    width: 20% !important;"class="profile-user-img img-responsive img-circle" src="http://emarketingbakers.com/shama/public/uploads/topics/15632885159235.jpg" alt="User profile picture">

                                                            @else

                                                                <img class="profile-user-img img-responsive img-circle" style="    width: 20% !important;" src="{{url("uploads/users")}}/{{$order->orderDetails[$key]->product_details->photo}}" alt="User profile picture">

                                                            @endif


                                                            <p class=" text-center">{{ trans('backLang.customer_name') }}: <h3 class="profile-username text-center">
                                                            {{$order->user->name}} </p></h3>

                                                            <p class="text-muted text-center">{{ trans('backLang.order_since') }}  {{$order->order_date}}  </p>

                                                            <ul class="list-group list-group-unbordered">
                                                                <li class="list-group-item">
                                                                    <b><i class=" margin-r-5" aria-hidden="true"></i>{{ trans('backLang.n_order') }}</b> <a class="pull-right">{{++$key}} </a>
                                                                </li>

                                                                <li class="list-group-item">
                                                                    <b><i class="fa fa-address-card margin-r-5"></i> {{ trans('backLang.price') }}</b> <a class="pull-right">
                                                                        @if($orders[$key]->orderDetails->isEmpty())

                                                                            {{$price ="0" }}

                                                                        @else
                                                                            {{$order->orderDetails[$key]->product_details->special_price ?
                                                                     $order->orderDetails[$key]->product_details->special_price : $order->orderDetails[$key]->product_details->price }}
                                                                        @endif

                                                                    </a>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <b><i class=" margin-r-5"></i>{{ trans('backLang.qyt') }}</b> {{$order->qyt}}<a class="pull-right"></a>
                                                                </li>

                                                                <li class="list-group-item">
                                                                    <b><i class="book-o margin-r-5"></i>{{ trans('backLang.total_price') }}</b><a class="pull-right">{{$order->total_price}}</a>
                                                                </li>

                                                                <li class="list-group-item">
                                                                    <b><i class="fa fa-life-saver margin-r-5"></i>{{ trans('backLang.status') }}</b> <a class="pull-right"><span class="label label-success">
                                        {{$order->status }}
                                        </span></a>
                                                                </li>

                                                            </ul>
                                                        </div>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


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
                                                <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">لا</button>
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



@endsection
