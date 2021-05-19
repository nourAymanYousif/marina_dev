<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;
use App\Models\Boats;
use App\Models\InvoiceLogs;
use App\Models\Invoices;
use App\Models\Packages;
use App\Traits\Uploads;
use Illuminate\Support\Arr;

class ClientsController extends Controller
{ 


    use Uploads;
    // Get all "Client List"
    public function index(){
        $clients = Clients::all();
        
      return view('marina_front.clients.index',compact('clients'));
  }


 


  public function showCreateClient(){


      return view('marina_front.clients.client_register');
  }

  public function createClient(Request $request){
    $names =  json_encode($this->multipleUploads($request,'images','clients'));
    //        dd('test');

      $rules = $this->validate($request, [
          'email' => 'required|email',
          'national_id' => 'required',
          'mobile' => 'required|unique:client',
      ]);



//        $validate = Validator::make($request, $rules, $messages = [
//            'unique' => 'The :attribute field is required.',
//        ]);









      $client = Clients::create([
      'name' => $request->name,
      'email'=> $request->email,
      'mobile' => $request->mobile,
      'job_title' => $request->job_title,
      'address' => $request->address,
      'national_id_image' => $names,
      'national_id' => $request->national_id,
      'nationality' => $request->nationality
      ]);

      return view('home');
  }


  public function delete($client_id = null){


    if($client_id != null ){

        $client = Clients::find($client_id);
        $client->delete();
        return redirect()->back()->with('successDeleteMsg','The requested <strong>client deleted</strong> successfully');
    }
    
  }


  public function getClient($client_id = null){
    if($client_id != null){
      $client = Clients::find($client_id);
      
      $payment_array = [];

      foreach($client->boats as $boat){

          $paidInvoices= Invoices::get()->where('is_paid','1')->where('boat_id',$boat->id)->count();
          $boat = Arr::add($boat,'paidInvoices' ,$paidInvoices);

      }


  }
  return view('marina_front.clients.client_info',compact('client'));

  }
  public function edit($client_id = null){

    $clients = Clients::all();
    $packages = Packages::all();
    $client = [];
    if($client_id != null){
        $client = Clients::find($client_id);
    }

    return view('marina_front.clients.edit_client',compact('client','clients','packages'));

  }



    public function update(Request $request){

   
      $client= Clients:: find($request->client_id);
      if(!$client){
          return redirect()->back()->with('failUpdateMsg','The requested <strong>client Updated</strong> successfully');
      }else{

        if($request-> images != null){
         $names =  json_encode($this->multipleUploads($request,'images','clients'));

          $client-> update([
            'name' => $request->name,
            'email'=> $request->email,
            'mobile' => $request->mobile,
            'job_title' => $request->job_title,
            'address' => $request->address,
            'national_id_image' => $names,
            'national_id' => $request->national_id,
            'nationality' => $request->nationality
          ]);
          return redirect()->route('list_client')->with('successupdateMsg','The requested <strong>client Updated</strong> successfully');

      }else{
          $client-> update([
            'name' => $request->name,
            'email'=> $request->email,
            'mobile' => $request->mobile,
            'job_title' => $request->job_title,
            'address' => $request->address,
            'national_id' => $request->national_id,
            'nationality' => $request->nationality
          ]);
          return redirect()->route('list_client')->with('successupdateMsg','The requested <strong>client Updated</strong> successfully');


      }


    }}


}
