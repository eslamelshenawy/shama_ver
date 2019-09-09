@extends('frontEnd.layout')

@section('content')


    <!-- START Section Products Details -->
    <section class="sec_category_products product_details pt-5 pb-5">
        <div class="container-fluid pl-5 pr-5">

            <!-- Filter Products-->
            <div class="filter_products clearfix">
                <div class="float-left link_title">
                    <ul>
                        <li><a href="{{url('/')}}">{{ trans('frontLang.home') }}</a> > </li>
                        <li><a href="" class="active">{{ trans('frontLang.Login') }}</a></li>
                    </ul>
                </div>
            </div>
            <!-- ////// -->

            <!-- Start Body Category Products -->
            <div class="mt-5">
                <div class="row">

@if(session()->has('warning'))
    <div class="alert alert-denger">
        {{ session()->get('warning') }}
    </div>
@endif

                    <div class="col-lg-9">

                        <section class="sec_login">

                            <h4 class="border_after mb-4">{{ trans('frontLang.Login') }}</h4>

                            <form   action="{{url("login/web")}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" value="" placeholder="{{ trans('frontLang.Email_Address') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password"   value=""placeholder="{{ trans('frontLang.Password') }}" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <a href="" class="btn_forget_pass">{{ trans('frontLang.Forget_Password') }}</a>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn_login" value="Login">
                                </div>
                                <div class="form-group">
                                    <a href="register.html" class="btn_new_acc">{{ trans('frontLang.Create_New_Account') }}</a>
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
                                    <a href=""><img src="{{"frontEnd"}}/assets/images/adddss/1.png" class="img-fluid" alt=""></a>
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
