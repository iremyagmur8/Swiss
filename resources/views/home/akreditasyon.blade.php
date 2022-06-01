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
                        @isset( $cData->posts->title)<h2>{{ $cData->posts->title}}</h2>@endisset
                        @isset( $cData->posts->shortdescription)
                            <p class="widthBanner">{!! $cData->posts->shortdescription !!}</p>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </section>
    @isset($cData->place[10])
        <section class="akreditasyon">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        @foreach($cData->place[10] as $key=>$val)
                            @if($loop->first)
                                <div class="page-title text-left">
                                    @isset( $val->title)<h1>{{  $val->title}}</h1>@endisset
                                </div>
                            @else
                                <div class="row align-items-center">
                                    <div class="col-lg-8">
                                        <div class="page-title text-left m-t-40 m-b-40 p-r-50 border-right">
                                            @isset( $val->title)<h2  style="font-size:2em">{{ $val->title}}</h2>@endisset
                                            @isset( $val->description)
                                                <p class="widthBanner">{!! $val->description !!}</p>
                                            @endisset
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <a target="_blank" href="{{$val->buttontext}}" style="font-size: 16px; text-decoration: none !important;"><i class="far fa-file-pdf fa-fw"></i>&nbsp;{{$val->shortdescription}}</a>
                                    </div>
                                </div>
                                <div class="line"></div>
                            @endif
                        @endforeach
                        @foreach($cData->place[11] as $key=>$val)
                            @if($loop->first)
                                <div class="page-title text-left m-t-100 m-b-80">
                                    @isset( $val->title)<h1>{{  $val->title}}</h1>@endisset
                                </div>
                            @else
                                <div class="row align-items-center">
                                    <div class="col-lg-8">
                                        <div class="page-title text-left m-b-40 p-r-50 border-right">
                                            @isset( $val->title)<h2>{{ $val->title}}</h2>@endisset
                                            @isset( $val->description)
                                                <p class="widthBanner">{!! $val->description !!}</p>
                                            @endisset
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <a target="_blank" href="{{$val->buttontext}}" style="font-size: 16px; text-decoration: none !important;"><i class="far fa-file-pdf fa-fw"></i>&nbsp;{{$val->shortdescription}}</a>
                                    </div>
                                </div>
                                    <div class="line"></div>

                                @endif
                        @endforeach
                        @foreach($cData->place[12] as $key=>$val)
                            @if($loop->first)
                                <div class="page-title text-left m-t-100 m-b-80">
                                    @isset( $val->title)<h1>{{  $val->title}}</h1>@endisset
                                </div>
                            @else
                                <div class="row align-items-center">
                                    <div class="col-lg-8">
                                        <div class="page-title text-left m-b-40 p-r-50 border-right">
                                            @isset( $val->title)<h2>{{ $val->title}}</h2>@endisset
                                            @isset( $val->description)
                                                <p class="widthBanner">{!! $val->description !!}</p>
                                            @endisset
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <a target="_blank" href="{{$val->buttontext}}" style="font-size: 16px; text-decoration: none !important;"><i class="far fa-file-pdf fa-fw"></i>&nbsp;{{$val->shortdescription}}</a>
                                    </div>
                                </div>
                                @if(!$loop->last)
                                    <div class="line"></div>
                                @endif
                            @endif
                        @endforeach
                    </div>


                </div>
            </div>
        </section>
    @endisset
@endsection
