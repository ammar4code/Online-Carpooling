<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function create()
    {

        if (Auth::user()){

            $role =Auth::user()->role;
          
            if($role=='Driver' ){

                $vehicles = DB::table('vehicle_types')->select('id','vehicle_type')->get();
                return view('driver/dashboard/create',['vehicles'=>$vehicles]);
    
            }
       
    
           
        }else{
            return view('welcome');        
        }
        

      
        
    }

    public function store(Request $request)
    {
     
        $event = new Event;
        $event->title = $request->title;
        $event->from = $request->from;
        $event->To = $request->To;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->price = $request->price;
        $event->vehicle_type = $request->vehicle_type;
        $event->DriverName = $request->DriverName;
        $event->DriverId = $request->DriverId;
       
        $event->save();

        return redirect()->back()->with('message', 'Event Created Successfully!');
    }
    public function show()
    {
        
        $events = DB::table('events')->select('id','title','from','To','time','vehicle_type','DriverName','DriverId','status')->get();
        return view('driver.dashboard.dashboard',['events'=>$events]);


} 

public function driver(){


    $uid = Auth::user()->id;
       $events = DB::table('events')->select('id','title','from','To','time','vehicle_type','DriverId','status')
       
       ->where('DriverID','=',"$uid")
       ->get();
       return view('driver.dashboard.dashboard',['events'=>$events]);
}


public function edit(Request $request)
{    
    $evid = $request->id;
    
    $vehicles = DB::table('vehicle_types')->select('id','vehicle_type')->get();
    
    $events = DB::table('events')->select('id','title','from','date','To','time','price','vehicle_type','DriverName','DriverId','status')
    ->where('id','=',"$evid")
    ->first();
    return view('driver.dashboard.edit',['events'=>$events],['vehicles'=>$vehicles]);
    

   
}

public function book(Request $request){
    $evid = $request->id;
   
    $event = DB::table('events')->select('id','title','from','To','date','price','time','DriverName','vehicle_type','DriverId')
    ->where('id','=',"$evid")
    ->first();




    $booking = new Booking;
    $booking->title = $event->title;
    $booking->driver_name = $event->DriverName;
    $booking->driver_id = $event->DriverId;
    $booking->psn_id = Auth::user()->id;
    $booking->psn_name = Auth::user()->name;
    $booking->from = $event->from;
    $booking->To = $event->To;
    $booking->time = $event->time;
    $booking->date = $event->date;
    $booking->price = $event->price;
    $booking->save();

    $bookings = DB::table('bookings')->select('id','title','from','To','price','date','time','driver_id','driver_name','psn_id','status')
    ->where('psn_id','=',Auth::user()->id)
    
    ->get();   
  return redirect()->route('event.myevents')->with('message', 'Booking Processed Successfully!');
    
    
    
   }


   public function myevents(Request $request)
   {
     $bookings = DB::table('bookings')->select('id','title','from','To','price','date','time','driver_id','driver_name','psn_id','status')
    ->where('psn_id','=',Auth::user()->id)    
    ->get();   
    
    return view('mybooking',['bookings'=>$bookings]);  
   }


   public function update(Request $request){
   
    $id = $request->id;

    $event = Event::find($id);
    $event->title = $request->title;
    $event->from = $request->from;
    $event->To = $request->To;
    $event->date = $request->date;
    $event->time = $request->time;
    $event->price = $request->price;
    $event->vehicle_type = $request->vehicle_type;
   
   
    $event->save();
    $evid = $request->id;
   
    return redirect()->route('event.driver')->with('message', 'Event Edited Successfully!');

   }


   public function destroy(Request $request)
   {
    $evid = $request->id;
    DB::delete('delete from events where id = ?',[$evid]);
    

   
    $events = DB::table('events')->select('id','title','from','To','time','vehicle_type','DriverName','DriverId','status')->get();
    return view('driver.dashboard.dashboard',['events'=>$events]);


}

    public function bookings()
    {
        $bookings = DB::table('bookings')->select('id','title','from','To','date','time','price','driver_id','driver_name','psn_name','psn_id','status')
        ->where('driver_id','=',Auth::user()->id)->get();   
        
        return view('driver.dashboard.bookings',['bookings'=>$bookings]);
        
       
    }

}