<?php

Route::resource('ticket', 'Operation\TicketController');
Route::get('ticket/{id}/getUsers', 'Operation\TicketController@getUsersDependency');
Route::put('ticket/associate/{id}', 'Operation\TicketController@associate');
Route::post('ticket/addComment', 'Operation\TicketController@addComment');


Route::resource('accessPerson', 'Operation\AccessController');

Route::get('accessPerson/validatePerson/{document}', 'Operation\AccessController@validatePerson');
//Route::put('accessPerson/outPerson', 'Operation\AccessController@outPerson');
Route::get('/api/listAccess', function() {
    return Datatables::queryBuilder(DB::table("vaccess_person")->orderBy("id", "desc"))->make(true);
});

Route::get('/api/listTicket', function() {


    $query = DB::table('vticket');

    if (Auth::user()->chief_area_id != 0) {
        $query = $query->where("dependency_id", Auth::user()->chief_area_id);
    }

    return Datatables::queryBuilder($query)->make(true);
});
