@extends('admin_layouts.app')

@section('content')
    <style type="text/css">
        /* Adjust the position of the dropdown */
        .dropdown-menu {
            position: absolute;
            top: calc(100% + 5px);
            left: 0;
            z-index: 1000;
            display: none;
            /* Hide the dropdown initially */
            min-width: 100%;
            /* Make the dropdown full width */
            background-color: #fff;
            /* Set background color */
            border: 1px solid #ccc;
            /* Add border */
            border-radius: 0.25rem;
            /* Add border radius */
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            /* Add shadow */
        }

        /* Show the dropdown when input is focused */
        .input-group:focus-within .dropdown-menu {
            display: block;
        }

        /* Customize the appearance of dropdown items */
        .dropdown-item {
            display: block;
            width: 100%;
            padding: 0.5rem 1rem;
            clear: both;
            font-weight: normal;
            color: #333;
            text-align: inherit;
            white-space: nowrap;
            background-color: transparent;
            border: 0;
        }

        /* Style the dropdown items on hover */
        .dropdown-item:hover,
        .dropdown-item:focus {
            color: #fff;
            text-decoration: none;
            background-color: #007bff;
            /* Highlight color */
        }
    </style>
 <header>
    <nav>
      <ul class="breadcrumb">
        <li><a href="{{route('dashboard')}}">Dashboard /</a></li>
        <li><a href="#">Vehicle Analysis Form</a></li>
 
      </ul>
    </nav>
  </header>


            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Vehicle Analysis Form</h5>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Display validation errors if any -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('vehicle.store') }}" enctype="multipart/form-data">
                            <input type="hidden" name="status" value="1">
                            @csrf
                            <!-- First Column -->
                            <div class="row vehicle-detail">
                                <!-- Vehicle Number -->
                                <div class="col-md-4">
                                    <label for="vehicle_number">Vehicle Number*</label>

                                    <div class="input-group  mb-4">
                                        <span class="input-group-text"><i class="mdi mdi-car"></i></span>
                                        <input type="text" class="form-control" name="vehicle_number[]"
                                            placeholder="Vehicle Number" aria-label="Vehicle Number"
                                            aria-describedby="basic-icon-default-vehicle" required>
                                    </div>
                                </div>

                                <!-- Vehicle Image -->
                                <div class="col-md-4">
                                    <label for="vehicle_image">Vehicle Image*</label>
                                    <span style="color: #888; font-size: 0.8em;">(Accepts PNG, JPEG, JPG formats)</span>
                                    <div class="input-group ">
                                        <span class="input-group-text"><i class="mdi mdi-image"></i></span>
                                        <input type="file" class="form-control vehicle-image" accept="image/*"
                                            aria-label="Vehicle Image" name="vehicle_images[]"
                                            aria-describedby="basic-icon-default-vehicle-image" required>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <img class="m-2 vehicle-preview"
                                        src="{{ asset('/admin_assets/assets/img/avatars/1.png') }}" width="100px">
                                </div>

                                <div class="col-md-2">
                                    <button type="button" class="btn btn-success mt-3 add-more-vehicle">Add More</button>
                                </div>
                            </div>

                            <div id="vehicle-details"></div>

                            <!-- Second Column -->
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Customer Name -->
                                    <label for="customer_name">Customer Name*</label>
                                    <div class="input-group  mb-4">
                                        <span class="input-group-text"><i class="mdi mdi-account-outline"></i></span>
                                        <input type="text" class="form-control" placeholder="Customer Name"
                                            aria-label="Customer Name" aria-describedby="basic-icon-default-customer-name"
                                            name="customer_name" id="customer_name_input" required>
                                        <ul class="dropdown-menu" id="customer_name_dropdown"
                                            aria-labelledby="customer_name"></ul>
                                    </div>
                                    <!-- Customer Number -->
                                    <label for="customer_mobile_input">Customer Number*</label>
                                    <div class="input-group mb-4" style="position: relative;">
                                        <span class="input-group-text"><i class="mdi mdi-phone"></i></span>
                                        <input type="text" class="form-control" placeholder="Customer Number"
                                            aria-label="Customer Number"
                                            aria-describedby="basic-icon-default-customer-number" name="customer_mobile"
                                            id="customer_mobile_input" oninput="validateMobileNumber(this)" maxlength="10">
                                        <div class="error-message" id="customer_mobile_error"
                                            style="display:none; position: absolute; top: 100%; left: 0; background-color: #f8d7da; color: #721c24; padding: 5px; border: 1px solid #f5c6cb; border-radius: 4px; margin-top: 2px;">
                                            Please enter a valid 10-digit number.
                                        </div>
                                        <ul class="dropdown-menu" id="customer_mobile_dropdown"
                                            aria-labelledby="customer_mobile"></ul>
                                    </div>



                                    <!-- Customer Address -->
                                    <label for="customer_address">Customer Address*</label>
                                    <div class="input-group  mb-4">
                                        <span class="input-group-text"><i class="mdi mdi-home"></i></span>
                                        <input type="text" class="form-control" placeholder="Customer Address"
                                            aria-label="Customer Address"
                                            aria-describedby="basic-icon-default-customer-address" name="address"
                                            id="address" required>
                                        <ul class="dropdown-menu" id="address_dropdown" aria-labelledby="address"></ul>
                                    </div>

                                    <!-- City -->
                                    <label for="City">City*</label>
                                    <div class="input-group  mb-4">
                                        <span class="input-group-text"><i class="mdi mdi-city"></i></span>
                                        <input type="text" class="form-control" placeholder="City" aria-label="City"
                                            aria-describedby="basic-icon-default-customer-address" name="city"
                                            id="city" required>
                                        <ul class="dropdown-menu" id="city_dropdown" aria-labelledby="City"></ul>
                                    </div>

                                    <!-- State -->
                                    <label for="State">State*</label>
                                    <div class="input-group  mb-4">
                                        <span class="input-group-text"><i class="mdi mdi-map-marker"></i></span>
                                        <input type="text" class="form-control" placeholder="State"
                                            aria-label="State" aria-describedby="basic-icon-default-customer-address"
                                            name="state" id="state" required>
                                        <ul class="dropdown-menu" id="state_dropdown" aria-labelledby="State"></ul>
                                    </div>

                                    <!-- Referral Name -->
                                    <label for="referral_number">Referral Name</label>
                                    <div class="dropdown  input-group mb-4">
                                        <span class="input-group-text"><i class="mdi mdi-account"></i></span>
                                        <input type="text" class="form-control" placeholder="Referral Name"
                                            aria-label="Referral Name" aria-describedby="basic-icon-default-referral-Name"
                                            name="referred_by" id="referred_by_input" required>
                                        <ul class="dropdown-menu" id="referred_by_dropdown"
                                            aria-labelledby="referred_by_input"></ul>
                                    </div>

                                    <!-- Referral Number -->
                                    <label for="referral_number">Referral Number</label>
                                    <div class="input-group mb-4" style="position: relative;">
                                        <span class="input-group-text"><i class="mdi mdi-phone"></i></span>
                                        <input type="text" class="form-control" placeholder="Referral Number"
                                            aria-label="Referral Number"
                                            aria-describedby="basic-icon-default-referral-number" name="referred_mobile"
                                            id="referred_mobile_input" oninput="validateMobileNumber(this)"
                                            maxlength="10">
                                        <div class="error-message" id="referred_mobile_error"
                                            style="display:none; position: absolute; top: 100%; left: 0; background-color: #f8d7da; color: #721c24; padding: 5px; border: 1px solid #f5c6cb; border-radius: 4px; margin-top: 2px;">
                                            Please enter a valid 10-digit number.
                                        </div>
                                        <ul class="dropdown-menu" id="referred_mobile_dropdown"
                                            aria-labelledby="referred_mobile"></ul>
                                    </div>






                                </div>
                                <!-- Third Column -->
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="vehicle_size">Size of Vehicle*</label>
                                        <select class="form-select mb-3" aria-label="Size of Vehicle" name="vehicle_size"
                                            required>
                                            <option>Small</option>
                                            <option>Medium</option>
                                            <option>Large</option>
                                        </select>
                                    </div>
                                    <!-- Work Category -->
                                    <label for="Work Category">Work Category*</label>
                                    <div class="input-group  mb-4">
                                        <span class="input-group-text"><i class="mdi mdi-briefcase"></i></span>
                                        <input type="text" class="form-control" placeholder="Work Category"
                                            aria-label="work_category"
                                            aria-describedby="basic-icon-default-customer-address" name="work_category"
                                            id="work_category" required>
                                        <ul class="dropdown-menu" id="work_category_dropdown"
                                            aria-labelledby="work_category"></ul>
                                    </div>

                                    <!-- Type of Work -->
                                    <label for="Work Category">Type of Work*</label>
                                    <div class="input-group  mb-4">
                                        <span class="input-group-text"><i class="mdi mdi-wrench"></i></span>
                                        <input type="text" class="form-control" placeholder="Type of Work"
                                            aria-label="work_category"
                                            aria-describedby="basic-icon-default-customer-address" name="type_of_work"
                                            id="type_of_work" required>
                                        <ul class="dropdown-menu" id="type_of_work_dropdown"
                                            aria-labelledby="work_category"></ul>
                                    </div>

                                    <!-- Sector -->
                                    <div class="mb-4">
                                        <label for="sector">Sector*</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="radio" name="sector" id="private"
                                                value="Private" checked required>
                                            <label class="form-check-label" for="private">Private</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="radio" name="sector"
                                                id="government" value="Government" required>
                                            <label class="form-check-label" for="government">Government</label>
                                        </div>
                                    </div>

                                    <!-- Additional fields for Government sector -->
                                    <div id="governmentFields" style="display: none;">
                                        <!-- Department -->
                                        <div class="mb-4">
                                            <label for="department">Department*</label>
                                            <input type="text" class="form-control" placeholder="Department"
                                                aria-label="Department" aria-describedby="basic-icon-default-department"
                                                name="department">
                                        </div>
                                        <!-- Others -->
                                        <div class="mb-4">
                                            <label for="others">Others*</label>
                                            <input type="text" class="form-control" placeholder="Others"
                                                aria-label="others" aria-describedby="basic-icon-default-others"
                                                name="others">
                                        </div>
                                        <!-- Location -->
                                        <div class="mb-4">
                                            <label for="location">Location*</label>
                                            <input type="text" class="form-control" placeholder="Location"
                                                aria-label="Location" aria-describedby="basic-icon-default-location"
                                                name="location">
                                        </div>
                                    </div>


                                    <!-- Work Description -->
                                    <div class="mb-4">
                                        <label for="work_description">Work Description*</label>
                                        <textarea class="form-control" placeholder="Work Description" aria-label="Work Description" style="height: 85px"
                                            name="work_description" required></textarea>
                                    </div>

                                    <!-- Suggested Work Description -->
                                    <div class="mb-4">
                                        <label for="suggested_work_description">Suggested Work Description</label>
                                        <textarea class="form-control" placeholder="Suggested Work Description" aria-label="Suggested Work Description"
                                            name="suggested_work_description" id="suggested_work_description" style="height: 60px" readonly required></textarea>
                                    </div>

                                    <!-- Reviewed By -->
                                    <!--<label for="referral_number">Reviewed By</label>-->

                                    <div class="dropdown input-group mb-4" style="display: none;">
                                        <span class="input-group-text"><i class="mdi mdi-check"></i></span>
                                        <input type="hidden" class="form-control" value="#"
                                            aria-label="Reviewed By" aria-describedby="basic-icon-default-reviewed-by"
                                            name="reviewed_by" id="reviewed_by_input" required>
                                        <ul class="dropdown-menu" id="reviewed_by_dropdown"
                                            aria-labelledby="reviewed_by_input"></ul>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="row">
                                        <div class="col-md-1">

                                            <button type="submit" class="btn btn-primary">Send</button>
                                        </div>
                                    </div>
                        </form>
                    </div>
                </div>
            </div>
        @endsection

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            document.getElementById("customer_mobile_input").addEventListener("input", function() {
                if (this.value.length > 10) {
                    this.value = this.value.slice(0, 10);
                }
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Function to update the suggested work description
                function updateSuggestedWorkDescription() {
                    var typeOfWorkInput = document.getElementById('type_of_work');
                    var suggestedWorkDescriptionTextarea = document.getElementById('suggested_work_description');
                    var selectedTypeOfWork = typeOfWorkInput.value;
                    if (selectedTypeOfWork) {
                        // Make an AJAX request to fetch the description for the selected type of work
                        $.ajax({
                            url: '/get-work-description',
                            method: 'GET',
                            data: {
                                type_of_work: selectedTypeOfWork
                            },
                            success: function(response) {
                                // Update the textarea with the fetched description
                                suggestedWorkDescriptionTextarea.value = response.description || '';
                            }
                        });
                    }


                }

                // Call the function to update the suggested work description initially
                updateSuggestedWorkDescription();

                // Add event listener for when the type of work changes
                document.getElementById('type_of_work').addEventListener('input', updateSuggestedWorkDescription);
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Function to create suggestion dropdown for a given input field
                function createSuggestionDropdown(inputId, dropdownId, suggestionsUrl) {
                    var input = document.getElementById(inputId);
                    var dropdown = document.getElementById(dropdownId);

                    input.addEventListener('input', function() {
                        var inputValue = this.value.trim();
                        if (inputValue.length > 0) {
                            // Make an AJAX request to fetch suggestions
                            $.ajax({
                                url: suggestionsUrl,
                                method: 'GET',
                                data: {
                                    query: inputValue
                                },
                                success: function(response) {
                                    // Clear previous suggestions
                                    dropdown.innerHTML = '';
                                    // Append new suggestions to the dropdown menu
                                    response.forEach(function(suggestion) {
                                        var suggestionElement = document.createElement(
                                        'li');
                                        suggestionElement.classList.add('dropdown-item');
                                        suggestionElement.textContent = suggestion;
                                        suggestionElement.addEventListener('click',
                                            function() {
                                                // Set the selected suggestion as the input value
                                                input.value = suggestion;
                                                // Clear the dropdown
                                                dropdown.innerHTML = '';
                                            });
                                        dropdown.appendChild(suggestionElement);
                                    });
                                    // Show the dropdown
                                    dropdown.classList.add('show');
                                },
                                error: function(xhr, status, error) {
                                    console.error(xhr.responseText);
                                    // Handle error
                                }
                            });
                        } else {
                            // Hide the dropdown if input is empty
                            dropdown.classList.remove('show');
                        }
                    });

                    // Close dropdown when clicking outside
                    document.addEventListener('click', function(event) {
                        if (!dropdown.contains(event.target) && !input.contains(event.target)) {
                            dropdown.classList.remove('show');
                        }
                    });
                }
                // Create suggestion dropdown for "Referral Name"
                createSuggestionDropdown('referred_by_input', 'referred_by_dropdown', '/get-referral-suggestions');

                // Create suggestion dropdown for "Reviewed By"
                createSuggestionDropdown('reviewed_by_input', 'reviewed_by_dropdown', '/get-reviewed-by-suggestions');

                // Create suggestion dropdown for "Referral Number"
                createSuggestionDropdown('referred_mobile_input', 'referred_mobile_dropdown',
                    '/get-referral-number-suggestions');
                // Create suggestion dropdown for "Customer Name"
                createSuggestionDropdown('customer_name_input', 'customer_name_dropdown', '/get-customer-suggestions');

                // Create suggestion dropdown for "Customer Number"
                createSuggestionDropdown('customer_mobile_input', 'customer_mobile_dropdown',
                    '/get-customer-number-suggestions');
                // Create suggestion dropdown for "Customer Address"
                createSuggestionDropdown('address', 'address_dropdown', '/get-customer-address-suggestions');
                // Create suggestion dropdown for "City"
                createSuggestionDropdown('city', 'city_dropdown', '/get-city-suggestions');
                // Create suggestion dropdown for "State"
                createSuggestionDropdown('state', 'state_dropdown', '/get-state-suggestions');
                // Create suggestion dropdown for "work_category"
                createSuggestionDropdown('work_category', 'work_category_dropdown', '/get-work-category-suggestions');

                // Create suggestion dropdown for "work_category"
                createSuggestionDropdown('type_of_work', 'type_of_work_dropdown', '/get-type-of-work-suggestions');

            });
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelector('.add-more-vehicle').addEventListener('click', function() {
                    var vehicleHtml = `
            <div class="row mt-4 vehicle-detail">
                <div class="col-md-4">
                    <label for="vehicle_number">Vehicle Number</label>
                    <div class="input-group  mb-4">
                        <span class="input-group-text"><i class="mdi mdi-car"></i></span>
                        <input type="text" class="form-control" name="vehicle_number[]" placeholder="Vehicle Number" aria-label="Vehicle Number" aria-describedby="basic-icon-default-vehicle" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="vehicle_image">Vehicle Image</label>
                    <div class="input-group ">
                        <span class="input-group-text"><i class="mdi mdi-image"></i></span>
                        <input type="file" class="form-control vehicle-image" accept="image/*" aria-label="Vehicle Image" name="vehicle_images[]" aria-describedby="basic-icon-default-vehicle-image" required>
                    </div>
                </div>
                <div class="col-md-2">
                    <img class="m-2 vehicle-preview" src="{{ asset('/admin_assets/assets/img/avatars/1.png') }}" width="100px">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger mt-3 remove-vehicle">Remove</button>
                </div>
            </div>`;
                    document.getElementById('vehicle-details').insertAdjacentHTML('beforeend', vehicleHtml);
                });

                document.addEventListener('change', function(event) {
                    if (event.target.classList.contains('vehicle-image')) {
                        var input = event.target;
                        var reader = new FileReader();
                        reader.onload = function() {
                            var preview = input.closest('.vehicle-detail').querySelector(
                            '.vehicle-preview');
                            preview.src = reader.result;
                        };
                        reader.readAsDataURL(input.files[0]);
                    }
                });

                document.addEventListener('click', function(event) {
                    if (event.target.classList.contains('remove-vehicle')) {
                        event.target.closest('.vehicle-detail').remove();
                    }
                });
            });
        </script>


        <script>
            // Function to validate mobile number format
            function validateMobileNumber(inputField) {
                const inputValue = inputField.value;
                const mobileNumberPattern = /^[0-9]{10}$/; // Regular expression to match exactly 10 digits
                if (!mobileNumberPattern.test(inputValue)) {
                    alert("Please enter a valid 10-digit mobile number.");
                    inputField.value = ''; // Clear the input field if the entered value is not valid
                }
            }

            // Add event listeners to invoke validation function on input
            document.getElementById("customer_mobile_input").addEventListener("input", function() {
                validateMobileNumber(this);
            });

            document.getElementById("referred_mobile_input").addEventListener("input", function() {
                validateMobileNumber(this);
            });

            function validateMobileNumber(input) {
                const errorElementId = input.id === 'customer_mobile_input' ? 'customer_mobile_error' : 'referred_mobile_error';
                const errorMessage = document.getElementById(errorElementId);
                const value = input.value;

                // Check if the input is a number and has exactly 10 digits
                if (/^\d{0,10}$/.test(value) && /^\d+$/.test(value)) {
                    errorMessage.style.display = 'none'; // Hide error message if valid
                } else {
                    errorMessage.style.display = 'block'; // Show error message if invalid
                }

                // Restrict input to numbers only
                input.value = input.value.replace(/\D/g, '');
            }
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const governmentRadio = document.getElementById('government');
                const governmentFieldsContainer = document.getElementById('governmentFields');

                // Function to toggle display of additional fields for government sector
                function toggleGovernmentFields() {
                    governmentFieldsContainer.style.display = governmentRadio.checked ? 'block' : 'none';
                }

                // Initial toggle state
                toggleGovernmentFields();

                // Add event listener to toggle fields when radio button changes
                governmentRadio.addEventListener('change', toggleGovernmentFields);

                const privateRadio = document.getElementById('private');

                // Function to hide government fields when private radio button is selected
                function hideGovernmentFields() {
                    governmentFieldsContainer.style.display = 'none';
                }

                // Add event listener to private radio button to hide government fields
                privateRadio.addEventListener('change', hideGovernmentFields);
            });
        </script>
