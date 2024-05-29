@extends('admin_layouts.app')

@section('content')



<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="mb-0">Manage Material</h3>
        </div>
        <div class="card-body">
            <!-- Display success message if it exists -->
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <!-- Close button -->
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&timexs;</span>
                </button>
            </div>
            @endif
            <div class="row">

                      <div class="table-responsive">
                        <table id="example" style="width:100%" class="table table-striped table-bordered mt-4 pt-4">
                          <thead class="bg-primary" >
                            <tr>
                                <th scope="col" style="color:white;font-size:small;text-align:center">Sno</th>
                                <th scope="col" style="color:white;font-size:small;text-align:center">Vehicle Numbers</th>
                                <th  scope="col" style="color:white;font-size:small;text-align:center">Customer Name</th>
                                <th scope="col" style="color:white;font-size:small;text-align:center">Customer Number</th>
                                <th scope="col" style="color:white;font-size:small;text-align:center">Materials Count</th>
 <th scope="col" style="color:white;font-size:medium;text-align:center">Status</th>
                                <th scope="col" style="color:white;font-size:medium;text-align:center">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($vehicles as $key=>$vehicle)
                            <tr class="bg-white">
                                <td style="color:black">{{ $key+1 }}</td>
                                <td style="color:black">{{ $vehicle->vehicle_number }}</td>
                                <td style="color:black">{{ $vehicle->analysis->customer_name }}</td>
                                <td style="color:black">{{ $vehicle->analysis->customer_mobile }}</td>
             
                                <td style="color:black;text-align:center">{{ $counts[$vehicle->id] }}</td>
                                <td   style="color:black">
                                    @if( $vehicle['vehicle_status'] == 1)
                                        <span class="badge rounded-pill bg-label-primary">Vehicle Analysed</span>
                                    @elseif($vehicle['vehicle_status'] == 2)
                                        <span class="badge rounded-pill bg-label-info">Materials allocated</span>
                                    @elseif($vehicle['vehicle_status'] == 3)
                                        <span class="badge rounded-pill bg-label-success">PO Created</span>
                                    @elseif($vehicle['vehicle_status'] == 4)
                                        <span class="badge rounded-pill bg-label-danger">Store Checked</span>
                                    @elseif($vehicle['vehicle_status'] == 5)
                                        <span class="badge rounded-pill bg-label-warning">Delivery Ready</span>
                                    @else
                                        <span class="badge rounded-pill bg-label-dark">Status Unknown</span>
                                    @endif</td>
                                <td style="color:black;text-align:center">
                                    <div class="dropdown">
                                        <button type="button" class="btn rounded-pill btn-outline-primary"
                                            class="dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="" class="dropdown-item view-btn" data-vehicle="{{ $vehicle->id }}">
                                                <i class="mdi mdi-eye-outline me-1"></i> View
                                            </a>
                                          @if ($counts[$vehicle->id] == 0)
                                                <a class="dropdown-item" href="{{ route('search', ['query' => $vehicle->id]) }}">
                                                    <i class="mdi mdi-pencil-outline me-1"></i> Add Material
                                                </a>
                                            @else
                                                <a class="dropdown-item" href="{{ route('search', ['query' => $vehicle->id]) }}">
                                                    <i class="mdi mdi-pencil-outline me-1"></i> Edit Material
                                                </a>
                                            @endif
 
            <!--                                 <button type="button" class="btn btn delete-vehicle" data-vehicle-id="{{ $vehicle->id }}">
    <i class="fas fa-trash-alt"></i>&nbsp;&nbsp;<span style="text-transform: capitalize;">delete</span>
</button>-->

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
    </div>
</div>

<!-- Bootstrap Modal -->

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
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row mb-6 g-6">
                    <!-- Total Earning Card -->
                    <div class="col-sm-6 col-xl-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex align-items-center justify-content-between">
                            <div class="content-left">
                              <!-- Format the earning amount with proper currency formatting -->
                              <h6 class="mb-1">Customer Name</h6>
                              <span id="customerName"></span>
                            </div>
                            <span class="badge bg-label-primary rounded-circle p-2">
                              <i class="mdi mdi-account-outline"></i></span>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Unpaid Earning Card -->
                    <div class="col-sm-6 col-xl-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex align-items-center justify-content-between">
                            <div class="content-left">
                              <!-- Format the earning amount with proper currency formatting -->
                              <h6 class="mb-1">Customer Number</h6>
                              <span id="customerNumber"></span>

                            </div>
                            <span class="badge bg-label-success rounded-circle p-2">
                               <i class="mdi mdi-phone-forward"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Signups Card -->
                    <div class="col-sm-6 col-xl-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex align-items-center justify-content-between">
                            <div class="content-left">
                              <!-- Ensure proper formatting for the number of signups -->
                              <h6 class="mb-1">Material Count</h6>
                              <span id="materialCount"></span>
                            </div>
                            <span class="badge bg-label-danger rounded-circle p-2">
                              <i class="mdi mdi-format-list-text"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Conversion Rate Card -->
                    <div class="col-sm-6 col-xl-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex align-items-center justify-content-between">
                            <div class="content-left">
                              <!-- Ensure proper formatting for the conversion rate -->
                              <!--<h6 class="mb-1">Reviewed By</h6>-->
                              <!--<span id="reviewed_by"></span>-->

                            </div>
                            <span class="badge bg-label-info rounded-circle p-2">
                              <i class="ri-refresh-line ri-24px"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


                <div class="row mt-3">
                    <div class="table-responsive">
                        <table id="poptable" style="width:100%" class="table table-striped table-bordered mt-4 pt-4">
                            <thead class="bg-primary">
                                <tr>
                                    <th style="color:white;font-size:small;text-align:center">Material Name</th>
                                    <th style="color:white;font-size:small;text-align:center">Brand</th>
                                    <th style="color:white;font-size:small;text-align:center">Quantity</th>
                                    <th style="color:white;font-size:small;text-align:center">Unit</th>
                                </tr>
                            </thead>
                            <tbody id="materialDetailsBody"></tbody>
                        </table>
                    </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function clearPreviousData() {
    $('#reviewed_by').empty();
    $('#customerNumber').empty();
    $('#customerName').empty();
    $('#vehicleNumber').empty();
    $('#materialCount').empty();
    $('#materialDetailsBody').empty();
}
   $(document).ready(function() {
    $('.view-btn').click(function(e) {
        e.preventDefault(); // Prevent default anchor behavior

        var vehicleNumber = $(this).data('vehicle');

        $.ajax({
            url: '{{ route("getMaterialName") }}',
            type: 'GET',
            data: { vehicleNumber: vehicleNumber },
            success: function(response) {
                if (response && response.materialDetails && response.materialCount > 0) {
                    // Clear previous data
                    clearPreviousData();

                    $('#reviewed_by').text(response.reviewed_by);
                    $('#customerNumber').text(response.customerPhone);
                    $('#customerName').text(response.customerName);
                    $('#vehicleNumber').text(response.vehicle.vehicle_number);
                    $('#materialCount').text(response.materialCount);

                    response.materialDetails.forEach(function(material) {
                        var row = '<tr>' +
                            '<td>' + material.name + '</td>' +
                            '<td>' + material.brand + '</td>' +
                            '<td>' + material.quantity + '</td>' +
                            '<td>' + material.unit_of_measurement + '</td>' +
                            '</tr>';
                        $('#materialDetailsBody').append(row);
                    });

                    // Show the modal after appending the content
                    $('#exLargeModal').modal('show');
                } else if (response.materialCount === 0) {
                    alert('No materials available for this vehicle.');
                } else {
                    alert(response.error);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Error occurred while fetching material details');
            }
        });
    });
});




</script>



<script>
    $(document).ready(function () {
        $('.delete-vehicle').click(function () {
            var vehicleId = $(this).data('vehicle-id');
            if (confirm('Are you sure you want to delete all materials from this vehicle?')) {
                $.ajax({
                    url: '/delete-material/' + vehicleId,
                    type: 'get',
                    dataType: 'json',
                    success: function (response) {
                        alert(response.message);
                        // Reload the page or update the table as needed
                        location.reload(); // For example, reload the page
                    },
                    error: function (xhr, status, error) {
                        // Handle error
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>

@endsection


