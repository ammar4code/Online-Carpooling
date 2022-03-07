<?php

namespace App\Http\Controllers;
use App\Models\psnreport;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PsnreportController extends Controller
{
    public function index(Request $request){

        $evid = $request->id;
   
    $booking = DB::table('bookings')->select('id','title','date','price','driver_id','driver_name','psn_id','psn_name')
    ->where('id','=',"$evid")
    ->first();




    $driver_report = new psnreport;
    $driver_report->eventid = $booking->id;
    $driver_report->title = $request->title;
    $driver_report->driver_name =Auth::user()->name;
    $driver_report->driver_id = Auth::user()->id;
    $driver_report->psn_id =$booking->psn_id;
    $driver_report->psn_name = $booking->psn_name;
    $driver_report->date = $booking->date;
    $driver_report->desc = $request->desc;
    $driver_report->save();

    return redirect()->back()->with('message', 'Passenger Reported Successfully!');
    
    }

    public function  show(Request $request){

        $psnreports = DB::table('psnreports')->select('id','title','eventid','desc','date','driver_id','driver_name','psn_id','psn_name','status')
    ->where('driver_id','=',Auth::user()->id)
    
    ->get();   
    
    return view('driver.dashboard.psnreports',['psnreports'=>$psnreports]);

    }

}
