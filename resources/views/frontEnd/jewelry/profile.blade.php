@extends('frontEnd.layout')

@section('content')

    <!-- START Page Map Title-->
    <div class="page_title parallax-window" data-parallax="scroll" data-image-src="{{url("frontEnd")}}/assets/images/banner/banner-1.png">
        <h1>{{ trans('frontLang.Profile') }}</h1>
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
                            <h3 class="mb-3">{{@\Auth::user()->name}}</h3>
                            <p class="m-2"><i class="fa fa-envelope"></i> {{@\Auth::user()->email}} </p>
                            <p class="m-2"><i class="fa fa-phone"></i> {{@\Auth::user()->phone}} </p>
                        </div>
                        <div class="tabs_profile text-center">
                            <ul>
                                <li class="active"><a href="{{url('profile')}}"><i class="fa fa-user-edit"></i> {{ trans('frontLang.User_Inforamtion') }}</a></li>
                                <li><a href="{{url('profile_order')}}"><i class="fa fa-list"></i> {{ trans('frontLang.Orders') }}</a></li>
                                <li><a href="{{url('logout/we')}}"><i class="fa fa-sign-out-alt"></i> {{ trans('frontLang.Log_Out') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="user_info_content">
                        @if(Session::has('success'))
                            <div class="alert alert-success" role="alert" >
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        <h3>{{ trans('frontLang.User_Inforamtion') }}</h3>
                        <div class="user_form_info">
                            <form action="{{url("edit/profile")}}/{{@\Auth::user()->id}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" placeholder="Username" value="{{@\Auth::user()->name}}">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{@\Auth::user()->email}}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="address" placeholder="Address ......." value="{{@\Auth::user()->address}}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="{{@\Auth::user()->phone}}">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="form-control" value="Save Changes" value="">
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div> <!-- //== END Container -->
    </section> <!-- //== END Section Category Products -->



@endsection
