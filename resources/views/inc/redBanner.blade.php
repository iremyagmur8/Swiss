@isset($cData->place[8][0])
    <section class="m-t-50 p-0">
        <div class="call-to-action p-t-50 p-b-50 mb-0 boilerplate text-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        @isset($cData->place[8][0]->title)
                            <h3>
                                {{$cData->place[8][0]->title}}
                            </h3>
                        @endisset
                        @isset($cData->place[8][0]->description)
                            <p>
                                {!! $cData->place[8][0]->description !!}
                            </p>
                        @endisset
                        @isset($cData->place[8][0]->buttontext)
                            <a href="{{$cData->place[8][0]->shortdescription}}">{{$cData->place[8][0]->buttontext}}</a>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </section>
@endisset
