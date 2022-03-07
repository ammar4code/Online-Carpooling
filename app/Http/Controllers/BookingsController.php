<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
   public function book(Request $request){
  
    
       
   }

public function bookingStatus(Request $request)
{
   $bookings = Booking::find($request->booking_id);
   $bookings->status = $request->status;
   $bookings->save();

   return response()->json(['success'=>'Status change successfully.']);
}


public function eventStatus(Request $request)
{
   $events = Event::find($request->event_id);
   $events->status = $request->status;
   $events->save();

   return response()->json(['success'=>'Status change successfully.']);
}

}
