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

    @isset($cData->place[9])
        @foreach($cData->place[9] as $key=>$val)
            @if($loop->iteration % 2 == 1)
                <section class="p-b-20 p-t-20 values">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="heading-text heading-section text-left mt-5">
                                   @isset($val->title) <h4>{{$val->title}}</h4> @endisset
                                   @isset($val->description) <p>{!! $val->description !!}</p> @endisset
                                </div>
                            </div>
                            @isset($val->files[0]->file)
                                <div class="col-lg-7"><img alt="" width="650"
                                                           src="{{Storage::url("images/userfiles/". $val->files[0]->file)}}">
                                </div>
                            @endisset
                        </div>
                    </div>
                </section>
            @else
                <section class="p-b-20 p-t-20  values ">
                    <div class="container">
                        <div class="row align-items-center">
                            @isset($val->files[0]->file)
                                <div class="col-lg-7"><img alt="" width=650"
                                                           src="{{Storage::url("images/userfiles/". $val->files[0]->file)}}">
                                </div>
                            @endisset
                                <div class="col-lg-5">
                                    <div class="heading-text heading-section text-right mt-5">
                                        @isset($val->title) <h4>{{$val->title}}</h4> @endisset
                                        @isset($val->description) <p>{!! $val->description !!}</p> @endisset
                                    </div>
                                </div>
                        </div>
                    </div>
                </section>

            @endif
            @if(!$loop->last)
            <div class="line"></div>
            @endif

        @endforeach
    @endisset
@endsection
