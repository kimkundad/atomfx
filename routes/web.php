<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::get('/', 'HomeController@index')->name('index');

Route::get('/เกี่ยวกับเรา', 'HomeController@about')->name('about');
Route::get('/ติดต่อเรา', 'HomeController@contact')->name('contact');

Route::get('/นโยบายความเป็นส่วนตัว', 'HomeController@privacy')->name('privacy');
Route::get('/ข้อตกลงและเงื่อนไข', 'HomeController@terms')->name('terms');

Route::get('/บทความ', 'HomeController@blog')->name('blog');
Route::get('/blog_detail/{id}', 'HomeController@blog_post');

Route::post('/api/add_contact', 'HomeController@add_contact')->name('add_contact');

Route::group(['middleware' => ['UserRole:manager|employee']], function() {


    Route::get('admin/dashboard', 'DashboardController@index');
    Route::get('admin/docs', 'DashboardController@docs');
    Route::post('api/post_docs', 'DashboardController@post_docs')->name('post_docs');
    Route::get('admin/pics', 'DashboardController@pics');
    Route::post('api/post_pics', 'DashboardController@post_pics')->name('post_pics');

    Route::resource('admin/blog', 'BlogController');
    Route::post('/api/upload_img', 'BlogController@upload_img')->name('home');
    Route::get('api/del_blog/{id}', 'BlogController@del_blog')->name('del_blog');

    Route::get('admin/index_b', 'BlogController@blog_index');
    
    Route::post('api/blog_status', 'BlogController@blog_status')->name('blog_status');

    Route::resource('admin/slide_show', 'SlideController');
    Route::post('api/slide_status', 'SlideController@slide_status')->name('slide_status');
    Route::get('api/del_slide/{id}', 'SlideController@del_slide')->name('del_slide');

    Route::resource('admin/service', 'ServiceController');
    Route::post('api/service_status', 'ServiceController@service_status')->name('service_status');
    Route::get('api/del_service/{id}', 'ServiceController@del_service')->name('del_service');

    Route::get('admin/setting', 'SettingController@setting')->name('setting');
    Route::post('api/post_setting', 'SettingController@post_setting')->name('post_setting');

});
