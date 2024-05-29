@extends('admin_layouts.app')

@section('content')

<style>
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
    text-align: left; /* Align text to the right */
}
button {
    background-color: purple;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    display: inline-block;
    margin-top: 5px; /* Adjust margin as needed */
    cursor: pointer;
}
</style>


<div class="card w-100" style="height: 100vh;">
    <div class="card-header">
    <a href="#" class="blue-button"><h3>Expense View</h3></a>
        <!-- <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Vehicle Service Analysis</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Service Analysis</li>
            </ol>
        </nav> -->
    </div>
    <!-- Search form section -->
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-4">
                <input type="text" class="form-control" id="vehicleSearch" placeholder="Search by Vehicle Number">
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="customerSearch" placeholder="Search by Customer Name / Mobile">
            </div>
            <div class="col-md-4">
                <button class="btn btn-primary" id="searchButton">Search</button>
            </div>
        </div>
        <!-- Table section -->
        <div class="row">
            <div class="col-md-12">
                <!-- <h3>Material Return Details</h3> -->
                <table class="table table-bordered table-striped mt-3">
                    <thead>
                        <tr>
                            <th>Vehicle Number</th>
                            <th>Customer Name</th>
                            <th>Customer Mobile</th>
                            <th>Type of Work</th>
                            <th>Material Cost</th>
                            <th>Internal Labour Cost</th>
                            <th>External Labour Cost</th>
                            <th>Misc. Cost</th>
                            <th>No. of Days</th>
                            <th>Payment Pending</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>TN 13 AD 7508</td>
                            <td>Sudhan</td>
                            <td>1234567890</td>
                            <td>Repair</td>
                            <td>₹200</td>
                            <td>₹100</td>
                            <td>₹50</td>
                            <td>₹25</td>
                            <td>3</td>
                            <td>Yes</td>
                            <td><button class="btn btn-success">Release for Delivery</button></td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection