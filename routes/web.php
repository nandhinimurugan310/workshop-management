<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\PurchaseOrderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//user
Route::get('/', [UserController::class, 'index'])->name('user.index');
Route::get('/about', [UserController::class, 'about'])->name('user.about');
Route::get('/contact', [UserController::class, 'contact'])->name('user.contact');
Route::get('/gallery', [UserController::class, 'gallery'])->name('user.gallery');


Route::get('/test', function () {
    return view('admin.vehiclecreate');
});


Route::get('/login', [UserController::class, 'login'])->name('user.login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('admin.test');
})->name('dashboard');



Route::get('/users', [UserController::class, 'user'])->name('users.manage')->middleware('auth');
Route::get('/user/create', [UserController::class, 'create'])->name('admin.user.create');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::get('/user/create-role', [UserController::class, 'createRole'])->name('user.createRole');
Route::post('/user/storeRole', [UserController::class, 'storeRole'])->name('role.store');


/*Permissions routes*/

Route::get('/manage-permissions', [PermissionController::class, 'managePermissions'])->name('permissions.manage');

Route::get('/permissions', [PermissionController::class, 'showPermissionsForm'])->name('permissions.index');
Route::post('/permissions/assign', [PermissionController::class, 'assignPermissions'])->name('permissions.assign');

/*vehicle analysis start */

Route::get('/vehicle_create', [VehicleController::class, 'index'])->name('vehicle.index');
Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicle.store');
Route::get('/get-referral-suggestions', [VehicleController::class, 'getSuggestions'])->name('vehicle.getSuggestions');

Route::get('/get-reviewed-by-suggestions', [VehicleController::class, 'getreviewedby'])->name('vehicle.getreviewedby');
Route::get('/get-referral-number-suggestions', [VehicleController::class, 'getreferralnumbersuggestions'])->name('vehicle.getreferralnumbersuggestions');
Route::get('/get-customer-suggestions', [VehicleController::class, 'getcustomersuggestions'])->name('vehicle.getcustomersuggestions');
Route::get('/get-customer-number-suggestions', [VehicleController::class, 'getcustomernumbersuggestions'])->name('vehicle.getcustomernumbersuggestions');
Route::get('/get-customer-address-suggestions', [VehicleController::class, 'getcustomeraddresssuggestions'])->name('vehicle.getcustomeraddresssuggestions');

Route::get('/get-city-suggestions', [VehicleController::class, 'getcitysuggestions'])->name('vehicle.getcitysuggestions');
Route::get('/get-state-suggestions', [VehicleController::class, 'getstatesuggestions'])->name('vehicle.getstatesuggestions');

Route::get('/get-work-category-suggestions', [VehicleController::class, 'getworkcategorysuggestions'])->name('vehicle.getworkcategorysuggestions');
Route::get('/get-type-of-work-suggestions', [VehicleController::class, 'gettypeofworksuggestions'])->name('vehicle.gettypeofworksuggestions');
Route::get('/get-work-description', [VehicleController::class, 'getworkdescription'])->name('vehicle.getworkdescription');

//vehicle
Route::get('/vehicle_manage', [VehicleController::class, 'manage'])->name('vehicle.manage');
Route::get('/fetch-vehicle-analysis/{id}', 'VehicleController@fetchVehicleAnalysis');
Route::get('/vehicle/{vehicle}/edit', [VehicleController::class, 'edit'])->name('vehicle.edit');
Route::get('/delete-vehicle/{id}', [VehicleController::class, 'vehicledelete'])->name('vehicle.delete');

Route::post('/update/vehicle/analysis', [VehicleController::class, 'update'])->name('update.vehicle.analysis');


/*vehicle analysis end */

/*-----------Material Allocation-------------*/

Route::get('/add-material', [MaterialController::class, 'addmaterial'])->name('material.materialadd');
Route::get('/search-vehicle-add-material', [MaterialController::class, 'search_addmaterial'])->name('search');
Route::get('/edit-vehicle-material', [MaterialController::class, 'editmaterial'])->name('material.materialEdit');
Route::get('/Search-vehicle-edit-material', [MaterialController::class, 'search_editmaterial'])->name('search-vehicle-edit');
Route::delete('/material/{vendor}', [MaterialController::class, 'destroy_material'])->name('material.delete');

Route::get('/search/add_material/{vehicle_id}',[MaterialController::class, 'add'])->name('add_material');
Route::get('/search/edit_material/{vehicle_id}',[MaterialController::class, 'edit'])->name('edit_material');

Route::get('/delete-material/{id}', [MaterialController::class, 'materialdeletes'])->name('material.delete');
/*--Manage Material--*/

Route::get('/manage-vehicle-material', [MaterialController::class, 'managematerial'])->name('material.materialManage');
Route::get('/vehicle/{id}/materials',[MaterialController::class, 'showMaterials'])->name('vehicles.materials');

Route::get('/getMaterialName',[MaterialController::class, 'getMaterialName'])->name('getMaterialName');

Route::post('/storematerial', [MaterialController::class, 'store'])->name('material_allocation.store');
Route::get('/search-vehicle-same-add-material', [MaterialController::class, 'search_addsamematerial'])->name('searchsame');

Route::post('/vehicles/{vehicle}/materialallocations/update', [MaterialController::class, 'update'])
    ->name('materialallocations.update');

Route::get('/delete-material/{id}', [MaterialController::class, 'delete'])
    ->name('materialallocations.delete');
/*-----------Material Allocation end -------------*/
// Resource route with vendor actions

Route::resource('vendors', VendorController::class)->except(['index', 'store']);
Route::get('/vendors', [VendorController::class, 'index'])->name('vendor.index')->middleware('auth');
Route::post('/vendors', [VendorController::class, 'store'])->name('vendor.store');
Route::get('/vendors/{vendor}/edit', [VendorController::class, 'edit'])->name('vendor.edit');
Route::put('/vendors/{vendor}', [VendorController::class, 'update'])->name('vendor.update');
Route::get('/vendors/create', [VendorController::class, 'create'])->name('vendor.create');
Route::delete('/vendors/{vendor}', [VendorController::class, 'destroy'])->name('vendor.destroy');


//store
Route::get('/storecheck', [StoreController::class, 'store'])->name('store.storecheck');

/*--------------Purchase Order-----------------*/

Route::get('/purchase-orders/{id}', [PurchaseOrderController::class, 'index'])->name('purchase.ordercreation');
Route::get('/purchase-manage', [PurchaseOrderController::class, 'managepo'])->name('purchase.managepo');


Route::get('/update-material-allocation', [PurchaseOrderController::class, 'update'])->name('updatematerialallocation');
Route::get('/get-supplier-list/{id}',[PurchaseOrderController::class, 'getSupplierList'])->name('get.supplier.list');

Route::post('/delete-supplier', [PurchaseOrderController::class, 'deleteSupplier'])->name('delete.supplier');



//vehicle delivery
Route::get('/vehicle-delivery', [ExpenseController::class, 'delivery'])->name('expense.vehicledelivery');