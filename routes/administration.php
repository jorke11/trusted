<?php

use App\Models;

Route::resource('/parameter', 'Administration\ParametersController');
Route::resource('/customer', 'Administration\CustomerController');

Route::get('/api/listParameter', function() {
    return Datatables::queryBuilder(
                    DB::table('parameters')->orderBy("id", "asc")
            )->make(true);
});


Route::resource('/city', 'Administration\CityController');
Route::get('/api/listCity', function() {
    $query = DB::table("vcities");
    return Datatables::queryBuilder($query)->make(true);
});


Route::resource('/department', 'Administration\DepartmentController');
Route::get('/api/listDepartment', function() {
    return Datatables::eloquent(Models\Administration\Department::query())->make(true);
});

Route::resource('/clients', 'Administration\ClientController');
Route::get('/api/listClient', function() {

    $query = DB::table('vclient');

//    if (Auth::user()->role_id != 1) {
//        $query->where("responsible_id", Auth::user()->id);
//    }
    
    return Datatables::queryBuilder($query)->make(true);
});



Route::get('/api/getDepartment', 'Administration\SeekController@getDepartment');
Route::get('/api/getSupplier', 'Administration\SeekController@getSupplier');
Route::get('/api/getStakeholder', 'Administration\SeekController@getStakeholder');
Route::get('/api/getCharacteristic', 'Administration\SeekController@getCharacteristic');
Route::get('/api/getClient', 'Administration\SeekController@getClient');
Route::get('/api/getContact', 'Administration\SeekController@getContact');
Route::get('/api/getWarehouse', 'Administration\SeekController@getWarehouse');
Route::get('/api/getWarehouseProduct', 'Administration\SeekController@getWarehouseProduct');
Route::get('/api/getResponsable', 'Administration\SeekController@getResponsable');
Route::get('/api/getProduct', 'Administration\SeekController@getProduct');
Route::get('/api/getProductTransfer', 'Administration\SeekController@getProductTransfer');
Route::get('/api/getService', 'Administration\SeekController@getServices');
Route::get('/api/getCategory', 'Administration\SeekController@getCategory');
Route::get('/api/getNotification', 'Administration\SeekController@getNotification');
Route::get('/api/getCommercial', 'Administration\SeekController@getCommercial');
Route::get('/api/getBranch', 'Administration\SeekController@getBranch');
Route::get('/api/getAccount', 'Administration\SeekController@getAccount');
Route::get('/api/getCity', 'Administration\SeekController@getCity');