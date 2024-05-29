


 <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Vehicle Details</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
    <form action="{{ route('vendor.update', $vendor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Customer Details -->
        <div class="form-row row">
            <div class="col-md-6">
                <!-- Supplier Name -->
                <div class="form-group">
                    <label for="customerName{{$vendor->id}}">Supplier Name*</label>
                    <input type="text" name="name" class="form-control form-control-lg" id="customerName{{$vendor->id}}" placeholder="Enter Vendor name" value="{{ $vendor->name }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Phone -->
                <div class="form-group">
                    <label for="customerPhone{{$vendor->id}}">Phone*</label>
                    <input type="tel" name="contact" class="form-control form-control-lg" id="customerPhone{{$vendor->id}}" placeholder="Enter phone number" value="{{$vendor->contact }}" pattern="\d{10}" maxlength="10" required>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Email -->
                <div class="form-group">
                    <label for="customerEmail{{$vendor->id}}">Email address*</label>
                    <input type="email" name="email" class="form-control form-control-lg" id="customerEmail{{$vendor->id}}" placeholder="Enter email" value="{{ $vendor->email }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <!-- GST No -->
                <div class="form-group">
                    <label for="customerGSTNo{{$vendor->id}}">GST-NO*</label>
                    <input type="text" name="tax_number" class="form-control form-control-lg" id="customerGSTNo{{$vendor->id}}" placeholder="Enter GST-NO" value="{{ $vendor->tax_number }}" required>
                </div>
            </div>
        </div>

        <!-- Billing Address -->
        <hr>
        <h5>Billing Address</h5>
        <div class="form-row row">
            <div class="col-md-4">
                <!-- Name -->
                <div class="form-group">
                    <label for="billingName{{$vendor->id}}">Name*</label>
                    <input type="text" name="billing_name" class="form-control form-control-lg" id="billingName{{$vendor->id}}" placeholder="Enter name" value="{{$vendor->billing_name }}" required>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Phone -->
                <div class="form-group">
                    <label for="billingPhone{{$vendor->id}}">Phone*</label>
                    <input type="tel" name="billing_phone" class="form-control form-control-lg" id="billingPhone{{$vendor->id}}" placeholder="Enter phone number" value="{{$vendor->billing_phone }}" pattern="\d{10}" maxlength="10" required>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Address -->
                <div class="form-group">
                    <label for="billingAddress{{$vendor->id}}">Address*</label>
                    <input type="text" name="billing_address" class="form-control form-control-lg" id="billingAddress{{$vendor->id}}" placeholder="Enter address" value="{{ $vendor->billing_address }}" required>
                </div>
            </div>
        </div>
        <div class="form-row row">
            <div class="col-md-4">
                <!-- City -->
                <div class="form-group">
                    <label for="billingCity{{$vendor->id}}">City*</label>
                    <input type="text" name="billing_city" class="form-control form-control-lg" id="billingCity{{$vendor->id}}" placeholder="Enter city" value="{{$vendor->billing_city }}" required>
                </div>
            </div>
            <div class="col-md-4">
                <!-- State -->
                <div class="form-group">
                    <label for="billingState{{$vendor->id}}">State*</label>
                    <input type="text" name="billing_state" class="form-control form-control-lg" id="billingState{{$vendor->id}}" placeholder="Enter state" value="{{ $vendor->billing_state }}" required>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Zip Code -->
                <div class="form-group">
                    <label for="billingZip{{$vendor->id}}">Zip Code*</label>
                    <input type="text" name="billing_zip" class="form-control form-control-lg" id="billingZip{{$vendor->id}}" placeholder="Enter zip code" value="{{ $vendor->billing_zip }}" pattern="\d{5,6}" required>
                </div>
            </div>
        </div>
        <div class="form-row row">
            <div class="col-md-6">
                <!-- Country -->
                <div class="form-group">
                    <label for="billingCountry">Country*</label>
                    <select class="form-control form-control-lg" name="billing_country" id="billingCountry{{$vendor->id}}" required>
                        <option value="India" {{ $vendor->billing_country == 'India' ? 'selected' : '' }}>India</option>
                        <!-- Add more country options as needed -->
                    </select>
                </div>
            </div>
        </div>

        <!-- Buttons -->
        <hr>
        <div class="form-row row">
            <div class="col-md-6 text-center">
                <button type="submit" class="btn btn-primary btn-sm mb-3">Create</button>
                <button type="button" class="btn btn-secondary btn-sm mb-3" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </form>
</div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>

<script>
document.getElementById("customerPhone{{$vendor->id}}").addEventListener("input", function() {
    // Remove non-numeric characters
    this.value = this.value.replace(/\D/g, '');
    // Limit input to 10 characters
    if (this.value.length > 10) {
        this.value = this.value.slice(0, 10);
    }
});

document.getElementById("billingPhone{{$vendor->id}}").addEventListener("input", function() {
    // Remove non-numeric characters
    this.value = this.value.replace(/\D/g, '');
    // Limit input to 10 characters
    if (this.value.length > 10) {
        this.value = this.value.slice(0, 10);
    }
});

document.querySelector("form").addEventListener("submit", function(event) {
    var valid = true;
    var elements = this.elements;
    
    // Custom validation logic if needed
    
    if (!valid) {
        event.preventDefault();
        alert("Please correct the errors in the form.");
    }
});
</script>
