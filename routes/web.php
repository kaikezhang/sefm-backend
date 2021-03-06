<?php
use Illuminate\Http\Request;
use App\Events\TeacheBroadcastNewData;
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
    return view('welcome');
});

Route::post('/broadcast/{classroom}', function ($classroom, Request $request){
    $data = $request->input('data');
    event(new TeacheBroadcastNewData($classroom, $data));
    return response('OK');
});
