<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::user()){

        $role =Auth::user()->role;
        if($role =='Admin'){
            $events = DB::table('events')->select('id','title','from','To','date','time','price','vehicle_type','DriverName','DriverId','status')
            ->get();
            return view('admin.dashboard.dashboard',['events'=>$events]);
        

        }
        if($role=='Driver')
        {
            $login = Auth::user()->loginauth;

           if($login == 0)
           {
            Auth::logout();
           
            return redirect()->route('logout')->with('message', 'Driver Account Not Verified By Admin!');


            }


           if($login == 1) 
            {
            $uid = Auth::user()->id;
            $events = DB::table('events')->select('id','title','from','date','To','time','vehicle_type','DriverId','status')
            
            ->where('DriverID','=',"$uid")
            ->get();
            return view('driver.dashboard.dashboard',['events'=>$events]);
            }
           
       

        }
        if($role=='Passenger'){

            
            $events = DB::table('events')->select('id','title','from','To','date','time','DriverName','DriverId','status','price')
            ->where('status','=',1)
            ->get();
            return view('dashboard',['events'=>$events]);

           
        }

    
       
    }
}
    
    public function login()

    {
        return view('login');
    }

    public function logout(Request $request) {
        Auth::logout();
        $events = DB::table('events')->select('id','title','from','To','date','time','DriverName','DriverId','vehicle_type','price','status')
            ->where('status','=',1)
            ->get();
            return view('welcome',['events'=>$events]);
        
    }

    public function home(){
        $events = DB::table('events')->select('id','title','from','To','date','time','price','DriverName','DriverId','status')
        ->where('status','=',1)
        ->get();
        return view('dashboard',['events'=>$events]);

        
    }

}

