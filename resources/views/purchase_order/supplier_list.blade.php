<div class="nav-align-left mb-6">
    <ul class="nav nav-pills me-4" role="tablist">
        @foreach($groupedAllocations as $supplierId => $allocations)
            @if($supplierId)
                @php 
                    $vendor_id = $allocations->first()->vendor_id; 
                @endphp
                <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link waves-effect waves-light newupdate"
                            role="tab" data-bs-toggle="tab" data-bs-target="#supplier{{ $supplierId }}"
                            aria-controls="supplier{{ $supplierId }}"
                            aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                            tabindex="-1">{{ $vendor_id }}</button>
                </li>
            @endif
        @endforeach
    </ul>
    <div class="tab-content">
        @foreach($groupedAllocations as $supplierId => $allocations)
            @if($supplierId)
                @php 
                    $vendor_name = $allocations->first()->vendor_name; 
                    $contact = $allocations->first()->contact; 
                    $vehicle_id = $allocations->first()->vehicle_id; 
                    $purchaseOrder = $purchaseOrders->get($supplierId); // Get existing purchase order if exists
                @endphp
                <div class="tab-pane fade @if($loop->first) show active @endif" id="supplier{{ $supplierId }}" role="tabpanel">
                    <div class="row mb-6 g-6">
                        <div class="col-sm-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="content-left">
                                            <h5 class="mb-1">{{ $vendor_name }}</h5>
                                            <small>Supplier Name</small>
                                        </div>
                                        <span class="badge bg-label-primary rounded-circle p-2">
                                            <i class="mdi mdi-account-outline"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="content-left">
                                            <h5 class="mb-1">{{ $contact }}</h5>
                                            <small>Supplier Number</small>
                                        </div>
                                        <span class="badge bg-label-success rounded-circle p-2">
                                            <i class="mdi mdi-phone-forward"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="content-left">
                                            @if($purchaseOrder)
                                                @if($purchaseOrder->status==0)
                                                    @if(Auth::user()->role_id==1)
                                                      <button type="button" class="btn btn-sm btn-primary">Approve PO</button>  
                                                    @else
                                                    <button type="button" class="btn btn-sm btn-secondary"><i class="mdi mdi-progress-clock"></i> Under Review</button>  
                                                    
                                                    @endif
                                                
                                                @else
                                                
                                                 <button type="button" class="btn btn-sm btn-primary"><i class="mdi mdi-download"></i>Download PO</button>
                                                @endif
                                            @else
                                                <button type="button" class="btn btn-sm btn-primary create_po" data-vehicle_id="{{ $vehicle_id }}" data-supplier_id="{{ $supplierId }}"> Create PO</button>
                                            @endif
                                        </div>
                                        <span class="badge bg-label-danger rounded-circle p-2">
                                            <i class="mdi mdi-download"></i> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-datatable table-responsive"></div>
                    </div>
                    <table class="table tables table-striped table-bordered mt-4 pt-4 dataTable no-footer">
                        <thead class="bg-primary">
                            <tr>
                                <th scope="col" style="color:white;font-size:medium;text-align:center">Material Name</th>
                                <th scope="col" style="color:white;font-size:medium;text-align:center">Brand</th>
                                <th scope="col" style="color:white;font-size:medium;text-align:center">Quantity</th>
                                <th scope="col" style="color:white;font-size:medium;text-align:center">Unit</th>
                                <th scope="col" style="color:white;font-size:medium;text-align:center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allocations as $allocation)
                                <tr>
                                    <td>{{ $allocation->material_name }}</td>
                                    <td>{{ $allocation->brand }}</td>
                                    <td>{{ $allocation->quantity }}</td>
                                    <td>{{ $allocation->unit_of_measurement }}</td>
                                    <td>
                                        <button type="button" class="btn rounded-pill btn-outline-primary waves-effect delete-button" data-supplier-id="{{ $allocation->id }}">
                                            <i class="mdi mdi-trash-can-outline me-1"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        @endforeach
    </div>
</div>

<script>
    $(document).ready(function() {
        // Activate the first tab-pane
        $('.tab-pane').first().addClass('show active');
        $('.newupdate').first().addClass('active');

        // Initialize DataTables for all tables with the 'table' class
        $('.tables').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        // Handle delete button click
        $('.delete-button').click(function() {
            var supplierId = $(this).data('supplier-id');
            
            // Perform AJAX request to delete the supplier
            $.ajax({
                url: "{{ route('delete.supplier') }}",
                type: 'POST',
                data: { 
                    supplierId: supplierId,
                    // Include CSRF token in the request data
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(response) {
                    fetchSupplierList({{ $vehicleNumber }});
                    var table = $('#material_new').DataTable();
                    table.row.add($(response)).draw();
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error('Error deleting supplier: ' + error);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Handle create PO button click
        $('.create_po').click(function() {
            var supplier_id = $(this).data('supplier_id');
            var vehicle_id = $(this).data('vehicle_id');
            // Perform AJAX request to create PO
            $.ajax({
                url: "{{ route('create.po') }}",
                type: 'POST',
                data: { 
                    supplier_id: supplier_id,
                    vehicle_id: vehicle_id,
                    // Include CSRF token in the request data
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(response) {
                    fetchSupplierList({{$vehicleNumber}});
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error('Error creating PO: ' + error);
                }
            });
        });
    });
</script>
