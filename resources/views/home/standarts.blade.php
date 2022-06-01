@extends('layouts.app')
@section('title','')
@section('desc','')
@section('content')

    <section id="page-title" class="text-dark p-t-100 p-b-100"
             @isset($cData->posts->files[0]->file)  style="background-image:url('{{Storage::url("images/userfiles/". $cData->posts->files[0]->file)}}');background-position: center center;background-size: cover;background-repeat: no-repeat" @endisset>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title text-left">
                        @isset( $cData->posts->title)<h1
                            class="ml-2">{{ $cData->posts->title}}</h1>@endisset
                        @isset( $cData->posts->shortdescription)
                            <p class="widthBanner">{!! $cData->posts->shortdescription !!}</p>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </section>
    @isset($cData->subcategory)
        <section class="p-t-10 ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row m-t-50">
                            @foreach($cData->subcategory as $key=>$val)
                                <div class="col-lg-3 border-right standartsTitle">
                                    <a href="{{str_slug($val->title,"-")}}/{{$val->id}}.htm" style="font-size: 20px;font-weight: 700;color: #1e1e1e !important;">@isset($val->title){{$val->title}}@endisset @isset($val->shortdescription)
                                            <br>{{$val->shortdescription}}@endisset</a>
                                    <div style="height: 110px"></div>
                                    <a  href="{{str_slug($val->title,"-")}}/{{$val->id}}.htm"
                                       class="item-link read-more" style="font-size:1rem; position:absolute;bottom: 0;
    ">{{__("gnl.Daha fazlası için")}}</a></div>
                                @if($loop->iteration % 4 == 0)
                                    <div class="seperator"></div>
                                @endif
                            @endforeach

                            <div class="col-lg-3 border-right ">
                                <a target="_blank" href="https://www.safetycenter.ch/zertifizierung/systeme-produkte/normen-standards"
                                   class="item-link read-more see-more">{{__("gnl.Daha fazlası")}}&nbsp;<i
                                        class="fas fa-chevron-right fa-fw"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="p-t-0">
            @include('inc.redBanner')

        </section>

    @endisset

@endsection
