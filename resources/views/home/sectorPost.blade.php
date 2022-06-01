@extends('layouts.app')
@section('title','')
@section('desc','')
@section('content')

    <section id="page-title" class="p-t-200 p-b-200"
             @isset($cData->posts->files[0]->file)  style="background-image:url('{{Storage::url("images/userfiles/". $cData->posts->files[0]->file)}}');background-position: center center;background-size: cover;background-repeat: no-repeat" @endisset>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title text-left">
                        @isset( $cData->posts->shortdescription)
                            <p class="widthBanner">{!! $cData->posts->shortdescription !!}</p>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-3 p-t-30 categoryBox">
        <div class="container">
            <div class="row ">
                @isset( $cData->posts->title)<h1 class="ml-3">{{ $cData->posts->title}}</h1>@endisset
            </div>
        </div>
        @include('inc.descriptionBox')
    </section>

        @include('inc.redBanner')
    @isset($cData->subcategory)
        <section class="background-grey pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 background-grey">
                            <h2>
                                {{__("gnl.Bu sektörle ilişkili standartlar")}}
                            </h2>
                        <div class="row m-t-50">
                            @foreach($cData->subcategory as $key=>$val)
                                <div class="col-lg-3 border-right">
                                    <a href="@isset($val->link){{str_replace("//swiss.karip.net","//www.swiss-safetycenter.com.tr",$val->link)}}@endisset">  <h3 style="font-size: 1.25rem;min-height: 50px;">{{$val->title}}</h3> </a>
                                    <div style="height: 5px"></div>
                                    <a href="@isset($val->link){{str_replace("//swiss.karip.net","//www.swiss-safetycenter.com.tr",$val->link)}}@endisset"
                                       class="item-link read-more">{{__("gnl.Daha fazlası için")}}</a></div>
                                @if($loop->iteration % 4 == 0)
                                    <div class="seperator"></div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endisset

@endsection
