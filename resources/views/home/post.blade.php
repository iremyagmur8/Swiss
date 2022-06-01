@extends('layouts.app')
@section('title','')
@section('desc','')
@section('content')

    <section id="page-title" class="text-dark p-b-100 p-t-100" @isset($cData->posts->files[0]->file)  style="background-image:url('{{Storage::url("images/userfiles/". $cData->posts->files[0]->file)}}');background-position: center center;background-size: cover;background-repeat: no-repeat" @endisset>
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
                            <a href="@if($val->link){{$val->link}} @else{{str_slug($val->title,"-")}}/{{$val->id}}.htm @endif">
                                <button type="button" class="btn btn-rounded btn-outline btn-reveal"
                                        style="width: 100%;">

                                    <div class="text-left my-4"><span>{{$val->title}}</span></div>
                                    <i class="icon-chevron-right fa-3x" style="top: 37px;position: absolute;"></i>
                                </button>
                            </a>
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

    </section>


@endsection
