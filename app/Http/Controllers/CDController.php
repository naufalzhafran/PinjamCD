<?php

namespace App\Http\Controllers;

use App\CD;
use Illuminate\Http\Request;

class CDController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware("adminLogin");
    }

    public function index()
    {
     
     $cds = CD::all();

     return response()->json($cds);

    }

    public function create(Request $request)
     {
        $cd = new CD;

       $cd->title= $request->title;
       $cd->rate = $request->rate;
       $cd->category= $request->category;
       $cd->quantity= $request->quantity;
       
       $cd->save();

       return response()->json($cd);
     }

     public function show($id)
     {
        $cd = CD::find($id);

        return response()->json($cd);
     }

     public function update(Request $request, $id)
     { 
        $cd= CD::find($id);
        
        $cd->title = $request->title;
        $cd->rate = $request->rate;
        $cd->category = $request->category;
        $cd->quantity = $request->quantity;
        $cd->save();
        return response()->json($cd);
     }

     public function destroy($id)
     {
        $cd = CD::find($id);
        $cd->delete();

         return response()->json('cd removed successfully');
     }
    //
}
