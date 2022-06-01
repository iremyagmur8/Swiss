<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;




Route::get('/',[HomepageController::class,'index'])->name('index');
Route::get('/lang/{lang}',[HomepageController::class,'clocal'])->name('clocal');

Route::get('/kurulus-bilgi-formu/{id}.htm',[HomepageController::class,'infoForm'])->name('infoForm');

Route::post('/iletisim',[HomepageController::class,'sendcontact'])->name('contact');
Route::get('/iletisim',[HomepageController::class,'contact'])->name('contact');
Route::get('/hakkimizda',[HomepageController::class,'aboutUs'])->name('aboutUs');
Route::get('/hakkimizda/{title}/{id}',[HomepageController::class,'post'])->name('post');
Route::get('/sertifikasyon',[HomepageController::class,'certification'])->name('certification');
Route::get('/sertifikasyon/sertifikasyon-kurulusu/sertifikasyon-sureci/{id}.htm',[HomepageController::class,'infoForm'])->name('infoForm');
Route::get('/sertifikasyon/{title}/{id}.htm',[HomepageController::class,'post'])->name('post');
Route::get('/sertifikasyon/{title1}/{title2}/{id}.htm',[HomepageController::class,'post'])->name('post');
Route::get('/is-ve-kariyer',[HomepageController::class,'workAndCareer'])->name('workAndCareer');
Route::get('/is-ve-kariyer/davranis-kurallarimiz/{id}.htm',[HomepageController::class,'wc_Rules'])->name('wc_Rules');
Route::get('/is-ve-kariyer/degerlerimiz/{id}.htm',[HomepageController::class,'wc_Values'])->name('wc_Values');

Route::get('/genel-sartlar-ve-kosullar',[HomepageController::class,'genelSart'])->name('genelSart');
Route::get('{title1}/iletisim/{id}.htm',[HomepageController::class,'contact'])->name('contact');
Route::get('/gizlilik',[HomepageController::class,'dataProtection'])->name('dataProtection');
Route::get('/haberler',[HomepageController::class,'news'])->name('news');
Route::get('/haberler/{title}/{id}.html',[HomepageController::class,'newsDetail'])->name('newsDetail');

Route::get('{title1}/{title2}/{title3}/{title4}/{id}.htm',[HomepageController::class,'subcategory'])->name('subcategory');
Route::get('{title}/{id}.htm',[HomepageController::class,'post'])->name('post');

require __DIR__.'/auth.php';
require __DIR__.'/solaris.php';
