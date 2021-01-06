<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NhanSuController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\TheLoaiController;
use App\Http\Controllers\CTSPController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//---------------USER-----------------------//
Route::get('/',[UserController::class, 'Index']);
Route::get('search',[UserController::class, 'Search']);
Route::get('shop',[UserController::class, 'Shop']);
Route::get('product',[UserController::class, 'Product_DeTail']);

Route::get('blog_page',[UserController::class, 'Blog']);
Route::get('single_blog',[UserController::class, 'Single_Blog']);

Route::get('about',[UserController::class, 'About']);
Route::get('contact_us',[UserController::class, 'Contact_Us']);
Route::post('contact_us',[UserController::class, 'PostContact_Us']);
Route::get('contact_me',[UserController::class, 'Contact_Me']);

Route::get('cart_page',[UserController::class, 'Cart'])->middleware('Userlogin');
Route::post('cart_page',[UserController::class, 'PostCart'])->middleware('Userlogin');
Route::get('checkout_page',[UserController::class, 'CheckOut'])->middleware('Userlogin');


Route::get('login',[UserController::class, 'Login']);
Route::post('login',[UserController::class, 'PostLogin']);
Route::get('logout',[UserController::class, 'Logout']);

Route::get('register',[UserController::class, 'Register']);
Route::post('register',[UserController::class, 'PostRegister']);


//---------------ADMIN-----------------------//
Route::get('admin/dangnhap',[NhanSuController::class, 'getDangNhap']);
Route::post('admin/dangnhap',[NhanSuController::class, 'postDangNhap']);
Route::get('admin/dangxuat',[NhanSuController::class, 'getDangXuat']);

Route::group(['prefix'=>'admin','middleware'=>'adminlogin'], function(){
    Route::get('/{id}', [NhanSuController::class, 'getDoi']);
    Route::post('/{id}', [NhanSuController::class, 'postDoi']);

    Route::group(['prefix'=>'sanpham'], function(){
        Route::get('danhsach', [SanPhamController::class, 'getDanhSach']);

        Route::get('them', [SanPhamController::class, 'getThem']);
        Route::post('them', [SanPhamController::class, 'postThem']);

        Route::get('sua', [SanPhamController::class, 'getSua']);
        Route::post('sua', [SanPhamController::class, 'postSua']);

        Route::get('xoa', [SanPhamController::class, 'getXoa']);
		Route::get('khoiphuc', [SanPhamController::class, 'getKhoiPhuc']);
    });

    Route::group(['prefix'=>'ct_sp'], function(){
        Route::get('danhsach', [CTSPController::class, 'getCTSP']);

        Route::get('them', [CTSPController::class, 'getThem']);
        Route::post('them', [CTSPController::class, 'postThem']);

        Route::get('sua', [CTSPController::class, 'getSua']);
        Route::post('sua', [CTSPController::class, 'postSua']);

        Route::get('xoa', [CTSPController::class, 'getXoa']);
    });

    Route::group(['prefix'=>'theloai'], function(){
        Route::get('danhsach', 'TheLoaiController@getDanhSach');

        Route::get('them', 'TheLoaiController@getThem');
        Route::post('them', 'TheLoaiController@postThem');

        Route::get('sua', 'TheLoaiController@getSua');
        Route::post('sua', 'TheLoaiController@postSua');

        Route::get('xoa', 'TheLoaiController@getXoa');
    });

    Route::group(['prefix'=>'nhanvien'], function(){
        Route::get('danhsach', 'NhanSuController@getDanhSach');

        Route::get('them', 'NhanSuController@getThem');
        Route::post('them', 'NhanSuController@postThem');

        Route::get('sua', 'NhanSuController@getSua');
        Route::post('sua', 'NhanSuController@postSua');

        Route::get('xoa', 'NhanSuController@getXoa');
    });
    /*
    Route::group(['prefix'=>'quydinh'], function(){
        Route::get('danhsach', 'QuyDinhController@getDanhSach');

        Route::get('them', 'QuyDinhController@getThem');
        Route::post('them', 'QuyDinhController@postThem');

        Route::get('sua/{id}', 'QuyDinhController@getSua');
        Route::post('sua/{id}', 'QuyDinhController@postSua');

        Route::get('xoa/{id}', 'QuyDinhController@getXoa');
    });
    
    Route::group(['prefix'=>'taichinh'], function(){
        Route::get('phieumuon', 'TaichinhController@getPhieuMuon');
        Route::get('phieutra', 'TaichinhController@getPhieuTra');
        Route::get('doanhthu', 'TaichinhController@getDoanhThu');
        Route::get('doanhthu/{filler}', 'TaiChinhController@getFiller');
    });

    Route::group(['prefix'=> 'ajax'], function(){
        Route::get('muonsach/{idMuonSach}', 'AjaxController@getChiTietMuonSach');
        Route::get('trasach/{idTraSach}', 'AjaxController@getChiTietTraSach');
    });*/
});
