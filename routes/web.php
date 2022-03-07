<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\DrivreportController;
use App\Http\Controllers\PsnreportController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\VehicleTypeController;

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
  
    $events = DB::table('events')->select('id','title','from','To','date','time','DriverName','DriverId','price','vehicle_type','status')
    ->where('status','=',1)
    ->get();
    return view('welcome',['events'=>$events]);
   
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    [HomeController::class,"index"];
})->name('dashboard');


Route::get('logout', [HomeController::class, 'logout'])->name('logout');

Route::get('mydashboard',[HomeController::class,"index"]);

Route::get('/driver', [HomeController::class, 'index']);



//Driver

Route::namespace('Driver')->prefix('driver')->name('driver.')->group(function(){
    Route::namespace('Auth')->group(function(){
        //login route
        Route::get('/login',[DriverController::class, 'login'])->name('login');

      //login route
      Route::get('/signup',[DriverController::class, 'signup'])->name('signup');
     
      Route::get('/driver', [HomeController::class, 'index'])->name('index');


    });
});


Route::namespace('Event')->prefix('event')->name('event.')->group(function(){
    Route::namespace('Auth')->group(function(){
        //event route

        Route::get('/create',[EventController::class, 'create'])->name('create');
        Route::get('/book/{title}/{id}', [EventController::class, 'book'])->name('book');
        Route::get('/edit/{id}', [EventController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [EventController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [EventController::class, 'destroy'])->name('delete');
        Route::get('/bookings', [EventController::class, 'bookings'])->name('bookings');
        Route::get('/myevents', [EventController::class, 'myevents'])->name('myevents');
        Route::get('/driver', [EventController::class, 'driver'])->name('driver');

    });
});

;

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::namespace('Auth')->group(function(){
        //login route
        Route::get('/login',[DriverController::class, 'login'])->name('login');
        Route::get('/index',[AdminController::class, 'index'])->name('index');
        Route::get('/event',[AdminController::class, 'event'])->name('event');
        Route::post('/addvehicle', [AdminController::class, 'addvehicle'])->name('addvehicle');
        Route::get('vehicles',[AdminController::class, 'showvehicle'])->name('vehicles');
        Route::get('/eventdelete/{id}', [AdminController::class, 'destroy'])->name('eventdelete');
        Route::get('/account',[AdminController::class, 'account'])->name('account');
        Route::get('/drivapp',[AdminController::class, 'drivapp'])->name('drivapp');
        Route::get('/accountdelete/{id}', [AdminController::class, 'userdelete'])->name('accountdelete');
        Route::post('/changerole/{id}/', [AdminController::class, 'changerole'])->name('changerole');
        Route::get('/reports', [AdminController::class, 'reports'])->name('reports');
        
        Route::post('/editvehicle/{id}', [AdminController::class, 'editvehicle'])->name('editvehicle');
        Route::get('/deletevehicle/{id}', [AdminController::class, 'vehicledelete'])->name('deletevehicle');

});
});




Route::get('/list',[EventController::class, 'show']);
Route::post('/store',[EventController::class, 'store']);
Route::get('/bookingStatus',[BookingsController::class, 'bookingStatus'])->name('bookingStatus');
Route::get('/eventStatus',[BookingsController::class, 'eventStatus'])->name('eventStatus');
Route::get('/driverStatus',[AdminController::class, 'driverStatus'])->name('driverStatus');
Route::get('/home',[HomeController::class, 'home'])->name('home');


Route::post('/reportdriver/{driver_name}/{id}',[DrivreportController::class, 'index'])->name('reportdriver');
Route::get('/psnreporting',[DrivreportController::class, 'show'])->name('psnreporting');

Route::post('/reportpsn/{psn_name}/{id}',[PsnreportController::class, 'index'])->name('reportdriver');
Route::get('/driverreporting',[PsnreportController::class, 'show'])->name('driverreporting');

Route::get('/drivreportS',[AdminController::class, 'drivreportS'])->name('drivreportS');
Route::get('/psnreportS',[AdminController::class, 'psnreportS'])->name('psnreportS');

Route::post('/askdriver/{driver_name}/{id}',[QueryController::class, 'index'])->name('askdriver');
Route::get('myquery',[QueryController::class, 'psnshow'])->name('psnshow');
Route::get('/driverquery',[QueryController::class, 'show'])->name('driverquery');
Route::post('/queryrespond/{id}',[QueryController::class, 'respond'])->name('queryrespond');

