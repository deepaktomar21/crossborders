@extends('website.layouts.app')

@section('title', 'Order Page')

@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="form-box shadow-lg p-4 rounded bg-white">
            <h2 class="text-center">Order Placement</h2>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif



            <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- 🌟 Personal Information Section -->
                <h4>Personal Information</h4>
                <hr>
                <!--<div class="form-group">-->
                <!--    <label>Select Country<span class="required">*</span></label>-->
                <!--    <select class="form-control" name="country" id="countrySelect" required>-->
                <!--        {{-- <option value="">Select Country</option> --}}-->
                <!--    </select>-->
                <!--</div>-->
                <!--<input type="hidden" name="service" id="serviceInput" value="{{ old('service') }}" required>-->
                
                
                <!-- <div class="form-group">-->
                <!--    <label>Item Category<span class="required">*</span></label>-->
                <!--    <select class="form-control" name="item_category" id="categorySelect" required>-->
                <!--        {{-- <option value="">Select Category</option> --}}-->
                <!--    </select>-->
                <!--</div>-->
                
               
                
                
             
<div class="form-group">
    <label>Select Country<span class="required">*</span></label>
    <select class="form-control" name="country" id="countrySelect" required>
    </select>
</div>

<!-- Hidden Inputs to Store IDs in Required Keys -->
<input type="hidden" name="service" id="serviceInput" value="{{ old('service') }}" required>
<input type="hidden" name="country" id="countryInput" value="{{ old('country') }}" required>
<input type="hidden" name="item_category" id="categoryInput" value="{{ old('item_category') }}" required>





               

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name<span class="required">*</span></label>
                            <input type="text" class="form-control" name="buyer_name" value="{{ old('buyer_name') }}"
                                required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phone Number<span class="required">*</span></label>
                            <input type="tel" class="form-control" name="buyer_phone" value="{{ old('buyer_phone') }}"
                                required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Email (Optional)</label>
                    <input type="email" class="form-control" name="buyer_email" value="{{ old('buyer_email') }}">
                </div>

                <!-- 📍 Address Details -->
                <h4>Delivery Address</h4>
                <hr>

                <div class="form-group">
                    <label>House Address<span class="required">*</span></label>
                    <input type="text" class="form-control" name="house_address" value="{{ old('house_address') }}"
                        required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="apartment_suite" value="{{ old('apartment_suite') }}"
                        placeholder="Apartment, suite, unit etc. (optional)">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Town / City <span class="required">*</span></label>
                            <input type="text" class="form-control" name="city" value="{{ old('city') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>State / County <span class="required">*</span></label>
                            <input type="text" class="form-control" name="state" value="{{ old('state') }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Postcode / ZIP <span class="required">*</span></label>
                    <input type="text" class="form-control" name="postcode" value="{{ old('postcode') }}" required>
                </div>

                <!-- 📦 Product Details -->
                <h4>Product Details</h4>
                <hr>

                
                
               
               
                <div class="form-group">
    <label>Item Category<span class="required">*</span></label>
    <select class="form-control" name="item_category" id="categorySelect" required>
    </select>
</div>
                
               
                <div class="form-group" id="otherCategoryDiv" style="display: none;">
                    <label>Please specify</label>
                    <input type="text" class="form-control" id="otherCategoryInput" placeholder="Enter category">
                </div>
                
                
                

                <div class="form-group">
                    <label>Name of Product</label>
                    <input type="text" class="form-control" name="product_name" value="{{ old('product_name') }}">
                </div>

                <div class="form-group">
                    <label>Link to Preferred Product (if any)</label>
                    <input type="text" class="form-control" name="product_url" value="{{ old('product_url') }}">
                </div>

                <!-- Admin Suggestion -->
                <div class="form-group">
                    <label>Do you want Admin to suggest?</label>
                    <select class="form-control" name="admin_suggestion" id="admin_suggestion">
                        <option value="No" {{ old('admin_suggestion') == 'No' ? 'selected' : '' }}>No</option>
                        <option value="Yes" {{ old('admin_suggestion') == 'Yes' ? 'selected' : '' }}>Yes</option>
                    </select>
                </div>

                <div id="suggestion_fields" style="display: none;">
                    <div class="form-group">
                        <label>Preferred Brand</label>
                        <input type="text" class="form-control" name="preferred_brand"
                            value="{{ old('preferred_brand') }}">
                    </div>
                    <div class="form-group">
                        <label>Specific Details</label>
                        <textarea class="form-control" name="specific_details" rows="3">{{ old('specific_details') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Price Range</label>
                        <input type="text" class="form-control" name="price_range" value="{{ old('price_range') }}">
                    </div>
                </div>

                <div id="no_suggestion_fields">
                    <div class="form-group">
                        <label>Upload Image (Optional)</label>
                        <input type="file" class="form-control" name="product_image">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Size (Optional)</label>
                                <input type="text" class="form-control" name="size" value="{{ old('size') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Weight (Optional)</label>
                                <input type="text" class="form-control" name="weight" value="{{ old('weight') }}">
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var adminSuggestion = document.getElementById("admin_suggestion");
                        var suggestionFields = document.getElementById("suggestion_fields");
                        var noSuggestionFields = document.getElementById("no_suggestion_fields");

                        function toggleFields() {
                            if (adminSuggestion.value === "Yes") {
                                suggestionFields.style.display = "block";
                                noSuggestionFields.style.display = "none";
                            } else {
                                suggestionFields.style.display = "none";
                                noSuggestionFields.style.display = "block";
                            }
                        }

                        adminSuggestion.addEventListener("change", toggleFields);
                        toggleFields();
                    });
                </script>

                <h4>Delivery Preferences</h4>
                <hr>
                <div class="form-group">
                    <label>Delivery Mode</label>
                    <select class="form-control" name="delivery_mode">
                        <option value="Standard" {{ old('delivery_mode') == 'Standard' ? 'selected' : '' }}>Standard
                        </option>
                        <option value="Express" {{ old('delivery_mode') == 'Express' ? 'selected' : '' }}>Express</option>
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary px-4">Submit Order</button>
                </div>
            </form>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!--                <script>-->
<!--$(document).ready(function () {-->
    <!--// Load Countries on Page Load-->
<!--    $.ajax({-->
<!--        url: "https://textcode.co.in/CrossBorder/public/api/countries",-->
<!--        type: "GET",-->
<!--        success: function (data) {-->
<!--            let countryDropdown = $("#countrySelect");-->
<!--            countryDropdown.append('<option value="">Select Country</option>');-->
<!--            $.each(data, function (key, country) {-->
<!--                countryDropdown.append('<option value="' + country.id + '">' + country.name + '</option>');-->
<!--            });-->
<!--        }-->
<!--    });-->

    <!--// Fetch Data When Country is Selected-->
<!--    $("#countrySelect").change(function () {-->
<!--        let countryId = $(this).val();-->
<!--        let serviceInput = $("#serviceInput");-->
<!--        let categoryDropdown = $("#categorySelect");-->

<!--        categoryDropdown.empty().append('<option value="">Select Category</option>');-->
<!--        serviceInput.val("");-->

<!--        if (countryId) {-->
<!--            $.ajax({-->
<!--                url: "https://textcode.co.in/CrossBorder/public/api/dropdown-data/" + countryId,-->
<!--                type: "GET",-->
<!--                success: function (data) {-->
                    <!--// Update Service Input-->
<!--                    serviceInput.val(data.service.name);-->

                    <!--// Populate Category Dropdown-->
<!--                    $.each(data.categories, function (key, category) {-->
<!--                        categoryDropdown.append('<option value="' + category.id + '">' + category.name + '</option>');-->
<!--                    });-->
<!--                }-->
<!--            });-->
<!--        }-->
<!--    });-->
<!--});-->
<!--</script>-->
<script>
$(document).ready(function () {
    // Load Countries on Page Load
    $.ajax({
        url: "https://textcode.co.in/CrossBorder/public/api/countries",
        type: "GET",
        success: function (data) {
            let countryDropdown = $("#countrySelect");
            countryDropdown.append('<option value="">Select Country</option>');
            $.each(data, function (key, country) {
                countryDropdown.append('<option value="' + country.id + '">' + country.name + '</option>');
            });
        }
    });

    // Fetch Data When Country is Selected
    $("#countrySelect").change(function () {
        let countryId = $(this).val();
        let serviceInput = $("#serviceInput");
        let countryInput = $("#countryInput");
        let categoryDropdown = $("#categorySelect");
        let categoryInput = $("#categoryInput");

        // Reset Fields
        categoryDropdown.empty().append('<option value="">Select Category</option>');
        serviceInput.val("");
        countryInput.val(countryId); // Store country_id in country key

        if (countryId) {
            $.ajax({
                url: "https://textcode.co.in/CrossBorder/public/api/dropdown-data/" + countryId,
                type: "GET",
                success: function (data) {
                    // Store Service ID in the service key
                    serviceInput.val(data.service.id); 

                    // Populate Category Dropdown
                    $.each(data.categories, function (key, category) {
                        categoryDropdown.append('<option value="' + category.id + '">' + category.name + '</option>');
                    });

                    // Update category_id when selecting a category
                    categoryDropdown.change(function () {
                        categoryInput.val($(this).val()); // Store category_id in item_category key
                    });
                }
            });
        }
    });
});
</script>


    <style>
        .form-box {
            max-width: 450px;
            width: 100%;
        }
    </style>
@endsection
