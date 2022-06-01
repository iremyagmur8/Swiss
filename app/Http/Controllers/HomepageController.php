<?php

namespace App\Http\Controllers;

use App\Models\banner;
use App\Models\category;
use App\Models\post;


use Illuminate\Http\Request;
use Image;
use File;
use Illuminate\Support\Facades\Config;
use Mail;
use Session;


class HomepageController extends Controller
{


    public function clocal()
    {
        session()->put('lang', request("lang"));
        app()->setLocale(request("lang"));

        $cData = new \ArrayObject();
        $cData->news = post::where("category_id", 17)->get();
        $cData->home = post::where("category_id", 52)->first();
        $cData->references = post::where("category_id", 18)->get();

        $banners = banner::orderBy('place')->orderBy('sort')->get();
        foreach ($banners as $key => $val) {
            $cData->place[$val->place][] = $val;
        }
        return view('home.index', ['cData' => $cData]);
        //return redirect("/");
    }

    public function index()
    {


        $cData = new \ArrayObject();
        $cData->news = post::where("category_id", 17)->get();
        $cData->home = post::where("category_id", 52)->first();

        $cData->references = post::where("category_id", 18)->get();

        $banners = banner::orderBy('place')->orderBy('sort')->get();
        foreach ($banners as $key => $val) {
            $cData->place[$val->place][] = $val;
        }
        return view('home.index', ['cData' => $cData]);
    }


    public function contact(Request $request)
    {

        $cData = new \ArrayObject();

        //6LeTU1weAAAAAF3WZQdXu8fZYKlMpAUPI8YYbxbH

        return view('home.contact', ['cData' => $cData]);


    }

    public function sendcontact(Request $request)
    {

        $cData = new \ArrayObject();
        $to_name = "Bülent Baltacı";
        $to_email = "bulent.baltaci@swiss-safetycenter.com.tr";
        $data = ["data"=>request("postform")];
        Mail::send("mails.contact", $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject("Contact Form");
            $message->from("info@swiss-safetycenter.com.tr", "swiss-safetycenter.com.tr");
        });



        //6LeTU1weAAAAAF3WZQdXu8fZYKlMpAUPI8YYbxbH
        Session::flash('message', "Mesajınız iletilmiştir.");
        Session::flash('alert-class', 'alert-success');


        return redirect("/iletisim");


    }



    public function subcategory(Request $request)
    {
        $cData = new \ArrayObject();

        $cData->posts = post::where("category_id", $request->id)->first();

        return view('home.subcategory', ['cData' => $cData]);
    }

    public function dataProtection(Request $request)
    {
        $cData = new \ArrayObject();
        $cData->posts = post::where("category_id", 61)->get();
        $banners = banner::orderBy('place')->orderBy('sort')->get();
        foreach ($banners as $key => $val) {
            $cData->place[$val->place][] = $val;
        }
        return view('home.gizlilik', ['cData' => $cData]);
    }


    public function post(Request $request)
    {

        $cData = new \ArrayObject();
        $banners = banner::orderBy('place')->orderBy('sort')->get();
        foreach ($banners as $key => $val) {
            $cData->place[$val->place][] = $val;
        }
        $cData->category = category::find(request("id"));

        $cData->posts = post::where("category_id", $request->id)->first();
        $cData->pdf = post::where("category_id", $request->id)->get();
        $cData->subcategory = category::where("parent_id", $request->id)->orderBy('sort')->get();
        if ($cData->category->theme == "About Us Post") {
            return view('home.post', ['cData' => $cData,]);
        } elseif ($cData->category->theme == "Değerlerimiz") {
            return view('home.degerlerimiz', ['cData' => $cData,]);
        } elseif ($cData->category->theme == "Akreditasyon") {
            return view('home.akreditasyon', ['cData' => $cData,]);
        } elseif ($cData->category->theme == "Sektörler") {
            return view('home.sectors', ['cData' => $cData,]);
        } elseif ($cData->category->theme == "Sektörler Post") {
            return view('home.sectorPost', ['cData' => $cData,]);
        } elseif ($cData->category->theme == "Standartlar") {
            return view('home.standarts', ['cData' => $cData,]);
        } elseif ($cData->category->theme == "Standartlar Post") {
            return view('home.standartsPost', ['cData' => $cData,]);
        } elseif ($cData->category->theme == "Sertifikasyon Kuruluşu") {
            return view('home.certificationBody', ['cData' => $cData,]);
        } elseif ($cData->category->theme == "Sertifika Sorgulama") {
            return view('home.certificaInquiry', ['cData' => $cData,]);
        } else
            return view('home.post', ['cData' => $cData,]);
    }


    public function aboutUs(Request $request)
    {

        $cData = new \ArrayObject();
        $banners = banner::orderBy('place')->orderBy('sort')->get();
        foreach ($banners as $key => $val) {
            $cData->place[$val->place][] = $val;
        }
        $cData->posts = post::where("category_id", 2)->first();
        $cData->pdf = post::where("category_id", 2)->get();
        $cData->subcategory = category::where("parent_id", 2)->orderBy('sort')->get();
        return view('home.aboutUs', ['cData' => $cData]);

    }

    public function certification(Request $request)
    {
        $cData = new \ArrayObject();
        $banners = banner::orderBy('place')->orderBy('sort')->get();
        foreach ($banners as $key => $val) {
            $cData->place[$val->place][] = $val;
        }
        $cData->posts = post::where("category_id", 3)->first();
        $cData->subcategory = category::where("parent_id", 3)->orderBy('sort')->get();
        return view('home.certification', ['cData' => $cData]);

    }


    public function infoForm(Request $request)
    {
        $cData = new \ArrayObject();
        $banners = banner::orderBy('place')->orderBy('sort')->get();
        foreach ($banners as $key => $val) {
            $cData->place[$val->place][] = $val;
        }
        $cData->posts = post::where("category_id", $request->id)->first();
        $cData->pdf = post::where("category_id", $request->id)->get();
        $cData->subcategory = category::where("parent_id", $request->id)->orderBy('sort')->get();

        return view('home.infoForm', ['cData' => $cData]);

    }
    public function wc_Rules(Request $request)
    {
        $cData = new \ArrayObject();
        $banners = banner::orderBy('place')->orderBy('sort')->get();
        foreach ($banners as $key => $val) {
            $cData->place[$val->place][] = $val;
        }
        $cData->posts = post::where("category_id", 6)->first();
        $cData->pdf = post::where("category_id", 6)->get();

        return view('home.post', ['cData' => $cData]);

    }
    public function wc_Values(Request $request)
    {
        $cData = new \ArrayObject();
        $banners = banner::orderBy('place')->orderBy('sort')->get();
        foreach ($banners as $key => $val) {
            $cData->place[$val->place][] = $val;
        }
        $cData->posts = post::where("category_id", 7)->first();
        $cData->pdf = post::where("category_id", 7)->get();

        return view('home.degerlerimiz', ['cData' => $cData]);

    }
    public function news(Request $request)
    {

        $cData = new \ArrayObject();
        $cData->posts = post::where("category_id", 17)->get();
        $cData->category = category::where("id", 17)->first();
        $banners = banner::orderBy('place')->orderBy('sort')->get();
        foreach ($banners as $key => $val) {
            $cData->place[$val->place][] = $val;
        }
        return view('home.news', ['cData' => $cData]);
    }

    public function newsDetail(Request $request)
    {

        $cData = new \ArrayObject();
        $cData->posts = post::find(request('id'));
        $cData->category = category::where("id", 17)->first();
        $banners = banner::orderBy('place')->orderBy('sort')->get();
        foreach ($banners as $key => $val) {
            $cData->place[$val->place][] = $val;
        }
        return view('home.newsDetail', ['cData' => $cData]);
    }

    public function genelSart(Request $request)
    {

        $cData = new \ArrayObject();
        $cData->posts = post::where("category_id", 14)->first();
        $cData->pdf = post::where("category_id", 14)->get();
        $banners = banner::orderBy('place')->orderBy('sort')->get();
        foreach ($banners as $key => $val) {
            $cData->place[$val->place][] = $val;
        }
        return view('home.genelSart', ['cData' => $cData]);
    }

    public function workAndCareer(Request $request)
    {

        $cData = new \ArrayObject();
        $cData->posts = post::where("category_id", 64)->get();
        $cData->subcategory = category::where("parent_id", 64)->orderBy('sort')->get();
        $banners = banner::orderBy('place')->orderBy('sort')->get();
        foreach ($banners as $key => $val) {
            $cData->place[$val->place][] = $val;
        }
        return view('home.work&career', ['cData' => $cData]);
    }
}
