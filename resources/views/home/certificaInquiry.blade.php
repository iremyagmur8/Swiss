@extends('layouts.app')
@section('title','')
@section('desc','')
@section('content')

    <section id="page-title" class="text-dark p-b-20 p-t-50 "
             @isset($cData->posts->files[0]->file)  style="background-image:url('{{Storage::url("images/userfiles/". $cData->posts->files[0]->file)}}');background-position: center center;background-size: cover;background-repeat: no-repeat" @endisset>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title text-left">
                        @isset( $cData->posts->title)<h2 style="width: 60%">{{ $cData->posts->title}}</h2>@endisset
                        @isset( $cData->posts->shortdescription)
                            <p class="widthBanner">{!! nl2br($cData->posts->shortdescription) !!}</p>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="reservation-form-over no-padding " style="margin-top: -30px;">
        <div class=" mr-5" style="width:30%;float: right;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
            <form action="#" method="post">
                <div class="row reservation-form align-items-center ">
                    <div class="col-md-12">
                        <h3>İletişim</h3>
                        <p style="color:#222;font-weight:600;font-size: 16px">Certifications</p>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-4 col-lg-3">
                                <span style="font-size:14px;color:#777;font-weight: 500">Telefon:</span>
                            </div>
                            <div class="col-8 col-lg-9 p-0" style="margin-left: -10px">
                                <a href="tel:+41 44 877 62 30" style="text-decoration: underline;font-size: 14px;color:#777">+41 44 877 62 30</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 m-t-10">
                        <div class="row">
                            <div class="col-4 col-lg-3">
                                <span style="font-size:14px;color:#777;font-weight: 500">E-mail:</span>
                            </div>
                            <div class="col-8 col-lg-9 p-0" style="margin-left: -10px">
                                <a href="mailto:cs@safetycenter.ch" style="text-decoration: underline;font-size: 14px;color:#777">cs@safetycenter.ch</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section class="p-t-0">
        <div class="container">
            @isset($cData->subcategory)
                <div class="row">
                    @foreach($cData->subcategory as $key=>$val)
                        @isset($val->title)
                            <div class="col-lg-4 categoryCol m-b-10">
                                <a target="_blank" href="@if($val->link){{$val->link}} @else/sertifikasyon/{{str_slug($val->title,"-")}}/{{$val->id}}.htm @endif">
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
