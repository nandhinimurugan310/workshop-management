@extends('admin_layouts.app')

@section('content')
<style>
    
    .invalid-feedback {
    display: none;
    color: red;
}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <header>
    <nav>
      <ul class="breadcrumb">
          <li><a href="{{route('dashboard')}}">Dashboard /</a></li>
        <li><a href="#">Manage Users</a></li>
 
      </ul>
    </nav>
  </header>

            <div class="d-flex justify-content-between align-items-center position-relative mb-4">
                <h1>Manage Users</h1>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUserModal">
                    <i class="ti-plus"></i> Create New User
                </button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createRoleModal">
                    <i class="ti-plus"></i> Create New Role
                </button>
            </div>

            <div id="userCardsContainer">
                <div class="row">
                    @foreach($users as $user)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">User Details</h5>
                                @if($user->profile_pic && file_exists(public_path('storage/' . $user->profile_pic)))
                                <img src="{{ asset('storage/' . $user->profile_pic) }}" alt="{{ $user->username }}" style="width: 100px; height: 100px; border-radius: 50%;">
                                @else
                                <img src="/admin_assets/assets/img/faces/profile/profile-pic.png" alt="Profile_pic" style="width: 100px; height: 100px; border-radius: 50%;">
                                @endif
                                <p class="card-text">Name: {{ $user->name }}</p>
                                <p class="card-text">Email: {{ $user->email }}</p>
                                <p class="card-text">Role: {{ $user->role->role }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create New User Modal -->
<div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- Added modal-lg class for larger modal -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserModalLabel">Create New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="username" class="form-label">Name</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="row">
                       <div class="mb-3 col-md-6">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" minlength="6" required>
    <div class="invalid-feedback" id="passwordError">Password must be at least 6 characters long.</div>
</div>

                       <div class="mb-3 col-md-6">
    <label for="profile_picture" class="form-label">Profile Picture</label>
    <small class="form-text text-muted">Accepted formats: jpeg, png, jpg</small>
    <input type="file" class="form-control" id="profile_pic" name="profile_picture">
    <div class="invalid-feedback" id="fileError" style="display: none;">Please upload a file in jpeg, jpg, or png format.</div>
</div>

                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="role" name="role" onchange="setRoleId()" required>
                            <option value="">Select Role</option>
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->role }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" id="role_id" name="role_id">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Create New Role Modal -->
<div class="modal fade" id="createRoleModal" tabindex="-1" aria-labelledby="createRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createRoleModalLabel">Create New Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('role.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="role_name" class="form-label">Role Name</label>
                        <input type="text" class="form-control" id="role_name" name="role_name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Role ID setting function
        function setRoleId() {
            var selectedOption = document.getElementById('role').options[document.getElementById('role').selectedIndex];
            var roleId = selectedOption.value;
            document.getElementById('role_id').value = roleId;
        }

        // Add change event listener to role select element
        document.getElementById('role').addEventListener('change', setRoleId);

        // File validation function
        const profilePicInput = document.getElementById("profile_pic");
        const fileError = document.getElementById("fileError");

        profilePicInput.addEventListener("change", function() {
            const allowedExtensions = ["jpeg", "jpg", "png"];
            const fileExtension = profilePicInput.value.split('.').pop().toLowerCase();

            if (!allowedExtensions.includes(fileExtension)) {
                fileError.style.display = "block";
                fileError.textContent = "Please upload a file in jpeg, jpg, or png format.";
                profilePicInput.value = ""; // Clear the input
            } else {
                fileError.style.display = "none";
            }
        });

        // Prevent form submission if file format is invalid
        const form = document.querySelector("form");
        form.addEventListener("submit", function(event) {
            if (profilePicInput.value && fileError.style.display === "block") {
                event.preventDefault();
            }
        });
    });
</script>




@endsection