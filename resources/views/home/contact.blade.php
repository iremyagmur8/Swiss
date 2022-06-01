@extends('layouts.app')
@section('title','')
@section('desc','')
@section('content')
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("contactForm").submit();
        }
    </script>
    <section class="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @isset($vars->contact)
                        <h2 class="text-capitalize">{{$vars->contact->title}}</h2>
                    @endisset
                </div>
                <div class="col-lg-12 contact m-t-50">
                    @if(Session::has('message'))
                        <div class="message">
                            <p style=" font-weight: bold"
                               class="alert {{ Session::get('alert-class') }}">{!! Session::get('message') !!}</p>
                        </div>
                    @endif

                    <h4>Bize geri bildirimde bulunmak ister misiniz?</h4>
                    <form id="contactForm" class="widget-contact-form" novalidate action="" role="form"
                          method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">İsim *</label>
                                <input type="text" aria-required="true" required name="postform[name]"
                                       class="form-control required name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Soyisim *</label>
                                <input type="email" aria-required="true" required name="postform[surname]"
                                       class="form-control required surname">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="phone">Telefon *</label>
                                <input type="tel" aria-required="true" id="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required name="postform[phone]"
                                       class="form-control required phone">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email *</label>
                                <input type="email" aria-required="true" required name="postform[email]"
                                       class="form-control required email">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="company">Şirket</label>
                                <input type="text" name="postform[company]" required
                                       class="form-control ">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="webaddress">Web Adres</label>
                                <input type="text" name="postform[web]" required
                                       class="form-control ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message">Mesaj *</label>
                            <textarea type="text" name="postform[message]" required rows="5"
                                      class="form-control required"></textarea>
                        </div>

                        <button  class="g-recaptcha btn"
                                 data-sitekey="6LeTU1weAAAAAMDKJqXhoe6dP8_iAVIToH9A84bL"
                                 data-callback='onSubmit'
                                 data-action='submit' id="form-submit"><i class="fa fa-paper-plane"></i>
                            Gönder
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
