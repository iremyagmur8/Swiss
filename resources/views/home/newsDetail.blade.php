@extends('layouts.app')
@section('title','')
@section('desc','')
@section('content')
    <section id="page-title" class="page-title-center text-light"
             @isset($cData->posts->files[0]->file)  style="background-image:url('{{Storage::url("images/userfiles/". $cData->posts->files[0]->file)}}');background-position: center center;background-size: cover;background-repeat: no-repeat" @endisset>
        <div class="bg-overlay"></div>
        <div style="height: 150px;" class="container">
            <div class="page-title">
              <!--  <span class="post-meta-category"><a href="">Haberler</a></span> -->
                @isset( $cData->posts->title)<h1>{{ $cData->posts->title}}</h1>@endisset
            <!-- <div class="align-center">
                    @if($vars->contact->linkedin)
                        <a class="btn btn-xs btn-slide btn-linkedin" href="{{$vars->contact->linkedin}}"
                           data-width="118">
                            <i class="fab fa-linkedin"></i>
                            <span>Linkedin</span>
                        </a>
                    @endif
                    @if($vars->contact->mail)
                        <a class="btn btn-xs btn-slide btn-googleplus" href="mailto:{{$vars->contact->mail}}"
                           data-width="80">
                            <i class="icon-mail" style="color:white !important"></i>
                            <span>Mail</span>
                        </a>
                    @endif
                </div> -->
            </div>
        </div>
    </section>
    @isset($cData->posts->description)
        <section id="page-content">
            <div class="container">
                <div id="blog" class="single-post col-lg-12 center">
                    <!-- Post single item-->
                    <div class="post-item">
                        <div class="post-item-wrap">
                            <div class="post-item-description">
                                <p>{!! $cData->posts->description !!}</p>
                            </div>
                        </div>
                    </div>
                    <!-- end: Post single item-->
                </div>
            </div>
        </section>
    @endisset
@endsection
