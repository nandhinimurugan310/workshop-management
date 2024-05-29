@extends('admin_layouts.app')
<style>
.btn-sm {
    width: 100px; /* Adjust the width as needed */
}
</style>

@section('content')
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Manage Supplier</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between align-items-center position-relative mb-4">
                <h3>Manage Supplier</h3>
                <!-- Button to trigger modal for creating a new vendor -->
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exLargeModal">
                    <i class="fas fa-plus"></i> Create Supplier
                </button>
            </div>

            <!-- Display success message if it exists -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <!-- Close button -->
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <table id="example" style="width:100%" class="table table-striped table-bordered mt-4 pt-4">
                <thead class="bg-primary">
                    <tr>
                        <th scope="col" style="color:white;font-size:medium;text-align:center">Supplier ID</th>
                        <th scope="col" style="color:white;font-size:medium;text-align:center">Name</th>
                        <th scope="col" style="color:white;font-size:medium;text-align:center">Phone</th>
                        <th scope="col" style="color:white;font-size:medium;text-align:center">Email</th>
                        <th scope="col" style="color:white;font-size:medium;text-align:center">GST-NO</th>
                        <th scope="col" style="color:white;font-size:medium;text-align:center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop through your vendors here to populate the table -->
                    @foreach($vendors as $vendor)
                        <tr>
                            <td style="color:black">{{ $vendor->vendor_id }}</td>
                            <td style="color:black">{{ $vendor->name }}</td>
                            <td style="color:black">{{ $vendor->contact }}</td>
                            <td style="color:black">{{ $vendor->email }}</td>
                            <td style="color:black">{{ $vendor->tax_number }}</td>
                           <td style="color:black">

                            <div class="d-flex justify-content-center" class="dropdown">
  <button
    type="button"
    class="btn rounded-pill btn-outline-primary"
    class="dropdown-toggle hide-arrow p-1"
    data-bs-toggle="dropdown"
  >
    <i class="mdi mdi-dots-vertical"></i>
  </button>
  <div class="dropdown-menu">
  <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#extralarge{{ $vendor->id }}">Edit</a>
  
  <a href="#" onclick="if(confirm('Are you sure you want to delete this vendor?')) { event.preventDefault(); document.getElementById('delete-form-{{ $vendor->id }}').submit(); }" class="dropdown-item">Delete</a>
    <form id="delete-form-{{ $vendor->id }}" action="{{ route('vendor.destroy', $vendor->id) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
  </div>
</div>
                               


                                  
                              
                               
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card-body">
    <div class="row gy-3">
        <!-- Modal Sizes -->
        <div class="col-lg-4 col-md-6">
            <!-- Extra Large Modal -->
            <div class="modal fade" id="exLargeModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel4"><strong>Vehicle Number:</strong> <span id="vehicleNumber"></span></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="myForm" action="/vendors" method="POST">
                                @csrf
                                <!-- Customer Details -->
                                <div class="form-row row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="customerName">Supplier Name*</label>
                                            <input type="text" name="name" class="form-control form-control-lg" id="customerName" placeholder="Enter supplier name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="customerPhone">Phone*</label>
                                            <input type="tel" name="contact" class="form-control form-control-lg" id="customerPhone" placeholder="Enter phone number" maxlength="10" pattern="\d{10}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="customerEmail">Email address*</label>
                                            <input type="email" name="email" class="form-control form-control-lg" id="customerEmail" placeholder="Enter email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="customerGSTNo">GST-NO*</label>
                                            <input type="text" name="tax_number" class="form-control form-control-lg" id="customerGSTNo" placeholder="Enter GST-NO" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Billing Address -->
                                <h5>Billing Address</h5>
                                <div class="form-row row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="billingName">Name*</label>
                                            <input type="text" name="billing_name" class="form-control form-control-lg" id="billingName" placeholder="Enter name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="billingPhone">Phone*</label>
                                            <input type="tel" name="billing_phone" class="form-control form-control-lg" id="billingPhone" placeholder="Enter phone number" maxlength="10" pattern="\d{10}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="billingAddress">Address*</label>
                                            <input type="text" name="billing_address" class="form-control form-control-lg" id="billingAddress" placeholder="Enter address" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="billingCity">City*</label>
                                            <input type="text" name="billing_city" class="form-control form-control-lg" id="billingCity" placeholder="Enter city" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="billingState">State*</label>
                                            <input type="text" name="billing_state" class="form-control form-control-lg" id="billingState" placeholder="Enter state" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="billingZip">Zip Code*</label>
                                            <input type="text" name="billing_zip" class="form-control form-control-lg" id="billingZip" placeholder="Enter zip code" pattern="\d{5,6}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="billingCountry">Country*</label>
                                            <select class="form-control form-control-lg" name="billing_country" id="billingCountry" required>
                                                <option value="India" selected>India</option>
                                                <!-- Add more country options as needed -->
                                            </select>
                                        </div>
                                    </div>
                                </div><br>

<!-- Buttons -->
<div class="form-row row">
    <div class="col-md-6 text-center">
        <button type="submit" class="btn btn-primary btn-sm mb-3">Create</button>
        <button type="button" class="btn btn-secondary btn-sm mb-3" data-bs-dismiss="modal">Cancel</button>
    </div>
</div>
</form>
<div class="modal-footer">
    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">
        Close
    </button>
</div>




               </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@foreach($vendors as $vendor)
<div class="modal fade" id="extralarge{{ $vendor->id }}" tabindex="-1" role="dialog" aria-labelledby="editVendorModalLabel{{ $vendor->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Include the content of edit.blade.php here -->
            @include('vendor.edit', ['vendor' => $vendor])
        </div>
    </div>
</div>
@endforeach

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
