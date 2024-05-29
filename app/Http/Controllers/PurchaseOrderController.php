<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Vehicle;
use App\Models\VehicleAnalysis;
use App\Models\MaterialAllocation;
use App\Models\Vendor;
use App\Models\PurchaseOrder;
class PurchaseOrderController extends Controller
{
    public function index($id)
{
   
    $vehicleNumber = $id;

    $vehicle = Vehicle::where('id', $vehicleNumber)
                      ->with('analysis')
                      ->first();

    $vehicleId = $vehicle->id;

    // Fetch material allocations with vendor information
    $materialAllocations = MaterialAllocation::select('material_allocation.*', 'vendor.vendor_id as vendor_name')
                                              ->where('vehicle_id', $vehicleId)
                                              ->leftJoin('vendor', 'material_allocation.supplier_id', '=', 'vendor.id')
                                              ->get();

    // Group material allocations by supplier ID
    $groupedAllocations = $materialAllocations->groupBy('supplier_id');

    // Fetch all vendors
    $vendors = Vendor::all(); 
    
    return view('purchase_order.orderCreation', compact('vehicle', 'groupedAllocations', 'vendors','vehicleNumber'));
}
    public function update(Request $request)
{
    // Retrieve the supplier ID and allocation ID from the query parameters
    $supplierId = $request->query('supplier_id');
    $allocationId = $request->query('allocation_id');

    // Update the material allocation
    $materialAllocation = MaterialAllocation::find($allocationId);
    if (!$materialAllocation) {
        return response()->json(['success' => false, 'message' => 'Material allocation not found'], 404);
    }

    $materialAllocation->supplier_id = $supplierId;
    $materialAllocation->save();

    // Return success response
    return response()->json(['success' => true, 'message' => 'Material allocation updated successfully']);
}
public function getSupplierList($id)
{
    $vehicleNumber = $id;

    $vehicle = Vehicle::where('id', $vehicleNumber)
                      ->with('analysis')
                      ->first();

    $vehicleId = $vehicle->id;

    // Fetch material allocations with vendor information
    $materialAllocations = MaterialAllocation::select('material_allocation.*', 'vendor.name as vendor_name','vendor.vendor_id as vendor_id','vendor.contact as contact')
                                              ->where('vehicle_id', $vehicleId)
                                              ->leftJoin('vendor', 'material_allocation.supplier_id', '=', 'vendor.id')
                                              ->get();

    // Group material allocations by supplier ID
    $groupedAllocations = $materialAllocations->groupBy('supplier_id');

    // Fetch all vendors
    $vendors = Vendor::all(); 

    // Check for existing purchase orders
    $purchaseOrders = PurchaseOrder::whereIn('supplier_id', $groupedAllocations->keys())
                                    ->where('vehicle_id', $vehicleId)
                                    ->get()
                                    ->keyBy('supplier_id');

    // Render the Blade template with the data
    $supplierListHTML = view('purchase_order.supplier_list', compact('vehicle', 'groupedAllocations', 'vendors', 'vehicleNumber', 'purchaseOrders'))->render();

    // Return the HTML content as a JSON response
    return response()->json(['html' => $supplierListHTML]);
}
public function deleteSupplier(Request $request)
    {
        try {
            // Retrieve the supplier ID from the request
            $supplierId = $request->input('supplierId');
             $vendors = Vendor::all();
            // Find and update the material allocation with the given supplier ID
            MaterialAllocation::where('id', $supplierId)->update(['supplier_id' => null]);
            $new=MaterialAllocation::where('id', $supplierId)->first();
            $html='<tr id="allocation-row-'.$new->id.'" class="bg-white even" role="row"><td class="sorting_1">'.$new->material_name.'</td><td><select class="form-select form-select-sm update-material-allocation" name="supplier_id" data-allocation-id="'.$new->id.'">';
            $html.='<option value="">Select Supplier</option>';
            foreach($vendors as $ven)
            {
               $html.='<option value="'.$ven->id.'">'.$ven->name.'</option>';
            }
            
            

            $html.='</select></td><td>'.$new->brand.'</td><td>'.$new->quantity.'</td><td>'.$new->unit_of_measurement.'</td></tr>';
            // Return a success response
            return response()->json($html);
        } catch (\Exception $e) {
            // Return an error response if an exception occurs
            return response()->json(['success' => false, 'message' => 'Error deleting supplier: ' . $e->getMessage()]);
        }
    }
    public function managepo(){
    $vehicles = Vehicle::with(['analysis'])->get();
    $counts = [];

    foreach ($vehicles as $vehicle) {
        $count = MaterialAllocation::where('vehicle_id', $vehicle->id)->count();
        $counts[$vehicle->id] = $count; // Associate count with vehicle ID

        // Fetch materials for each vehicle
        $materials[$vehicle->id] = MaterialAllocation::where('vehicle_id', $vehicle->id)->get();
    }

    return view('purchase_order.managepo', compact('vehicles', 'counts'));


}


  public function createpo(Request $request)
    {
       // Retrieve the input data
        $supplier_id = $request->input('supplier_id');
        $vehicle_id = $request->input('vehicle_id');
        $latestVendor = PurchaseOrder::latest()->first();
        $vendorId = $latestVendor ? $latestVendor->id + 1 : 1;
        $vendorIdFormatted = str_pad($vendorId, 3, '0', STR_PAD_LEFT); // Pad with zeros if necessary
        $vendorIdWithPrefix = 'PO-' . $vendorIdFormatted;
        // Create a new PurchaseOrder instance
        $purchaseOrder = new PurchaseOrder();
        $purchaseOrder->supplier_id = $supplier_id;
        $purchaseOrder->vehicle_id = $vehicle_id;
        $auth=Auth::user()->role_id;
        if ($auth == 1) {
          $purchaseOrder->status = 1;
      } else {
          $purchaseOrder->status = 0;
      }
        
        $purchaseOrder->purchase_id =$vendorIdWithPrefix;

        
        // Save the purchase order
        $purchaseOrder->save();
       
        return response()->json("sDSD");

   }

}
