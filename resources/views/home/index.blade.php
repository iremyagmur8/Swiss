@extends('layouts.app')
@section('title','Sky Belgelendirme, İsviçre Akreditasyon Kurumu (SAS) tarafından akredite edilmiş olan Swiss Safety Center AG’nin Türkiye temsilcisidir.')
@section('desc','Swiss Safety Center AG, SVTI Grup’a bağlı, merkezi İsviçre’de bulunan, İsviçre Akreditasyon Kurumu tarafından ISO 9001, ISO 14001, ISO 45001, ISO 50001, ISO 27001, ISO 22000, ISO 13485, ISO 3834-2 gibi standartların sertifikasyonları konularında, ISO 17021 standardına uygun olarak akredite edilmiş olan, TUV Association üyesi bağımsız bir denetim ve sertifikasyon kuruluşudur.')
@section('content')

    <section class="profile-content">
        @isset($cData->place[7])
            <div class="profile-image">
                <div id="slider" class="inspiro-slider slider-fullscreen" data-dots="false" data-height-xs="360">
                    @foreach($cData->place[7] as $key=>$val)
                        <div class="slide kenburns"
                             style="background-image:url('{{Storage::url("images/userfiles/". $val->files[0]->file)}}');">
                            <div class="bg-overlay"></div>
                            <div class="container">
                                <div class="slide-captions text-center text-light p-30">
                                    <!-- Captions -->
                                    @isset($val->description)<span
                                        class="strong">{!! $val->description !!}</span>@endisset
                                    @isset($val->shortdescription)<h2>{!! $val->shortdescription !!}</h2>@endisset
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endisset


        <div class="profile-bio">
            <div class="container">
                @isset($cData->home->title) <h2>{{$cData->home->title}}</h2> @endisset
                @isset($cData->home->shortdescription)<p
                    class="profile-bio-subtitle">{{$cData->home->shortdescription}}</p> @endisset
                @isset($cData->home->link)
                    <br/>
                    <a href="@isset($cData->home->tag){{$cData->home->tag}}@endisset">
                        <button type="button" class="btn btn-rounded btn-red">{{$cData->home->link}}</button>
                    </a>
                @endisset
                @isset($cData->place[2])
                    @isset($cData->place[2][0])
                        <div class="secTitle">
                            <h3>{{$cData->place[2][0]->title}}</h3>
                        </div>
                    @endisset
                    <div class="row topicsButton">
                        <div class="col-lg-12 col-sm-12">
                            @foreach($cData->place[2] as $key=>$val)
                                @if(!$loop->first and !$loop->last)
                                    @if($loop->iteration == 4 or $loop->iteration == 5)
                                        <div style="clear: both"></div> @endif

                                    @isset($val->title)
                                        <a href="@isset($val->shortdescription){{$val->shortdescription}}@endisset">
                                            <button style="float: left;margin-right: 10px" type="button"
                                                    class="btn btn-rounded btn-red">{{$val->title}}
                                            </button>
                                        </a>
                                    @endisset
                                @endif
                            @endforeach
                        </div>
                    </div>
            @endisset
            <!--
                @isset($cData->place[3])
                <div class="secTitle">
                    <h3>{{$cData->place[3][0]->title}}</h3>
                    </div>
                    <div class="row topicsButton">
                        @foreach($cData->place[3] as $key=>$val)
                    @if(!$loop->first)
                        <div class="col-lg-4 col-sm-12 ">
                            <a href="">
                                <button type="button" class="btn btn-rounded btn-red">{{$val->title}}
                            </button>
                        </a>
                    </div>
@endif
                @endforeach
                    </div>
                @endisset
                -->
                <section id="section4">
                    <div class="container p-1">
                        @isset($cData->place[2][6]->title)
                            <a href="@isset($cData->place[2][6]->shortdescription){{$cData->place[2][6]->shortdescription}}@endisset">
                                <button type="button"
                                        class="btn btn-rounded btn-red">{{$cData->place[2][6]->title}}
                                </button>
                            </a>
                        @endisset
                        <div class="row bordersText pl-lg-2 pl-sm-0 pt-sm-4 pt-lg-0">
                            @foreach($cData->news as $key=>$val)
                                <div
                                    class="col-lg-6 p-lg-3  @if($loop->iteration <=2 ) border-bottom @endif @if($loop->iteration % 2 == 0 ) @else border-right @endif">
                                    <div class="boxesText " >
                                        @isset($val->title)  <h3>{{$val->title}}</h3> @endisset
                                        @isset($val->link)<a style="position:absolute;bottom:0px"
                                            href="/haberler/{{str_slug($val->title,"-")}}/{{$val->id}}.html"
                                            class="item-link read-more">{{$val->link}}</a>@endisset
                                    </div>

                                </div>
                            @endforeach

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>

    @isset($cData->place[4])
        <section class="background-grey boxIcons">
            <div class="container p-0">
                <div class="row">
                    @foreach($cData->place[4] as $key=>$val)
                        <div class="col-lg-4 col-sm-12 ">
                            <a @if($loop->last) target="_blank" @endif
                               href="{{$val->video}}" class="icon-boxes-titles">
                                <div class="icons_wrapper @if(!$loop->last) border-right @endif"
                                     style="background-image: url('{{Storage::url('/images/userfiles/'. $val->files[0]->file)}}');">
                                    @isset($val->title) <h2 class="icons_title">
                                        {{$val->title}}
                                    </h2>
                                    @endisset
                                    @isset($val->buttontext)
                                        <div class="icons_button mt-auto">
                                            <a @if($loop->last) target="_blank" @endif class="cta-button button button--white"
                                               href="@isset($val->video){{$val->video}}@endisset">
                                                {{$val->buttontext}}
                                            </a>
                                        </div>
                                    @endisset
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
            </div>
        </section>
    @endisset

    <!--
    @isset($cData->place[5][0])
        <section id="section3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 background-grey mb-sm-3 mb-lg-0">
                        @isset($cData->place[5][0]->title)<h3>{{$cData->place[5][0]->title}}</h3>@endisset
        @isset($cData->place[5][0]->shortdescription)
            <p>{{$cData->place[5][0]->shortdescription}}</p>
                        @endisset
            <div class="clear"></div>
@isset($cData->place[5][0]->buttontext)
            <a href="#">
                <button type="button"
                        class="btn btn-rounded btn-red">{{$cData->place[5][0]->buttontext}}</button>
                            </a>
                        @endisset
            </div>
@isset($cData->place[5][0]->video)
            <div class="col-lg-6 background-img p-0">
                <iframe width="1920" height="1000"
                        src="https://www.youtube.com/embed/{{$cData->place[5][0]->video}}"
                                    title="" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                        </div>
                    @endisset
            </div>
        </div>
    </section>
@endisset

    @isset($cData->place[5][1])
        <section id="section3">
            <div class="container">
                <div class="row">
                    @isset($cData->place[5][1]->files[0]->file)

            <div class="col-lg-6 background-img p-0">
                <img alt="real-estate"
                     src="{{Storage::url("images/userfiles/". $cData->place[5][1]->files[0]->file)}}"
                                 class="img-fluid m-b-10">
                        </div>
                    @endisset
            <div class="col-lg-6 background-grey">
@isset($cData->place[5][1]->title)<h3>{{$cData->place[5][1]->title}}</h3>@endisset
        @isset($cData->place[5][1]->shortdescription)
            <p>{{$cData->place[5][1]->shortdescription}}</p>
                        @endisset
            <div class="clear"></div>
@isset($cData->place[5][1]->buttontext)
            <a href="#">
                <button type="button"
                        class="btn btn-rounded btn-red">{{$cData->place[5][0]->buttontext}}</button>
                            </a>
                        @endisset
            </div>
        </div>
    </div>
</section>
@endisset
        -->

    @isset($cData->place[6])
        <section class="background-grey">
            <div class="container">
                <div class="row ml-lg-0">
                    @isset($cData->place[6][0])
                        <div class="col-lg-5">
                            @isset($cData->place[6][0]->title)<h3
                                style="font-size: 30px">{{$cData->place[6][0]->title}}</h3>@endisset
                            @isset($cData->place[6][0]->shortdescription)
                                <p>{{$cData->place[6][0]->shortdescription}}</p>@endisset
                            <div class="clear"></div>
                            @isset($cData->place[6][0]->buttontext)
                                <a href="{{$cData->place[6][0]->video}}">
                                    <button type="button"
                                            class="btn btn-rounded btn-red discover-button">{{$cData->place[6][0]->buttontext}}</button>
                                </a>
                            @endisset
                        </div>
                    @endisset

                    <div class="col-lg-6 offset-lg-1 background-grey">
                        <div class="row">
                            @foreach($cData->place[6] as $key=>$val)
                                @if(!$loop->first)
                                    <div class="col-lg-6 border-right">
                                        @isset($val->title) <h3 style="font-size: 1.25rem">{{$val->title}}</h3> @endif
                                        <p
                                            style="height: 115px">@isset($val->shortdescription) {{$val->shortdescription}}
                                            @endisset
                                        </p>
                                        @isset($val->buttontext) <a href="{{$val->video}}"
                                                                    class="item-link read-more"
                                                                    style="position: absolute;bottom: 0;">{{$val->buttontext}}</a> @endisset
                                    </div>
                                    @if($loop->iteration %3 == 0)
                                        <div class="seperator"></div>
                                    @endif
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endisset
    <!--
    @isset($cData->references)
        <section id="section5" class="p-b-100 p-t-100">
            <div class="container">
                <div class="carousel client-logos" data-items="7" data-margin="60">
                    @foreach($cData->references as $key=>$val)
            @isset($val->files[0]->file)
                <div>
                    <a href="#"><img alt=""
                                     src="{{Storage::url("images/userfiles/". $val->files[0]->file)}}"> </a>
                            </div>
                        @endisset
        @endforeach
            </div>
        </div>
    </section>
@endisset
        -->
@endsection
