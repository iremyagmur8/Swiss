@extends('layouts.app')
@section('title','')
@section('desc','')
@section('content')

    @php
        use App\Http\Controllers\HomepageController
    @endphp


    <section id="page-content" class="sidebar-right dataProtection" style="transform: none;">
        <div class="container" style="transform: none;">
            <div class="row" style="transform: none;">
                @isset($cData->place[13])
                    <div class="content col-lg-8">
                        @foreach($cData->place[13] as $key=>$val)
                            @if($loop->first)
                                <h2 id="{{$val->buttontext}}" class="m-t-40 m-b-30" style="font-size: 40px"><b>{{$val->title}}</b></h2>
                                <p>{!! $val->description !!}</p>
                            @else
                                <h2 id="{{$val->buttontext}}" class="m-t-40 m-b-30" style="font-size: 30px"><b>{{$val->title}}</b></h2>
                            <p>{!! $val->description !!}</p>
                            @endif
                        @endforeach

                    </div>
                @endisset
                @isset($cData->posts)
                    <div class="sidebar sticky-sidebar col-lg-4 m-t-50"
                         style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                        <div class="theiaStickySidebar"
                             style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">
                            <div class="widget ">
                                <h4 class="widget-title">INHALTSVERZEICHNIS</h4>
                                <div id="mainMenu" class="menu-vertical">
                                    <div class="container">
                                        <nav>
                                            <ul class="list-icon list-icon-arrow list-icon-colored">
                                                @foreach($cData->posts as $key=>$val)
                                                    @if($loop->first)
                                                        <li class=" active m-l-20">
                                                            <a class="scroll-to"
                                                               href="#{{$val->shortdescription}}">{{$val->title}}</a>
                                                        </li>
                                                    @else

                                                        <li class="m-l-20">
                                                            <a class="scroll-to"
                                                               href="#{{$val->shortdescription}}">{{$val->title}}</a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset
            </div>
        </div>
    </section>


@endsection
