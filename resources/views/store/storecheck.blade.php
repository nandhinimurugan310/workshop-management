@extends('admin_layouts.app')

<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    height: 100vh;
    overflow: hidden;
}

.card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    overflow: hidden;
}

.card-header {
    background-color: #007bff;
    color: white;
    padding: 20px;
    text-align: center;
    flex-shrink: 0;
}

.card-header h2 {
    margin: 0;
}

.card-content {
    padding: 20px;
    overflow-y: auto;
    flex-grow: 1;
}

.table-responsive {
    margin-top: 20px;
}

.d-flex {
    display: flex !important;
}

.mt-3 {
    margin-top: 1rem !important;
}

.me-2 {
    margin-right: 0.5rem !important;
}

.btn {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    user-select: none;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}

.btn-secondary {
    color: #fff;
    background-color: #6c757d;
    border-color: #6c757d;
}

</style>

@section('content')



  
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
             <header>
    <nav>
      <ul class="breadcrumb">
          <li><a href="{{route('dashboard')}}">Dashboard /</a></li>
        <li><a href="#">Store -Check</a></li>
 
      </ul>
    </nav>
  </header>
            <div class="card">
                <div class="card-header">
                    <h4>Store -Check</h4>
                </div>
                <div class="card-content">
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="card-title m-0 me-2">Vehicle Details</h6>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="transactionID" onclick="showImagePreview(this)" data-image-src="" aria-haspopup="true" aria-expanded="false">
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
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-2 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="avatar">
                                        <div class="avatar-initial btn-secondary rounded shadow">
                                            <i class="mdi mdi-account-outline mdi-24px"></i>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <div class="small mb-1">Name</div>
                                        <h6 class="small mb-1"></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="avatar">
                                        <div class="avatar-initial btn-dark rounded shadow">
                                            <i class="mdi mdi-phone mdi-24px"></i>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <div class="small mb-1">Mobile</div>
                                        <h6 class="small mb-1"></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="avatar">
                                        <div class="avatar-initial bg-success rounded shadow">
                                            <i class="mdi mdi-car mdi-24px"></i>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <div class="small mb-1">Vehicle Number</div>
                                        <h6 class="small mb-1"></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="avatar">
                                        <div class="avatar-initial bg-success rounded shadow">
                                            <i class="mdi mdi-wrench mdi-24px"></i>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <div class="small mb-1">Type of Work</div>
                                        <h6 class="small mb-1 text-wrap" style="max-width: 100px;"></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="avatar">
                                        <div class="avatar-initial bg-warning rounded shadow">
                                            <i class="mdi mdi-office-building mdi-24px"></i>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <div class="small mb-1">Sector</div>
                                        <h6 class="small mb-1"></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="avatar">
                                        <div class="avatar-initial bg-info rounded shadow">
                                            <i class="mdi mdi-check mdi-24px"></i>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <div class="small mb-1">Reviewed By</div>
                                        <h6 class="small mb-1"></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                    <div class="d-flex">
    <div class="mt-3 me-3" style="cursor: pointer;" onclick="toggleTable()"><strong>Supplier 1</strong></div>
    <div class="mt-3" style="cursor: pointer;" onclick="toggleTable('table1')"><strong>Supplier 2</strong></div>
</div>


</div>
<div id="tableContainer" style="display: none;">
    <!-- Table Section -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Material</th>
                    <th>Quantity Required</th>
                    <th>Unit of Measurement</th>
                    <th>Quantity Received</th>
                    <th>Quantity Short Of</th>
                    <th>Brand Expected</th>
                    <th>Brand Received</th>
                    <th>Price</th>
                    <th>Date Received</th>
                    <th>Material Checked By</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Example Material</td>
                    <td>100</td>
                    <td>Units</td>
                    <td>90</td>
                    <td>10</td>
                    <td>Expected Brand</td>
                    <td>Received Brand</td>
                    <td>$100</td>
                    <td>2024-05-27</td>
                    <td>Checker Name</td>
                </tr>
                <!-- Additional rows as needed -->
            </tbody>
        </table>
    </div>
    <!-- Buttons Section -->
    <div class="d-flex justify-content-end mt-3">
        <button class="btn btn-primary me-2" onclick="saveChanges()">Save</button>
        <button class="btn btn-secondary" onclick="editChanges()">Edit</button>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    function toggleTable() {
        const tableContainer = document.getElementById('tableContainer');
        if (tableContainer.style.display === 'none') {
            tableContainer.style.display = 'block';
        } else {
            tableContainer.style.display = 'none';
        }
    }

    function saveChanges() {
        alert("Save changes functionality here.");
    }

    function editChanges() {
        alert("Edit changes functionality here.");
    }

    function newFunction() {
        alert("New button functionality here.");
    }
</script>



@endsection
