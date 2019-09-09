@extends('frontEnd.layout')
@section('content')
    <!-- START Section Category Products -->
    <section class="sec_category_products pt-5 pb-5">
        <div class="container-fluid pl-5 pr-5">

            <!-- Filter Products-->
            <div class="filter_products clearfix">
                <div class="float-left link_title">
                    <ul>
                        <li><a href="{{url("/")}}">{{ trans('frontLang.home') }}</a> > </li>
                        <li><a class="active">{{\App\Helpers\Helper::name_section($id)}}</a>  </li>
                    </ul>
                </div>
                <div class="float-right filter_cat">
                    <div class="icon_grid">
                        <i id="list" class="fa fa-th-list fa-lg active"></i>
                        <i id="grid" class="fa fa-th-large fa-lg"></i>
                    </div>
                </div>
            </div>
            <!-- ////// -->

            <!-- Start Body Category Products -->
            <div class="body_cat mt-5">
                <div class="row">
                    <div class="col-lg-3">
                        <aside class="">

                            <article class="article_no_border">
                                <div class="adsds_sda">
                                    <a href=""><img src="{{url('uploads')}}/banners/{{@$banner->file_en}}" class="img-fluid" alt=""></a>
                                </div>
                            </article>

                        </aside>
                    </div>

                    <div class="col-lg-9">

                        <section class="sec_products">

                            <!-- Title Info -->
                            <div class="txt_info text-center mb-5">
                                <p>{{ trans('frontLang.cat_p1') }}</p>
                                <p>
                                    {{ trans('frontLang.cat_p2') }}
                                </p>
                                <p>
                                    {{ trans('frontLang.cat_p3') }}
                                </p>
                            </div>

                            <div class="row this_grid">
                                @foreach(@$cats as $key=> $subcat)

                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="item clearfix">
                                            <div class="img_rings">
                                                <a href="{{url("subcat")}}/{{$subcat->id}}" style="color: #ff8080;">
                                                <img src="{{url('uploads')}}/topics/{{$subcat->photo}}" class="img-fluid" alt="">
                                                </a>
                                            </div>
                                            <div class="txt_info">
                                                <div class="title text-center">
                                                    <a href="{{url("subcat")}}/{{$subcat->id}}" style="color: #ff8080;">
                                                        @if(App::getLocale()  == 'en')
                                                            {{$subcat->name_en}}
                                                        @else
                                                            {{$subcat->name_heb}}
                                                        @endif
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </section>

                    </div>

                </div>
            </div>
            <!-- ////// -->

        </div>
    </section>
    <!-- //== END Section Category Products -->



@endsection
