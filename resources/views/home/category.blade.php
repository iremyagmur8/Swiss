@extends('layouts.app')
@section('title','')
@section('desc','')
@section('content')

    <section id="page-title" class="text-light p-t-150 p-b-150"
             @isset($cData->posts->files[0]->file)  style="background-image:url('{{Storage::url("images/userfiles/". $cData->posts->files[0]->file)}}');background-position: center center;background-size: cover;background-repeat: no-repeat" @endisset>
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title text-left">
                        @isset( $cData->posts->title)<h1>{{ $cData->posts->title}}</h1>@endisset
                        @isset( $cData->posts->shortdescription)
                            <p class="widthBanner">{!! $cData->posts->shortdescription !!}</p>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-3 p-t-30 categoryBox">
        @include('inc.descriptionBox')
    </section>

    @include('inc.redBanner')
    @isset($cData->subcategory)
        <section class="background-grey pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 background-grey">

                            <h3>
                                {{__("gnl.Bu konuda daha fazla bilgi edinmek ister misiniz?")}}
                            </h3>

                            <a href=/iletisim>
                                <button style="float: left;margin-right: 10px" type="button"
                                        class="btn btn-rounded btn-red m-t-10">İletişim
                                </button>
                            </a>
                        <div class="row m-t-50">
                            @foreach($cData->subcategory as $key=>$val)
                                <div class="col-lg-3 border-right">
                                    <h3 style="font-size: 1.25rem;min-height: 50px;">{{$val->title}}</h3>
                                    <div style="height: 90px"></div>
                                    <a target="_blank" href="{{str_slug($val->title,"-")}}/{{$val->id}}.htm"
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
