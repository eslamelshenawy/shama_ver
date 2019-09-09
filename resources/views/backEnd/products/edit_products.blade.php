@extends('backEnd.layout')
<style>
    .popup{
    width: 900px;
    margin: auto;
    text-align: center
}
.popup img{
    width: 200px;
    height: 200px;
    cursor: pointer
}
.show{
    z-index: 999;
    display: none;
}
.show .overlay{
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,.66);
    position: absolute;
    top: 0;
    left: 0;
}
.show .img-show{
    width: 600px;
    height: 400px;
    background: #FFF;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    overflow: hidden
}
.img-show span{
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 99;
    cursor: pointer;
}
.img-show img{
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
}
/*End style*/

    
</style>
@section('content')


    <div ui-view="" class="app-body" id="view">

        <!-- ############ PAGE START-->
        <div class="padding">
            <div class="box">

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <div class="box-header dker">
                    <h3>{{ trans('backLang.products') }}</h3>
                    <small>
                        <a href="{{url('admin')}}">{{ trans('backLang.home') }}</a> /
                        <a href="{{url('products')}}">{{ trans('backLang.products') }}</a> /
                    </small>
                </div>





    <div class="box nav-active-border b-info">
        <ul class="nav nav-md">
            <li class="nav-item inline">
                <a class="nav-link active" href="" data-toggle="tab" data-target="#tab_details">
                        <span class="text-md"><i class="material-icons">
                                </i> {{ trans('backLang.topicTabDetails') }}</span>
                </a>
            </li>

            <li class="nav-item inline">
                <a class="nav-link  " href="" data-toggle="tab" data-target="#tab_photos">
                    <span class="text-md"><i class="material-icons">
                            </i>
                        {{ trans('backLang.topicAdditionalPhotos') }}
                                                    <span class="label rounded">{{count($products->images)}}</span>
                                            </span>
                </a>
            </li>


        </ul>
        <div class="tab-content clear b-t">
            <div class="tab-pane  active" id="tab_details">
                <div class="box-body">
                    <form method="POST" action="{{url("store/edit/products")}}/{{$products->id}}" accept-charset="UTF-8"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="father_id"
                                   class="col-sm-2 form-control-label"> {{ trans('backLang.select_type') }} </label>
                            <div class="col-sm-10">
                                <select name="type_id" id="type_id" class="form-control c-select">
                                    <option value="">{{ trans('backLang.select_type') }}</option>
                                    @foreach(\App\Topic::where('webmaster_id',13)->get()  as $type )
                                            @if(App::getLocale()  == 'en')

                                        <option value="{{$type->id}}" {{($products->brand_id == $type->id) ? 'selected' : ''  }}>{{$type->title_en}}</option>
                                                @else
                                        <option value="{{$type->id}}" {{($products->brand_id == $type->id) ? 'selected' : ''  }}>{{$type->title_il}}</option>
                                            @endif

                                    @endforeach
                                </select>
                            </div>

                        </div>


                        <div class="form-group row">
                            <label for="section_id"
                                   class="col-sm-2 form-control-label"> {{trans('backLang.Categories') }} </label>
                            <div class="col-sm-10">
                                <select name="section_id" id="section_id" class="form-control c-select" required>
                                    <option value="">{{ trans('backLang.Categories') }}</option>
                                    @foreach(\App\category::get()  as $type )
                                      @if(App::getLocale()  == 'en')
                                        <option value="{{$type->id}}"{{($products->category_id == $type->id) ? 'selected' : ''  }}>{{$type->name_en}}</option>
                                                                            @else
                                              <option value="{{$type->id}}"{{($products->category_id == $type->id) ? 'selected' : ''  }}>{{$type->name_heb}}</option>
                                        @endif

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="section_id"
                                   class="col-sm-2 form-control-label"> {{trans('backLang.subcategory_products') }} </label>
                            <div class="col-sm-10">
                                <select name="subcate_id" id="subcate_id" class="form-control c-select" required>
                                    <option value="">{{ trans('backLang.subcategory_products') }}</option>
                                    @foreach(\App\subcategory::get()  as $type )
                                                                                @if(App::getLocale()  == 'en')

                                        <option value="{{$type->id}}" {{($products->subcategory_id == $type->id) ? 'selected' : ''  }}>{{$type->name_en}}</option>
                                                                                        @else
                                              <option value="{{$type->id}}" {{($products->subcategory_id == $type->id) ? 'selected' : ''  }}>{{$type->name_heb}}</option>
                                            @endif


                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name_heb"
                                   class="col-sm-2 form-control-label"> {{ trans('backLang.sectionName') }}
                                <small>[{{ trans('backLang.hebrew') }}]</small>
                            </label>
                            <div class="col-sm-10">
                                <input placeholder="" class="form-control" id="name_heb" required="" dir="rtl"
                                       name="name_heb" type="text"
                                       value="{{$products->name_heb}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title_en"
                                   class="col-sm-2 form-control-label">{{ trans('backLang.sectionName') }}
                                <small>[ {{ trans('backLang.english') }} ]</small>
                            </label>
                            <div class="col-sm-10">
                                <input placeholder="" class="form-control" id="name_en" required="" dir="ltr"
                                       name="name_en" type="text"
                                       value="{{$products->name_en}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="details_il"
                                   class="col-sm-2 form-control-label">{!!  trans('backLang.bannerDetails') !!}
                                @if(\App\Helpers\Helper::GeneralWebmasterSettings("ar_box_status") && \App\Helpers\Helper::GeneralWebmasterSettings("en_box_status")){!!  trans('backLang.IsraelBox') !!}@endif
                            </label>
                            <div class="col-sm-10">
                                <div class="box p-a-xs">
                                    {!! Form::textarea('details_il',$products->details_il, array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control summernote', 'dir'=>'ltr','ui-options'=>'{height: 300}')) !!}
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
                                    {!! Form::textarea('details_en',$products->details_en, array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control summernote', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}
                                </div>
                            </div>
                        </div>
                        
                        
                            <div class="form-group row">
                                    <label for="photo_file"
                                           class="col-sm-2 form-control-label">{!!  trans('backLang.topicPhoto') !!}</label>
                                    <div class="col-sm-10">
                                      
                                            <!--<div class="row">-->
                                            <!--    <div class="col-sm-12">-->
                                            <!--        <div id="topic_photo" class="col-sm-4 box p-a-xs">-->
                                            <!--            <a target="_blank"-->
                                            <!--               href="{{ URL::to('uploads/topics/'.$products->photo) }}"><img-->
                                            <!--                        src="{{ URL::to('uploads/topics/'.$products->photo) }}"-->
                                            <!--                        class="img-responsive">-->
                                            <!--                {{ $products->photo }}-->
                                            <!--            </a>-->
                                            <!--            <br>-->
                                            <!--            <a onclick="document.getElementById('topic_photo').style.display='none';document.getElementById('photo_delete').value='1';document.getElementById('undo').style.display='block';"-->
                                            <!--               class="btn btn-sm btn-default">{!!  trans('backLang.delete') !!}</a>-->
                                            <!--        </div>-->
                                            <!--        <div id="undo" class="col-sm-4 p-a-xs" style="display: none">-->
                                            <!--            <a onclick="document.getElementById('topic_photo').style.display='block';document.getElementById('photo_delete').value='0';document.getElementById('undo').style.display='none';">-->
                                            <!--                <i class="material-icons">-->
                                            <!--                    &#xe166;</i> {!!  trans('backLang.undoDelete') !!}</a>-->
                                            <!--        </div>-->

                                            <!--        {!! Form::hidden('photo_delete','0', array('id'=>'photo_delete')) !!}-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                       

                                        {!! Form::file('photo', array('class' => 'form-control','id'=>'photo_file','accept'=>'image/*')) !!}

                                    </div>
                                </div>
                        <!--<div class="form-group row">-->
                        <!--    <label for="photo"-->
                        <!--           class="col-sm-2 form-control-label"> {{ trans('backLang.bannerPhoto') }}</label>-->
                        <!--    <div class="col-sm-10">-->
                        <!--        <input class="form-control" id="photo" accept="image/*" name="photo" type="file">-->
                        <!--    </div>-->
                        <!--</div>-->



                        @if($setting_filter->style  == 1)
                            <div class="form-group row">
                                <label for="father_id"
                                       class="col-sm-2 form-control-label"> {{ trans('backLang.select_style') }} </label>
                                <div class="col-sm-10">
                                    <select name="style_id" id="style_id" class="form-control c-select">
                                        <option value="0">{{ trans('backLang.select_style') }}</option>
                                        @foreach(\App\Topic::where('webmaster_id',16)->get()  as $type )
                                            @if(App::getLocale()  == 'en')
                                                <option value="{{$type->id}}" {{($products->style_id == $type->id) ? 'selected' : ''  }}>{{$type->title_en}}</option>
                                            @else
                                                <option value="{{$type->id}}" {{($products->style_id == $type->id) ? 'selected' : ''  }}>{{$type->title_il}}</option>
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
                                        <option>{{ trans('backLang.select_type_men') }}</option>
                                        <option value="1" {{($products->type_men == 1) ? 'selected' : ''  }}>{{ trans('backLang.men') }}</option>
                                        <option value="2" {{($products->type_men == 2) ? 'selected' : ''  }}>{{ trans('backLang.women') }}</option>
                                    </select>
                                </div>
                            </div>
                        @endif
                        @if($setting_filter->natural  == 1)

                            <div class="form-group row">
                                <label for="father_id"
                                       class="col-sm-2 form-control-label"> {{ trans('backLang.select_type_natural') }} </label>
                                <div class="col-sm-10">
                                    <select name="natural" id="natural" class="form-control c-select">
                                        <option value="" >{{ trans('backLang.select_type_natural') }}</option>
                                        <option value="4" {{($products->natural == 4) ? 'selected' : ''  }}>{{ trans('backLang.earth') }}</option>
                                        <option value="5"{{($products->natural == 5) ? 'selected' : ''  }} >{{ trans('backLang.lab') }}</option>
                                    </select>
                                </div>

                            </div>
                        @endif
                        @foreach($products->prices as $index=> $price)

                        <div class="form-group row">
                            <label for="spcialprice"
                                   class="col-sm-2 form-control-label">{{ trans('backLang.specialprice') }}
                            </label>
                            <div class="col-sm-10">
                                <input placeholder="" class="form-control" id="spcialprice"  min="0"
                                       dir="ltr"
                                       name="spcialprice[]" type="number" value="{{$price->special_price}}">
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
                                               name="date_end_price[]" type="text" value="{{$price->date_end_price}}">
                                        <span class="input-group-addon">
                                          <span class="fa fa-calendar"></span>
                                      </span>
                                    </div>
                                </div>

                            </div>
                        </div>

{{--                        {{(\App\Helpers\Helper::price_product($products->id))}}--}}

                        <div class="form-group row">
                            <label for="price" class="col-sm-2 form-control-label">{{ trans('backLang.price') }}
                            </label>
                            <div class="col-sm-10">
                                <input placeholder="" class="form-control" id="price" required=""
                                       dir="ltr" name="price[]" min="0" type="number" value="{{$price->price}}">
                            </div>
                        </div>


                        @if($setting_filter->filters_standard  == 1)

                            <div class="form-group row">
                                <label for="father_id"
                                       class="col-sm-2 form-control-label"> {{ trans('backLang.select_Standard_gold') }} </label>
                                <div class="col-sm-10">

                                    <select name="standard_gold[]" id="standard_gold" class="form-control c-select">

                                        @foreach(@\App\Topic::where('webmaster_id',15)->get()  as $key=>  $type )

                                            @if(App::getLocale()  == 'en')
                                                <option value="{{$type->id}}" {{(@$products->standardgold[$index]->standard_gold_id == $type->id) ? 'selected' : ''  }}>{{$type->title_en}}</option>
                                            @else
                                                <option value="{{$type->id}}" {{(@$products->standardgold[$index]->standard_gold_id == $type->id) ? 'selected' : ''  }}>{{$type->title_il}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                        <div class="form-group row">
                            <label for="father_id"
                                   class="col-sm-2 form-control-label"> {{ trans('backLang.size') }} </label>
                            <div class="col-sm-10">
                                <select name="size_id[]" id="size_id" class="form-control c-select">
                                    @php
                                        $key=0;
                                    @endphp
                                    @foreach(\App\Topic::where('webmaster_id',18)->get()  as $type )
                                        @if(App::getLocale()  == 'en')

                                            <option value="{{$type->id}}" {{(@$products->size[$index]->size_id == $type->id) ? 'selected' : ''  }}>{{$type->size}}</option>
                                        @else
                                            <option value="{{$type->id}}" {{(@$products->size[$index]->size_id == $type->id) ? 'selected' : ''  }}>{{$type->size}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                     @endforeach
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
                                        <input id="status1" class="has-value"  {{$products->status == 1 ?'checked' :'' }} name="status"
                                               type="radio" value="1">
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.active') }}
                                    </label>
                                    &nbsp; &nbsp;
                                    <label class="ui-check ui-check-md">
                                        <input id="status2" class="has-value" name="status" {{$products->status == 0 ?'checked' :'' }} type="radio" value="0">
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
                                <a href="{{url('/products')}}" class="btn btn-default m-t"><i
                                            class="material-icons">
                                        </i> {{ trans('backLang.cancel') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            {{--            images  uploaded --}}
            <div class="tab-pane  " id="tab_photos">

                <div class="box-body">

                    <div>
                        <form method="POST" action="{{url('/products')}}/{{$products->id}}/photos "
                              accept-charset="UTF-8"
                              class="dropzone white dz-clickable" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="dz-message dz-clickable" ui-jp="dropzone"
                                 ui-options="{ url: '{{url("backEnd/api/dropzone")}}' }">
                                <h4 class="m-t-lg m-b-md">ادرج الصور هنا أو انقر للتحميل</h4>
                                <span class="text-muted block m-b-lg">( يمكنك تحميل العديد من الصور في نفس الوقت
                                        )</span>
                            </div>
                        </form>
                        <br>
                    </div>
                    <div class="row">
                        <form method="POST" action="http://127.0.0.1:8000/8/topics/8/photos/updateAll"
                              accept-charset="UTF-8">
                            <input name="_token" type="hidden" value="914MQW35YcGwTS4O2SRLAF2uKCXZnCEwiKDzaeDE"
                                   class="has-value">


                        </form>
                    </div>
                </div>
                
                
                <table class="table table-striped  b-t">
                            <thead>
                            <tr>
                                <th style="width:20px;">
                                    <label class="ui-check m-a-0">
                                        <input id="checkAll" type="checkbox"><i></i>
                                    </label>
                                </th>
                                <th> {{ trans('backLang.title') }}</th>
                                <th> {{ trans('backLang.image') }}</th>
                                <th class="text-center" style="width:200px;">{{ trans('backLang.options') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($products->images  as  $image_details)
                            <tr>
                                <td><label class="ui-check m-a-0">
                                        <input type="checkbox" name="ids[]" value="4"><i class="dark-white"></i>
                                        <input class="form-control row_no" name="row_ids[]" type="hidden" value="4">
                                    </label>
                                </td>
                                <td>
                                    <input class="form-control row_no" id="row_no" name="row_no_4" type="text" value="1">
                                    <i class="fa fa-amazon "></i>
                                    {{$image_details->title}}
                                 </td>
                               <td>
                                   
                                        <p><a href="{{url('uploads/topics')}}/{{$image_details->file}}" target="_blank">
                                            <img src="{{url('uploads/topics')}}/{{$image_details->file}}" style="height: 40px"></a></p>
                                                                      
                                </td>
                                <td class="text-center">
                                   
                                    <a href="{{url('delete/image')}}/{{$image_details->id}}" class="btn btn-sm warning"  onclick="return confirm('Are you sure?')">
                                        {{ trans('backLang.delete') }}</a>

                                </td>
                            </tr>
                             @endforeach
                            </tbody>
                        </table>
                        
                        
                        
            </div>


        </div>
    </div>
            </div>
        </div>
        <!-- ############ PAGE END-->

    </div>
@endsection
