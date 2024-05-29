@extends('admin_layouts.app')

@section('content')

    <!-- Basic Bootstrap Table -->
    <div class="card" height="100vh">
        <h5 class="card-header">Vehicle Delivery</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>Vehicle Number</th>
                <th>Customer Name</th>
                <th>Customer Mobile</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <tr>
                    <td>TN 13 AD 7508</td>
                    <td>Sudhan</td>
                    <td>1234567890</td>
                    <td><button class="btn btn-success">Release gate pass</button></td>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!--/ Basic Bootstrap Table -->


@endsection
