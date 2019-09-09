@extends('frontEnd.layout')
@section('content')

    <!-- START Page Map Title-->
    <div class="page_title parallax-window" data-parallax="scroll" data-image-src="{{url("frontEnd")}}/assets/images/banner/banner-1.png">
        <h1>Contact Us</h1>
    </div>
    <!-- //== END Page Map Title-->


    <!-- START Section Products Details -->
    <section class="page_contact pt-5 pb-5">
        <div class="container-fluid pl-5 pr-5">

            <!-- Filter Products-->
            <div class="filter_products clearfix">
                <div class="float-left link_title">
                    <ul>
                        <li><a href="">{{ trans('frontLang.home') }}</a> > </li>
                        <li><a href="" class="active">{{ trans('frontLang.Contact_Us') }}</a></li>
                    </ul>
                </div>
            </div>
            <!-- ////// -->
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert" >
                    {{ Session::get('success') }}
                </div>
            @endif


            <div class="contact_info">
                <div class="title_info mb-5 mt-5">
                    <h4>{{ trans('frontLang.Contact_Us') }}</h4>
                </div>

                <div class="row">
                    <div class="col-md-5">

                        <ul class="info_details">
                            <li><i class="fa fa-map-marker"></i>
                                @if(App::getLocale()  == 'en')
                                    {!! $setting->contact_t1_en !!}
                                @else
                                    {!! $setting->contact_t1_ar !!}
                                @endif
                            </li>
                            <li><i class="fa fa-mobile-alt"></i>{{$setting->contact_t5}}</li>
                            <li><i class="fa fa-phone"></i> {{$setting->contact_t3}}</li>
                            <li><i class="fa fa-fax"></i> {{$setting->contact_t4}}</li>
                            <li><i class="fa fa-envelope"></i>{{$setting->contact_t6}}</li>
                        </ul>
                        <div class="form_contact">
                            <form action="{{url("contact-us")}}" method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-xl-6 form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Full Name">
                                    </div>
                                    <div class="col-xl-6 form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="col-xl-12 form-group">
                                        <textarea class="form-control" name="message" placeholder="Write Message"></textarea>
                                    </div>
                                    <div class="col-xl-12 form-group">
                                        <input type="submit" class="btn btn-primary btn-block" value="Send Message">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="map_iframe">
                            <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d27631.698014253605!2d31.205385149999998!3d30.037940799999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sar!2seg!4v1560412189517!5m2!1sar!2seg"
                                    frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- //== END Section Category Products -->



@endsection
