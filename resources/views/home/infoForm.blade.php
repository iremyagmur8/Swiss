@extends('layouts.app')
@section('title','')
@section('desc','')
@section('content')

    @php
        use App\Http\Controllers\HomepageController
    @endphp

    <section id="page-title" class="text-dark p-b-100 p-t-100"
             @isset($cData->posts->files[1]->file)  style="background-image:url('{{Storage::url("images/userfiles/". $cData->posts->files[1]->file)}}');background-position: center center;background-size: cover;background-repeat: no-repeat"
        @endisset>
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
            @isset($cData->pdf)
                <section class=" p-0 pdfBox">
                    <div class="container p-0">
                        @foreach($cData->pdf as $key=>$val)
                            <div class="row m-t-25">
                                <div class="col-1 col-sm-2 col-lg-1">
                                    <a href=""><i class="far fa-file-pdf"></i></a>
                                </div>
                                <div class="col-lg-11 col-11 col-sm-10">
                                    @isset($val->description )
                                        {!! $val->description !!}
                                    @endisset
                                </div>
                            </div>
                            <div class="line"></div>
                        @endforeach
                    </div>
                </section>
            @endisset
        </div>
    </section>
    @isset($cData->posts->files[0]->file)
        <div class="categoryImage m-b-50">
            <figure
                style="background-image:url({{Storage::url("images/userfiles/". $cData->posts->files[0]->file)}});background-repeat: no-repeat;width:100%;background-position: center center;background-size: cover ;height: 500px">
            </figure>
        </div>
    @endisset
@endsection
