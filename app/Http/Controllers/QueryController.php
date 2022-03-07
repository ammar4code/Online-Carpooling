<?php

namespace App\Http\Controllers;
use App\Models\query;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function index(Request $request)
    {
        $evid = $request->id;
   
        $booking = DB::table('bookings')->select('id','title','date','price','driver_id','driver_name','psn_id','psn_name')
        ->where('id','=',"$evid")
        ->first();
    
    
    
    
        $query = new query;
        $query->eventid = $booking->id;
        $query->title = $request->title;
        $query->driver_name = $booking->driver_name;
        $query->driver_id = $booking->driver_id;
        $query->psn_id = Auth::user()->id;
        $query->psn_name = Auth::user()->name;
        $query->desc = $request->desc;
        $query->save();
    
        return redirect()->back()->with('message', 'Query Proceeded Successfully!');
    
    }

    public function psnshow()
    {
        $querys =DB::table('queries')
        ->where('psn_id','=',Auth::user()->id )
        ->get();

        return view('myquery',['querys'=>$querys]);
    }

    public function show()

    {
        $querys =DB::table('queries')
        ->where('driver_id','=',Auth::user()->id )
        ->get();

        return view('driver.dashboard.queries',['querys'=>$querys]);
    }

    public function respond(Request $request)
    {
        $qid = $request->id;
        
    $query = query::find($qid);
    $query->answer = $request->answer;

    $query->save();
    
    return redirect()->back();

    
    }
}
