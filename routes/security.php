<?php

Route::get('/api/listUser', function() {
    return Datatables::queryBuilder(DB::table("vusers"))->make(true);
});
Route::post('/user/uploadExcel', 'Security\UserController@storeExcel');
Route::put('/user', 'Security\UserController@store');
Route::resource('/user', 'Security\UserController');
Route::get('/user/getListPermission/{id}', 'Security\UserController@getPermission');
Route::put('/user/savePermission/{id}', 'Security\UserController@savePermission');