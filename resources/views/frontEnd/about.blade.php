@extends('frontEnd.layout')
@section('content')


    <!-- START Page Map Title-->
    <div class="page_title parallax-window" data-parallax="scroll" data-image-src="{{url("frontEnd")}}/assets/images/banner/banner-1.png">
        <h1>{{ trans('frontLang.About_Us') }}</h1>
    </div>
    <!-- //== END Page Map Title-->


    <!-- START Section Products Details -->
    <section class="page_about pt-5 pb-5">
        <div class="container-fluid pl-5 pr-5">

            <!-- Filter Products-->
            <div class="filter_products clearfix">
                <div class="float-left link_title">
                    <ul>
                        <li><a href="{{url("/")}}">{{ trans('frontLang.home') }}</a> > </li>
                        <li><a href="{{url("about/us")}}" class="active">{{ trans('frontLang.About_Us') }}</a></li>
                    </ul>
                </div>
            </div>
            <!-- ////// -->


            <div class="about_info">
                <div class="title_info mb-5 mt-5">
                    <h4>{{ trans('frontLang.About_Us') }}</h4>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        @if(App::getLocale()  == 'en')
                            {!! $about->details_en !!}
                    @else
                        {!! $about->details_ar !!}
                        @endif
                    </div>
                    <div class="col-xl-6">
                        <div class="img_about">
                            <img src="{{url('uploads')}}/topics/{{$about->photo_file}}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>

                <div class="row mt-5 mb-5 sec_location_about">
                    <div class="col-md-12 text-center">
                        <h3>{{ trans('frontLang.Our_Location') }}</h3>
                        <p>
                            @if(App::getLocale()  == 'en')
                                {!! $setting->contact_t1_en !!}
                            @else
                                {!! $setting->contact_t1_ar !!}
                            @endif
                        </p>
                    </div>
                </div>

            </div>

        </div> <!-- //== END Container -->


    </section> <!-- //== END Section Category Products -->



@endsection
