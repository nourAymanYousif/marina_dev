<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clients;
use App\Models\Boats;
use App\Models\InvoiceLogs;
use App\Models\Invoices;
use App\Models\Packages;
use App\Models\Maintenance;
class MaintenanceController extends Controller
{
    public function index(){

        //        dd('test');
                  $maintenance = Maintenance::all();
        
               /*   foreach($maintenance as $onemaintenance){
                    $boatsOnPackage= Boats::get()->where('package_id', $package->id)->count() ;
                    $package = Arr::add($package,'boatsOnPackage' ,$boatsOnPackage);

                }*/
                    
        
                return view('marina_front.maintenance.index',compact('maintenance'));
            }


         public function showCreateMaintenance(){
            $boats = Boats::where('has_main',0)->get();

                return view('marina_front.maintenance.create_maintenance',compact('boats'));
        
            }
            
        
            public function createMaintenance(Request $request){
        
        
                $maintenance = Maintenance::create([
                    'description' => $request->description,
                    'price' => $request->price,
                    'boat_id' => $request->boat_id,
                    'user_id' =>\Auth::user()->id,
                ]);
                $boat= Boats::find($request->boat_id);
                $boat->update(['has_main'=> 1]);
                $boat->save();
                return view('home');
        
        
        
            }
            public function delete($maintenance_id = null){


                if($maintenance_id != null ){
                   
                    $maintenance = Maintenance::find($maintenance_id);
                    $boat= Boats::find($maintenance->boat_id);
                    $boat->update(['has_main'=> 0]);
                    $boat->save();
                    $maintenance->delete();
                    return redirect()->back()->with('successDeleteMsg','The requested <strong>Maintenance deleted</strong> successfully');
                }
                
              }


              public function edit($maintenance_id = null){

              
              
                if($maintenance_id != null){
                    $maintenance = Maintenance::find($maintenance_id);
                }
                $boats = Boats::where('has_main',0)->get();

                return view('marina_front.maintenance.edit_maintenance',compact('maintenance','boats'));
          
              }
          
          
              public function closeMaintenance($maintenance_id = null){
                  
                if($maintenance_id != null){
                    $maintenance = Maintenance::find($maintenance_id);
                    $maintenance-> update([
                        'end_date' => \Carbon\Carbon::today(),
                        'is_paid' => 1,
                        'user_id' =>\Auth::user()->id,
                      ]);
                    $boat= Boats::find($maintenance->boat_id);
                    $boat->update(['has_main'=> 0]);
                    $boat->save();
                    return redirect()->back()->with('mainMsg','The requested <strong>Maintenance Closed</strong> successfully');

                }

              }
              public function update(Request $request){
          
               
                  $maintenance= Maintenance:: find($request->maintenance_id);
                  if(!$maintenance){
                      return redirect()->back()->with('failUpdateMsg','The requested <strong>package Updated</strong> successfully');
                  
                  }else{
         
                      $maintenance-> update([
                        'description' => $request->description,
                        'price' => $request->price,
                        'boat_id' => $request->boat_id,
                        'user_id' =>\Auth::user()->id,
                      ]);
                            if($request->oldBoat_id != $request->boat_id){

                                $boat= Boats::find($request->boat_id);
                                $boat->update(['has_main'=> 1]);
                                $boat->save();
                                $boat2= Boats::find($request->oldBoat_id);
                                $boat2->update(['has_main'=> 0]);
                                $boat2->save();

                            }
                    

                      return redirect()->route('list_maintenance')->with('successupdateMsg','The requested <strong>maintenance Updated</strong> successfully');
          
          
                  }
            
            
                }
}
