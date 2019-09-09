@extends('frontEnd.layout')
@section('content')



    <!-- START Page Map Title-->
    <div class="page_title parallax-window" data-parallax="scroll" data-image-src="{{url("frontEnd")}}/assets/images/banner/banner-1.png">
        <h1>
            @if(App::getLocale()  == 'en')
                {!! $Accessibility->title_en !!}
            @else
                {!! $Accessibility->title_il !!}
            @endif

        </h1>
    </div>
    <!-- //== END Page Map Title-->


    <!-- START Section Products Details -->
    <section class="page_about pt-5 pb-5">
        <div class="container-fluid pl-5 pr-5">

            <!-- Filter Products-->
            <div class="filter_products clearfix">
                <div class="float-left link_title">
                    <ul>
                        <li><a href="">{{ trans('frontLang.home') }}</a> > </li>
                        <li><a href="" class="active">
                                @if(App::getLocale()  == 'en')
                                    {!! $Accessibility->title_en !!}
                                @else
                                    {!! $Accessibility->title_il !!}
                                @endif
                            </a></li>
                    </ul>
                </div>
            </div>
            <!-- ////// -->


            <div class="about_info">
                <div class="title_info mb-5 mt-5">
                    <h4>
                        @if(App::getLocale()  == 'en')
                            {!! $Accessibility->title_en !!}
                        @else
                            {!! $Accessibility->title_il !!}
                        @endif

                    </h4>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        @if(App::getLocale()  == 'en')
                            {!! $Accessibility->details_en !!}
                        @else
                            {!! $Accessibility->details_ar !!}
                        @endif
                    </div>
                </div>


            </div>

        </div> <!-- //== END Container -->

    </section> <!-- //== END Section Category Products -->



@endsection
