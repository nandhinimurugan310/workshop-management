@extends('admin_layouts.app')

@section('content')


    <div class="app-content content">
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-4">
                    <div class="row breadcrumbs-top">
                        <div class="col-14">

                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:;">Manage Vehicles</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card p-4">
                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="breadcrumb">

                        </nav>
                        <div class="d-flex justify-content-between align-items-center position-relative mb-4">
                            <h3>Manage Vehicles</h3>
                        </div>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif


                <table id="example" style="width:100%" class="table table-striped table-bordered mt-4 pt-4">
                    <thead class="bg-primary">
                        <tr>
                            <th scope="col" style="color:white;font-size:small;text-align:center">Sno</th>
                            <th scope="col" style="color:white;font-size:small;text-align:center">Vehicle Numbers</th>
                            <th scope="col" style="color:white;font-size:small;text-align:center">Customer Name</th>
                            <th scope="col" style="color:white;font-size:small;text-align:center">Customer Phone</th>
                            <th scope="col" style="color:white;font-size:small;text-align:center">Work Types</th>
                            <th scope="col" style="color:white;font-size:small;text-align:center">Status</th>
                            <th scope="col" style="color:white;font-size:small;text-align:center">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vehicleData as $key => $data)
                            <tr>
                                <td style="color:black">{{ $key + 1 }}</td>
                                <td style="color:black"> {{ $data['vehicle_number'] }}
                                </td>
                                <td style="color:black">{{ $data['customer_name'] }}</td>
                                <td style="color:black">{{ $data['customer_mobile'] }}</td>
                                <td style="color:black">{{ $data['work_types'] }}</td>
                                <td style="color:black">
                                    @if ($data['status'] == 1)
                                        <span class="badge rounded-pill bg-label-primary">Vehicle Analysed</span>
                                    @elseif($data['status'] == 2)
                                        <span class="badge rounded-pill bg-label-info">Materials allocated</span>
                                    @elseif($data['status'] == 3)
                                        <span class="badge rounded-pill bg-label-success">PO Created</.;span>
                                    @elseif($data['status'] == 4)
                                        <span class="badge rounded-pill bg-label-danger">Store Checked</span>
                                    @elseif($data['status'] == 5)
                                        <span class="badge rounded-pill bg-label-warning">Delivery Ready</span>
                                    @else
                                        <span class="badge rounded-pill bg-label-dark">Status Unknown</span>
                                    @endif
                                </td>
                                <td style="color:black;text-align:center">
                                    <div class="dropdown">
                                        <button type="button" class="btn rounded-pill btn-outline-primary"
                                            class="dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item view-btn" data-toggle="modal"
                                                data-target="#exLargeModal{{ $data['id'] }}">
                                                <i class="mdi mdi-eye-outline me-1"></i> View
                                            </a>
                                            <a href="{{ route('vehicle.edit', ['vehicle' => $data['id']]) }}"
                                                class="dropdown-item">
                                                <i class="mdi mdi-pencil-outline me-1"></i> Edit
                                            </a>
                                            <button type="button" class="btn btn delete-vehicle"
                                                data-vehicle-id="{{ $data['vehicle_id'] }}">
                                                <i class="fas fa-trash-alt"></i>&nbsp;&nbsp;<span
                                                    style="text-transform: capitalize;">delete</span>
                                            </button>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>


            @foreach ($vehicleData as $data)
                <!-- Details Modal -->
                <div class="modal fade" id="exLargeModal{{ $data['id'] }}" aria-labelledby="detailsModalLabel{{ $data['id'] }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Vehicle Details</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <!-- First Column (Image) -->
                                    <div class="col-md-3 text-center">
                                        <img src="{{ asset('storage/app/public/' . $data['vehicle_image']) }}" alt="Vehicle Image" class="img-fluid" width="400">
                                    </div>
                                    <!-- Second Column (Heading) -->
                                    <div class="col-md-2">
                                        <strong>Vehicle Number:</strong><br>
                                        <strong>Customer Name:</strong><br>
                                        <strong>Mobile:</strong><br>
                                        <strong>Address:</strong><br>
                                        <strong>City:</strong><br>
                                        <strong>State:</strong><br>
                                        <strong>Referral Name:</strong><br>
                                        <strong>Referral Number:</strong><br>
                                    </div>
                                    <!-- Third Column (Data) -->
                                    <div class="col-md-2">
                                        {{ $data['vehicle_number'] }}<br>
                                        {{ $data['customer_name'] }}<br>
                                        {{ $data['customer_mobile'] }}<br>
                                        {{ $data['address'] }}<br>
                                        {{ $data['city'] }}<br>
                                        {{ $data['state'] }}<br>
                                        {{ $data['referred_by'] }}<br>
                                        {{ $data['referred_mobile'] }}<br>
                                    </div>
                                    <!-- Fourth Column (Heading) -->
                                    <div class="col-md-2">
                                        <strong>Size Of Vehicle:</strong><br>
                                        <strong>Work Category:</strong><br>
                                        <strong>Work Types:</strong><br>
                                        <strong>Sector:</strong><br>
                                        <strong>Work Description:</strong><br>
                                    </div>
                                    <!-- Fifth Column (Data) -->
                                    <div class="col-md-3">
                                        {{ $data['vehicle_size'] }}<br>
                                        {{ $data['work_category'] }}<br>
                                        {{ $data['work_types'] }}<br>
                                        {{ $data['sector'] }}<br>
                                        <div style="padding: 10px; background-color: #f8f9fa;">
                                            {{ $data['work_description'] }}
                                        </div>
                                    </div>
                                </div>
                                <hr> <!-- Add a horizontal line for separation -->
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <!-- You can keep the image here again if needed -->
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Edit Modal -->
            @endforeach

            <script>
                function searchTable() {
                    var input, filter, table, tr, td, i, txtValue;
                    input = document.getElementById("searchInput");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("vehicleTable");
                    tr = table.getElementsByTagName("tr");
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[0];
                        if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                        }
                    }
                }

                function validateMobileNumber(input) {
                    var value = input.value;
                    var errorDiv = input.nextElementSibling;
                    if (/^\d{10}$/.test(value)) {
                        errorDiv.style.display = "none";
                    } else {
                        errorDiv.textContent = "Please enter a valid 10-digit mobile number.";
                        errorDiv.style.display = "block";
                    }
                }
            </script>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <script>
                $(document).ready(function() {
                    $('.delete-vehicle').click(function() {
                        var vehicleId = $(this).data('vehicle-id');
                        if (confirm('Are you sure you want to delete this vehicle?')) {
                            $.ajax({
                                url: '/delete-vehicle/' + vehicleId,
                                type: 'get',
                                dataType: 'json',
                                success: function(response) {
                                    alert(response.message);
                                    // Reload the page or update the table as needed
                                    location.reload(); // For example, reload the page
                                },
                                error: function(xhr, status, error) {
                                    // Handle error
                                    console.error(xhr.responseText);
                                }
                            });
                        }
                    });
                });
                
                document.addEventListener('DOMContentLoaded', function () {
    var closeButtons = document.querySelectorAll('[data-bs-dismiss="modal"]');
    
    closeButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var modal = button.closest('.modal');
            if (modal) {
                modal.classList.remove('show');
                modal.setAttribute('aria-hidden', 'true');
                modal.setAttribute('style', 'display: none');
                location.reload(); // Reload the page after closing the modal
            }
        });
    });
});

            </script>

        @endsection
