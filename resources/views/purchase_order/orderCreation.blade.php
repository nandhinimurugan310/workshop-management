@extends('admin_layouts.app')

@section('content')

 <header>
    <nav>
      <ul class="breadcrumb">
          <li><a href="{{route('dashboard')}}">Dashboard /</a></li>
        <li><a href="#">Purchase Order - Allocation</a></li>
 
      </ul>
    </nav>
  </header>
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="mb-0">Purchase Order - Allocation</h3>
        </div>
        <div class="card-body">

            <div class="col-lg-12">
                <div class="d-flex align-items-center justify-content-between">
                    <h6 class="card-title m-0 me-2">Vehicle Details</h6>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="transactionID" onclick="showImagePreview(this)" data-image-src="{{ asset('storage/app/public/'.$vehicle->vehicle_image) }}" aria-haspopup="true" aria-expanded="false">
                            <a href="#">
                                <i class="mdi mdi-car mdi-24px"></i>
                                <span>View image</span>
                            </a>
                        </button>
                        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="imageModalLabel">Vehicle Image Preview</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img id="modalVehicleImage" src="" alt="Vehicle Image" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-2 col-6 ">
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <div class="avatar-initial btn-secondary rounded shadow">
                                    <i class="mdi mdi-account-outline mdi-24px"></i>
                                </div>
                            </div>
                            <div class="ms-3">
                                <div class="small mb-1">Name</div>
                                <h6 class="small mb-1">{{ $vehicle->analysis->customer_name }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-6 ">
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <div class="avatar-initial btn-dark rounded shadow">
                                    <i class="mdi mdi-phone mdi-24px"></i>
                                </div>
                            </div>
                            <div class="ms-3">
                                <div class="small mb-1">Mobile</div>
                                <h6 class="small mb-1">{{ $vehicle->analysis->customer_mobile }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-6 ">
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <div class="avatar-initial bg-success rounded shadow">
                                    <i class="mdi  mdi-car mdi-24px"></i>
                                </div>
                            </div>
                            <div class="ms-3">
                                <div class="small mb-1">Vehicle Number</div>
                                <h6 class="small mb-1">{{ $vehicle->vehicle_number }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-6 ">
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <div class="avatar-initial bg-success rounded shadow">
                                    <i class="mdi mdi-wrench mdi-24px"></i>
                                </div>
                            </div>
                            <div class="ms-3">
                                <div class="small mb-1">Type of Work</div>
                                <h6 class="small mb-1 text-wrap" style="max-width: 100px;">{{ $vehicle->analysis->type_of_work }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-6 ">
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <div class="avatar-initial bg-warning rounded shadow">
                                    <i class="mdi mdi-office-building mdi-24px"></i>
                                </div>
                            </div>
                            <div class="ms-3">
                                <div class="small mb-1">Sector</div>
                                <h6 class="small mb-1">{{ $vehicle->analysis->sector }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-6 ">
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <div class="avatar-initial bg-info rounded shadow">
                                    <i class="mdi mdi-check mdi-24px"></i>
                                </div>
                            </div>
                            <div class="ms-3">
                                <div class="small mb-1">Reviewed By</div>
                                <h6 class="small mb-1">{{ $vehicle->analysis->reviewed_by }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <h5 class="mb-3">Allocate Material For Supplier</h5>
            </div>
            <div class="row mb-6 g-6">
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="content-left">
                                    <h5 class="mb-1">Supplier Name</h5>
                                    <small>Price: $200 <br> Date: dd/mm/yyyy</small>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="content-left">
                                    <h5 class="mb-1">Supplier Name</h5>
                                    <small>Price: $200 <br> Date: dd/mm/yyyy</small>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="content-left">
                                    <h5 class="mb-1">Supplier Name</h5>
                                    <small>Price: $200 <br> Date: dd/mm/yyyy</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="content-left">
                                    <h5 class="mb-1">Supplier Name</h5>
                                    <small>Price: $200 <br> Date: dd/mm/yyyy</small>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="mt-4">
                <h5 class="mb-3">Allocate Supplier for {{ $vehicle->vehicle_number }} Material</h5>
            </div>

            <div class="mt-4">
                <div class="row mb-6">
                    <div class="table-responsive">
                        <table style="width:100%" class="table table-striped table-bordered mt-4 pt-4" id="material_new">
                            <!-- Table Headers -->
                            <thead class="bg-primary">
                                <tr>
                                    <th scope="col" style="color:white;font-size:medium;text-align:center">Material Name</th>
                                    <th scope="col" style="color:white;font-size:medium;text-align:center">Select Supplier</th>
                                    <th scope="col" style="color:white;font-size:medium;text-align:center">Brand</th>
                                    <th scope="col" style="color:white;font-size:medium;text-align:center">Quantity</th>
                                    <th scope="col" style="color:white;font-size:medium;text-align:center">Unit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vehicle->materialAllocations as $materialAllocation) @if($materialAllocation->supplier_id==Null)
                                <tr id="allocation-row-{{$materialAllocation->id}}" class="bg-white">
                                    <td>{{$materialAllocation->material_name}}</td>
                                    <td>
                                        <select class="form-select form-select-sm update-material-allocation" name="supplier_id" data-allocation-id="{{ $materialAllocation->id }}">
                                            <option value="">Select Supplier</option>
                                            @foreach($vendors as $ven)
                                            <option value="{{ $ven->id }}">{{ $ven->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>{{$materialAllocation->brand}}</td>
                                    <td>{{$materialAllocation->quantity}}</td>
                                    <td>{{$materialAllocation->unit_of_measurement}}</td>
                                </tr>
                                @endif @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Allocate Supplier for Material Section -->
            <div class="mt-4">
                <h5 class="mb-3">{{ $vehicle->vehicle_number }} Supplier list</h5>
            </div>
            <div class="col-xl-12 dynamic">
                
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize DataTables for all tables with the 'supplierTable' class
        var table = $('#material_new').DataTable();
        // Initialize DataTables for all tables with the 'table' class
       
    });
</script>


<script>
    $(document).ready(function() {
    // Set CSRF token for all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

       $(document).on('change', '.update-material-allocation', function() {

        var supplierId = $(this).val();
        var allocationId = $(this).data('allocation-id');
        var row = $(this).closest('tr'); // Reference to the row
        $.ajax({
            url: '{{ route("updatematerialallocation") }}',
            type: 'GET',
            data: {
                supplier_id: supplierId,
                allocation_id: allocationId
            },
            success: function(response) {
                if (response.success) {
                    console.log('Material allocation updated successfully');
                     row.remove();
                     fetchSupplierList({{$vehicleNumber}});
                } else {
                    console.error('Failed to update material allocation');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error updating material allocation:', error);
            }
        });
    });
});

    function showImagePreview(button) {
        var imageSrc = button.getAttribute('data-image-src');
        var modalVehicleImage = document.getElementById('modalVehicleImage');
        modalVehicleImage.src = imageSrc;
        var imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
        imageModal.show();
    }

   function fetchSupplierList(id) {
    $.ajax({
        url: '{{ route("get.supplier.list", "") }}/' + id, // Construct the URL with the ID
        type: 'GET',
        success: function(response) {
            $('.dynamic').html(response.html);
        },
        error: function(xhr, status, error) {
            console.error('Error fetching supplier list:', error);
        }
    });
}
$(document).ready(function() {
    fetchSupplierList({{$vehicleNumber}});
});
</script>