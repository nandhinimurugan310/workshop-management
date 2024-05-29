@extends('admin_layouts.app')

@section('content')

<style>


      .column-container {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}

.column {
    width: 48%;
}

.inline-label {
        display: inline-block;
        width: 150px; /* Adjust as needed */
        margin-right: 10px;
    }

    .inline-input {
        width: 200px; /* Adjust as needed */
        display: inline-block;
    }

.blue-button {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center; /* Align text at the center */
    text-decoration: none; /* Remove underline */
    color: white;
    padding: 10px 20px;
    background-color: #385170;
    border-radius: 5px;
    font-weight: bold; /* Make the text bold */
}

.button {
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
#additionalForm {
    display: none;
    margin-top: 20px;
}

#additionalForm h3 {
    margin-bottom: 10px;
}

#additionalForm form {
    display: flex;
    flex-wrap: wrap;
}

#additionalForm .form-group {
    flex: 1 0 100%; /* Each form group takes full width */
    margin-bottom: 10px;
}

#additionalForm .inline-label {
    display: inline-block;
    width: 200px; /* Adjust width as needed */
}

#additionalForm .inline-input {
    width: calc(50% - 170px); /* Adjust width considering label width */
    outline: 1px solid #ccc; /* Add outline to input fields */
    padding: 5px;
    box-sizing: border-box; /* Ensure padding is included in the width */
}

#additionalForm button {
    width: 10%; /* Button takes full width */
}

</style>
<div class="card w-100 main-card">
    <div class="card-header">
        <a href="#" class="blue-button"><h3>Expense Input Form</h3></a>
    </div>

    <div class="card-body">
        <!-- Search input -->
        <label for="searchInput" class="highlight">Search by Vehicle Number:</label>
        <input type="text" id="searchInput">
        <button id="searchButton">Search</button>

        <!-- Right side, initially hidden -->
        <div id="searchResultsAndFormContainer" class="card mt-3 search-card" style="display:none;">
            <!-- Search Results Container -->
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

            <!-- Input form for additional details -->
            <div class="card-body">
                <div class="additionalForm" style="display: none;">
                    <h4 style="color: black;">Expense Form</h4>
                    <form>
                        <div class="form-group">
                            <label for="workDays" class="inline-label">Number of Work Days:</label>
                            <input type="text" class="form-control inline-input" id="workDays">
                        </div>
                        <div class="form-group">
                            <label for="totalMaterialCost" class="inline-label">Total Material Cost:</label>
                            <input type="text" class="form-control inline-input" id="totalMaterialCost">
                        </div>
                        <div class="form-group">
                            <label for="internalLabourCost" class="inline-label">Internal Labour Cost:</label>
                            <input type="text" class="form-control inline-input" id="internalLabourCost">
                        </div>
                        <div class="form-group">
                            <label for="externalLabourCost" class="inline-label">External Labour Cost:</label>
                            <input type="text" class="form-control inline-input" id="externalLabourCost">
                        </div>
                        <div class="form-group">
                            <label for="miscCost" class="inline-label">Miscellaneous Cost:</label>
                            <input type="text" class="form-control inline-input" id="miscCost">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
     document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("searchButton").addEventListener("click", function () {
            // Show the container for both search results and form
            document.getElementById("searchResultsAndFormContainer").style.display = "block";
            // Show the additional form
            document.querySelector(".additionalForm").style.display = "block";
        });
    });
</script>

@endsection