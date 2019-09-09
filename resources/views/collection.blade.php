@extends('frontEnd.layout')
@section('content')

    <!-- START Section Products Details -->
    <section class="page_collection pt-5 pb-5">
        <div class="container-fluid pl-5 pr-5">

            <!-- Filter Products-->
            <div class="filter_products clearfix">
                <div class="float-left link_title">
                    <ul>
                        <li><a href="{{url('/')}}">{{ trans('frontLang.home') }}</a> > </li>
                        <li><a  class="active">
                                @if(App::getLocale()  == 'en')
                                    {{$collection->title_en}}
                                @else
                                    {{$collection->title_il}}
                                @endif

                            </a></li>
                    </ul>
                </div>
            </div>

            <div class="collection_info">
                <div class="title_info mb-5 mt-5">
                    <h4>
                        @if(App::getLocale()  == 'en')
                            {{$collection->title_en}}
                        @else
                            {{$collection->title_il}}
                        @endif

                    </h4>
                </div>

                <div class="row">
                    <div class="col-xl-6">
                        <p class="lead">
                            @if(App::getLocale()  == 'en')
                                {!!($collection->details_en )  !!}
                            @else
                                {!!($collection->details_ar )  !!}
                            @endif

                        </p>

                    </div>
                    <div class="col-xl-6">
                        <div class="img_about">
                            <img src="{{url('uploads')}}/topics/{{$collection->photo_file}}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- //== END Container -->
    </section> <!-- //== END Section Category Products -->

@endsection
