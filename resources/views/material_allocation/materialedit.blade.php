@extends('admin_layouts.app')

@section('content')
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="mb-0">Edit Material Allocation Form</h3>
            </div>
            <div class="card-body">
                <!-- Search Field and Button
                <div class="col-4 mb-4">
                    <label for="search_field">Search</label>
                    <form action="{{ route('search-vehicle-edit') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                                aria-describedby="button-search" name="query" id="search_field"  value="{{ isset($vehicle_number) ? $vehicle_number : '' }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" id="button-search">Search</button>
                            </div>
                            @if(session('error'))
                            <div class="text-danger">{{ session('error') }}</div>
                        @endif
                        </div>
                    </form>
                </div> -->
                @if (isset($vehicle))
                <div class="col-lg-12">
                    <div class="d-flex align-items-center justify-content-between">
                      <h6 class="card-title m-0 me-2">Vehicle Details</h6>
                      <div class="dropdown">
                        <button class="btn p-0" type="button" id="transactionID" onclick="showImagePreview(this)" data-image-src="{{ asset('storage/app/public/'.$vehicle->vehicle_image) }}" aria-haspopup="true" aria-expanded="false">
                          <i class="mdi mdi-car mdi-24px"></i>
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


 <!-- Material Allocation Section -->
                    <div class="mt-4">
                        <h5 class="mb-3">Material Allocation for {{ $vehicle->vehicle_number }}</h5>
                    </div>

                    <div class="mt-4">
                        <div class="row mt-2">
                            <div class="col-11">
                                <button class="add-more-button btn btn-primary">+ Add Material</button>
                            </div>
                            <div class="col-11">
                                <div class="table-container mt-3" id="materialTable" style="display: flex;">
                                    <div class="left-table-container" style="flex: 1;">
                                        <form method="POST" action="{{ route('materialallocations.update', $vehicle->id) }}">
                                            @csrf
                                            <!-- Spoofing PUT request -->
                                            @method('POST')
                                            <table style="width:100%" class="table table-striped table-bordered mt-4 pt-4" id="material-table" >
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th style="color:white">Material Name</th>
                                                        <th style="color:white">Brand</th>
                                                        <th style="color:white">Quantity</th>
                                                        <th style="color:white;text-align:center">Unit</th>
                                                        <th style="color:white">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($vehicle->materialAllocations as $materialAllocation)
                                                        <tr class="material-row">
                                                            <td>
                                                                <input type="text" name="material_name[]" class="form-control" value="{{ $materialAllocation->material_name }}" required>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="brand[]" class="form-control" value="{{ $materialAllocation->brand }}"required>
                                                            </td>
                                                            <td>
                                                                <input type="number" name="quantity[]" class="form-control" value="{{ $materialAllocation->quantity }}"required>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="unit_of_measurement[]" class="form-control" value="{{ $materialAllocation->unit_of_measurement }}"required>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="material_id[]" value="{{ $materialAllocation->id }}">
                                                                <!-- Update the button to include data-material-id attribute -->
<button type="button" class="btn btn-danger delete-material" data-material-id="{{ $materialAllocation->id }}">Delete</button>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <button type="submit" class="btn btn-success mt-3">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @elseif(isset($message))
                    <p>{{ $message }}</p>
                @endif

            </div>
        </div>
    </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
  $(document).ready(function() {
    // Set CSRF token for all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.delete-material').click(function() {
        var materialId = $(this).data('material-id');
        var $rowToDelete = $(this).closest('tr'); // Assuming the row is a table row <tr>

        // AJAX request to delete material
        $.ajax({
            url: '/delete-material/' + materialId,
            type: 'get',
            success: function(response) {
                // Handle success response
                console.log('Material deleted successfully');

                // Remove the corresponding row from the DOM
                $rowToDelete.remove();
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error('Error deleting material:', error);
            }
        });
    });
});
    $(document).on('click', '.add-more-button', function() {
        var newRow = `<tr class="material-row">
            <td>
                <input type="text" name="material_name[]" class="form-control" placeholder="Material Name"required>
            </td>
            <td>
                <input type="text" name="brand[]" class="form-control" placeholder="Brand"required>
            </td>
            <td>
                <input type="number" name="quantity[]" class="form-control" placeholder="Quantity"required>
            </td>
            <td>
                <input type="text" name="unit_of_measurement[]" class="form-control" placeholder="Unit of Measurement"required>
            </td>
            <td>
                <button type="button" class="btn btn-danger close-button">Delete</button>
            </td>
        </tr>`;
        $('#material-table tbody').append(newRow);
    });

    $(document).on('click', '.close-button', function() {
        $(this).closest('tr').remove();
    });

    // Get the current date
    var currentDate = new Date();

    // Format the date as needed (e.g., YYYY-MM-DD)
    var formattedDate = currentDate.toISOString().slice(0, 10);

    // Set the formatted date as the content of the span element
    document.getElementById("allocation-date").textContent = formattedDate;
</script>
<script>
    function showImagePreview(button) {
        var imageSrc = button.getAttribute('data-image-src');
        var modalVehicleImage = document.getElementById('modalVehicleImage');

        // Set the image source based on the data attribute of the button
        modalVehicleImage.src = imageSrc;

        // Show the modal
        var imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
        imageModal.show();
    }
</script>
