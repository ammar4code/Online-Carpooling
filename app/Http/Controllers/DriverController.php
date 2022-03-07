<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;


class DriverController extends Controller
{

    public function index(){


         $uid = Auth::user()->id;
            $events = DB::table('events')->select('id','title','from','To','time','date','vehicle_type','DriverId','status')
            
            ->where('DriverID','=',"$uid")
            ->get();
            return view('driver.dashboard.dashboard',['events'=>$events]);
    }

    public function login()
    {
        return view('driver.auth.login');
    }
    public function signup()
    {
        return view('driver.auth.register');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
   

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
