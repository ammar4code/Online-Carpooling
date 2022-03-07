<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Booking;
use App\Models\User;
use App\Models\drivreport;
use App\Models\VehicleType;
use App\Models\psnreport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login()
    {
        return view('driver.auth.login');
    }

    public function index()
    {
        $events = DB::table('events')->select('id','title','from','To','date','time','vehicle_type','DriverName','DriverId','status')->get();
        return view('admin.dashboard.dashboard',['events'=>$events]);

    }


    public function drivapp()
    {
        $accounts = DB::table('users')->select('id','name','email','loginauth')
        ->where('loginauth','=',0)
        ->get();
        return view('admin.dashboard.driverapl',['accounts'=>$accounts]);
 
    }
    

    public function account()
    {
        $accounts = DB::table('users')->select('id','name','email','role','loginauth')
        ->where('role','!=',"Admin")
        ->get();
        return view('admin.dashboard.users',['accounts'=>$accounts]);
 
    }

    public function driverStatus(Request $request)
    {
        $sdriver = User::find($request->user_id);
        $sdriver->loginauth = $request->loginauth;
        $sdriver->save();
    
       return response()->json(['success'=>'Status change successfully.']);

       return redirect()->back()->with('message', 'Driver Status Changed Successfully!');

    }

    public function destroy(Request $request)
    {
     $evid = $request->id;
     DB::delete('delete from events where id = ?',[$evid]);
     
 
    
     $events = DB::table('events')->select('id','title','from','To','date','time','vehicle_type','status','DriverName','DriverId')->get();
     return redirect()->route('admin.index')->with('message', 'Event Deleted Successfully!');
    
 
 
 }

 public function userdelete(Request $request)
 {
  $uid = $request->id;
  DB::delete('delete from users where id = ?',[$uid]);
  
  return redirect()->route('admin.account')->with('message', 'User Deleted Successfully!');
}

public function vehicledelete(Request $request)
 {
  $uid = $request->id;

  DB::delete('delete from vehicle_types where id = ?',[$uid]);
  
  return redirect()->route('admin.vehicles')->with('message', 'Vehicle Deleted Successfully!');
}


public function changerole(Request $request)
{
    $id = $request->id;
    

    $user = User::find($id);
    $user->role = $request->changerole;
    $user->save();
   
    $accounts = DB::table('users')->select('id','name','email','role','loginauth')
    ->where('role','!=',"Admin")
    ->get();
    return view('admin.dashboard.users',['accounts'=>$accounts]);
}

public function reports(Request $request)
{

    $driverreports = DB::table('drivreports')->select('id','title','desc','driver_name','psn_name','eventid','date','status')
    ->get();

    $psnreports = DB::table('psnreports')->select('id','title','desc','driver_name','psn_name','eventid','date','status')
    ->get();

    return view('admin.dashboard.reports',['driverreports'=>$driverreports, 'psnreports'=>$psnreports]); 
    


}

public function drivreportS(Request $request)
{
    $driverreport = drivreport::find($request->id);
    $driverreport->status = $request->status;
    $driverreport->save();

   return response()->json(['success'=>'Status change successfully.']);
}
    
public function psnreportS(Request $request)
    {
        $psnreport = psnreport::find($request->id);
        $psnreport->status = $request->status;
        $psnreport->save();
    
       return response()->json(['success'=>'Status change successfully.']);
    }


public function addvehicle(Request $request){
    $vehicle = new VehicleType;
    $vehicle->vehicle_type = $request->vehicle_type;
    $vehicle->save();

  return redirect()->route('admin.vehicles')->with('message', 'Vehicle Type Added Successfully!');
   
}

public function showvehicle(Request $request)
{
    
    $vehicles = DB::table('vehicle_types')->select('id','vehicle_type')->get();
    return view ('admin.dashboard.vehicles',['vehicles'=>$vehicles]);
}

public function editvehicle(Request $request)
{
    $id = $request->id;

    $vehicle = VehicleType::find($id);
    $vehicle->vehicle_type = $request->editveh;

    $vehicle->save();

    $vehicles = DB::table('vehicle_types')->select('id','vehicle_type')->get();

    return redirect()->route('admin.vehicles')->with('message', 'Vehicle Type Edited Successfully!');
}



}   

