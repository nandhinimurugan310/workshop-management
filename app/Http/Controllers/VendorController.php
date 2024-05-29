<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::all(); // Fetch all vendors from the database
        return view('vendor.index', ['vendors' => $vendors]);
        // Pass the $vendors variable to the view
    }

    public function create()
    {
        return view('vendor.create');
    }

    public function store(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'email' => 'required|email',
            'contact' => 'required|digits:10',
            'tax_number' => 'required',
            'name' => 'required',
            'billing_phone' => 'required|digits:10',
            'billing_name' => 'required',
            'billing_address' => 'required',
            'billing_city' => 'required',
            'billing_state' => 'required',
            'billing_zip' => 'required',
            'billing_country' => 'required',
        ]);

        // Generate vendor ID
        $latestVendor = Vendor::latest()->first();
        $vendorId = $latestVendor ? $latestVendor->id + 1 : 1;
        $vendorIdFormatted = str_pad($vendorId, 3, '0', STR_PAD_LEFT); // Pad with zeros if necessary
        $vendorIdWithPrefix = 'VEN' . $vendorIdFormatted;

        // Create a new Vendor instance and fill it with validated data
        $vendor = new Vendor();
        $vendor->fill($validatedData);
        $vendor->vendor_id = $vendorIdWithPrefix; // Assign the generated vendor ID

        // Save the vendor to the database
        $vendor->save();

        // Redirect back to the same page with a success message
        return redirect()->back()->with('success', 'Vendor successfully created');
    }

    public function edit(Vendor $vendor)
    {
        return view('vendor.edit', compact('vendor'));
    }

    public function update(Request $request, Vendor $vendor)
    {
        $request->validate([
            'name' => 'required',
            // Add validation rules for other fields as needed
        ]);
    
        $vendor->update($request->all());
    
        return redirect()->route('vendor.index')->with('success', 'Vendor updated successfully');
    }
     
    public function destroy($id)
    {
        $vendor = Vendor::find($id);

        if ($vendor) {
            $vendor->delete();
            return redirect()->route('vendor.index')->with('success', 'Vendor deleted successfully.');
        }

        return redirect()->route('vendor.index')->with('error', 'Vendor not found.');
    }
}
