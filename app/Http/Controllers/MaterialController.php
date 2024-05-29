<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\MaterialAllocation;




class MaterialController extends Controller
{
    public function addmaterial(){
         return view('material_allocation.materialadd');

    }
        public function search_addmaterial(Request $request)
    {
        $query = $request->input('query');

        // Fetch the vehicle and join with analysis based on vehicle number
        $vehicle = Vehicle::with('analysis')
                        ->where('id', $query)
                        ->first();

        if ($vehicle) {
            // Check if analysis is present
            if ($vehicle->analysis) {
                $results = [
                    'vehicle_number' => $vehicle->vehicle_number,
                    'customer_name' => $vehicle->analysis->customer_name,
                    'customer_mobile' => $vehicle->analysis->customer_mobile,
                    // 'address' => $vehicle->analysis->address,
                    // 'city' => $vehicle->analysis->city,
                    // 'state' => $vehicle->analysis->state,
                    // 'referred_by' => $vehicle->analysis->referred_by,
                    // 'referred_mobile' => $vehicle->analysis->referred_mobile,
                    'vehicle_size' => $vehicle->analysis->vehicle_size,
                    'type_of_work' => $vehicle->analysis->type_of_work,
                    'sector' => $vehicle->analysis->sector,
                    // 'work_description' => $vehicle->analysis->work_description,
                    'reviewed_by' => $vehicle->analysis->reviewed_by,
                    // 'work_category' => $vehicle->analysis->work_category,
                    'vehicle_image' => $vehicle->vehicle_image,
                    'vehicle_id'=> $vehicle->id,
                ];

                // Optionally, you can include more fields from the analysis if needed
            } else {
                // If analysis is not found, set results to null
                $results = null;
            }

            // Fetch material allocation for the vehicle
            $material = MaterialAllocation::where('vehicle_id', $vehicle->id)->get();

            // Check if materials are found
            if ($material->isNotEmpty()) {
                // Materials found, navigate to the edit page
                return view('material_allocation.materialedit', compact('vehicle', 'material'));
            } else {
                // Materials not found or no analysis found, navigate to the add page
                return view('material_allocation.materialadd', compact('results'));
            }

        } else {
            // If vehicle not found, redirect back with error message
            return redirect()->back()->with('error', 'Vehicle not found!');
        }
    }


    public function search_addsamematerial(Request $request)
    {
        $query = $request->input('querys');
        $vehicle = Vehicle::where('vehicle_number', $query)->first();
        $materials = MaterialAllocation::where('vehicle_id', $vehicle['id'])->get();
         // Return success response
        return response()->json($materials);
    }
     public function store(Request $request)
    {

        // Process and store the form data
        foreach($request->material_name as $key => $value) {
            $materialAllocation = new MaterialAllocation();
            $materialAllocation->vehicle_id = $request->vehicle_id;
            $materialAllocation->work_type = $request->type_of_work;
            $materialAllocation->material_name = $request->material_name[$key];
            $materialAllocation->brand = $request->brand[$key];
            $materialAllocation->quantity = $request->quantity[$key];
            $materialAllocation->unit_of_measurement = $request->unit_of_measurement[$key];
            $materialAllocation->save();
        }
        
        $vehicle = Vehicle::findOrFail($request->vehicle_id);
        $vehicle->vehicle_status = $request->status;
        $vehicle->save();

        // Return success response
        return response()->json(['message' => 'Material allocation saved successfully'], 200);
    }

      //display edit material
    public function editmaterial(){
        return view('material_allocation.materialedit');
    }

    //search edit material
    public function search_editmaterial(Request $request)
    {
        $vehicleNumber = $request->input('query');

        $vehicle = Vehicle::where('id', $vehicleNumber)
                          ->with('analysis')
                          ->first();

        if ($vehicle) {
            $vehicleId = $vehicle->id;

            $materialAllocations = MaterialAllocation::where('vehicle_id', $vehicleId)
                                                      ->get();

            if ($materialAllocations->isEmpty()) {
                // If materials are found, pass them to the view
                return view('material_allocation.materialadd', compact('vehicle', 'materialAllocations'));
            } else {
                // If materials are empty, you might want to handle this case
                return view('material_allocation.materialedit', compact('vehicle'));
            }
        } else {
            // If vehicle not found, redirect to a specific route with error message
            return redirect()->route('search')->with('error', 'Vehicle not found!');
        }
    }


    public function destroy_material($id)
    {
        $material = MaterialAllocation::find($id);

        if ($material) {
            $material->delete();
            return redirect()->route('material.materialEdit')->with('success', 'Vendor deleted successfully.');
        }

        return redirect()->route('material.materialEdit')->with('error', 'Vendor not found.');
    }

       public function manageMaterial()
    {
        $vehicles = Vehicle::with(['analysis'])->get();
        $counts = [];

        foreach ($vehicles as $vehicle) {
            $count = MaterialAllocation::where('vehicle_id', $vehicle->id)->count();
            $counts[$vehicle->id] = $count; // Associate count with vehicle ID

            // Fetch materials for each vehicle
            $materials[$vehicle->id] = MaterialAllocation::where('vehicle_id', $vehicle->id)->get();
        }

        return view('material_allocation.materialmanage', compact('vehicles', 'counts'));
    }


      public function getMaterialName(Request $request)
        {
            $vehicleNumber = $request->input('vehicleNumber');
    
            // Find the vehicle by its number
            $vehicle = Vehicle::where('id', $vehicleNumber)->first();
    
    
            if ($vehicle) {
                // Retrieve all material allocations for the vehicle
                $materialAllocations = $vehicle->materialAllocations;
    
                if ($materialAllocations->isNotEmpty()) {
                    // Prepare material details
                    $materialDetails = $materialAllocations->map(function ($allocation) {
                        return [
                            'name' => $allocation->material_name,
                            'brand' => $allocation->brand,
                            'quantity' => $allocation->quantity,
                            'unit_of_measurement' => $allocation->unit_of_measurement,
                        ];
                    });
    
                    // Additional data
                    $customerName = $vehicle->analysis->customer_name;
                    $customerPhone = $vehicle->analysis->customer_mobile;
                    $materialCount = $materialAllocations->count(); // Count of material allocations
                    $reviewDate = $vehicle->analysis->reviewed_by; // Assuming reviewed_by contains review date
    
                    return response()->json([
                        'materialDetails' => $materialDetails,
                        'customerName' => $customerName,
                        'customerPhone' => $customerPhone,
                        'materialCount' => $materialCount,
                        'reviewDate' => $reviewDate,
                        'vehicle'=>$vehicle,
                    ]);
                } else {
                    // No materials allocated for the vehicle
                    return response()->json(['error' => 'No materials allocated for this vehicle.']);
                }
            } else {
                // Vehicle not found
                return response()->json(['error' => 'Vehicle not found.']);
            }
        }


    public function materialdestroy_all($id)
    {
        $material = MaterialAllocation::find($id);

        if ($material) {
            $material->delete();
            return redirect()->route('material.materialEdit')->with('success', 'Vendor deleted successfully.');
        }

        return redirect()->route('material.materialEdit')->with('error', 'Vendor not found.');
    }

     public function add($vehicle_id)
    {
        $vehicle = Vehicle::find($vehicle_id);
        $vehicle_number = $vehicle->vehicle_number;

        return view('material_allocation.materialadd', [
            'vehicle_id' => $vehicle_id,
            'vehicle_number' => $vehicle_number
        ]);

    }

    public function edit($vehicle_id)
    {
        $vehicle = Vehicle::find($vehicle_id);
        $vehicle_number = $vehicle->vehicle_number;

        return view('material_allocation.materialedit', [
            'vehicle_id' => $vehicle_id,
            'vehicle_number' => $vehicle_number
        ]);
    }

      public function update(Request $request, $vehicleId)
{
    $vehicle = Vehicle::findOrFail($vehicleId);

    foreach ($request->input('material_name', []) as $key => $materialName) {
        $materialId = $request->input('material_id')[$key] ?? null;

        // If material ID is provided, update the existing allocation; otherwise, create a new one
        if ($materialId) {
            $materialAllocation = MaterialAllocation::find($materialId);
        } else {
            $materialAllocation = new MaterialAllocation();
        }

        // Set the material allocation properties
        $materialAllocation->material_name = $materialName;
        $materialAllocation->brand = $request->input('brand')[$key];
        $materialAllocation->quantity = $request->input('quantity')[$key];
        $materialAllocation->unit_of_measurement = $request->input('unit_of_measurement')[$key];

        // Associate the material allocation with the vehicle
        $materialAllocation->vehicle_id = $vehicle->id;

        // Save the material allocation
        $materialAllocation->save();
    }

    return redirect()->back()->with('success', 'Material allocations updated successfully.');
}

 public function delete($id)
    {
        try {
            // Find the material by ID
            $material = MaterialAllocation::findOrFail($id);

            // Delete the material
            $material->delete();

            // Return a success response
            return response()->json(['message' => 'Material deleted successfully'], 200);
        } catch (\Exception $e) {
            // Return an error response
            return response()->json(['error' => 'Failed to delete material'], 500);
        }
    }

     public function materialdelete($id)
    {

        $MaterialAllocation = MaterialAllocation::where('vehicle_id', $id)->get();

      $MaterialAllocation->delete();
      return response()->json(['message' => 'Materials deleted successfully']);
    }


}
