@extends('layouts.app')
@section('title','')
@section('desc','')
@section('content')

    <section id="page-title" class="text-dark p-b-50 p-t-50">
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
    <section class="p-t-50">
        <div class="container">
            @isset($cData->subcategory)
                <div class="row">
                    @foreach($cData->subcategory as $key=>$val)
                        @isset($val->title)
                            <div class="col-lg-4 categoryCol">
                                <a href="@if($val->link){{$val->link}} @else/hakkimizda/{{str_slug($val->title,"-")}}/{{$val->id}}.htm @endif">
                                    <button type="button" class="btn btn-rounded btn-outline btn-reveal"
                                            style="width: 100%;height: 90px;border:none;border-radius: 0!important;">
                                        <div class="text-left mt-4"><span>{{$val->title}}</span></div>
                                        <i class="icon-chevron-right fa-3x"></i></button>
                                </a>
                                <div class="seperator mx-0 mb-0 "style="margin-top:-10px"></div>
                            </div>
                        @endisset
                    @endforeach
                </div>
            @endisset

        </div>
        @isset($cData->posts->files[0]->file)
            <div class="categoryImage m-b-50 m-t-50">
                <figure
                    style="background-image:url({{Storage::url("images/userfiles/". $cData->posts->files[0]->file)}});background-repeat: no-repeat;width:100%;background-position: center center;background-size: cover ;height: 550px">
                </figure>
            </div>
        @endisset
        @include('inc.descriptionBox')

        <div class="container">
            @isset($cData->posts->link)
                <iframe width="1920" height="1000" src="https://www.youtube.com/embed/{{$cData->posts->link}}"
                        @isset($cData->posts->title) title="{{$cData->posts->title}}" @endisset frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
            @endisset
        </div>
    </section>


@endsection
