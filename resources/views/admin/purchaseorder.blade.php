@extends('admin_layouts.app')

@section('content')

<style>
         .bg-custom {
             display: flex;
             justify-content: center;
             align-items: center;
             text-align: center;
             /* Align text at the center */
             text-decoration: none;
             color: white;
             padding: 10px 20px;
             background-color: #385170;
             border-radius: 5px;
             font-weight: bold;
           
         }
         .button {
            background-color: purple;
            color: white;
            padding: 8px 16px; 
            border: none;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 5px; 
            cursor: pointer;
            font-size: 14px; 
        }
     </style>
    <div class="container p-6">
    <div class="card">
        <div class="card-body">
            <h1 class="mt-4 mb-2 bg-custom">Purchase Order Allocation</h1>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="vehicleNumber">Vehicle Number</label>
                        <input type="text" class="form-control" id="vehicleNumber">
                    </div>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary mt-4 button" id="searchButton">Search</button>
                </div>
            </div>

            <div id="material_container" class="p-2" style="display:none;">
                <div class="row mt-3 p-3">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <!-- First Row: Vehicle Number, Customer Name, Contact Number -->
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
                                            <h6 class="card-title">Customer Name</h6>
                                            <p class="card-text">Raju</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-title">Contact Number</h6>
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
                                            <h6 class="card-title">Reviewed By</h6>
                                            <p class="card-text">Sub-Manager</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-title">Review Date</h6>
                                            <p class="card-text">2024-05-16</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-title">Vehicle Type</h6>
                                            <p class="card-text">TATA-ACE</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <img src="{{ asset('assets/images/image2.jpeg') }}">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <h4 class="mb-2 bg-custom" style="background-color: #5585b5">Material Supplier Allocation</h4>
                        <div id="carouselExample" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <!-- First four cards -->
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5>Supplier Name</h5>
                                                    <p>Price: $XX.XX</p>
                                                    <p>Date: MM/DD/YYYY</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5>Supplier Name</h5>
                                                    <p>Price: $XX.XX</p>
                                                    <p>Date: MM/DD/YYYY</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5>Supplier Name</h5>
                                                    <p>Price: $XX.XX</p>
                                                    <p>Date: MM/DD/YYYY</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5>Supplier Name</h5>
                                                    <p>Price: $XX.XX</p>
                                                    <p>Date: MM/DD/YYYY</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Additional carousel items can be added here -->
                            </div>
                            <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <h4 class="mt-3 mb-2 bg-custom" style="background-color: #5585b5">Material Allocation</h4>
                        <!-- Table to display search results -->
                        <table id="dataTable" class="table">
                            <thead>
                                <tr>
                                    <th>S.NO</th>
                                    <th>Material</th>
                                    <th>Supplier</th>
                                    <th>Quantity</th>
                                    <th>Unit of <br>Measurement</th>
                                    <th>Brand</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example row with sample data -->
                                <tr>
                                    <td>1</td>
                                    <td>Data 1</td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control w-50">
                                                <option>Sup1</option>
                                                <option>Sup2</option>
                                                <option>Sup3</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>100</td>
                                    <td>Kg</td>
                                    <td>Brand X</td>
                                    <td>
                                        <button class="btn btn-primary">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Data 1</td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control w-50">
                                                <option>Sup1</option>
                                                <option>Sup2</option>
                                                <option>Sup3</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>100</td>
                                    <td>Kg</td>
                                    <td>Brand X</td>
                                    <td>
                                        <button class="btn btn-primary">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Data 1</td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control w-50">
                                                <option>Sup1</option>
                                                <option>Sup2</option>
                                                <option>Sup3</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>100</td>
                                    <td>Kg</td>
                                    <td>Brand X</td>
                                    <td>
                                        <button class="btn btn-primary">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <!-- Add more rows with data as needed -->
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Total Material Allocated: 150</p>
                            </div>
                            <div class="col-md-6">
                                <p>Total Supplier: 10</p>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination -->
                    <nav aria-label="Page navigation example">
                        <ul id="pagination" class="pagination">
                            <!-- Pagination links will be added dynamically here -->
                        </ul>
                    </nav>

                    <div class="col-md-12">
                        <div class="btn-group" role="group" aria-label="Supplier Buttons">
                            <button type="button" class="btn button" id="supplier1">Supplier 1</button>
                            <button type="button" class="btn button" id="supplier2">Supplier 2</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div id="table-container" class="table-container">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Material</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody id="supplier-table">
                                <!-- Table content will be added dynamically -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <button class="btn button" id="createButton">Create Purchase Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


     <script>
         document.getElementById('searchButton').addEventListener('click', function() {
             document.getElementById('material_container').style.display = 'block';
         });

         function paginateTable() {
             const table = document.getElementById('dataTable');
             const rows = table.rows.length; // Number of rows in the table
             const rowsPerPage = 2; // Number of rows per page
             const pageCount = Math.ceil(rows / rowsPerPage); // Calculate number of pages

             // Clear previous pagination
             const pagination = document.getElementById('pagination');
             pagination.innerHTML = '';

             // Create pagination links
             for (let i = 1; i <= pageCount; i++) {
                 const li = document.createElement('li');
                 li.classList.add('page-item');
                 const a = document.createElement('a');
                 a.classList.add('page-link');
                 a.href = '#';
                 a.textContent = i;
                 a.addEventListener('click', function() {
                     showPage(i);
                 });
                 li.appendChild(a);
                 pagination.appendChild(li);
             }

             // Show the first page by default
             showPage(1);
         }

         function showPage(pageNumber) {
             const table = document.getElementById('dataTable');
             const rows = table.rows.length;
             const rowsPerPage = 2;

             // Calculate the range of rows to show based on the page number
             const start = (pageNumber - 1) * rowsPerPage;
             const end = Math.min(start + rowsPerPage, rows);

             // Show or hide rows based on the range
             for (let i = 0; i < rows; i++) {
                 table.rows[i].style.display = i >= start && i < end ? '' : 'none';
             }
         }
     </script>
     <script type="text/javascript">
         // JavaScript for functionality
         document.getElementById('supplier1').addEventListener('click', function() {
             displayTable('supplier1');
         });

         document.getElementById('supplier2').addEventListener('click', function() {
             displayTable('supplier2');
         });

         function displayTable(supplier) {
             // Sample data, replace with actual data
             var data = [];
             if (supplier === 'supplier1') {
                 data = [{
                         material: 'Material A',
                         price: '$10',
                         date: '2024-05-16'
                     },
                     {
                         material: 'Material B',
                         price: '$15',
                         date: '2024-05-17'
                     },
                     {
                         material: 'Material C',
                         price: '$20',
                         date: '2024-05-18'
                     }
                 ];
             } else if (supplier === 'supplier2') {
                 data = [{
                         material: 'Material X',
                         price: '$12',
                         date: '2024-05-19'
                     },
                     {
                         material: 'Material Y',
                         price: '$18',
                         date: '2024-05-20'
                     },
                     {
                         material: 'Material Z',
                         price: '$25',
                         date: '2024-05-21'
                     }
                 ];
             }

             var tableBody = document.querySelector('#supplier-table');
             tableBody.innerHTML = '';

             data.forEach(function(row) {
                 var tr = document.createElement('tr');
                 tr.innerHTML = '<td>' + row.material + '</td>' +
                     '<td>' + row.price + '</td>' +
                     '<td>' + row.date + '</td>';
                 tableBody.appendChild(tr);
             });

             var tableContainer = document.getElementById('table-container');
             tableContainer.style.display = 'block';
         }
     </script>

     <script type="text/data" id="supplier1-data">
        [
            { "material": "Material A", "price": "$10", "date": "2024-05-16" },
            { "material": "Material B", "price": "$15", "date": "2024-05-17" },
            { "material": "Material C", "price": "$20", "date": "2024-05-18" }
        ]
    </script>

     <script type="text/data" id="supplier2-data">
        [
            { "material": "Material X", "price": "$12", "date": "2024-05-19" },
            { "material": "Material Y", "price": "$18", "date": "2024-05-20" },
            { "material": "Material Z", "price": "$25", "date": "2024-05-21" }
        ]
    </script>



@endsection