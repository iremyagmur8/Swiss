@extends('layouts.app')
@section('title','')
@section('desc','')
@section('content')

    <section id="page-title" class="text-light p-t-100 p-b-100"
             @isset($cData->category->files[0]->file)  style="background-image:url('{{Storage::url("images/userfiles/". $cData->category->files[0]->file)}}');background-position: center center;background-size: cover;background-repeat: no-repeat" @endisset>
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title text-left">
                        @isset( $cData->category->title)<h2>{{ $cData->category->title}}</h2>@endisset
                        @isset( $cData->category->shortdescription)
                            <p class="widthBanner">{!! $cData->category->shortdescription !!}</p>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="page-content">
        <div class="container">
            <div class="row">
                <!-- post content -->
                <div class="content col-lg-12">
                    <!-- Blog -->
                    <div id="blog" class="post-thumbnails">
                        @foreach($cData->posts as $key=>$val)
                            <div class="post-item">
                                <div class="post-item-wrap">
                                    @isset($val->files[0]->file)
                                        <div class="post-image">
                                            <a href="#">
                                                <img alt=""
                                                     src="{{Storage::url("/images/userfiles/". $val->files[0]->file)}}">
                                            </a>
                                        </div>
                                    @endisset
                                    <div class="post-item-description">
                                        @isset($val->title)<h2><a href="#">{{$val->title}}
                                            </a></h2>@endisset
                                        @isset($val->shortdescription)
                                        <p>{!! $val->shortdescription !!}</p>
                                        @endisset
                                        <a href="/haberler/{{str_slug($val->title,"-")}}/{{$val->id}}.html" class="item-link read-more">Daha fazlası için</a>                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section> @endsection
