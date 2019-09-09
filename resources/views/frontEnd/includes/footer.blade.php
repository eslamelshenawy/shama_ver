<!-- START Subscribe -->
<div class="sec_subscribe">
    <div class="container">
        <h1>      {{ trans('frontLang.sub_ser') }}
        </h1>
        <span>
            <input type="text" class="input_subscribe" name="email"  placeholder="{{ trans('frontLang.email_address') }}">
            <button type="submit" class="btn_subscribe btn_style2">{{ trans('frontLang.Subscribe') }}</button>
        </span>
    </div>
</div>
<!-- //== END Subscribe -->
@php

        $partner = \App\Topic::where("webmaster_id",23)->get();
@endphp

<!-- START  -->
<div class="sec_partner">
    <div class="container">
        <div class="slide_partner">
                                @foreach($partner as $Galler )

            <div>
                <a href=""><img src="{{url('uploads')}}/topics/{{$Galler->photo_file}}" class="img-fluid" alt=""></a>
            </div>
                                @endforeach
        </div>
    </div>
</div>
<!-- //== END  -->

@php
    $about = \App\Topic::find(37);
    $sections=App\Topic::where("webmaster_id","13")
    ->select("topics.title_en as sectionname_en ","topics.title_il as sectionname_heb ","topics.id as id")->get();
$setting = \App\Setting::find(1);

@endphp



<!-- START Footer-->
<footer>
    <div class="container-fluid pl-5 pr-5">
        <div class="row">
            <div class="col-md-4">
                <div class="wedget_item">
                    <a href="index.html"><a href="index.html"><img src="{{url('frontEnd')}}/assets/images/logo-footer.png" class="img-fluid logo_footer" alt=""></a></a>
                    <p>
                        <!--@if(App::getLocale()  == 'en')-->
                        <!--    {!!str_limit($about->details_en ,"100")  !!}-->
                        <!--@else-->
                        <!--    {!!str_limit($about->details_ar ,"100")  !!}-->
                        <!--@endif-->

                    </p>
                    <ul class="social_footer">
                        <li><a href="{{$setting->social_link5}}" target="_blank"><i class="fab fa-youtube fa-lg"></i></a></li>
                        <li><a href="{{$setting->social_link1}}" target="_blank"><i class="fab fa-facebook-f fa-lg"></i></a></li>
                        <li><a href="{{$setting->social_link6}}" target="_blank"><i class="fab fa-instagram fa-lg"></i></a></li>
                        <li><a href="{{$setting->social_link10}}" target="_blank"><i class="fab fa-whatsapp fa-lg"></i></a></li>
                        <li><a href="{{$setting->social_link2}}" target="_blank"><i class="fab fa-twitter fa-lg"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <div class="wedget_item">
                    <h3>{{ trans('frontLang.Site_Map') }}</h3>
                    <ul class="links">
                        <li><a href="{{url("/")}}">{{ trans('frontLang.home') }}</a></li>
                        @foreach($sections as  $section)
                        <li><a href="{{url('cat')}}/{{$section["id"]}}">
                                                      @if(App::getLocale()  == 'en')
                                                     {{$section["sectionname_en "]}}
                                                      @else
                                                     {{$section["sectionname_heb "]}}
                                                     @endif
                            
                            </a></li>
                        @endforeach
                        <li><a href="{{url('contact/us')}}">{{ trans('frontLang.contact_us') }} </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <!--<div class="wedget_item">-->
                <!--    <h3>Discover</h3>-->
                <!--    <ul class="links">-->
                <!--        <li><a href="">Bracelets</a></li>-->
                <!--        <li><a href="">Earrings</a></li>-->
                <!--        <li><a href="">Rings</a></li>-->
                <!--        <li><a href="">Necklaces and pendants </a></li>-->
                <!--        <li><a href="">Charms</a></li>-->
                <!--        <li><a href="">For him </a></li>-->
                <!--        <li><a href="">For kids </a></li>-->
                <!--        <li><a href="">traditional </a></li>-->
                <!--    </ul>-->
                <!--</div>-->
            </div>
            <div class="col-md-4">
                <div class="wedget_item">
                    <h3>{{ trans('frontLang.Polices') }}</h3>
                    <ul class="links">
                        <!--<li><a href="#">payment options</a></li>-->
                        <li><a href="{{url('terms/conditions')}}">{{ trans('frontLang.Terms_and_conditions') }}</a></li>
                        <li><a href="{{url('policy')}}">{{ trans('frontLang.Privacy_policy') }}</a></li>
                        <li><a href="{{url('Accessibility')}}">{{ trans('frontLang.accessibility') }}</a></li>
                    </ul>
                    <div class="visa_buy">
                        <a href=""><img src="{{url('frontEnd')}}/assets/images/visa-buy/discover.png" class="img-fluid" alt=""></a>
                        <a href=""><img src="{{url('frontEnd')}}/assets/images/visa-buy/maestro.png" class="img-fluid" alt=""></a>
                        <a href=""><img src="{{url('frontEnd')}}/assets/images/visa-buy/mastercard.png" class="img-fluid" alt=""></a>
                        <a href=""><img src="{{url('frontEnd')}}/assets/images/visa-buy/paypal.png" class="img-fluid" alt=""></a>
                        <a href=""><img src="{{url('frontEnd')}}/assets/images/visa-buy/visa.png" class="img-fluid" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- //== END Footer -->

