<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;
//use Hash;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| document.getElementById('logout-form').submit();g
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
Route::get('/create_admin', function () {
   User::create(['name'=>'nour','email' =>'n@n.com' ,'password' => Hash::make('123123') ,'national_id' => '123123','type' => 'admin','national_id_image' => 'img.png','mobile' => '123123123123']);
   return redirect('login');
});

*/
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Auth::routes();





Route::group([ 'middleware' => ['checkadmin']], function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // --------------------------------------------------[ Users] -----------------------------------------------
    // Creat User Account (Admin unlinked yet)
    Route::get('create/user', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('create/user', [App\Http\Controllers\Auth\RegisterController::class, 'register']);



    // --------------------------------------------------[ Clients] -----------------------------------------------
    //Show client form  -- Create Clients
    Route::get('/create/client', [App\Http\Controllers\ClientsController::class, 'showCreateClient'])->name('create_client');
    Route::post('/create/client', [App\Http\Controllers\ClientsController::class, 'createClient']);
    
    //Show Edit client form -- update client
    Route::get('/edit/client/{client_id}', [App\Http\Controllers\ClientsController::class, 'edit']);
    Route::post('/edit/client', [App\Http\Controllers\ClientsController::class, 'update'])->name('edit_client');
   
    // Show All Clients
    Route::get('/list/clients', [App\Http\Controllers\ClientsController::class, 'index'])->name('list_client');

    // Show one Client details
    Route::get('/client/{client_id}', [App\Http\Controllers\ClientsController::class, 'getClient'])->name('one_client');

    //Delete client
    Route::post('/delete/client/{client_id}', [App\Http\Controllers\ClientsController::class, 'delete']);
  
    // Get Specific boat by id 


    // --------------------------------------------------[ Boats] -----------------------------------------------
    //Show Boats Form -- create boat
    Route::get('/create/boat', [App\Http\Controllers\BoatsController::class, 'showCreateBoat'])->name('create_boat');
    Route::post('/create/boat', [App\Http\Controllers\BoatsController::class, 'createBoat']);
  
    //Show Edit boat form -- update boat
    Route::get('/edit/boat/{boat_id}', [App\Http\Controllers\BoatsController::class, 'edit']);
    Route::post('/edit/boat/', [App\Http\Controllers\BoatsController::class, 'update'])->name('edit_boat');

    // Show All Boats
    Route::get('/list/boats', [App\Http\Controllers\BoatsController::class, 'index'])->name('list_boat');

    //Delete boat                            
    Route::post('/delete/boat/{boat_id}', [App\Http\Controllers\BoatsController::class, 'delete']);

    // Get Specific boat by id 


    // --------------------------------------------------[ Packages] -----------------------------------------------
    //Show package form -- create Package
    Route::get('/create/package', [App\Http\Controllers\PackagesController::class, 'showCreatePackage'])->name('create_package');
    Route::post('/create/package', [App\Http\Controllers\PackagesController::class, 'createPackage']);
    
    //Show Edit Package form -- update package                      
    Route::get('/edit/package/{package_id}', [App\Http\Controllers\PackagesController::class, 'edit']);
    Route::post('/edit/package', [App\Http\Controllers\PackagesController::class, 'update'])->name('edit_package');
   
    // Show All Packages                                             
    Route::get('/list/packages', [App\Http\Controllers\PackagesController::class, 'index'])->name('list_package');
    
    //Delete Package           ---> must be an admin with privellages                            
    Route::post('/delete/package/{package_id}', [App\Http\Controllers\PackagesController::class, 'delete']);
    
    // Get Specific boat by id 


      // --------------------------------------------------[ Maintenance] -----------------------------------------------
    //Show Maintenance form -- create Maintenance
    Route::get('/create/maintenance', [App\Http\Controllers\MaintenanceController::class, 'showCreateMaintenance'])->name('create_maintenance');
    Route::post('/create/maintenance', [App\Http\Controllers\MaintenanceController::class, 'createMaintenance']);
    
    //Show Edit Maintenance form -- update Maintenance                      
    Route::get('/edit/maintenance/{maintenance_id}', [App\Http\Controllers\MaintenanceController::class, 'edit']);
    Route::post('/edit/maintenance', [App\Http\Controllers\MaintenanceController::class, 'update'])->name('edit_maintenance');
   
    // Show All Maintenance                                             
    Route::get('/list/maintenance', [App\Http\Controllers\MaintenanceController::class, 'index'])->name('list_maintenance');
    
    //Delete Maintenance           ---> must be an admin with privellages                            
    Route::post('/delete/maintenance/{maintenance_id}', [App\Http\Controllers\MaintenanceController::class, 'delete']);
    Route::post('/complete/maintenance/{maintenance_id}', [App\Http\Controllers\MaintenanceController::class, 'closeMaintenance']);
    

    // --------------------------------------------------[ Invoices] -----------------------------------------------
    //Show Create invoice form -- create invoice
    Route::get('/create/invoice', [App\Http\Controllers\AdminController::class, 'showCreateInvoice'])->name('create_invoice');
    Route::post('/create/invoice', [App\Http\Controllers\AdminController::class, 'createInvoice']);

    //Show Pay invoice form -- Pay invoice
    Route::get('/pay/invoice', [App\Http\Controllers\AdminController::class, 'showPayInvoice'])->name('pay_invoice');
    Route::post('/pay/invoice', [App\Http\Controllers\AdminController::class, 'payInvoice']);
    // Show all invoices
    Route::get('/list/invoice', [App\Http\Controllers\InvoicesController::class, 'index'])->name('list_invoice');

    // Delete invoices ---> must be an admin with privellages
       // print 

    Route::get('/print/invoice/{invoice_id}', [App\Http\Controllers\InvoicesController::class, 'print'])->name('get_invoices');
    // for pay invoice ajax needs
    Route::get('/get/invoice/{invoice_id}', [App\Http\Controllers\InvoicesController::class, 'getInvoice'])->name('get_invoice');
    // to get payment history record
    Route::get('/print/record/{record_id}', [App\Http\Controllers\InvoicesController::class, 'getPayHistory'])->name('get_record');
    Route::get('/print/crecord/{record_id}', [App\Http\Controllers\InvoicesController::class, 'getPayHistoryClient'])->name('get_record2');
});