@extends('admin_layouts.app')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>

    

.column-container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .column {
        width: 48%;
    }

    .table-container {
    display: flex; /* Use flexbox to align tables side by side */
    justify-content: space-between; /* Add space between tables */
}

.left-table-container,
.right-table-container {
    flex-basis: 48%; /* Set width for each table */
}

.left-table,
.right-table {
    width: 48%; /* Make tables occupy full width of their container */
}


    .column-container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .column {
        width: 48%;
    }
.form-left label,
.form-left input,
.form-left textarea,
.form-left select {
    display: block;
    margin-bottom: 10px;
}

.form-right {
    text-align: center; /* To center align the image */
}

.vehicle-image-container img {
    max-width: 100%; /* Ensures the image does not exceed its container width */
    height: auto; /* Maintains the image aspect ratio */
}

.image-box {
    border: 5px solid #ccc;
    padding: 10px;
    height: 200px; /* Adjust height as needed */
    width: 300px;
    overflow-y: auto;
    margin-bottom: 20px;
}

.table-container {
    display: flex;
    justify-content: space-between;
}

.left-table {
        width: 40%; /* Reduce the width of the left table */
    }

    .right-table {
        width: 60%; /* Increase the width of the right table */
    }
.left-table, .right-table {
    border-collapse: collapse;
    width: 45%;
}

.left-table th, .right-table th {
    border: 1px solid #ddd;
    padding: 8px;
}

.left-table td, .right-table td {
    border: 1px solid #ddd;
    padding: 8px;
}
.copy-button {
    margin-top: auto; /* Align the button to the bottom of the container */
    margin-left: auto; /* Align the button to the right */
    margin-right: auto; /* Align the button to the left */
    height: 30px;
    padding: 5px 10px;
}


.save-button {
    display: block;
    margin: 0 auto;
}
.additional-fields {
    margin-top: 20px;
    text-align: center;
}


.carousel-item img {
    max-width: 300px; /* Adjust as needed */
    height: auto; /* Maintain aspect ratio */
}
.additional-fields label {
    margin-bottom: 5px; /* Adjust the margin as needed */
}

.additional-fields {
    display: flex;
}

.field {
    margin-right: 20px; /* Adjust the margin as needed */
}


.blue-button {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center; /* Align text at the center */
    text-decoration: none; /* Remove underline */
    color: white;
    padding: 10px 20px;
    background-color: blue;
    border-radius: 5px;
    font-weight: bold; /* Make the text bold */
}

button {
    background-color: purple;
    color: white;
    padding: 8px 16px; /* Adjust padding to reduce button size */
    border: none;
    border-radius: 5px;
    text-decoration: none;
    display: inline-block;
    margin-top: 5px; /* Adjust margin as needed */
    cursor: pointer;
    font-size: 14px; /* Adjust font size */
}

.card {
    width: 100%; /* Ensure the card occupies the full width */
}

.table-container {
    display: none; /* Initially hide the table container */
}

.left-table, .right-table {
    border-collapse: collapse;
    width: 100%; /* Make both tables occupy full width */
}


</style>

<!DOCTYPE html>
<html lang="en">

<body>
<div class="card">
    <div class="card-header">
        <a href="#" class="blue-button">
            <h3>Purchase Order Allocation</h3>
        </a>
        <!-- <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Vehicle Service Analysis</a></li>
                <li class="breadcrumb-item active" aria-current="page">Purchase Order Create</li>
            </ol>
        </nav> -->
    </div>
<div class="container">
    <!-- Search input -->
    <label for="searchInput" class="highlight">Search by Vehicle Number:</label>
    <input type="text" id="searchInput">
    <button id="searchButton" class="btn btn-primary">Search</button>

    <!-- Right side, initially hidden -->
    <div class="card mt-3" id="searchResults" style="display:none;">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <!-- Vehicle details -->
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">Vehicle Number</h6>
                                    <p class="card-text">TN O7 BS 7571</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Customer Name</h5>
                                    <p class="card-text">Raju</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Contact Number</h5>
                                    <p class="card-text">9876543212</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Second Row: Vehicle Type, Reviewed By, Review Date -->
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Reviewed By</h5>
                                    <p class="card-text">Sub-Manager</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Review Date</h5>
                                    <p class="card-text">2024-05-16</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Vehicle Type</h5>
                                    <p class="card-text">TATA-ACE</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <!-- Image -->
                    <img src="{{asset('assets/images/image2.jpeg')}}" class="img-fluid" alt="Vehicle Image">
                </div>
            </div>
        </div>
    </div>
    <div class="table-container mt-3" id="materialTable" style="display: flex;">
    <div class="left-table-container" style="flex: 1;">
        <table class="left-table" id="material-table">
            <thead>
                <tr>
                    <th colspan="4">Material Requirement</th>
                </tr>
                <tr>
                    <th>Material Name</th>
                    <th>Brand</th>
                    <th>Quantity</th>
                    <th>Unit of Measurement</th>
                </tr>
            </thead>
            <tbody>
                @php
                // Define an array of dummy data for auto body work
                $materials = [
                    ['Bumper', 'TATA', 1, 'pieces'],
                    ['Headlight', 'TATA', 2, 'pieces'],
                    ['Door handle', 'TATA', 4, 'pieces'],
                    ['Wheel arch', 'TATA', 4, 'pieces'],
                    ['Side window', 'TATA', 8, 'pieces'],
                    ['Taillight', 'TATA', 2, 'pieces'],
                    ['Rear window', 'TATA', 2, 'pieces'],
                    ['Window Regulator', 'TATA', 1, 'pieces'],
                    ['Roof Rack', 'TATA', 1, 'pieces'],
                    ['Headlight Assembly', 'TATA', 2, 'pieces'],
                    ['Material 11', 'Supplier K', 14, 'pieces'],
                    ['Material 12', 'Supplier L', 9, 'pieces'],
                    ['Material 13', 'Supplier M', 23, 'pieces'],
                    ['Material 14', 'Supplier N', 16, 'pieces'],
                    ['Material 15', 'Supplier O', 11, 'pieces'],
                ];
                @endphp
                @foreach ($materials as $material)
                <tr class="material-row">
                    <td><input type="text" value="{{ $material[0] }}"></td>
                    <td><input type="text" value="{{ $material[1] }}"></td>
                    <td><input type="text" value="{{ $material[2] }}"></td>
                    <td><input type="text" value="{{ $material[3] }}"></td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="4"><button class="add-more-button">Add More</button></td>
                    <!-- <td><button class="close-button">Close</button></td> -->
                </tr>
            </tbody>
        </table>
        <button class="copy-button"><<</button>
    </div>
    <div class="right-table-container" style="flex: 1;">
        <table class="right-table">
            <thead>
                <tr>
                    <th>Suggested Materials</th>
                </tr>
            </thead>
            <tbody>
                @php
                $materials = [
                    "Body Hammer",
                    "Welding Mask",
                    "Screwdriver Set",
                    "Paint Sprayer",
                    "Angle Grinder",
                    "Socket Wrench Set",
                    "Pliers",
                    "Air Compressor",
                    "Jack Stand",
                    "Toolbox",
                    "Work Gloves",
                    "Safety Glasses",
                    "Tire Pressure Gauge",
                    "Oil Filter Wrench",
                    "Torque Wrench"
                ];
                @endphp

                @foreach ($materials as $material)
                <tr>
                    <td><input type="checkbox">{{ $material }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</div>
<div style="text-align: center;">
<button class="save-button">Save</button>
</div>
<div class="card">
    <!-- Card content -->
    <div class="additional-fields" style="display: none;"> <!-- Initially hidden -->
        <!-- Additional fields -->
        <div class="field">
            <label for="total-allocated"><strong> No. of Allocated Material:</strong></label>
            <span id="total-allocated">10</span>
        </div>
        <div class="field">
            <label for="allocated-by"><strong>Allocated by:</strong></label>
            <span id="allocated-by">Rajesh</span>
        </div>
        <div class="field">
            <label for="allocation-date"><strong>Allocation Date:</strong></label>
            <span id="allocation-date"></span>
        </div>
    </div>
</div>

    <!-- Add your JavaScript file here for interactivity -->
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>


$(document).ready(function(){
            $('#searchButton').click(function(){
                // Perform search functionality here...

                // Assuming search is successful, show the search results
                $('#searchResults').show();
                $('#materialTable').show(); // Show the material table
            });
        });

  $(document).ready(function(){
    // Function to show the content after search
    function showContent() {
        $('.card-body').show(); // Show the card-body content
        $('.table-container').show(); // Show the table container
        $('.additional-fields').show(); // Show the additional fields
    }

    // Function to hide the content initially
    function hideContent() {
        $('.card-body').hide(); // Hide the card-body content initially
        $('.table-container').hide(); // Hide the table container initially
        $('.additional-fields').hide(); // Hide the additional fields initially
    }

    // Call hideContent function on document ready
    hideContent();

    // Event listener for search button click
    $('#searchButton').click(function(){
        // Perform search functionality here...

        // Assuming search is successful, call showContent function to display the content
        showContent();
    });
});


$(document).ready(function(){
    $(document).on('click', '.add-more-button', function(){
        var newRow = '<tr class="material-row">';
        for (var i = 0; i < 4; i++) {
            newRow += '<td><input type="text" placeholder="New Field"></td>';
        }
        newRow += '<td><button class="close-button">Close</button></td>'; // Add close button
        newRow += '</tr>';
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
});

</script>

@endsection
            