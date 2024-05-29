@extends('admin_layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
    <style>
        .card {
            width: 95%; /* Adjust width as needed */
            max-width: 1200px; /* Adjust max-width as needed */
            margin: 20px auto; /* Center the card horizontally */
            padding: 20px; /* Add padding to the card */
            border: 1px solid #ccc; /* Add a border for visual separation */
            height: 100vh; /* Set the height to 100% of the viewport height */
            overflow-x: auto; /* Handle horizontal overflow */
        }

        .navbar {
            margin-bottom: 20px; /* Adjust margin as needed */
        }

        .highlight {
            font-weight: bold;
            color: black; /* Choose your highlight color */
        }

        .image-box {
            border: 5px solid #ccc;
            padding: 10px;
            height: 200px; /* Adjust height as needed */
            width: 300px;
            overflow-y: auto;
            margin-bottom: 20px;
        }

        /* Two-column layout for tables */
        .table-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-top: 20px; /* Adjust margin as needed */
        }

        .table-wrapper {
            overflow-x: auto; /* Handle horizontal overflow */
        }

        .table-container table {
            width: 100%; /* Ensure table uses full width of its container */
            border-collapse: collapse;
            border: 1px solid #ddd; /* Add border */
        }

        .column-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .column-container div {
            width: 70%;
            height: 200px;
        }

        .table-container th, .table-container td {
            border: 1px solid #ddd;
            padding: 5px;
            text-align: left;
        }

        .table-container th {
            background-color: #f2f2f2;
        }

        .edit-button, .delete-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
        }

        .delete-button {
            background-color: #dc3545; /* Red for delete */
        }

        .blue-button {
            background-color: blue;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            display: block; /* Change display property to block */
            width: 100%; /* Set width to 100% */
            box-sizing: border-box; /* Ensure padding is included in the width */
            text-align: left; /* Align text to the left */
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
    </style>
</head>
<body>

<!-- Breadcrumbs can go here -->
<div class="card">
    <div class="card-header">
        <a href="#" class="blue-button"><h3>Vehicle Material Allocation view and edit</h3></a>
    </div>

    <div>
        <!-- Search input -->
        <label for="searchInput" class="highlight">Search by Vehicle Number:</label>
        <input type="text" id="searchInput">
        <button id="searchButton">Search</button>
    </div>

    <!-- Additional fields (Initially hidden) -->
    <div id="additionalFields" class="card" style="display: none; margin-top: 10px;">
        <div class="column-container">
            <div>
                <label class="highlight">Vehicle number:</label>
                <span id="vehicleNumber"></span><br>
                <label class="highlight">Vehicle reviewed by:</label>
                <span id="vehicleReviewedBy"></span><br>
                <label class="highlight">Reviewed date:</label>
                <span id="reviewedDate"></span><br>
                <label class="highlight">Customer name:</label>
                <span id="customerName"></span><br>
                <label class="highlight">Customer mobile:</label>
                <span id="customerMobile"></span><br>
                <label class="highlight">Private or government vehicle:</label>
                <span id="vehicleType"></span><br>
                <label class="highlight">Type of work:</label>
                <span id="workType"></span><br>
                <label class="highlight">Work description:</label>
                <span id="workDescription"></span><br>
            </div>
            <div>
                <!-- Image field -->
                <label class="highlight">Image:</label>
                <div class="image-box">
                    <div class="image-container">
                        <img src="" alt="Image" id="vehicleImage">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Materials Allocated Table -->
    <div class="table-container" id="materialTable" style="display: none;">
        <div class="table-wrapper">
            <table class="left-table">
                <thead>
                    <tr>
                        <th style="background-color: yellow; color: black; padding: 10px;" colspan="5">Material Requirement</th>
                    </tr>
                    <tr>
                        <th>Material Name</th>
                        <th>Brand</th>
                        <th>Quantity</th>
                        <th>Unit of Measurement</th>
                        <th>Actions</th> <!-- Add Actions column -->
                    </tr>
                </thead>
                <tbody>
                    <tr class="material-row">
                        <td>Bumper</td>
                        <td>Toyota</td>
                        <td>1</td>
                        <td>Pieces</td>
                        <td>
                            <button class="edit-button" onclick="toggleSuggestedMaterials()">Edit</button>
                            <button class="delete-button">Delete</button>
                        </td>
                    </tr>
                    <tr class="material-row">
                        <td>Door Panel</td>
                        <td>Toyota</td>
                        <td>4</td>
                        <td>Pieces</td>
                        <td>
                            <button class="edit-button" onclick="toggleSuggestedMaterials()">Edit</button>
                            <button class="delete-button">Delete</button>
                        </td>
                    </tr>
                    <tr class="material-row">
                        <td>Side Mirror</td>
                        <td>Toyota</td>
                        <td>2</td>
                        <td>Pieces</td>
                        <td>
                            <button class="edit-button" onclick="toggleSuggestedMaterials()">Edit</button>
                            <button class="delete-button">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5"><button class="add-more-button">Save</button></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="suggestedMaterials" style="display: none;">
            <!-- Suggested Materials Table -->
            <div class="table-wrapper">
                <table class="right-table">
                    <thead>
                        <tr>
                            <th>Suggested Materials</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox"> Window Regulator</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"> Wheel Arch</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"> Headlight Assembly</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to handle the search button click event
    document.getElementById("searchButton").addEventListener("click", function() {
        var searchValue = document.getElementById("searchInput").value.trim();
        if (searchValue !== "") {
            // Make an AJAX call or fetch data using the search value
            // For now, I'll just simulate data retrieval
            simulateDataRetrieval(searchValue);
        } else {
            // Notify the user to input a search value
            alert("Please enter a vehicle number to search.");
        }
    });

    // Function to simulate data retrieval based on the search value
    function simulateDataRetrieval(searchValue) {
        // Simulating data retrieval based on search value
        // Here, you would typically make an AJAX call to fetch the details based on the search value

        // For demonstration, let's assume we have retrieved data for the searched vehicle
        var vehicleData = {
            vehicleNumber: "TN 13 AD 7508",
            vehicleReviewedBy: "John Doe",
            reviewedDate: "2024-05-13",
            customerName: "Alice",
            customerMobile: "1234567890",
            vehicleType: "Private",
            workType: "Repair",
            workDescription: "Engine Tune-up",
            imageUrl: "image.jpg" // Assuming you have the URL of the image
        };

        // Display the retrieved data
        displayData(vehicleData);
        displayMaterialTable(); // Show the materials table
    }

    // Function to display the retrieved data
    function displayData(vehicleData) {
        // Show the additional fields
        document.getElementById("additionalFields").style.display = "block";

        // Update the fields with retrieved data
        document.getElementById("vehicleNumber").textContent = vehicleData.vehicleNumber;
        document.getElementById("vehicleReviewedBy").textContent = vehicleData.vehicleReviewedBy;
        document.getElementById("reviewedDate").textContent = vehicleData.reviewedDate;
        document.getElementById("customerName").textContent = vehicleData.customerName;
        document.getElementById("customerMobile").textContent = vehicleData.customerMobile;
        document.getElementById("vehicleType").textContent = vehicleData.vehicleType;
        document.getElementById("workType").textContent = vehicleData.workType;
        document.getElementById("workDescription").textContent = vehicleData.workDescription;
        document.getElementById("vehicleImage").src = vehicleData.imageUrl;
    }

    // Function to display the materials table
    function displayMaterialTable() {
        document.getElementById("materialTable").style.display = "block"; // Show the materials table
    }

    // Function to toggle the display of suggested materials table
    function toggleSuggestedMaterials() {
        var suggestedMaterials = document.getElementById("suggestedMaterials");
        if (suggestedMaterials.style.display === "none") {
            suggestedMaterials.style.display = "block";
        } else {
            suggestedMaterials.style.display = "none";
        }
    }
</script>
</body>
</html>


@endsection
            