@isset($cData->posts->files[1]->file)
    <div class="categoryImage m-b-50 m-t-50">
        <figure
            style="background-image:url({{Storage::url("images/userfiles/". $cData->posts->files[1]->file)}});background-repeat: no-repeat;width:100%;background-position: center center;background-size: cover ;height: 550px">
        </figure>
    </div>
@endisset


    @isset($cData->posts->description)
        <div class="container posts-desc">
            <p>{!! $cData->posts->description !!}</p>
        </div>
    @endisset
<div class="container">
    @include('inc.pdfBox')
</div>
