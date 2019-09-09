<meta charset="utf-8">
@php
    $PageTitle=null;
    $PageDescription=null;
    $PageKeywords=null;
@endphp


<title>{{$PageTitle ? $PageTitle : ""}} {{($PageTitle !="")? "|":""}} {{ \App\Helpers\Helper::GeneralSiteSettings("site_title_" . trans('backLang.boxCode')) }}</title>
<meta name="description" content="{{$PageDescription}}"/>
<meta name="keywords" content="{{$PageKeywords}}"/>
<meta name="author" content="{{ URL::to('') }}"/>

<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="icon" href="{{url('frontEnd/assets/images/logo.png')}}" type="image/png" sizes="16x16">



<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/css/themes/semantic.min.css"/>

<link href="{{ URL::to('frontEnd/assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
<link href="{{ URL::to('frontEnd/assets/css/bootstrap-select.min.css') }}" rel="stylesheet"/>
<link href="{{ URL::to('frontEnd/assets/css/all.min.css') }}" rel="stylesheet">
<link href="{{ URL::to('frontEnd/assets/css/slick.css') }}" rel="stylesheet"/>
<link href="{{ URL::to('frontEnd/assets/css/magnific-popup.css') }}" rel="stylesheet"/>
<link href="{{ URL::to('frontEnd/assets/css/style.css') }}" rel="stylesheet"/>
<link href="{{ URL::to('frontEnd/assets/css/responsive.css') }}" rel="stylesheet"/>

@if( App::getLocale()=="he")
    <link href="{{ URL::to('frontEnd/css/ar.css') }}" rel="stylesheet"/>
@endif

