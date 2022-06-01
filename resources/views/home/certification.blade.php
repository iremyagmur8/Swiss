@extends('layouts.app')
@section('title','')
@section('desc','')
@section('content')

    <section id="page-title" class="text-light p-b-20 p-t-50 "
             @isset($cData->posts->files[0]->file)  style="background-image:url('{{Storage::url("images/userfiles/". $cData->posts->files[0]->file)}}');background-position: right;background-size: cover;background-repeat: no-repeat" @endisset>

        <div class="container">
            <div class="m-b-80">
                <div class="bg-overlay"></div>
                <div class="red_info_picture">
                    <img src="https://www.safetycenter.ch/sites/default/files/2021-01/zertifizierungen_360.svg" alt="">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title text-left">
                        @isset( $cData->posts->title)<h2 style="width: 60%">{{ $cData->posts->title}}</h2>@endisset
                        @isset( $cData->posts->shortdescription)
                            <p class="widthBanner">{!! $cData->posts->shortdescription !!}</p>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="reservation-form-over  no-padding d-none d-lg-block" style="margin-top: -40px;">
        <div class="m-r-100" style="float: right;">
            <form action="#" method="post">
                <div class="row reservation-form align-items-center ">
                    <div id="blog" class="post-thumbnails">
                        <h3>İletişim</h3>
                        <div class="post-item p-0  m-t-10">
                            <div class="post-item-wrap">
                                <div class="post-image col-lg-3">
                                    <a href="#">
                                        <img alt="" style="width: 115px;"
                                             src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png">
                                    </a>
                                </div>
                                <div class="post-item-description certificationDesc pb-0 col-lg-9 p-l-40 m-t-25"
                                     style="width: 100% !important;">
                                    <h2>Bülent Baltacı</h2>
                                    <p>Türkiye Temsilcisi</p>
                                    <p>
                                        <a href="mailto:bulent.baltaci@swiss-safetycenter.com.tr">bulent.baltaci@swiss-safetycenter.com.tr</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section class="pt-lg-0 pt-sm-5">
        <div class="container">
            @isset($cData->subcategory)
                <div class="row">
                    @foreach($cData->subcategory as $key=>$val)
                        @isset($val->title)
                            <div class="col-lg-4 categoryCol m-b-10">
                                <a  href="@if($val->link){{$val->link}} @else/sertifikasyon/{{str_slug($val->title,"-")}}/{{$val->id}}.htm @endif">
                                    <button type="button" class="btn btn-rounded btn-outline btn-reveal"
                                            style="width: 100%;">

                                        <div class="text-left my-4"><span>{{$val->title}}</span></div>
                                        <i class="icon-chevron-right fa-3x" style="top: 37px;position: absolute;"></i>
                                    </button>
                                </a>
                            </div>
                        @endisset
                    @endforeach
                </div>
            @endisset

        </div>
    </section>


@endsection
