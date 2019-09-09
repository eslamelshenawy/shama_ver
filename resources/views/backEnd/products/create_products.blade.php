@extends('backEnd.layout')

@section('content')





    <div id="content" class="app-content box-shadow-z0" role="main">
        <!-- ############ PAGE START-->
        <div class="padding">
            <div class="box">
                <div class="box-header dker">
                    <h3><i class="material-icons"></i>{{ trans('backLang.create_products') }}</h3>
                    <small>
                        <a href="{{url("products")}}">{{ trans('backLang.home') }}</a> /
                        <a href="{{url('products')}}">{{ trans('backLang.products') }}</a> /
                    </small>
                </div>
                <div class="box-tool">
                    <ul class="nav">
                        <li class="nav-item inline">
                            <a class="nav-link" href="#">
                                <i class="material-icons md-18">×</i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="box-body">
                    <form method="POST" action="{{url("store/products")}}" accept-charset="UTF-8"
                          enctype="multipart/form-data"><input name="_token" type="hidden"
                                                               value="hkdPcdkpLFBcnEINBm1cG9yPzgALyqhtZSm4cHRn">
                        {{csrf_field()}}

                        <div class="form-group row">
                            <label for="father_id"
                                   class="col-sm-2 form-control-label"> {{ trans('backLang.select_brand') }} </label>
                            <div class="col-sm-10">
                                <select name="type_id" id="brand_id" class="form-control c-select" required>
                                    <option value="">{{ trans('backLang.select_brand') }}</option>
                                    @foreach(\App\Topic::where('webmaster_id',13)->get()  as $type )
                                        @if(App::getLocale()  == 'en')
                                            <option value="{{$type->id}}">{{$type->title_en}}</option>
                                        @else
                                            <option value="{{$type->id}}">{{$type->title_il}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                        </div>


                        <div class="form-group row">
                            <label for="section_id"
                                   class="col-sm-2 form-control-label"> {{trans('backLang.Categories') }} </label>
                            <div class="col-sm-10">
                                <select name="section_id" id="category_id" class="form-control c-select" required>
                                    <option value="">{{ trans('backLang.Categories') }}</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="section_id"
                                   class="col-sm-2 form-control-label"> {{trans('backLang.subcategory_products') }} </label>
                            <div class="col-sm-10">
                                <select name="subcate_id" id="section_id" class="form-control c-select" required>
                                    <option value="">{{ trans('backLang.subcategory_products') }}</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name_heb"
                                   class="col-sm-2 form-control-label"> {{ trans('backLang.sectionName') }}
                                <small>[{{ trans('backLang.hebrew') }}]</small>
                            </label>
                            <div class="col-sm-10">
                                <input placeholder="" class="form-control" id="name_heb" required dir="rtl"
                                       name="name_heb" type="text" value="{{ request()->input('name_heb', old('name_heb')) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title_en"
                                   class="col-sm-2 form-control-label">{{ trans('backLang.sectionName') }}
                                <small>[ {{ trans('backLang.english') }} ]</small>
                            </label>
                            <div class="col-sm-10">
                                <input placeholder="" class="form-control" id="name_en" required dir="ltr"
                                       name="name_en" type="text" value="{{ request()->input('name_en', old('name_en')) }}">
                            </div>
                        </div>
                            <div class="form-group row">
                                <label for="details_il"
                                       class="col-sm-2 form-control-label">{!!  trans('backLang.bannerDetails') !!}
                                    @if(\App\Helpers\Helper::GeneralWebmasterSettings("ar_box_status") && \App\Helpers\Helper::GeneralWebmasterSettings("en_box_status")){!!  trans('backLang.IsraelBox') !!}@endif
                                </label>
                                <div class="col-sm-10">
                                    <div class="box p-a-xs">
                                        {!! Form::textarea('details_il','<div dir=ltr><br></div>', array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control summernote', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="details_en"
                                       class="col-sm-2 form-control-label">{!!  trans('backLang.bannerDetails') !!}
                                    @if(\App\Helpers\Helper::GeneralWebmasterSettings("ar_box_status") && \App\Helpers\Helper::GeneralWebmasterSettings("en_box_status")){!!  trans('backLang.englishBox') !!}@endif
                                </label>
                                <div class="col-sm-10">
                                    <div class="box p-a-xs">
                                        {!! Form::textarea('details_en','<div dir=ltr><br></div>', array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}
                                    </div>
                                </div>
                            </div>
                        <div class="form-group row">
                            <label for="photo"
                                   class="col-sm-2 form-control-label"> {{ trans('backLang.bannerPhoto') }}</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="photo" accept="image/*" name="photo" type="file" required>
                            </div>
                        </div>
                        <div class="form-group row m-t-md" style="margin-top: 0 !important;">
                            <div class="col-sm-offset-2 col-sm-10">
                                <small>
                                    <i class="material-icons"></i>
                                    {{ trans('backLang.imagesTypes') }}
                                </small>
                            </div>
                        </div>
                    @if($setting_filter->style  == 1)
                        <div class="form-group row">
                            <label for="father_id"
                                   class="col-sm-2 form-control-label"> {{ trans('backLang.select_style') }} </label>
                            <div class="col-sm-10">
                                <select name="style_id" id="style_id" class="form-control c-select">
                                    <option value="0">{{ trans('backLang.select_style') }}</option>
                                    @foreach(\App\Topic::where('webmaster_id',16)->get()  as $type )
                                        @if(App::getLocale()  == 'en')
                                            <option value="{{$type->id}}">{{$type->title_en}}</option>
                                        @else
                                            <option value="{{$type->id}}">{{$type->title_il}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
                        @if($setting_filter->men_women  == 1)
                        <div class="form-group row">
                            <label for="father_id"
                                   class="col-sm-2 form-control-label"> {{ trans('backLang.select_type_men') }} </label>
                            <div class="col-sm-10">
                                <select name="type_men" id="type_men" class="form-control c-select">
                                    <option value="0">{{ trans('backLang.select_type_men') }}</option>
                                    <option value="1">{{ trans('backLang.men') }}</option>
                                    <option value="2">{{ trans('backLang.women') }}</option>
                                </select>
                            </div>
                        </div>
                        @endif
                        <!--@if($setting_filter->seller  == 1)-->

                   
                        <!--@endif-->
                        @if($setting_filter->natural  == 1)

                        <div class="form-group row">
                            <label for="father_id"
                                   class="col-sm-2 form-control-label"> {{ trans('backLang.select_type_natural') }} </label>
                            <div class="col-sm-10">
                                <select name="natural" id="natural" class="form-control c-select">
                                    <option value="0">{{ trans('backLang.select_type_natural') }}</option>
                                    <option value="4">{{ trans('backLang.earth') }}</option>
                                    <option value="5">{{ trans('backLang.lab') }}</option>
                                </select>
                            </div>

                        </div>
                        @endif

                        <div class="form-group row">
                            <label for="spcialprice"
                                   class="col-sm-2 form-control-label">{{ trans('backLang.specialprice') }}
                            </label>
                            <div class="col-sm-10">
                                <input placeholder="" class="form-control" id="spcialprice"  min="0"
                                       dir="ltr" name="spcialprice[]" type="number" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-sm-2 form-control-label">{{ trans('backLang.specialpricedate') }}
                            </label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <div class="input-group date" ui-jp="datetimepicker" ui-options="{
                                        format: 'YYYY-MM-DD',
                                        icons: {
                                          time: 'fa fa-clock-o',
                                          date: 'fa fa-calendar',
                                          up: 'fa fa-chevron-up',
                                          down: 'fa fa-chevron-down',
                                          previous: 'fa fa-chevron-left',
                                          next: 'fa fa-chevron-right',
                                          today: 'fa fa-screenshot',
                                          clear: 'fa fa-trash',
                                          close: 'fa fa-remove'
                                        }
                                      }">
                                        <input placeholder="" class="form-control has-value" id="date_end_price" 
                                               name="date_end_price[]" type="text" >
                                        <span class="input-group-addon">
                                          <span class="fa fa-calendar"></span>
                                      </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="price" class="col-sm-2 form-control-label">{{ trans('backLang.price') }}
                            </label>
                            <div class="col-sm-10">
                                <input placeholder="" class="form-control" id="price" required="" dir="ltr" name="price[]"
                                       min="0" type="number" value="{{ request()->input('price', old('price')) }}">
                            </div>
                        </div>

                    @if($setting_filter->filters_standard  == 1)
                        <div class="form-group row">
                            <label for="father_id"
                                   class="col-sm-2 form-control-label"> {{ trans('backLang.select_Standard_gold') }} </label>
                            <div class="col-sm-10">
                                
                               <select name="standard_gold[]" id="standard_gold" class="form-control c-select"
                                                               required>
                                   
                                       @foreach(\App\Topic::where('webmaster_id',15)->get()  as $type )
                                        @if(App::getLocale()  == 'en')
                                            <option value="{{$type->id}}">{{$type->title_en}}</option>
                                        @else
                                            <option value="{{$type->id}}">{{$type->title_il}}</option>
                                        @endif
                                    @endforeach
                                             
                                                             </select>

                            </div>
                        </div>
                        @endif
                     <div class="form-group row">
                                            <label for="father_id"
                                                   class="col-sm-2 form-control-label"> {{ trans('backLang.size') }}</label>
                                            <div class="col-sm-10">
                                                <select name="size_id[]" id="size_id" class="form-control c-select">
                                                    @foreach(\App\Topic::where('webmaster_id',18)->get()  as $type )
                                                        @if(App::getLocale()  == 'en')
                                                            <option value="{{$type->id}}">{{$type->size}}</option>
                                                        @else
                                                            <option value="{{$type->id}}">{{$type->size}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                
                                        </div>

                        <div class="form-group">
                            <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                        </div>

                        <div class="copy" >
                        </div>


                        <div class="form-group row">
                            <label for="link_status"
                                   class="col-sm-2 form-control-label">{{ trans('backLang.status') }}</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                    <label class="ui-check ui-check-md">
                                        <input id="status1" class="has-value" checked="checked" name="status"
                                               type="radio" value="1">
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.active') }}
                                    </label>
                                    &nbsp; &nbsp;
                                    <label class="ui-check ui-check-md">
                                        <input id="status2" class="has-value" name="status" type="radio" value="0">
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.notActive') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row m-t-md">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                        </i> {{ trans('backLang.add') }}</button>
                                <a href="http://127.0.0.1:8000/12/sections" class="btn btn-default m-t"><i
                                            class="material-icons">
                                        </i> {{ trans('backLang.cancel') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ############ PAGE END-->

    </div>
    </div>





@endsection
