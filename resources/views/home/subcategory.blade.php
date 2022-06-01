@extends('layouts.app')
@section('title','')
@section('desc','')
@section('content')

    @php
        use App\Http\Controllers\HomepageController
    @endphp
    <section id="page-title" class="text-light p-20" style="background-color:#f2f5f7;" >
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-dark m-t-60">
                    <div class="page-title text-left">
                        @isset( $cData->posts->title)<h2 style="font-size: 52px;font-weight: bold;line-height: 1.12;color: #282828;">{{ $cData->posts->title}}</h2>@endisset
                        @isset( $cData->posts->shortdescription)
                            <p style="font-size: 18px; color: #282828;">{!! $cData->posts->shortdescription !!}</p>
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

    <section class="pb-3">
        <div class="container">
            @include('inc.descriptionBox')
        </div>
    </section>

@endsection
