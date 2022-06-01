@isset($cData->pdf)
    <section class=" p-0 pdfBox">
        <div class="container">
            @foreach($cData->pdf as $key=>$val)
                @if(!$loop->first)
                    <div class="row m-t-25">
                        <div class="col-lg-1">
                            <a href=""><i class="far fa-file-pdf"></i></a>
                        </div>
                        <div class="col-lg-11">
                            @isset($val->description )
                                {!! $val->description !!}
                            @endisset
                        </div>
                    </div>
                    <div class="line"></div>

                @endif
            @endforeach
        </div>
    </section>
@endisset


