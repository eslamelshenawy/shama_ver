@extends('backEnd.layout')

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe3c9;</i> {{ trans('backLang.editPermissions') }}</h3>
                <small>
                    <a href="{{url("admin")}}">{{ trans('backLang.home') }}</a> /
                    <a href="">{{ trans('backLang.settings') }}</a> /
                    <a href="">{{ trans('backLang.usersPermissions') }}</a>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="{{route("users")}}">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-body">
                {{Form::open(['route'=>['permissionsUpdate',$Permissions->id],'method'=>'POST'])}}

                <div class="form-group row">
                    <label for="name"
                           class="col-sm-2 form-control-label">{!!  trans('backLang.title') !!}
                    </label>
                    <div class="col-sm-10">
                        {!! Form::text('name',$Permissions->name, array('placeholder' => '','class' => 'form-control','id'=>'name','required'=>'')) !!}
                    </div>
                </div>


                <div class="form-group row">
                    <label for="permissions1"
                           class="col-sm-2 form-control-label">{!!  trans('backLang.dataManagements') !!}</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label class="ui-check ui-check-md" style="margin-bottom: 5px;">
                                {!! Form::radio('view_status','1',($Permissions->view_status==1) ? true : false, array('id' => 'view_status1','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ trans('backLang.dataManagements1') }}
                            </label>
                            <br>
                            <label class="ui-check ui-check-md" style="margin-bottom: 5px;">
                                {!! Form::radio('view_status','0',($Permissions->view_status==0) ? true : false, array('id' => 'view_status2','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ trans('backLang.dataManagements2') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="analytics_status"
                           class="col-sm-2 form-control-label">{!!  trans('backLang.activeApps') !!}
                    </label>
                    <div class="col-sm-10">


                        <div class="checkbox">
                            <label class="ui-check">
                                {!! Form::checkbox('analytics_status','1',($Permissions->analytics_status==1) ? true : false, array('id' => 'analytics_status')) !!}
                                <i class="dark-white"></i><label
                                        for="analytics_status">{{ trans('backLang.visitorsAnalytics') }}</label>
                            </label>
                        </div>


                        <div class="checkbox">
                            <label class="ui-check">
                                {!! Form::checkbox('newsletter_status','1',($Permissions->newsletter_status==1) ? true : false, array('id' => 'newsletter_status')) !!}
                                <i class="dark-white"></i><label
                                        for="newsletter_status">{{ trans('backLang.newsletter') }}</label>
                            </label>
                        </div>


                        <div class="checkbox">
                            <label class="ui-check">
                                {!! Form::checkbox('inbox_status','1',($Permissions->inbox_status==1) ? true : false, array('id' => 'inbox_status')) !!}
                                <i class="dark-white"></i><label
                                        for="inbox_status">{{ trans('backLang.siteInbox') }}</label>
                            </label>
                        </div>

                        <div class="checkbox">
                            <label class="ui-check">
                                {!! Form::checkbox('calendar_status','1',($Permissions->calendar_status==1) ? true : false, array('id' => 'calendar_status')) !!}
                                <i class="dark-white"></i><label
                                        for="calendar_status">{{ trans('backLang.calendar') }}</label>
                            </label>
                        </div>
                        
                        <div class="checkbox">
                            <label class="ui-check">
                                {!! Form::checkbox('users_status','1',($Permissions->users_status==1) ? true : false, array('id' => 'users_status')) !!}
                                <i class="dark-white"></i><label
                                        for="users_status">{{ trans('backLang.users') }}</label>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="ui-check">
                                {!! Form::checkbox('orders_status','1',($Permissions->orders_status==1) ? true : false, array('id' => 'orders_status')) !!}
                                <i class="dark-white"></i><label
                                        for="orders_status">{{ trans('backLang.orders') }}</label>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="ui-check">
                                {!! Form::checkbox('filters_status','1',($Permissions->filters_status==1) ? true : false, array('id' => 'filters_status')) !!}
                                <i class="dark-white"></i><label
                                        for="filters_status">{{ trans('backLang.filters') }}</label>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="ui-check">
                                {!! Form::checkbox('categories_status','1',($Permissions->categories_status==1) ? true : false, array('id' => 'categories_status')) !!}
                                <i class="dark-white"></i><label
                                        for="categories_status">{{ trans('backLang.category_products') }}</label>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="ui-check">
                                {!! Form::checkbox('promocode_status','1',($Permissions->promocode_status==1) ? true : false, array('id' => 'promocode_status')) !!}
                                <i class="dark-white"></i><label
                                        for="promocode_status">{{ trans('backLang.promoCode') }}</label>
                            </label>
                        </div>

                        <div class="checkbox">
                            <label class="ui-check">
                                {!! Form::checkbox('banners_status','1',($Permissions->banners_status==1) ? true : false, array('id' => 'banners_status')) !!}
                                <i class="dark-white"></i><label
                                        for="banners_status">{{ trans('backLang.adsBanners') }}</label>
                            </label>
                        </div>


                        <div class="checkbox">
                            <label class="ui-check">
                                {!! Form::checkbox('settings_status','1',($Permissions->settings_status==1) ? true : false, array('id' => 'settings_status')) !!}
                                <i class="dark-white"></i><label
                                        for="settings_status">{{ trans('backLang.generalSettings') }}</label>
                            </label>
                        </div>


                        <div class="checkbox">
                            <label class="ui-check">
                                {!! Form::checkbox('webmaster_status','1',($Permissions->webmaster_status==1) ? true : false, array('id' => 'webmaster_status')) !!}
                                <i class="dark-white"></i><label
                                        for="webmaster_status">{{ trans('backLang.webmasterTools') }}</label>
                            </label>
                        </div>

                    </div>
                </div>


                <div class="form-group row">
                    <label for="data_sections0"
                           class="col-sm-2 form-control-label">{!!  trans('backLang.activeSiteSections') !!}
                    </label>
                    <div class="col-sm-10">

                        <?php $i = 0; ?>
                        @foreach($GeneralWebmasterSections as $WebmasterSection)
                            <?php
                            $data_sections_arr = explode(",", $Permissions->data_sections);
                            ?>
                            <div class="checkbox">
                                <label class="ui-check">
                                    {!! Form::checkbox('data_sections[]',$WebmasterSection->id,(in_array($WebmasterSection->id,$data_sections_arr)) ? true : false, array('id' => 'data_sections'.$i)) !!}
                                    <i class="dark-white"></i><label
                                            for="data_sections{{$i}}">{!! str_replace("backLang.","",trans('backLang.'.$WebmasterSection->name)) !!}</label>
                                </label>
                            </div>
                            <?php $i++; ?>
                        @endforeach

                    </div>
                </div>


                <div class="form-group row">
                    <label for="add_status1"
                           class="col-sm-2 form-control-label">{!!  trans('backLang.addPermission') !!}</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label class="ui-check ui-check-md" style="margin-bottom: 5px;">
                                {!! Form::radio('add_status','1',($Permissions->add_status==1) ? true : false, array('id' => 'add_status1','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ trans('backLang.yes') }}
                            </label>
                            <br>
                            <label class="ui-check ui-check-md" style="margin-bottom: 5px;">
                                {!! Form::radio('add_status','0',($Permissions->add_status==0) ? true : false, array('id' => 'add_status2','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ trans('backLang.no') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="edit_status1"
                           class="col-sm-2 form-control-label">{!!  trans('backLang.editPermission') !!}</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label class="ui-check ui-check-md" style="margin-bottom: 5px;">
                                {!! Form::radio('edit_status','1',($Permissions->edit_status==1) ? true : false, array('id' => 'edit_status1','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ trans('backLang.yes') }}
                            </label>
                            <br>
                            <label class="ui-check ui-check-md" style="margin-bottom: 5px;">
                                {!! Form::radio('edit_status','0',($Permissions->edit_status==0) ? true : false, array('id' => 'edit_status2','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ trans('backLang.no') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="delete_status1"
                           class="col-sm-2 form-control-label">{!!  trans('backLang.deletePermission') !!}</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label class="ui-check ui-check-md" style="margin-bottom: 5px;">
                                {!! Form::radio('delete_status','1',($Permissions->delete_status==1) ? true : false, array('id' => 'delete_status1','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ trans('backLang.yes') }}
                            </label>
                            <br>
                            <label class="ui-check ui-check-md" style="margin-bottom: 5px;">
                                {!! Form::radio('delete_status','0',($Permissions->delete_status==0) ? true : false, array('id' => 'delete_status2','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ trans('backLang.no') }}
                            </label>
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="link_status"
                           class="col-sm-2 form-control-label">{!!  trans('backLang.status') !!}</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label class="ui-check ui-check-md">
                                {!! Form::radio('status','1',($Permissions->status==1) ? true : false, array('id' => 'status1','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ trans('backLang.active') }}
                            </label>
                            &nbsp; &nbsp;
                            <label class="ui-check ui-check-md">
                                {!! Form::radio('status','0',($Permissions->status==0) ? true : false, array('id' => 'status2','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ trans('backLang.notActive') }}
                            </label>
                        </div>
                    </div>
                </div>


                <div class="form-group row m-t-md">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                &#xe31b;</i> {!! trans('backLang.update') !!}</button>
                        <a href="{{route("users")}}"
                           class="btn btn-default m-t"><i class="material-icons">
                                &#xe5cd;</i> {!! trans('backLang.cancel') !!}</a>
                    </div>
                </div>

                {{Form::close()}}
            </div>
        </div>
    </div>



@endsection
