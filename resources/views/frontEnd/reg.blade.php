@extends('frontEnd.layout')

@section('content')


    <!-- START Section Products Details -->
    <section class="sec_category_products product_details pt-5 pb-5">
        <div class="container-fluid pl-5 pr-5">

            <!-- Filter Products-->
            <div class="filter_products clearfix">
                <div class="float-left link_title">
                    <ul>
                        <li><a href="">{{ trans('frontLang.home') }}</a> > </li>
                        <li><a href="" class="active">{{ trans('frontLang.Register') }}</a></li>
                    </ul>
                </div>
{{--                <div class="float-right filter_cat">--}}
{{--                    <span>Sort By</span>--}}
{{--                    <select name="" id="" class="form-control">--}}
{{--                        <option value="">{{ trans('frontLang.Best_Seller') }}</option>--}}
{{--                        <option value="">{{ trans('frontLang.Low_Seller') }}</option>--}}
{{--                        <option value="">{{ trans('frontLang.High_Seller') }}</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
            </div>
            <!-- ////// -->

            <!-- Start Body Category Products -->
            <div class="mt-5">
                <div class="row">


                    <div class="col-lg-9">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        <section class="sec_login">

                            <h4 class="border_after mb-4">{{ trans('frontLang.Create_New_Account') }}</h4>

                            <form action="{{url("register/web")}}"  method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="text" class="form-control" name="user_name" id="" value="{!! old('user_name') !!}" placeholder="User name">
                                    @if ($errors->has('user_name'))
                                        <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('user_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="" value="{!! old('email') !!}" placeholder="Email Address">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="phone" id="" value="{!! old('phone') !!}" placeholder="Mobile Phone">
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" id="" value="{!! old('password') !!}" placeholder="Password">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password_confirmation" value="{!! old('password_confirmation') !!}" id="" placeholder="Confirm Password">
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group clearfix">
                                    <div class="input_radio">
                                        <input type="radio" name="gender" id="fr" value="1">
                                        <label for="fr" class="radio-custom">
                                            <div class="icon-pet icon-pet-dog"></div> {{ trans('frontLang.Male') }}
                                        </label>
                                    </div>
                                    <div class="input_radio">
                                        <input type="radio" name="gender" id="nl" value="0" checked>
                                        <label for="nl" class="radio-custom">
                                            <div class="icon-pet icon-pet-cat"></div>{{ trans('frontLang.Female') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn_login" value="Sign Up">
                                </div>
                                <div class="form-group">
                                    <a href="login.html" class="btn_new_acc">{{ trans('frontLang.I_Have_Alerdy_Account') }}</a>
                                </div>
                            </form>

                        </section>
                        <hr class="d-lg-none d-md-none">
                    </div>

                    <div class="col-lg-3">
                        <aside class="">
                            <article>
                                <div class="title_best_seller">
                                    <h3>Best Seller</h3>
                                </div>
                                @foreach($c as  $product_bs)
                                    @foreach($product_bs as  $product_b)
                                        <div class="item">
                                            <a href="{{url("product/details")}}/{{$product_b->id}}" class="img_be"><img src="{{url('uploads')}}/topics/{{@$product_b->photo}}" class="img-fluid" alt=""></a>
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
                                                    <h5><span>{{$product_b->special_price}} $</span> <del>{{$product_b->price}} $</del></h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            </article>

                            <article class="article_no_border">
                                <div class="adsds_sda">
                                    <a href=""><img src="assets/images/adddss/1.png" class="img-fluid" alt=""></a>
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
