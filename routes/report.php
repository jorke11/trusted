<?php

use App\Models;


Route::get('/reportAccess', 'Report\AccessController@index');
Route::get('/api/listReportAccess', 'Report\AccessController@listTable');
