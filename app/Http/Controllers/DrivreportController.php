<?php

namespace App\Http\Controllers;

use App\Models\drivreport;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DrivreportController extends Controller
{
    public function index(Request $request){

        $evid = $request->id;
   
    $booking = DB::table('bookings')->select('id','title','date','price','driver_id','driver_name','psn_id','psn_name')
    ->where('id','=',"$evid")
    ->first();




    $driver_report = new drivreport;
    $driver_report->eventid = $booking->id;
    $driver_report->title = $request->title;
    $driver_report->driver_name = $booking->driver_name;
    $driver_report->driver_id = $booking->driver_id;
    $driver_report->psn_id = Auth::user()->id;
    $driver_report->psn_name = Auth::user()->name;
    $driver_report->date = $booking->date;
    $driver_report->desc = $request->desc;
    $driver_report->save();

    return redirect()->back()->with('message', 'Driver Reported Successfully!');

    }

    public function  show(Request $request){

        $driverreports = DB::table('drivreports')->select('id','title','eventid','desc','date','driver_id','driver_name','psn_id','status')
    ->where('psn_id','=',Auth::user()->id)
    
    ->get();   
    
    return view('drivreports',['driverreports'=>$driverreports]);

    }
    
}
