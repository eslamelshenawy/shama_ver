@extends('frontEnd.layout')
@section('content')

    <!-- START Page Map Title-->
    <div class="page_title parallax-window" data-parallax="scroll" data-image-src="assets/images/banner/banner-1.png">
        <h1>Gallery</h1>
    </div>
    <!-- //== END Page Map Title-->


    <!-- START Section Products Details -->
    <section class="page_gallery pt-5 pb-5">
        <div class="container-fluid pl-5 pr-5">

            <!-- Filter Products-->
            <div class="filter_products clearfix">
                <div class="float-left link_title">
                    <ul>
                        <li><a href="{{url('/')}}">Home</a> > </li>
                        <li><a href="" class="active">Gallery</a></li>
                    </ul>
                </div>
            </div>
            <!-- ////// -->


            <div class="gallery_info">

                <div class="row">
                    @foreach($Gallery as $Galler )
                    <div class="col-xl-4">
                        <div class="item">
                            <a href="{{url('uploads')}}/topics/{{$Galler->photo_file}}" class="img_gallery gallery_img">
                                <img src="{{url('uploads')}}/topics/{{$Galler->photo_file}}" class="img-fluid" alt="">
                                <i class="fa fa-search fa-lg"></i>
                            </a>
                            <h5><a href="">
                                    @if(App::getLocale()  == 'en')
                                        {{$Galler->title_en}}
                                    @else
                                        {{$Galler->title_il}}
                                    @endif

                                </a></h5>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

        </div> <!-- //== END Container -->
    </section> <!-- //== END Section Category Products -->




@endsection
