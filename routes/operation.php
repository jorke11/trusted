<?php

Route::resource('ticket', 'Operation\TicketController');
Route::get('ticket/{id}/getUsers', 'Operation\TicketController@getUsersDependency');
Route::put('ticket/associate/{id}', 'Operation\TicketController@associate');
Route::put('ticket/pause/{id}', 'Operation\TicketController@pause');
Route::put('ticket/close/{id}', 'Operation\TicketController@close');
Route::post('ticket/addComment', 'Operation\TicketController@addComment');


Route::resource('accessPerson', 'Operation\AccessController');
Route::post('accessPerson/addParameter', 'Administration\ParametersController@store');
Route::post('accessPerson/reception', 'Operation\AccessController@addElement');
Route::post('accessPerson/authorization', 'Operation\AccessController@addAuthorization');

Route::get('accessPerson/validatePerson/{document}', 'Operation\AccessController@validatePerson');
//Route::put('accessPerson/outPerson', 'Operation\AccessController@outPerson');
Route::get('/api/listAccess', 'Operation\AccessController@listAccess');

Route::resource('homeaccessPerson', 'Operation\HomeaccessController');
Route::post('homeaccessPerson/addParameter', 'Administration\ParametersController@store');
Route::post('homeaccessPerson/reception', 'Operation\HomeaccessController@addElement');
Route::post('homeaccessPerson/authorization', 'Operation\HomeccessController@addAuthorization');

Route::get('homeaccessPerson/validatePerson/{document}', 'Operation\HomeaccessController@validatePerson');
//Route::put('accessPerson/outPerson', 'Operation\AccessController@outPerson');
Route::get('/api/listAccessHome', 'Operation\HomeaccessController@listAccess');


Route::get('api/listAuth', function() {
    return Datatables::queryBuilder(DB::table("vauthorization_person")->orderBy("id", "desc"))->make(true);
});

Route::get('/api/listTicket', 'Operation\TicketController@listAccess');

Route::get('api/listReception', 'Operation\DocumentController@listElements');
Route::resource('inputDocument', 'Operation\DocumentController');
Route::get('inputDocument/getUserDependency/{id}', 'Operation\DocumentController@getUserDependency');

Route::resource('employee', 'Operation\EmployeeController');
Route::post('employee/upload', 'Operation\EmployeeController@uploadEmployee');
Route::get('api/listEmployee', 'Operation\EmployeeController@listEmployee');

Route::get('api/listEmployeeLog', 'Operation\AccessController@listEmployeeLog');

