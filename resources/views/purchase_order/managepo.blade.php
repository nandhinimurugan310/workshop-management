@extends('admin_layouts.app')

@section('content')



<div class="col-xl">
    <div class="card mb-4">


        <div class="card-header">
                  <nav aria-label="breadcrumb">
  <ol class="breadcrumb breadcrumb-style1">
    <li class="breadcrumb-item">
      <a href="{{route("dashboard")}}">Home</a>
    </li>
   
    <li class="breadcrumb-item active">Manage Purchase Order</li>
  </ol>
</nav>
            <h3 class="mb-0">Manage Purchase Order</h3>
        </div>
        <div class="card-body">
            <!-- Display success message if it exists -->
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: relative; padding-right: 2.5rem;">
        {{ session('success') }}
        <!-- Close button -->
        <button type="button" class="close custom-close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
            @endif
            <div class="row">

                      <div class="table-responsive">
                        <table id="example" style="width:100%" class="table table-striped table-bordered mt-4 pt-4">
                          <thead class="bg-primary" >
                            <tr>
                                <th scope="col" style="color:white;font-size:medium;text-align:center">Sno</th>
                                <th scope="col" style="color:white;font-size:medium;text-align:center">Vehicle Numbers</th>
                                <th  scope="col" style="color:white;font-size:medium;text-align:center">Customer Name</th>
                                <th scope="col" style="color:white;font-size:medium;text-align:center">Customer Number</th>
                                <th scope="col" style="color:white;font-size:medium;text-align:center">Materials Count</th>
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
                @if($vehicle['status'] == 1)
                    <span class="badge rounded-pill bg-label-primary">Vehicle Analysed</span>
                @elseif($vehicle['status'] == 2)
                    <span class="badge rounded-pill bg-label-info">Materials allocated</span>
                @elseif($vehicle['status'] == 3)
                    <span class="badge rounded-pill bg-label-success">PO Created</span>
                @elseif($vehicle['status'] == 4)
                    <span class="badge rounded-pill bg-label-danger">Store Checked</span>
                @elseif($vehicle['status'] == 5)
                    <span class="badge rounded-pill bg-label-warning">Delivery Ready</span>
                @else
                    <span class="badge rounded-pill bg-label-dark">Status Unknown</span>
                @endif</td></td>
                                <td style="color:black;text-align:center">
                                    <div class="dropdown">
                                         <button type="button" class="btn rounded-pill btn-outline-primary"
                                            class="dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                           
                                          @if ($counts[$vehicle->id] == 0)
                                                <a class="dropdown-item" href="{{ route('purchase.ordercreation', $vehicle->id) }}">
                                                    <i class="mdi mdi-pencil-outline me-1"></i> Add PO
                                                </a>
                                            @else
                                                <a class="dropdown-item" href="{{ route('purchase.ordercreation', $vehicle->id) }}">
                                                    <i class="mdi mdi-pencil-outline me-1"></i> Edit PO
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
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Vehicle Details</h5>

            </div>
            <div class="modal-body">
                <p><strong>Vehicle Number:</strong> <span id="vehicleNumber"></span></p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Material Name</th>
                                <th>Brand</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody id="materialDetailsBody"></tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeModal()" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.view-btn').click(function(e) {
            e.preventDefault(); // Prevent default anchor behavior

            var vehicleNumber = $(this).data('vehicle');

            $.ajax({
                url: '{{ route("getMaterialName") }}',
                type: 'GET',
                data: { vehicleNumber: vehicleNumber },
                success: function(response) {
                    if (response.materialDetails) {
                        $('#vehicleNumber').text(vehicleNumber);

                        // Clear previous data before appending new data
                        $('#materialDetailsBody').empty();

                        response.materialDetails.forEach(function(material) {
                            var row = '<tr>' +
                                '<td>' + material.name + '</td>' +
                                '<td>' + material.brand + '</td>' +
                                '<td>' + material.quantity + '</td>' +
                                '</tr>';
                            $('#materialDetailsBody').append(row);
                        });

                        // Show the modal after appending the content
                        $('#viewModal').modal('show');
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
    function closeModal() {
        $('#viewModal').modal('hide');
    }
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


