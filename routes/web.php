<?php
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

Route::get('/', function () {
    return redirect(route('placements'));
})->name('home');

Route::get('admin', function () {
    return redirect(route('users'));
})->name('admin');


Auth::routes();

Route::middleware('auth', 'guard.user', 'guard.pages')->group(function () {

    Route::prefix('placements')->group(function () {

        Route::get('', 'Placement@gets')->name('placements');

        Route::get('get/{id}', 'Placement@get')->name('edit-placement');

        Route::get('form-create', 'Placement@formCreate')->name('form-create-placement');

        Route::post('create', 'Placement@create')->name('create-placement');

        Route::put('update', 'Placement@update')->name('update-placement');

        Route::get('delete/{id}', 'Placement@delete')->name('delete-placement');

        Route::get('search', 'Placement@search');

        Route::get('form-create-type', 'PlacementType@gets')->name('form-create-type');

        Route::post('create-type', 'PlacementType@create')->name('create-type');

        Route::get('delete-type/{id}', 'PlacementType@delete')->name('delete-type');

        Route::get('info/{id}', 'Placement@info')->name('info-placement');

    });

    Route::prefix('tour-operators')->group(function () {

        Route::get('', 'TourOperator@gets')->name('tour-operators');

        Route::get('get/{id}', 'TourOperator@get')->name('edit-tour-operator');

        Route::get('form-create', 'TourOperator@formCreate')->name('form-create-tour-operator');

        Route::post('create', 'TourOperator@create')->name('create-tour-operator');

        Route::put('update', 'TourOperator@update')->name('update-tour-operator');

        Route::get('delete/{id}', 'TourOperator@delete')->name('delete-tour-operator');

        Route::get('search', 'TourOperator@search');

        Route::get('info/{id}', 'TourOperator@info')->name('info-tour-operator');

    });

    Route::prefix('loyal-sponsors')->group(function () {

        Route::get('', 'LoyalSponsor@gets')->name('loyal-sponsors');

        Route::get('get/{id}', 'LoyalSponsor@get')->name('edit-loyal-sponsor');

        Route::get('form-create', 'LoyalSponsor@formCreate')->name('form-create-loyal-sponsor');

        Route::post('create', 'LoyalSponsor@create')->name('create-loyal-sponsor');

        Route::put('update', 'LoyalSponsor@update')->name('update-loyal-sponsor');

        Route::get('delete/{id}', 'LoyalSponsor@delete')->name('delete-loyal-sponsor');

        Route::get('search', 'LoyalSponsor@search');

        Route::get('info/{id}', 'LoyalSponsor@info')->name('info-loyal-sponsor');

    });

    Route::prefix('restaurants')->group(function () {

        Route::get('', 'Restaurant@gets')->name('restaurants');

        Route::get('get/{id}', 'Restaurant@get')->name('edit-restaurant');

        Route::get('form-create', 'Restaurant@formCreate')->name('form-create-restaurant');

        Route::post('create', 'Restaurant@create')->name('create-restaurant');

        Route::put('update', 'Restaurant@update')->name('update-restaurant');

        Route::get('delete/{id}', 'Restaurant@delete')->name('delete-restaurant');

        Route::get('search', 'Restaurant@search');

        Route::get('info/{id}', 'Restaurant@info')->name('info-restaurant');

    });

    Route::prefix('guides')->group(function () {

        Route::get('', 'Guide@gets')->name('guides');

        Route::get('get/{id}', 'Guide@get')->name('edit-guide');

        Route::view('form-create', 'guide.create')->name('form-create-guide');

        Route::post('create', 'Guide@create')->name('create-guide');

        Route::put('update', 'Guide@update')->name('update-guide');

        Route::get('delete/{id}', 'Guide@delete')->name('delete-guide');

        Route::get('search', 'Guide@search');

        Route::get('info/{id}', 'Guide@info')->name('info-guide');

    });

    Route::prefix('social-entities')->group(function () {

        Route::get('form-entity-create', 'SocialEntity@formCreate')->name('form-create-entity');

        Route::post('entity-create', 'SocialEntity@create')->name('create-entity');

        Route::get('delete/{id}', 'SocialEntity@delete')->name('delete-entity');
    });

    Route::prefix('social-networks')->group(function () {

        Route::get('', 'SocialNetwork@gets')->name('social-networks');

        Route::get('form-create', 'SocialNetwork@formCreate')->name('form-create-social');

        Route::post('social-create', 'SocialNetwork@create')->name('create-social');

        Route::get('delete/{id}', 'SocialNetwork@delete')->name('delete-social');

    });
});

Route::prefix('admin')->middleware('auth', 'guard.admin')->group(function () {

    Route::prefix('users')->group(function () {

        Route::get('', 'Admin\AdminUser@users')->name('users');

        Route::get('edit/{id}', 'Admin\AdminUser@editForm')->name('form-edit-user');

        Route::put('update', 'Admin\AdminUser@update')->name('update-user');

        Route::get('reset/{id}', 'Admin\AdminUser@resetForm')->name('form-reset-password');

        Route::put('reset', 'Admin\AdminUser@reset')->name('reset-password');

        Route::get('delete/{id}', 'Admin\AdminUser@delete')->name('delete-user');
    });

    Route::prefix('roles')->group(function () {

        Route::get('', 'Admin\AdminRole@roles')->name('roles');

        Route::post('create', 'Admin\AdminRole@create')->name('create-role');

        Route::get('edit/{id}', 'Admin\AdminRole@editForm')->name('form-edit-role');

        Route::put('update', 'Admin\AdminRole@update')->name('update-role');

        Route::get('delete/{id}', 'Admin\AdminRole@delete')->name('delete-role');
    });

    Route::prefix('access')->group(function () {

        Route::get('', 'Admin\AdminAccess@index')->name('access');

        Route::post('create', 'Admin\AdminAccess@create')->name('create-access');

        Route::get('delete/{id}', 'Admin\AdminAccess@delete')->name('delete-access');
    });
});

Route::view('about', 'about.form-send')->name('about');

Route::view('read-disabled', 'read-disabled')->name('read-disabled');

Route::view('edit-disabled', 'edit-disabled')->name('edit-disabled');

Route::view('delete-disabled', 'delete-disabled')->name('delete-disabled');

Route::view('user-disabled', 'user-disabled')->name('user-disabled');

