<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<style>
.custom-modal-width {
    max-width: 900px; /* Increase the width as needed */
}

.custom-modal-height {
    height: auto; /* Allow modal height to adjust dynamically */
}

.modal-body {
    max-height: none; /* Remove maximum height */
    overflow-y: hidden; /* Hide vertical scrollbar */
}

.form-control::placeholder {
    font-size: 0.8em; /* Reduce placeholder font size */
}

/* Zoom out the form content */
.modal-body form {
    zoom: 0.9; /* Adjust zoom level as needed */
}
</style>
<div class="modal fade" id="createCustomerModal" tabindex="-1" role="dialog" aria-labelledby="createCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createCustomerModalLabel">Create Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="myForm" action="/vendors" method="POST">
                    @csrf
                    <!-- Customer Details -->
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="customerName">Supplier Name*</label>
                                <input type="text" name="name" class="form-control form-control-lg" id="customerName" placeholder="Enter supplier name" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="customerPhone">Phone*</label>
                                <input type="tel" name="contact" class="form-control form-control-lg" id="customerPhone" placeholder="Enter phone number" maxlength="10" pattern="\d{10}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="customerEmail">Email address*</label>
                                <input type="email" name="email" class="form-control form-control-lg" id="customerEmail" placeholder="Enter email" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="customerGSTNo">GST-NO*</label>
                                <input type="text" name="tax_number" class="form-control form-control-lg" id="customerGSTNo" placeholder="Enter GST-NO" required>
                            </div>
                        </div>
                    </div>

                    <!-- Billing Address -->
                    <h5>Billing Address</h5>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="billingName">Name*</label>
                                <input type="text" name="billing_name" class="form-control form-control-lg" id="billingName" placeholder="Enter name" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="billingPhone">Phone*</label>
                                <input type="number" name="billing_phone" class="form-control form-control-lg" id="billingPhone" placeholder="Enter phone number" maxlength="10" pattern="\d{10}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="billingAddress">Address*</label>
                                <input type="text" name="billing_address" class="form-control form-control-lg" id="billingAddress" placeholder="Enter address" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="billingCity">City*</label>
                                <input type="text" name="billing_city" class="form-control form-control-lg" id="billingCity" placeholder="Enter city" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="billingState">State*</label>
                                <input type="text" name="billing_state" class="form-control form-control-lg" id="billingState" placeholder="Enter state" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="billingZip">Zip Code*</label>
                                <input type="text" name="billing_zip" class="form-control form-control-lg" id="billingZip" placeholder="Enter zip code" pattern="\d{5,6}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="billingCountry">Country*</label>
                                <select class="form-control form-control-lg" name="billing_country" id="billingCountry" required>
                                    <option value="India" selected>India</option>
                                    <!-- Add more country options as needed -->
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <button type="submit" class="btn btn-primary">Create</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById("customerPhone").addEventListener("input", function() {
    // Remove non-numeric characters
    this.value = this.value.replace(/\D/g, '');
    // Limit input to 10 characters
    if (this.value.length > 10) {
        this.value = this.value.slice(0, 10);
    }
});

document.getElementById("billingPhone").addEventListener("input", function() {
    // Remove non-numeric characters
    this.value = this.value.replace(/\D/g, '');
    // Limit input to 10 characters
    if (this.value.length > 10) {
        this.value = this.value.slice(0, 10);
    }
});

document.getElementById("myForm").addEventListener("submit", function(event) {
    var valid = true;
    var elements = this.elements;
    
    // Custom validation logic if needed
    
    if (!valid) {
        event.preventDefault();
        alert("Please correct the errors in the form.");
    }
});
</script>
