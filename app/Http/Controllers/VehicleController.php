<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\VehicleAnalysis;
use Illuminate\Support\Facades\Storage;

class VehicleController extends Controller
{
    //
    public function index() {
        return view('vehicle_analysis.vehiclecreate');
    }
    public function store(Request $request)
    {

        // Process each uploaded file
        foreach ($request->vehicle_number as $key => $vehicleNumber) {

            $customerData = [
        'customer_name' => $request->input('customer_name'),
        'customer_mobile' => $request->input('customer_mobile'),
        'address' => $request->input('address'),
        'city' => $request->input('city'),
        'state' => $request->input('state'),
        'referred_by' => $request->input('referred_by'),
        'department'  => $request->input('department'),
           'others'  => $request->input('others'),
             'location'  => $request->input('location'),
        'referred_mobile' => $request->input('referred_mobile'),
        'vehicle_size' => $request->input('vehicle_size'),
        'work_category' => $request->input('work_category'),
        'type_of_work' => $request->input('type_of_work'),
        'vehicle_status' => $request->input('status'),
        'sector' => $request->input('sector'),

        'work_description' => $request->input('work_description'),
        'reviewed_by' => $request->input('reviewed_by'),
    ];

          $customer = VehicleAnalysis::create($customerData);
            // Store the uploaded image
            $imagePath = $request->file('vehicle_images')[$key]->store('vehicle_images', 'public');

            // Save the image path and other data to the database
            $vehicle = new Vehicle();
            $vehicle->vehicle_number = $vehicleNumber;
            $vehicle->vehicle_image = $imagePath;
            $vehicle->analysis_id = $customer->id;

            // Add other fields to the $vehicle object as needed
            $vehicle->save();
        }
        return back()->with('success', 'Vehicle stored successfully');


    }
    public function getSuggestions(Request $request)
{
    $query = $request->query('query');
    $suggestions = VehicleAnalysis::where('referred_by', 'like', '%'.$query.'%')
                                  ->groupBy('referred_by')
                                  ->pluck('referred_by')
                                  ->toArray();

    return response()->json($suggestions);
}

public function getreviewedby(Request $request)
{
    $query = $request->query('query');
    $suggestions = VehicleAnalysis::where('reviewed_by', 'like', '%'.$query.'%')
                                  ->groupBy('reviewed_by')
                                  ->pluck('reviewed_by')
                                  ->toArray();

    return response()->json($suggestions);
}

public function getreferralnumbersuggestions(Request $request)
{
    $query = $request->query('query');
    $suggestions = VehicleAnalysis::where('referred_mobile', 'like', '%'.$query.'%')
                                  ->groupBy('referred_mobile')
                                  ->pluck('referred_mobile')
                                  ->toArray();

    return response()->json($suggestions);
}

public function getcustomersuggestions(Request $request)
{
    $query = $request->query('query');
    $suggestions = VehicleAnalysis::where('customer_name', 'like', '%'.$query.'%')
                                  ->groupBy('customer_name')
                                  ->pluck('customer_name')
                                  ->toArray();

    return response()->json($suggestions);
}

public function getcustomernumbersuggestions(Request $request)
{
    $query = $request->query('query');
    $suggestions = VehicleAnalysis::where('customer_mobile', 'like', '%'.$query.'%')
                                  ->groupBy('customer_mobile')
                                  ->pluck('customer_mobile')
                                  ->toArray();

    return response()->json($suggestions);
}

public function getcustomeraddresssuggestions(Request $request)
{
    $query = $request->query('query');
    $suggestions = VehicleAnalysis::where('address', 'like', '%'.$query.'%')
                                  ->groupBy('address')
                                  ->pluck('address')
                                  ->toArray();

    return response()->json($suggestions);
}

public function getcitysuggestions(Request $request)
{
    $query = $request->query('query');
    $suggestions = VehicleAnalysis::where('city', 'like', '%'.$query.'%')
                                  ->groupBy('city')
                                  ->pluck('city')
                                  ->toArray();

    return response()->json($suggestions);
}

public function getstatesuggestions(Request $request)
{
    $query = $request->query('query');
    $suggestions = VehicleAnalysis::where('state', 'like', '%'.$query.'%')
                                  ->groupBy('state')
                                  ->pluck('state')
                                  ->toArray();

    return response()->json($suggestions);
}
public function getworkcategorysuggestions(Request $request)
{
    $query = $request->query('query');
    $suggestions = VehicleAnalysis::where('work_category', 'like', '%'.$query.'%')
                                  ->groupBy('work_category')
                                  ->pluck('work_category')
                                  ->toArray();

    return response()->json($suggestions);
}
public function gettypeofworksuggestions(Request $request)
{
    $query = $request->query('query');
    $suggestions = VehicleAnalysis::where('type_of_work', 'like', '%'.$query.'%')
                                  ->groupBy('type_of_work')
                                  ->pluck('type_of_work')
                                  ->toArray();

    return response()->json($suggestions);
}
public function getworkdescription(Request $request)
{
 // Retrieve the selected type of work from the request
        $selectedTypeOfWork = $request->input('type_of_work');

        // Query the database to fetch the description based on the selected type of work
        $workType =VehicleAnalysis::where('type_of_work', 'like', '%'.$selectedTypeOfWork.'%')->first();

        // Check if the work type exists and return the description if found
        if ($workType) {
        return response()->json(['description' => $workType->work_description]);
    } else {
        // Return an empty response or a default description if the work type is not found
        return response()->json(['description' => '']); // or any default description
    }
}


public function manage()
{
    // Fetch all vehicles with their related analysis data
    $vehicles = Vehicle::with('analysis')->get();

    // Prepare data to be displayed in the view
    $vehicleData = $vehicles->map(function ($vehicle) {
        $analysis = $vehicle->analysis;

        // Retrieve data from vehicle_analysis table using analysis_id from Vehicle table
        $vehicleAnalysis = VehicleAnalysis::where('id', $vehicle->analysis_id)->first();

        return [
            'id' => $analysis->id, // Include analysis ID in the data
            'vehicle_number' => $vehicle->vehicle_number,
            'customer_name' => $analysis->customer_name,
            'customer_mobile' => $analysis->customer_mobile,
            'address' => $vehicleAnalysis->address,
            'city' => $vehicleAnalysis->city,
            'state' => $vehicleAnalysis->state,
            'referred_by' => $vehicleAnalysis->referred_by,
            'referred_mobile' => $vehicleAnalysis->referred_mobile,
            'vehicle_size' => $vehicleAnalysis->vehicle_size,
            'vehicle_image' => $vehicle->vehicle_image,
            'work_category' => $vehicleAnalysis->work_category,
            'work_types' => $analysis->type_of_work,
            'status' => $vehicle->vehicle_status, // Access vehicle_status from $vehicle object
            'sector' => $vehicleAnalysis->sector,
            'work_description' => $vehicleAnalysis->work_description,
            'suggested_work_description' => $vehicleAnalysis->suggested_work_description,
            'reviewed_by' => $vehicleAnalysis->reviewed_by,
            'vehicle_id' => $vehicle->id
        ];
    });



    return view('vehicle_analysis.vehicleedit', compact('vehicleData'));
}






public function fetchVehicleAnalysis($id)
{
    $vehicle = Vehicle::find($id);
    if ($vehicle) {
        $analysis = VehicleAnalysis::find($vehicle->analysis_id);
        return view('vehicle_analysis.vehicleedit', compact('analysis'));
    } else {
        return response()->json(['error' => 'Vehicle not found'], 404);
    }
}
    public function edit($id)
    {

        $vehicleAnalysis = Vehicle::with('analysis')
        ->where('analysis_id', $id)
        ->first();




        return view('vehicle_analysis.edit', compact('vehicleAnalysis'));
    }

  public function update(Request $request)
{
   // Find the vehicle along with its analysis
$vehicle = Vehicle::with('analysis')
    ->where('analysis_id', $request->input('vehicle_analysis_id'))
    ->first();

if ($vehicle) {
    // Find the analysis associated with the vehicle
    $analysis = VehicleAnalysis::find($vehicle->analysis_id);

    if ($analysis) {
        try {
            // Handle image upload
            if ($request->hasFile('vehicle_image')) {
                $image = $request->file('vehicle_image');
                $path = $image->store('vehicle_images', 'public');
                    // Check if the vehicle image exists and delete it
if ($vehicle->vehicle_image) {
    if (Storage::disk('public')->exists($vehicle->vehicle_image)) {
        Storage::disk('public')->delete($vehicle->vehicle_image);
    }
}


                // Update the vehicle_image field
                $vehicle->vehicle_image = $path;
            }

            // Update the vehicle and analysis with the input data
            $vehicle->update($request->except(['vehicle_image']));
            $analysis->update($request->all());

            // Save the vehicle to update the vehicle_image field if it was changed
            $vehicle->save();

            return response()->json(['message' => 'Vehicle analysis updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to update vehicle analysis', 'error' => $e->getMessage()], 500);
        }
    } else {
        return response()->json(['message' => 'Vehicle analysis not found'], 404);
    }
} else {
    return response()->json(['message' => 'Vehicle not found'], 404);
}
}


 public function vehicledelete($id)
    {

        $vehicle = Vehicle::findOrFail($id);
        $vehicleAnalysis = VehicleAnalysis::findOrFail($vehicle->analysis_id);
        $vehicle->delete();
        $vehicleAnalysis->delete();
        return response()->json(['message' => 'Vehicle deleted successfully']);
    }


}
