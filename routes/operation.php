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

Route::get('api/listAuth', function() {
    return Datatables::queryBuilder(DB::table("vauthorization_person")->orderBy("id", "desc"))->make(true);
});
Route::get('api/listReception', function() {
    return Datatables::queryBuilder(DB::table("vreception_elements")->orderBy("id", "desc"))->make(true);
});

Route::get('/api/listTicket', 'Operation\TicketController@listAccess');
