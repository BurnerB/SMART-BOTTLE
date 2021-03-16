<?php

use Illuminate\Support\Facades\Route;

Route::get('/storagelink', function () {
    Artisan::call('storage:link');
});

Route::group(['namespace' => 'Admin'], function (){

    Route::get('admin/home', 'HomeController@index')->name('admin.home');
    Route::resource('admin/post', 'PostController');
    Route::resource('admin/tag', 'TagController' );
    Route::resource('admin/wine_category', 'WineCategoryController');
    Route::resource('admin/beer_category', 'BeerCategoryController');
    Route::resource('admin/spirit_category', 'SpiritCategoryController');
    Route::resource('admin/extra_category', 'ExtraCategoryController');
    Route::resource('admin/wines', 'WineController');
    Route::resource('admin/beers', 'BeerController');
    Route::resource('admin/spirits', 'SpiritController');
    Route::resource('admin/extras', 'ExtraController');
    Route::resource('admin/user','UsersController');
    Route::resource('admin/role','RoleController');
    Route::resource('admin/permissions','PermissionController');
    Route::resource('admin/profile','Profile');
    Route::get('admin/unauthorised','HomeController@unauthorised');
    Route::resource('admin/banner','Banners');
    Route::resource('admin/service','ServiceController');
    Route::resource('admin/csd','CasestudyController');
    Route::resource('admin/offer','OffersController');
    Route::resource('admin/seo','SeoController');
    Route::resource('admin/settings','SettingsController');
    Route::resource('admin/downloads','DownloadController');
    Route::resource('admin/testimonials','ReviewController');
    Route::resource('admin/portfolios','PortfolioController');
    Route::resource('admin/members','TeamController');
    Route::get('admin/upload-images', 'DropzoneController@dropzone');
    Route::get('admin/images', 'DropzoneController@images');
    Route::post('admin/images/store', 'DropzoneController@dropzoneStore')->name('dropzone.store');
    Route::post('admin/images/delete', 'DropzoneController@dropzoneDelete')->name('dropzone.delete');



});

Route::group(['namespace' => 'User'], function(){

    Route::get('/','HomeController@home');
    Route::get('/contact_us','HomeController@contact');
    Route::get('beer/{beer}','HomeController@beer')->name('beer');
    Route::get('beers','HomeController@beers')->name('beers');
    Route::get('beers/{beer_category}','HomeController@beer_category')->name('beer_category');
    Route::get('wine/{wine}','HomeController@wine')->name('wine');
    Route::get('wines','HomeController@wines')->name('wines');
    Route::get('wines/{wine_category}','HomeController@wine_category')->name('wine_category');
    Route::get('spirit/{spirit}','HomeController@spirit')->name('spirit');
    Route::get('spirits','HomeController@spirits')->name('spirits');
    Route::get('spirits/{spirit_category}','HomeController@spirit_category')->name('spirit_category');
    Route::get('extra/{extra}','HomeController@extra')->name('extra');
    Route::get('extras','HomeController@extras')->name('extras');
    Route::get('extras/{extra_category}','HomeController@extra_category')->name('extra_category');

    Route::get('search','HomeController@search')->name('search');


});

Auth::routes();
Route::get('/home', 'admin\HomeController@index')->name('admin.home');
Route::resource('enquiry','EnquiryController');

/* Sitemap Routes*/
Route::get('/sitemap.xml', 'SitemapController@index')->name('sitemap.xml');
Route::get('/sitemap.xml/wines', 'SitemapController@wines');
Route::get('/sitemap.xml/spirits', 'SitemapController@spirits');
Route::get('/sitemap.xml/beers', 'SitemapController@beers');
Route::get('/sitemap.xml/extras', 'SitemapController@extras');





