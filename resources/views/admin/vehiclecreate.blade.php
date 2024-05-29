@extends('admin_layouts.app')

@section('content')
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Vehicle Analysis Form</h5>
        </div>
        <div class="card-body">
            <form>
                <!-- First Column -->
                <div class="row">
                    <div class="col-md-6">
                        <label for="vehicle_number">Vehicle Number</label>
                        <div class="input-group input-group-merge mb-4">
                            <span class="input-group-text"><i class="mdi mdi-car"></i></span>
                            <input type="text" class="form-control" placeholder="Vehicle Number" aria-label="Vehicle Number" aria-describedby="basic-icon-default-vehicle">
                        </div>
                      <label for="vehicle_image">Vehicle Image</label>
                          <small class="form-text text-muted">Accepted formats: jpeg, png, jpg</small>
<div class="input-group input-group-merge">
    <span class="input-group-text"><i class="mdi mdi-image"></i></span>
    <input type="file" class="form-control" id="vehicle_image" name="vehicle_image" aria-label="Vehicle Image" aria-describedby="basic-icon-default-vehicle-image">
</div>
<div id="file-validation-error" class="text-danger" style="display:none;">Please select a JPG, JPEG, or PNG file.</div>

                        <img class="m-2" src="{{ asset('assets/img/avatars/1.png') }}" width="100px"><br>

                        <label for="customer_name">Customer Name</label>
                        <div class="input-group input-group-merge mb-4">

                            <span class="input-group-text"><i class="mdi mdi-account-outline"></i></span>
                            <input type="text" class="form-control" placeholder="Customer Name" aria-label="Customer Name" aria-describedby="basic-icon-default-customer-name">
                        </div>

                        <label for="customer_number">Customer Number</label>
                        <div class="input-group input-group-merge mb-4">

                            <span class="input-group-text"><i class="mdi mdi-phone"></i></span>
                            <input type="text" class="form-control" placeholder="Customer Number" aria-label="Customer Number" aria-describedby="basic-icon-default-customer-number">
                        </div>

                        <label for="customer_address">Customer Address</label>
                        <div class="input-group input-group-merge mb-4">

                            <span class="input-group-text"><i class="mdi mdi-map-marker"></i></span>
                            <input type="text" class="form-control" placeholder="Customer Address" aria-label="Customer Address" aria-describedby="basic-icon-default-customer-address">
                        </div>



                        <div class="mb-4">
                            <label for="city">City</label>
                            <select class="form-select mb-3" aria-label="City">
                                <option selected>City</option>
                                <!-- Add city options here -->
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="state">State</label>
                            <select class="form-select mb-3" aria-label="State">
                                <option selected>State</option>
                                <!-- Add state options here -->
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="vehicle_size">Size of Vehicle</label>
                            <select class="form-select mb-3" aria-label="Size of Vehicle">
                                <option>Small</option>
                                <option>Medium</option>
                                <option>Large</option>
                                <!-- Add size options here -->
                            </select>
                        </div>

                    </div>

                    <!-- Second Column -->
                    <div class="col-md-6">
                        <label for="referral_name">Referral Name</label>
                        <div class="input-group input-group-merge mb-4">

                            <span class="input-group-text"><i class="mdi mdi-account-outline"></i></span>
                            <input type="text" class="form-control" placeholder="Referral Name" aria-label="Referral Name" aria-describedby="basic-icon-default-referral-Name">
                        </div>
                        <label for="referral_number">Referral Number</label>

                        <div class="input-group input-group-merge mb-4">
                            <span class="input-group-text"><i class="mdi mdi-numeric"></i></span>
                            <input type="text" class="form-control" placeholder="Referral Number" aria-label="Referral Number" aria-describedby="basic-icon-default-referral-number">
                        </div>

                        <label for="work_type">Work Category</label>

                        <div class="input-group input-group-merge mb-4">

                            <input type="text" class="form-control" placeholder="Work Category" aria-label="WorkCategory" aria-describedby="basic-icon-default-referral-number">
                        </div>

                        <label for="work_type">Type of Work</label>

                        <div class="input-group input-group-merge mb-4">


                            <input type="text" class="form-control" placeholder="Type of Work" aria-label="Type_of_Work" aria-describedby="basic-icon-default-referral-number">
                        </div>



                        <div class="mb-4">
                            <label for="suggested_work_description">Sector</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="private" checked>
                                <label class="form-check-label" for="private">Private</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="government">
                                <label class="form-check-label" for="government">Government</label>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="suggested_work_description">Suggested Work Description</label>
                            <textarea class="form-control" placeholder="Suggested Work Description" aria-label="Suggested Work Description" style="height: 60px"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="work_description">Work Description</label>
                            <textarea class="form-control" placeholder="Work Description" aria-label="Work Description" style="height: 120px"></textarea>
                        </div>

                    </div>
                </div>
                <!-- Submit Button -->
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById('vehicle_image').addEventListener('change', function() {
        var fileInput = this;
        var filePath = fileInput.value;
        // Check if the selected file is of the allowed types
        if (/\.(jpe?g|png)$/i.test(filePath)) {
            // File type is allowed, hide validation error message
            document.getElementById('file-validation-error').style.display = 'none';
        } else {
            // File type is not allowed, show validation error message and clear the input
            document.getElementById('file-validation-error').style.display = 'block';
            fileInput.value = ''; // Clear the input field
        }
    });
</script>
@endsection
