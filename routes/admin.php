<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::group(['namespace'=>'App\Http\Controllers\Admin'],function () {

Route::get('login','AuthController@getLogin')->name('adminLogin');
Route::post('login', 'AuthController@postLogin')->name('adminLoginPost');
Route::get('logout', 'AuthController@logout')->name('adminLogout');
// Route::get('/test', ['uses' => 'AdminController@test']);

    Route::group(['middleware' => 'adminauth'], function () {
        Route::get('/', ['uses' => 'AdminController@index'])->name('admin.index');
        Route::get('/dashboard', ['uses' => 'AdminController@index'])->name('admin.dashboard');

        Route::get('/ticket', ['uses' => 'TicketsController@index'])->name('ticket.index');
        Route::get('/ticket/status/{id}', ['uses' => 'TicketsController@changeStaus'])->name('ticket.item.changeStaus');

		// Route::resource('faq', FaqsController::class);
        Route::get('/faq', ['uses' => 'FaqsController@index'])->name('faq.index');
        Route::get('/faq/item/{id?}', ['uses' => 'FaqsController@form'])->name('faq.item');
        Route::post('/faq/store', ['uses' => 'FaqsController@store'])->name('faq.store');
        Route::post('/{item}/delete', ['uses' => 'BaseController@delete']);

        Route::get('/promocode', ['uses' => 'PromoCodesController@index'])->name('promocode.index');
        Route::get('/promocode/item/{id?}', ['uses' => 'PromoCodesController@form'])->name('promocode.item');
        Route::post('/promocode/store', ['uses' => 'PromoCodesController@store'])->name('promocode.store');

        Route::get('/rateplan', ['uses' => 'RatePlansController@index'])->name('rateplan.index');
        Route::get('/rateplan/item/{id?}', ['uses' => 'RatePlansController@form'])->name('rateplan.item');
        Route::post('/rateplan/store', ['uses' => 'RatePlansController@store'])->name('rateplan.store');

        Route::get('/document', ['uses' => 'DocumentsController@index'])->name('document.index');
        Route::get('/document/item/{id?}', ['uses' => 'DocumentsController@form'])->name('document.item');
        Route::post('/document/store', ['uses' => 'DocumentsController@store'])->name('document.store');

        Route::get('/fieldcategory', ['uses' => 'FieldCategoriesController@index'])->name('fieldcategory.index');
        Route::get('/fieldcategory/item/{id?}', ['uses' => 'FieldCategoriesController@form'])->name('fieldcategory.item');
        Route::post('/fieldcategory/store', ['uses' => 'FieldCategoriesController@store'])->name('fieldcategory.store');

        Route::get('/fieldtemplate/item/{id?}', ['uses' => 'FieldTemplatesController@form'])->name('fieldtemplate.item');
        Route::get('/fieldtemplate/{cat?}', ['uses' => 'FieldTemplatesController@index'])->name('fieldtemplate.index');
        Route::post('/fieldtemplate/store', ['uses' => 'FieldTemplatesController@store'])->name('fieldtemplate.store');

        Route::get('/settings', ['uses' => 'SettingsController@index'])->name('setting.index');
        Route::post('/settings', ['uses' => 'SettingsController@store'])->name('setting.store');

        Route::get('/subscribe', ['uses' => 'SubscribeController@index'])->name('subscribe.index');
        Route::get('/subscribe/{id}', ['uses' => 'SubscribeController@form'])->name('subscribe.item');
        Route::post('/addDoctorForm', ['uses' => 'SubscribeController@addDoctorForm'])->name('subscribe.doctor.form');
        Route::post('/subscribe/store/docCount', ['uses' => 'SubscribeController@storeDocCount'])->name('subscribe.doctor.count.store');
        Route::post('/subscribe/users', ['uses' => 'SubscribeController@getUsersForm'])->name('subscribe.users.list');
        Route::post('/subscribe/users/store', ['uses' => 'SubscribeController@saveUsersForm'])->name('subscribe.users.store');
        Route::post('/subscribe/quota', ['uses' => 'SubscribeController@getQuotaForm'])->name('subscribe.quota.view');
        Route::post('/subscribe/quota/store', ['uses' => 'SubscribeController@saveSizeForm'])->name('subscribe.size.store');

        Route::get('/sub/payments/{id}', ['uses' => 'SubscribeController@getPayments'])->name('subscribe.payments');

        Route::get('/videoinstruction', ['uses' => 'VideoInstructionController@index'])->name('videoinstruction.index');
        Route::get('/videoinstruction/item/{id?}', ['uses' => 'VideoInstructionController@form'])->name('videoinstruction.item');
        Route::post('/videoinstruction/store', ['uses' => 'VideoInstructionController@store'])->name('videoinstruction.store');
    });
});
