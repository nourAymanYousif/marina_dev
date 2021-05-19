<?php

namespace App\Http\Controllers;

use App\Models\Boats;
use App\Models\Clients;
use App\Models\Invoices;
use App\Models\Packages;
use Illuminate\Http\Request;
use App\Traits\Uploads;

class BoatsController extends Controller
{
    use Uploads;
    public function showCreateBoat(){

        $clients = Clients::all();
        $packages = Packages::all();

        return view('marina_front.boats.create_boat',compact('clients','packages'));

    }

    public function createBoat(Request $request){

        $names =  json_encode($this->multipleUploads($request,'images','boats'));

        $boat = Boats::create([
            'name' => $request->name,
            'length' => $request->length,
            'color' => $request->color,
            'images' => $names,
            'user_id' => \Auth::user()->id,
            'client_id' =>$request->user_id ,
            'package_id' => $request->package_id,
        ]);

        return view('home');
    }

    public function showCreatePackage(){



        return view('marina_front.packages.create_package');

    }

    public function index(){

//        dd('test');
        $boats = Boats::all();


        $payment_array = [];

        foreach($boats as $boat){

            $payment_array[$boat->id] = ['paid'=>Invoices::where('is_paid',1)->count(),'not_paid' =>Invoices::where('is_paid',0)->count()];

        }

        return view('marina_front.boats.index',compact('boats','payment_array'));
    }

    public function edit($boat_id = null){

      $clients = Clients::all();
      $packages = Packages::all();
      $boat = [];
      if($boat_id != null){
          $boat = Boats::find($boat_id);
      }

      return view('marina_front.boats.edit_boat',compact('boat','clients','packages'));

    }


    public function update(Request $request){

     
        $boat= Boats:: find($request->boat_id);
        if(!$boat){
            return redirect()->back()->with('failUpdateMsg','The requested <strong>boat Updated</strong> successfully');
        }else{

//dd('test');
if($request-> images != null){
    $names =  json_encode($this->multipleUploads($request,'images','boats'));

            $boat-> update([
                'name' => $request->name,
                'length' => $request->length,
                'color' => $request->color,
                'images' => $names,

                'package_id' => $request->package_id,
            ]);
            return redirect()->route('list_boat')->with('successupdateMsg','The requested <strong>boat Updated</strong> successfully');

        }else{
            $boat-> update([
                'name' => $request->name,
                'length' => $request->length,
                'color' => $request->color,
                'package_id' => $request->package_id,
            ]);
            return redirect()->route('list_boat')->with('successupdateMsg','The requested <strong>boat Updated</strong> successfully');


        }
  
  
      }}
  

public function delete($boat_id = null){


    if($boat_id != null ){

        $boat = Boats::find($boat_id);
        $boat->delete();
        return redirect()->back()->with('successDeleteMsg','The requested <strong>boat deleted</strong> successfully');
    }
    
  }


  
}