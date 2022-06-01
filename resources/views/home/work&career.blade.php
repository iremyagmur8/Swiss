@extends('layouts.app')
@section('title','')
@section('desc','')
@section('content')

    <section id="page-title" class="p-t-200 "
             @isset($cData->posts[0]->files[0]->file)  style="padding-bottom: 300px;background-image:url('{{Storage::url("images/userfiles/". $cData->posts[0]->files[0]->file)}}');background-position:top;background-size: cover;background-repeat: no-repeat" @endisset>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title text-left">
                        @isset( $cData->posts[0]->shortdescription)
                            <p class="widthBanner">{!! $cData->posts[0]->shortdescription !!}</p>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-0 p-t-30 categoryBox">
        <div class="container">
            <div class="row ">
                @isset( $cData->posts[0]->title)<h1 class="ml-3">{{ $cData->posts[0]->title}}</h1>@endisset
            </div>
        </div>
        @isset($cData->posts[0]->description)
            <div class="container posts-desc">
                <p>{!! $cData->posts[0]->description !!}</p>
            </div>
        @endisset
    </section>

    <section class="p-t-0 p-b-50">
        <div class="container">
            @isset($cData->subcategory)
                <div class="row">
                    @foreach($cData->subcategory as $key=>$val)
                        @isset($val->title)
                            <div class="col-lg-6 categoryCol">
                                <a
                                   href="@if($val->link){{$val->link}} @else/is-ve-kariyer/{{str_slug($val->title,"-")}}/{{$val->id}}.htm @endif">
                                    <button type="button" class="pl-0 btn btn-rounded btn-outline btn-reveal"
                                            style="width: 100%;height: 90px;border:none;border-radius: 0!important;">
                                        <div class="text-left mt-4"><span>{{$val->title}}</span></div>
                                        <i class="icon-chevron-right fa-3x"></i></button>
                                </a>
                                <div class="seperator mx-0 mb-0 " style="margin-top:-10px"></div>
                            </div>
                        @endisset
                    @endforeach
                </div>
            @endisset
        </div>
    </section>
    @isset($cData->posts[1])
        <section id="easy-fast" class="text-light boilerplate p-b-0 m-b-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-3">
                        @isset($cData->posts[1]->title)
                            <h3>{{$cData->posts[1]->title}}
                            </h3>
                        @endisset

                    </div>
                    @isset($cData->posts[1]->description)
                        <div class="col-lg-6 animated fadeInUp visible" data-animate="fadeInUp" data-animate-delay="300">
                            {!! nl2br($cData->posts[1]->description) !!}
                        </div>
                    @endisset
                    @isset($cData->posts[1]->shortdescription)
                        <div class="col-lg-6 animated fadeInUp visible" data-animate="fadeInUp" data-animate-delay="600">
                            <p>  {{ $cData->posts[1]->shortdescription }}</p>
                        </div>
                    @endisset

                </div>
            </div>
        </section>
    @endisset
    @isset($cData->place[14])
        <section class="p-t-0">
            <div class="container">
                <h1>Teklifimiz</h1>
                <p class="ml-1" style="font-size:16px">SVTI Grup çalışanları çok sayıda cazip avantajlardan
                    yararlanmaktadır.
                </p>
                <div class="row">
                    @foreach($cData->place[14] as $key=>$val)
                        <div class="col-lg-6 p-t-50 p-b-50"
                             style="@if($loop->last) @else border-bottom: 1px solid #dfdfdf @endif">
                            <div class="row">
                                <div class="col-lg-4">
                                    @isset($val->files[0]->file)
                                        <figure class="m-0">
                                            <img
                                                src="{{Storage::url('/images/userfiles/' . $val->files[0]->file)}}"
                                                width="100%" alt="">
                                        </figure>
                                    @endisset
                                </div>
                                <div class="col-lg-8"
                                     style="@if($loop->iteration % 2 == 1)border-right: 1px solid #dfdfdf;@endif
                                         padding-right: 36px;">
                                    <div class="gallery-compact__text">
                                        @isset($val->title)   <h2>{{$val->title}}</h2> @endisset
                                        @isset($val->description)  <p
                                            class="departement">{!! $val->description !!}</p> @endisset

                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endisset
@endsection
