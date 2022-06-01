<?php

function sanitize_output($buffer)
{

    $search = array(
        '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
        '/[^\S ]+\</s',     // strip whitespaces before tags, except space
        '/(\s)+/s',         // shorten multiple whitespace sequences
        '/<!--(.|\s)*?-->/' // Remove HTML comments
    );

    $replace = array(
        '>',
        '<',
        '\\1',
        ''
    );

    $buffer = preg_replace($search, $replace, $buffer);

    return $buffer;
}

ob_start("sanitize_output");

?><!DOCTYPE html>
<html lang="tr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="description" content="@yield('desc')">
    <link rel="apple-touch-icon" sizes="57x57" href="/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/icons/favicon-16x16.png">
    <link rel="manifest" href="/icons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title>@yield('title') {{Config::get("solaris.site.name")}}</title>
    <!-- Stylesheets & Fonts -->
    <link href="/assetWeb/polo/css/plugins.css" rel="stylesheet">
    <link href="/assetWeb/polo/css/style.css" rel="stylesheet">

    <!-- Template color -->
    <link href="/assetWeb/polo/css/color-variations/purple.css" rel="stylesheet" type="text/css" media="screen">
    <link href="/custom.css?v={{rand(0,999)}}" rel="stylesheet">
    <script src="/assetWeb/polo/js/jquery.js"></script>
    @isset($amp)
        <link rel="amphtml" href="{{$amp}}"/> @endisset
<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{Config::get("solaris.site.google")}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', '{{Config::get("solaris.site.google")}}');
    </script>
</head>

<body>

<?php  $string = app()->getLocale();?>

<!-- Body Inner -->
<div class="body-inner">

    <div id="topbar" class="d-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6 text-right">
                    <ul class="top-menu">
                        <li><a href="/{{__("link.hakkimizda")}}/">{{__("gnl.Hakkımızda")}}</a></li>
                        <li><a href="/{{__("link.is-ve-kariyer")}}">{{__("gnl.İş ve Kariyer")}}</a></li>
                        <li><a href="/{{__("link.iletisim")}}">{{__("gnl.İletişim")}}</a></li>
                        <li>
                            <div class="p-dropdown">
                                @if($string == 'tr')
                                    <a href="/lang/tr"><span>TR&nbsp;</span><i class="fas fa-chevron-down"></i></a>
                                    <ul class="p-dropdown-content">
                                        <li><a href="/lang/en">EN</a></li>
                                        <li><a target="_blank" href="https://www.safetycenter.ch/">DE</a></li>
                                    </ul>

                                @elseif($string == 'en')
                                    <a href="/lang/en"><span>EN</span><i class="fas fa-chevron-down"></i></a>
                                    <ul class="p-dropdown-content">
                                        <li><a href="/lang/tr">TR</a></li>
                                        <li><a href="https://www.safetycenter.ch/">DE</a></li>
                                    </ul>
                                @else
                                    <a href="https://www.safetycenter.ch/"><span>DE&nbsp;</span><i
                                            class="fas fa-chevron-down"></i></a>
                                    <ul class="p-dropdown-content">
                                        <li><a href="/lang/tr">TR</a></li>
                                        <li><a href="/lang/en">EN</a></li>
                                    </ul>
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <header id="header">
        <div class="header-inner">
            <div class="container">
                <div id="logo">
                    <a href="/">
                        <img src="/images/logo.svg" class="logo-default">
                        <img src="/images/logo.svg" class="logo-sticky">
                    </a>
                </div>
                <div id="mainMenu-trigger"><a id="lines-button" class="lines-button x">
                        <div class="current-image" id="current-image"></div>
                    </a></div>
                <div id="mainMenu" style="background: white;">
                    <div class="container">
                        <nav>
                            <ul>
                                @foreach($vars->menu as $key=>$val)

                                    <li @if(count($val->childs)>0) class="dropdown"
                                        @endif @if (request("page") and request("page")==$val->id) class="current" @endif>
                                        <a
                                            href="@if($val->link){{$val->link}} @else/{{str_slug($val->title,"-")}}/{{$val->id}}.htm @endif">
                                            {{$val->title}}
                                        </a>
                                    <!--
                                        @if(count($val->childs)>0)
                                        <ul class="dropdown-menu">
@foreach($val->childs as $key2=>$val2)
                                            <li>
                                                <a href="@if($val2->link){{$val2->link}}@else{{"/".str_slug($val2->title,"-")."/".$val2->id.".htm"}}@endif">{{$val2->title}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        -->

                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

@yield("content")

<!-- Footer -->
    <footer id="footer" class="inverted"
            style=" @isset($vars->contact->files[0]->file)background: url({{Storage::url('images/userfiles/' . $vars->contact->files[0]->file)}}) @endisset;background-position: center center;background-repeat: no-repeat;background-size: cover">
        <div class="footer-content">
            <div class="container  text-light">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <p><a href="#"><img src="/images/footer_logo.svg" height="90" alt="logo"></a></p>
                        <div class="row setHeight">
                            @isset($vars->contact->address)
                                <div class="col-lg-4 setHeight">
                                    @isset($vars->contact->city)<p href=""><b>{{$vars->contact->city}}</b></p> @endisset
                                    <div class="row ">
                                        <div class="col-lg-1">
                                            <i class="fas fa-map-pin fa-fw text-left"></i>
                                        </div>
                                        <div class="col-lg-10 text-left setMargin">
                                            <address class="footer__address">
                                                <a href="">
                                                    {{$vars->contact->address}}</a>
                                            </address>
                                        </div>
                                        <p class="footer__contact m-l-15">
                                            <a href="mailto:+cs@safetycenter.ch">
                                                <i class="far fa-envelope fa-fw"></i>
                                                <span>&nbsp;cs@safetycenter.ch</span>
                                            </a>
                                        </p>
                                        <br>
                                        <div class="col-12">
                                            <a href="/{{__("link.iletisim")}}"  >
                                                <button type="button" class="btn btn-rounded btn-red">{{__("gnl.İletişim")}}</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endisset
                            <div class="col-lg-2"></div>
                            <div class="col-lg-6">
                                @isset($vars->contact->country)<p href=""><b>{{$vars->contact->country}}</b>
                                </p> @endisset
                                <div class="row">
                                    <div class="col-lg-1">
                                        <i class="fas fa-map-pin fa-fw text-left"></i>
                                    </div>
                                    <div class="col-lg-10 text-left setMargin">
                                        <address class="footer__address">
                                            <a href="">
                                                Postane Mah. Posta Sokak
                                                No: 1/B D: 20
                                                <br>
                                                TR-34940 Tuzla, İstanbul
                                            </a>
                                        </address>
                                    </div>
                                    <p class="footer__contact m-l-15">
                                        @isset($vars->contact->phone)
                                            <a href="tel:{{$vars->contact->phone}}">
                                                <i class="fas fa-phone"></i>
                                                <span>&nbsp;{{$vars->contact->phone}}</span>
                                            </a>
                                            <br>
                                        @endisset
                                        @isset($vars->contact->mail)
                                            <a href="mailto:{{$vars->contact->mail}}">
                                                <i class="far fa-envelope fa-fw"></i>
                                                <span>&nbsp;{{$vars->contact->mail}}</span>
                                            </a>
                                        @endisset
                                    </p>

                                </div>
                            </div>

                        </div>
                       <!-- <p class="footer__contact ">
                            <a href="mailto:+cs@safetycenter.ch">
                                <i class="far fa-envelope fa-fw"></i>
                                <span>&nbsp;cs@safetycenter.ch</span>
                            </a>
                        </p>
                        <a href="/{{__("link.iletisim")}}">
                            <button type="button" class="btn btn-rounded btn-red">{{__("gnl.İletişim")}}</button>
                        </a>-->
                    </div>
                    <div class="col-lg-3 col-md-6 mt-sm-5 mt-lg-0">
                        <div class="row flex-column">
                            <div class="col-lg-12">
                                <div class="widget">
                                    <div class="widget-title">{{__("gnl.Follow Us")}}</div>
                                    <ul class="list">
                                        @if($vars->contact->facebook)
                                            <li class="social-facebook"><a href="{{$vars->contact->facebook}}"><i
                                                        class="fab fa-facebook-f"></i>&nbsp;&nbsp;Facebook</a>
                                            </li>@endif
                                        @if($vars->contact->twitter)
                                            <li class="social-twitter"><a href="{{$vars->contact->twitter}}"><i
                                                        class="fab fa-twitter"></i>&nbsp;&nbsp;Twitter</a></li>@endif
                                        @if($vars->contact->linkedin)
                                            <li class="social-linkedin"><a target="_blank"
                                                                           href="{{$vars->contact->linkedin}}"><i
                                                        class="fab fa-linkedin"></i>&nbsp;&nbsp;Linkedin</a></li>@endif
                                        @if($vars->contact->youtube)
                                            <li class="social-youtube"><a href="{{$vars->contact->youtube}}"><i
                                                        class="fab fa-youtube"></i>&nbsp;&nbsp;Youtube</a></li>@endif
                                        @if($vars->contact->instagram)
                                            <li class="social-instagram"><a href="{{$vars->contact->instagram}}"><i
                                                        class="fab fa-instagram"></i>&nbsp;&nbsp;Instagram</a>
                                            </li>@endif
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="widget">
                                    <div class="widget-title">{{__("gnl.Part of the SVTI Group")}}</div>
                                    <ul class="list">
                                        <li><a target="_blank" href="https://www.svti.ch/en">SVTI</a></li>
                                        <li><a target="_blank" href="https://www.safetycenter.ch/en">Swiss Safety
                                                Center</a></li>
                                        <li>
                                            <a target="_blank"
                                               href="https://www.safetycenter.ch/en/automation/autosonictm">{{__("gnl.Autosonic")}}</a>
                                        </li>
                                        <li><a target="_blank"
                                               href="https://akademie.safetycenter.ch/en">{{__("gnl.Swiss Safety Center Academy")}}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mt-sm-5 m-t-100">
                        <div class="widget">
                            <p><b>Swiss Safety Center AG</b> – {{__("gnl.A company of the SVTI Group, member of the")}}
                                <a target="_blank"
                                   href="https://www.tuev-verband.de/en/"
                                   style="color: #e73636 !important;">{{__("gnl.TÜV Association")}}</a></p>
                            <p>
                                <b>{{__("gnl.The SVTI Group")}}</b>
                                – {{__("gnl.The Swiss competence center for technical safety and risk management.")}}
                            </p>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright-content ">
                            <ul>
                                <li>
                                    <a href="/{{__("link.gizlilik")}}">{{__("gnl.Gizlilik")}}</a>
                                </li>
                                <li>
                                    <div class="copyright-text text-center">
                                        &copy; {{date("Y")}} {{Config::get("solaris.site.name")}}<a
                                            href="#"
                                            target="_blank"
                                            rel="noopener"> </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- end: Body Inner -->

<div id="cookieNotify" class="modal-strip cookie-notify background-dark" data-delay="1000" data-expire="1"
     data-cookie-name="cookiebar2020_1" data-cookie-enabled="true">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 sm-m-b-10 m-t-5">
                {{__("gnl.Ziyaretiniz sırasında kişisel verileriniz siteyi kullanımınızı analiz etmek amacıyla çerezler aracılığıyla işlenmektedir. Daha fazla bilgi için")}}
                <a href="/{{__("link.gizlilik")}}"> {{__("gnl.Gizlilik Politikamızı")}} </a>{{__("gnl.okuyabilirsiniz.")}}
            </div>
            <div class="col-lg-4 text-right sm-text-center sm-center">

                <button type="button" class="btn btn-rounded btn-light btn-sm modal-confirm"
                        style="font-size:12px;font-weight:normal;text-transform: none">
                    {{Config::get("solaris.site.cookiebutton")}}
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Scroll top -->
<a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
<!--Plugins-->

<script src="/assetWeb/polo/js/plugins.js"></script>

<!--Template functions-->
<script src="/assetWeb/polo/js/functions.js"></script>

<!--Template functions-->
<script src="/js/solaris.js"></script>
<script>
    $("#current-image").click(function() {
        console.log('sdfg');
        $("#current-image").toggleClass("lines-images");
        $(this).toggleClass('current-image').siblings().removeClass('current-image');

    });
</script>
</body>

</html><?php ob_end_flush();?>
