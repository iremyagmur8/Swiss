@extends('layouts.app')
@section('title','')
@section('desc','')
@section('content')

    @php
        use App\Http\Controllers\HomepageController
    @endphp
    <section id="page-title" class="text-light p-t-100 p-b-100"
             @isset($cData->documentation[0]->files[0]->file)  style="background-image:url('{{Storage::url("images/userfiles/". $cData->documentation[0]->files[0]->file)}}');
                 background-position: center center;background-size: cover;background-repeat: no-repeat" @endisset>
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content-header__info-picto">
                        <img src="https://www.safetycenter.ch/sites/default/files/2021-01/zertifizierungen_360.svg"
                             alt="">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="page-title text-left">
                        @isset( $cData->documentation[0]->category->title)<h2>{{ $cData->documentation[0]->category->title}}</h2>@endisset
                        @isset( $cData->documentation[0]->category->shortdescription)
                            <p class="widthBanner">{!! $cData->documentation[0]->category->shortdescription !!}</p>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            @isset($cData->documentation)
                @foreach($cData->documentation as $key=>$val)
                    @isset($val->description)
                        <div class="row documentation">
                            <div class="col-lg-1">
                                <i style="font-size:30px; color:#d00" class="fa fa-file-pdf"></i>
                            </div>
                            <div class="col-lg-3 text-dark text-left p-t-5">
                                {!! $val->description !!}
                            </div>
                        </div>
                        @if(!$loop->last)
                            <div class="line"></div>
                        @endif
                    @endisset
                @endforeach
            @endisset
        </div>
    </section>


@endsection
