<?php

/*
 * File Types
 *
 * 1-Category
 * 2-Post
 * 3-Banner
 * 4-Gallery
 * 5-Product
 * 6-Video Gallery
 * 7-Contact
 */
return [
    'site' => [
        "name" => "Swiss Safety Center",
        "google" => "",
        "url" => "https://swiss-safetycenter.com.tr/",
        "cookiedesc" => "Ziyaretiniz sırasında kişisel verileriniz siteyi kullanımınızı analiz etmek amacıyla çerezler
                aracılığıyla işlenmektedir. Daha fazla bilgi için Gizlilik Politikamızı okuyabilirsiniz.",
        "cookiebutton" => "Anladım, kabul ediyorum.",
        "homebutton" => "STARTSEITE"
    ],
    'modules' => [
        "solaris" => array(
            'name' => 'Solaris',
            'icon' => 'icon-Monitor-4 nav-thumbnail',
            'class' => '',),

        "categories" => array(
            'name' => 'Kategoriler',
            'icon' => 'icon-Bookmark nav-thumbnail',
            'class' => '',),


        "posts" => array(
            'name' => 'İçerikler',
            'icon' => 'icon-Newspaper nav-thumbnail',
            'class' => '',),

        "banners" => array(
            'name' => 'Banner Alanları',
            'icon' => 'icon-Coins nav-thumbnail',
            'class' => '',),

        "videogalleries" => array(
            'name' => 'Video Galeri',
            'icon' => 'icon-Video-5 nav-thumbnail',
            'class' => '',),

        "galleries" => array(
            'name' => 'Galeri',
            'icon' => 'icon-Photo nav-thumbnail',
            'class' => '',),

        /*
        "admin" => array(
            'name' => 'Yönetim',
            'icon' => 'icon-User nav-thumbnail',
            'class' => '',),
                "settings" => array(
                    'name' => 'Ayarlar',
                    'icon' => 'icon-Gear nav-thumbnail',
                    'class' => '',),
        */
        "contact" => array(
            'name' => 'İletişim',
            'icon' => 'icon-Mail nav-thumbnail',
            'class' => '',),


    ],

    'catTypes' => [
        "icerikler" => array("id" => 0, "name" => "İçerikler"),
        "galeriler" => array("id" => 2, "name" => "Galeriler"),
        "videolar" => array("id" => 3, "name" => "Videolar"),
    ],

    'catThemes' => [
        "Post",
        "About Us Post",
        "Değerlerimiz",
        "Akreditasyon",
        "Sektörler",
        "Sektörler Post",
        "Standartlar",
        "Standartlar Post",
        "Sertifikasyon Kuruluşu",
        "Sertifika Sorgulama",

    ],

    'contentThemes' => [
        "Resimli",
        "Düz Yazı",

    ],

    'galleryThemes' => [
        "Slider Yazısız",
        "Slider Yazılı",
        "Slider Yazılı ve Linkli",
    ],

    'videoThemes' => [
        "Slider Yazısız",
        "Slider Yazılı",
        "Slider Yazılı ve Linkli",
    ],

    'sex' => [
        "Slider Yazısız",
        "Slider Yazılı",
        "Slider Yazılı ve Linkli",
    ]

] ?>
