@extends('layouts.app')
@section('title','')
@section('desc','')
@section('content')

    <section id="page-title" class="text-light p-lg-20 p-sm-0" style="background-color:#f2f5f7;" >
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-dark">
                    <div class="page-title text-left">
                        @isset( $cData->posts->title)<h2 style="line-height: 1.31818182em; color: #282828;">{{ $cData->posts->title}}</h2>@endisset
                        @isset( $cData->posts->shortdescription)
                            <p style="font-size: 18px; color: #282828;" >{!! $cData->posts->shortdescription !!}</p>
                        @endisset
                    </div>
                </div>
                @isset( $cData->posts->files[0]->file)
                    <div class="col-lg-6 d-none d-lg-block  text-right">
                        <img src="{{Storage::url("images/userfiles/".  $cData->posts->files[0]->file)}}" class="img-fluid" alt="" height="360" width="360">
                    </div>
                @endisset
            </div>
        </div>
    </section>

    <section class="pb-3 p-t-30 categoryBox">
        @include('inc.descriptionBox')
    </section>
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
                    </div>
                </div>
            </div>
        </section>
    @endisset

@endsection
