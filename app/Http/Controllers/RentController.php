<?php

namespace App\Http\Controllers;

use App\Rent;
use App\CD;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware("login");
    }

    public function borrow(Request $request)
    {
        $rent = new Rent;

        $rent->user_id= $request->user_id;
        $rent->cd_id = $request->cd_id;
        $rent->borrow_date= Carbon::now();
        
        $rent->save();
 
        return response()->json($rent);
    }

    public function return(Request $request)
    {
        $rent = Rent::find($request->id);
        if($rent){
            $cd = CD::find($rent->cd_id);
            $rent->return_date = Carbon::now();
            $day_diff = Carbon::parse(Carbon::now())->diffInDays($rent->borrow_date);
    
            $res = $cd->rate * $day_diff;
            $rent->save();
            return response($res,200);
        }else{
            $res = "Your rent ID is not found";
            return response($res,404);
        }

        

    }
}
