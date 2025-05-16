<?php

use App\Http\Controllers\AboutCon;
use App\Http\Controllers\AdminCon;
use App\Http\Controllers\BerandaCon;
use App\Http\Controllers\CartCon;
use App\Http\Controllers\CategoryCon;
use App\Http\Controllers\MemberCon;
use App\Http\Controllers\ProdukCon;
use App\Http\Controllers\ProfilCon;
use App\Http\Controllers\UserCon;
use Illuminate\Notifications\Action;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BerandaCon::class, 'index']);
Route::get('/produk', [ProdukCon::class, 'index']);
Route::get('/about', [AboutCon::class, 'index']);
Route::get('/produk/detail/{id}', [ProdukCon::class, 'detail'])->name('info-produk');

Route::middleware(['member'])->group(function(){
    Route::get('/cart', [CartCon::class, 'show']);
    Route::get('/cart/{id}', [CartCon::class, 'store'])->name('keranjang');
    Route::post('/cart/tambah/{id}', [CartCon::class, 'tambah'])->name('cart-tambah');
    Route::post('/cart/kurang/{id}', [CartCon::class, 'kurang'])->name('cart-kurang');
    Route::post('/checkout-struk', [CartCon::class, 'showStruk'])->name('checkout.struk');

});

Route::middleware(['admin'])->group(function(){
    Route::get('/administrator', [AdminCon::class, 'index']);

    Route::get('/administrator/product', [AdminCon::class, 'product']);
    Route::get('/administrator/product/create', [ProdukCon::class, 'create'])->name('product-create');
    Route::post('/administrator/product/create', [ProdukCon::class, 'store'])->name('product-store');
    Route::get('/administrator/prouct/delete/{id}', [ProdukCon::class, 'delete'])->name('product-delete');
    Route::get('/administrator/product/edit/{id}', [ProdukCon::class, 'edit'])->name('product-edit');
    Route::post('/administrator/product/edit/{id}', [ProdukCon::class, 'update'])->name('product-update');

    Route::get('/administrator/member',[AdminCon::class, 'member']);
    Route::get('/administrator/member/create', [MemberCon::class, 'create'])->name('member-create');
    Route::post('/administrator/member/create', [MemberCon::class, 'store'])->name('member-store');
    Route::get('/administrator/member/edit{id}', [MemberCon::class, 'edit'])->name('member-edit');
    Route::post('/administrator/member/edit{id}', [MemberCon::class, 'update'])->name('member-update');
    Route::get('/administrator/member/delete{id}', [MemberCon::class, 'delete'])->name('member-delete');


    Route::get('/administrator/kategori', [AdminCon::class, 'kategori']);
    Route::post('/administrator/kategori', [CategoryCon::class, 'store'])->name('kategori-store');
    Route::get('/administrator/kategori/{id}', [CategoryCon::class, 'edit'])->name('kategori-edit');
    Route::post('/administrator/kategori/{id}', [CategoryCon::class, 'update'])->name('kategori-update');
    Route::get('/administrator/kategori/delete/{id}', [CategoryCon::class, 'delete'])->name('kategori-delete');


});

Route::get('/profil', [ProfilCon::class, 'profil'])->name('info-profil');
Route::post('/profil', [ProfilCon::class, 'update'])->name('update-profil');
Route::get('/administrator/login', [UserCon::class, 'index'])->name('admin.login');
Route::post('/administrator/auth', [UserCon::class, 'auth'])->name('admin.auth');
Route::get('/member/login', [UserCon::class, 'member'])->name('member.login');
Route::post('/member/auth', [UserCon::class, 'authmember'])->name('member.auth');
Route::get('/administrator/logout', [UserCon::class, 'logout'])->name('admin.logout');
