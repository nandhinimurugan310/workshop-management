@extends('admin_layouts.app') @section('content')
<style>
    /* CSS for black outer border */
    .outer-border {
        border:1px solid rgba(0,0,0,.125);
        padding: 5px;
    }
    /* CSS for border below "Materials" heading */
    .materials-heading {
        border-bottom: 1px solid #ccc;

    }
     .text-wrap {
    overflow-wrap: break-word;
    word-wrap: break-word;
    hyphens: auto;
  }
</style>
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="mb-0">Material Allocation Form</h3>
        </div>
        <div class="card-body">
            <!-- Search Field and Button
           <div class="col-4 mb-4">
                <label for="search_field">Search</label>
                <form action="{{ route('search') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-search" name="query" id="search_field"
                            value="{{ isset($vehicle_number) ? $vehicle_number : '' }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" id="button-search">Search</button>
                        </div>
                    </div>
                    @if(session('error'))
                        <div class="text-danger">{{ session('error') }}</div>
                    @endif
                </form>
            </div> -->

<!---->
@if(@$results !== null)
<div class="col-lg-12">

        <div class="d-flex align-items-center justify-content-between">
          <h6 class="card-title m-0 me-2">Vehicle Details</h6>
          <div class="dropdown">
           <button class="btn p-0" type="button" id="transactionID" onclick="showImagePreview(this)" data-image-src="{{ asset('storage/app/public/'.$results['vehicle_image']) }}" aria-haspopup="true" aria-expanded="false">
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
                <h6 class="small mb-1">{{ $results['customer_name'] }}</h6>
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
                <h6 class="small mb-1">{{ $results['customer_mobile'] }}</h6>
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
                <h6 class="small mb-1">{{$results['vehicle_number']}}</h6>
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
                <h6 class="small mb-1 text-wrap" style="max-width: 100px;">{{ $results['type_of_work'] }}</h6>
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
                <h6 class="small mb-1">{{ $results['sector'] }}</h6>
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
                <h6 class="small mb-1">{{ $results['reviewed_by'] }}</h6>
              </div>
            </div>
          </div>
        </div>
      </div>


<!---->



            <!-- Material Allocation Section -->
            <div class="section-border">
                <div class="d-flex align-items-center mb-4">
          <p class="mb-1"><span class="text-heading fw-medium">Material Allocation for {{ @$results['vehicle_number'] }}</span> Same As...   </p>
          <span class="badge ms-auto "><form id="search_form"  method="GET">


     <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Search Vehicle" aria-label="Search" aria-describedby="searchButton" name="querys" id="search_field">
  <button class="btn btn-outline-primary" type="button" id="button-searchs">
    <i class="material-icons">search</i>
  </button>
</div>
</form></span>
        </div>


            </div>




            <form action="{{ route('material_allocation.store') }}" method="POST" id="materialAllocationForm">
                @csrf
                <input type="hidden" name="status" value="2">
                <div class="">
                    <div class="row">
                        <div class="col-9 outer-border">
                            <!-- Left Column Content -->
                            <!-- Material Allocation Section -->
                            <div class="">
                                <div class="row mt-2 materials-heading">
                                  <h5>Materials</h5>

                                </div>
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <!-- Table Container for Material Allocation -->
                                        <div class="table-container mt-3" id="materialTable" style="display: flex;">
                                            <div class="left-table-container" style="flex: 1;">
                                                <table class="left-table" id="material-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Material Name</th>
                                                            <th>Brand</th>
                                                            <th>Quantity</th>
                                                            <th>Unit of Measurement</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr class="material-row">
                                                            <td>
                                                                <div class="col-md">

                                                                    <input type="text" name="material_name[]" class="form-control" placeholder="Material Name" required>


                                                                    <input type="hidden" name="vehicle_id" class="form-control" placeholder="Material Name" value="{{@$results['vehicle_id']}}">
                                                                    <input type="hidden" name="type_of_work" class="form-control" placeholder="Material Name" value="{{@$results['type_of_work']}}">
                                                                </div>

                                                            </td>
                                                            <td>
                                                                <div class="col-md">

                                                                    <input type="text" name="brand[]" class="form-control" placeholder="Brand" required>
                                                                </div>

                                                            </td>
                                                            <td>
                                                                <div class="col-md">

                                                                    <input type="number" name="quantity[]" class="form-control" placeholder="Quantity" required>
                                                                </div>

                                                            </td>
                                                            <td>
                                                                <div class="col-md">

                                                                    <input type="text" name="unit_of_measurement[]" class="form-control" placeholder="Unit of Measurement" required>
                                                                </div>

                                                            </td>
                                                            <td> </td>
                                                        </tr>
                                                        <tr class="material-row">
                                                            <td>
                                                                <div class="col-md">

                                                                    <input type="text" name="material_name[]" class="form-control" placeholder="Material Name" required>
                                                                </div>

                                                            </td>
                                                            <td>
                                                                <div class="col-md">

                                                                    <input type="text" name="brand[]" class="form-control" placeholder="Brand" required>
                                                                </div>

                                                            </td>
                                                            <td>
                                                                <div class="col-md">

                                                                    <input type="number" name="quantity[]" class="form-control" placeholder="Quantity" required>
                                                                </div>

                                                            </td>
                                                            <td>
                                                                <div class="col-md">

                                                                    <input type="text" name="unit_of_measurement[]" class="form-control" placeholder="Unit of Measurement" required>
                                                                </div>

                                                            </td>
                                                            <td> </td>
                                                        </tr>


                                                        <tr>
                                                            <td colspan="4" style="padding: 10px 0 10px 16px;">
                                                                <button type="button" class="add-more-button btn btn-primary">Add More</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <center>
                                    <button type="submit" class="btn btn-Success">Save Materials</button>
                                </center>
                            </div>
            </form>
            </div>

            <div class="col-3 outer-border">
                <!-- Right Column Content -->
                <div class="">
                    <div class="row mt-2 materials-heading">
                        <h5>Suggested Materials</h5>

                    </div>
                    <div class="row mt-2 ">
                        <center style="padding: 5px 0 5px 5px;">
                            <button id="checkAllBtn" class="btn btn-primary btn-sm mr-2 waves-effect waves-light"><i class="mdi mdi-arrow-collapse-all"></i></button>
                            <button id="removeAllBtn" class="btn btn-danger btn-sm mr-2 waves-effect waves-light" disabled>    <i class="mdi mdi-delete-sweep"></i></button>


                        </center>

                    </div>

                    <div class="right-table-container" style="flex: 1;">
                      <center>
                        <table class="right-table">

                            <tbody>
                                @if(@$materials!= null)
                                @foreach(@$materials as $key=>$mat)
                                <tr>
                                    <td>
                                        <div class="input-group">
                                            <div class="input-group-text form-check mb-0">
                                                <input type="checkbox" id="checkbox{{$key}}" class="form-check-input m-auto" data-material-name="{{ $mat['material_name'] }}" data-brand="{{ $mat['brand'] }}" data-quantity="{{ $mat['quantity'] }}" data-unit-of-measurement="{{ $mat['unit_of_measurement'] }}">
                                            </div>
                                            <input type="text" class="form-control" value="{{ $mat['material_name'] }}" aria-label="Text input with checkbox">
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        </center>
                    </div>

                </div>

            </div>

            </div>

            </div>
</form>


                        @endif

        </div>

    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
<script>
$(document).ready(function() {
    // Add event listener for the search button click
    $('#button-searchs').on('click', function() {
        // Get the form data
        var formData = $('#search_form').serialize();

        // Send an AJAX request
        $.ajax({
            url: '/search-vehicle-same-add-material', // URL to submit the form data
            type: 'GET', // HTTP method
            data: formData, // Form data
            success: function(response) {
                // Loop through the response data and construct HTML for each row
                if(response)
                {
                    response.forEach(function(data) {
    var newRow = `<tr class="material-row">
        <td>
            <div class="col-md">
                <input type="text" name="material_name[]" class="form-control" placeholder="Material Name" value="${data.material_name}" required>
            </div>
        </td>
        <td>
            <div class="col-md">
                <input type="text" name="brand[]" class="form-control" placeholder="Brand" value="${data.brand}" required>
            </div>
        </td>
        <td>
            <div class="col-md">
                <input type="number" name="quantity[]" class="form-control" placeholder="Quantity" value="${data.quantity}" required>
            </div>
        </td>
        <td>
            <div class="col-md">
                <input type="text" name="unit_of_measurement[]" class="form-control" placeholder="Unit of Measurement" value="${data.unit_of_measurement}" required>
            </div>
        </td>
        <td><button class="close-button btn btn-danger">X</button></td>
    </tr>`;

    // Append the constructed row to the table body
    $('#material-table tbody').append(newRow);
});
                }

            },
            error: function(xhr, status, error) {
                // Handle the error
                console.error(xhr.responseText);
                // Display an error message to the user if needed
            }
        });
    });
});

    $(document).ready(function(){
        // Submit form data using AJAX
        $('#materialAllocationForm').on('submit', function(event){
            event.preventDefault(); // Prevent the form from submitting normally
            var formData = $(this).serialize(); // Serialize form data
            $.ajax({
                url: $(this).attr('action'), // Form action attribute value
                type: $(this).attr('method'), // Form method attribute value
                data: formData, // Form data
                success: function(response){
                    // Handle success response
                    console.log(response);
                    alert("success");
                    // You can redirect to another page or show a success message
                },
                error: function(xhr, status, error){
                    // Handle error
                    console.error(xhr.responseText);
                    // You can display an error message to the user
                }
            });
        });


    });
</script>
<script>
    $(document).ready(function(){
        // Array to keep track of added checkboxes
        var addedCheckboxes = [];

        // Check all checkboxes
        $('#checkAllBtn').on('click', function(){
            $('.form-check-input').each(function() {
                var checkbox = $(this);
                var checkboxId = checkbox.attr('id');
                // Add checkbox if it hasn't been added before
                if (!addedCheckboxes.includes(checkboxId)) {
                    checkbox.prop('checked', true).trigger('change');
                }
            });
        });

        // Remove all checkboxes
        $('#removeAllBtn').on('click', function(){
            $('.form-check-input').prop('checked', false).trigger('change');
            addedCheckboxes = []; // Reset the array when removing all checkboxes
        });

        // Add event listener for checkbox change
        $('.form-check-input').on('change', function(){
            var checkbox = $(this);
            var checkboxId = checkbox.attr('id');
            // Check if the checkbox is checked
            if(checkbox.prop('checked')) {
                var materialName = checkbox.data('material-name');
                var brand = checkbox.data('brand');
                var quantity = checkbox.data('quantity');
                var unitOfMeasurement = checkbox.data('unit-of-measurement');
                // Add checkbox if it hasn't been added before
                if (!addedCheckboxes.includes(checkboxId)) {
                    var newRow = `<tr class="material-row" data-checkbox-id="${checkboxId}">
                        <td>
                            <div class="col-md">
                                <input type="text" name="material_name[]" class="form-control material-name" value="${materialName}" required>
                            </div>
                        </td>
                        <td>
                            <div class="col-md">
                                <input type="text" name="brand[]" class="form-control brand" value="${brand}" required>
                            </div>
                        </td>
                        <td>
                            <div class="col-md">
                                <input type="number" name="quantity[]" class="form-control quantity" value="${quantity}" required>
                            </div>
                        </td>
                        <td>
                            <div class="col-md">
                                <input type="text" name="unit_of_measurement[]" class="form-control unit-of-measurement" value="${unitOfMeasurement}" required>
                            </div>
                        </td>
                        <td><button class="close-button btn btn-danger">X</button></td>
                    </tr>`;
                    $('#material-table tbody').append(newRow);
                    // Add checkbox ID to the array
                    addedCheckboxes.push(checkboxId);
                }
                // Disable "Check All" button if all checkboxes are checked
                if ($('.form-check-input:checked').length === $('.form-check-input').length) {
                    $('#checkAllBtn').prop('disabled', true);
                }
                // Enable "Remove All" button if at least one checkbox is checked
                $('#removeAllBtn').prop('disabled', false);
            } else {
                // Remove the row related to the unchecked checkbox
                $(`tr[data-checkbox-id="${checkboxId}"]`).remove();
                // Remove checkbox ID from the array
                addedCheckboxes = addedCheckboxes.filter(function(item) {
                    return item !== checkboxId;
                });
                // Enable "Check All" button if any checkbox is unchecked
                $('#checkAllBtn').prop('disabled', false);
                // Disable "Remove All" button if all checkboxes are unchecked
                if ($('.form-check-input:checked').length === 0) {
                    $('#removeAllBtn').prop('disabled', true);
                }
            }
        });

        // Remove dynamically added row on button click
        $(document).on('click', '.close-button', function(){
            var row = $(this).closest('tr');
            var checkboxId = row.data('checkbox-id');
            // Uncheck the corresponding checkbox
            $(`#${checkboxId}`).prop('checked', false).trigger('change');
            row.remove();
            // Remove checkbox ID from the array
            addedCheckboxes = addedCheckboxes.filter(function(item) {
                return item !== checkboxId;
            });
            // Enable "Check All" button if any checkbox is unchecked
            $('#checkAllBtn').prop('disabled', false);
            // Disable "Remove All" button if all checkboxes are unchecked
            if ($('.form-check-input:checked').length === 0) {
                $('#removeAllBtn').prop('disabled', true);
            }
        });

        // Disable multiple clicks on "Move All" button
        $('#checkAllBtn, #removeAllBtn').on('click', function(){
            $(this).prop('disabled', true);
        });
    });
</script>

<script>
    $(document).on('click', '.add-more-button', function(){
        var newRow = `<tr class="material-row">
            <td>
                <div class="col-md">

                            <input type="text" name="material_name[]"  class="form-control" placeholder="Material Name" required>
                        </div>

            </td>
            <td>
                <div class="col-md">

                            <input type="text" name="brand[]"  class="form-control" placeholder="Brand" required>
                        </div>

            </td>
            <td>
                <div class="col-md">

                            <input type="number" name="quantity[]"  class="form-control" placeholder="Quantity" required>
                        </div>

            </td>
            <td>
                <div class="col-md">

                            <input type="text" name="unit_of_measurement[]"  class="form-control" placeholder="Unit of Measurement" required>
                        </div>

            </td>
            <td><button class="close-button btn btn-danger">X</button></td>
        </tr>`;
        $('#material-table tbody').append(newRow);
    });

    $(document).on('click', '.close-button', function(){
        $(this).closest('tr').remove();
    });

    // Get the current date
    var currentDate = new Date();

    // Format the date as needed (e.g., YYYY-MM-DD)
    var formattedDate = currentDate.toISOString().slice(0, 10);

    // Set the formatted date as the content of the span element
    document.getElementById("allocation-date").textContent = formattedDate;
</script>
