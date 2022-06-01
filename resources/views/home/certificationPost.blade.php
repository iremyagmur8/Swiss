@extends('layouts.app')
@section('title','')
@section('desc','')
@section('content')

    @php
        use App\Http\Controllers\HomepageController
    @endphp

    <section id="page-title" class="text-dark p-b-100 p-t-100"
             @if (Request::is('hakkimizda/*.htm'))
             @isset($cData->posts->files[1]->file)  style="background-image:url('{{Storage::url("images/userfiles/". $cData->posts->files[1]->file)}}');background-position: center center;background-size: cover;background-repeat: no-repeat"
             @endisset
             @else
             @isset($cData->posts->files[0]->file)  style="background-image:url('{{Storage::url("images/userfiles/". $cData->posts->files[0]->file)}}');background-position: center center;background-size: cover;background-repeat: no-repeat" @endisset
        @endif>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title text-left">
                        @isset( $cData->posts->title)<h2>{{ $cData->posts->title}}</h2>@endisset
                        @isset( $cData->posts->shortdescription)
                            <p class="widthBanner">{!! $cData->posts->shortdescription !!}</p>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="reservation-form-over no-padding d-none d-lg-block" style="margin-top: -80px;">
        <div class="container mr-5" style="width:35%;float: right;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
            <form action="#" method="post">
                <div class="row reservation-form align-items-center ">
                    <div id="blog" class="post-thumbnails">
                        <div class="post-item p-0">
                            <div class="post-item-wrap">
                                <div class="post-image col-lg-4">
                                    <a href="#">
                                        <img alt="" style="width: 140px;"
                                             src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                                    </a>
                                </div>
                                <div class="post-item-description pb-0 col-lg-8" style="width: 100% !important;">
                                    <h2><a href="#">Standard post with a single image
                                        </a></h2>
                                    <p>Curabitur pulvinar euismod ante, ac sagittis ante posuere ac. Vivamus luctus
                                        commodo dolor porta feugiat. Fusce at velit id ligula pharetra laoreet.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section class="p-t-0">
        <div class="container">
            @isset($cData->subcategory)
                <div class="row">
                    @foreach($cData->subcategory as $key=>$val)
                        @isset($val->title)
                            <div class="col-lg-4 categoryCol">
                                <button type="button" class="btn btn-rounded btn-outline btn-reveal"
                                        style="width: 100%;">
                                    <a href="@if($val->link){{$val->link}} @else{{str_slug($val->title,"-")}}/{{$val->id}}.htm @endif">
                                        <div class="text-left my-4"><span>{{$val->title}}</span></div>
                                        <i class="icon-chevron-right fa-3x" style="top: 37px;position: absolute;"></i> </a>
                                </button>
                            </div>
                        @endisset
                    @endforeach
                </div>
            @endisset

        </div>
        @include('inc.descriptionBox')

        <div class="container m-t-50">
            @isset($cData->posts->link)
                <iframe width="1920" height="1000" src="https://www.youtube.com/embed/{{$cData->posts->link}}"
                        @isset($cData->posts->title) title="{{$cData->posts->title}}" @endisset frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
            @endisset
        </div>
        @if (Request::is('sertifikasyon/sertifika-sorgulama/*.htm','sertifikasyon/sektorler/*.htm','sertifikasyon/standartlar/*.htm'))
            @include('inc.redBanner')
        @endif
    </section>


@endsection
