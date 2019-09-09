                        <li class="nav-item">
                            <a class="nav-link drop_mega" href="{{url("jewelry")}}"> Jewelry</a>
                            <div class="mega_menu">
                                <div class="row">
                                    <div class="col-lg-3">

                                        @php
                                        $subcategory=\App\subcategory::where("type_id","14")->get();
                                        $count= count($subcategory);
                                        $limit=(int)round($count/3);
                                        @endphp
                                        <div class="item">
                                            @foreach(\App\subcategory::where("type_id","14")->offset(0)->take($limit)->get()  as $type )
                                            <ul class="list-unstyled">
                                                <li>
                                                    <a href="{{url('jewelry')}}/{{$type->id}}" class="active">
                                                        <img src="{{url("frontEnd")}}/assets/images/mega-menu/engagement.png" alt=""/>
                                                        @if(App::getLocale()  == 'en')
                                                            {{$type->name_en}}
                                                        @else
                                                            {{$type->name_heb}}
                                                        @endif
                                                    </a>
                                                </li>
                                            </ul>
                                            @endforeach
                                        </div>

                                    </div>
                                    <div class="col-lg-3">
                                        <div class="item">
                                            @foreach(\App\subcategory::where("type_id","14")->skip($limit)->take(3)->get()  as $type )

                                            <ul class="list-unstyled">
                                                <li><a href="{{url('jewelry')}}/{{$type->id}}" class="active"><img
                                                                src="{{url("frontEnd")}}/assets/images/mega-menu/engagement.png" alt="">
                                                        @if(App::getLocale()  == 'en')
                                                            {{$type->name_en}}
                                                        @else
                                                            {{$type->name_heb}}
                                                        @endif
                                                    </a></li>
                                                <li>
                                            </ul>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="item no_border">
                                            @foreach(\App\subcategory::where("type_id","14")->skip($limit*2)->take(3)->get()  as $type )
                                                <ul class="list-unstyled">
                                                    <li><a href="{{url('jewelry')}}/{{$type->id}}" class="active"><img
                                                                    src="{{url("frontEnd")}}/assets/images/mega-menu/engagement.png" alt="">
                                                            @if(App::getLocale()  == 'en')
                                                                {{$type->name_en}}
                                                            @else
                                                                {{$type->name_heb}}
                                                            @endif
                                                        </a></li>
                                                    <li>
                                                </ul>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="item no_border">
                                            <img class="img_show_mega" src="{{url("frontEnd")}}/assets/images/mega-menu/1-rings.png" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </li>
