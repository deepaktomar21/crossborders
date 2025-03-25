

    <h2 class="text-center">Order Placement</h2>
   
    <input type="hidden" id="selectedServiceId" value="{{ $service_id }}">
    {{-- <input type="hidden" id="selectedCountryId" value="{{ $Country_id }}"> --}}

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Name<span>*</span></label>
                <input type="text" class="form-control" name="buyer_name"
                    value="{{ old('buyer_name') }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Phone Number<span>*</span></label>
                <input type="tel" class="form-control" name="buyer_phone"
                    value="{{ old('buyer_phone') }}">
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
        <label>House Address<span>*</span></label>
        <input type="text" class="form-control" name="house_address"
            value="{{ old('house_address') }}">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="apartment_suite"
            value="{{ old('apartment_suite') }}" placeholder="Apartment, suite, unit etc. (optional)">
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Town / City <span>*</span></label>
                <input type="text" class="form-control" name="city" value="{{ old('city') }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>State / Country <span>*</span></label>
                <input type="text" class="form-control" name="state" value="{{ old('state') }}">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label>Postcode / ZIP <span>*</span></label>
        <input type="text" class="form-control" name="postcode" value="{{ old('postcode') }}">
    </div>

    <!-- 📦 Product Details -->
    <h4>Product Details</h4>
    <hr>

    <div class="form-group">
        <label>Item Category <span class="">*</span></label>
        <select class="form-control" name="item_category" id="buyCategories">
            @foreach ($categoriesData as $category)
                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
            @endforeach
        </select>
    </div>
    
    

    <!-- Hidden input field for 'Other' option -->
    <div class="form-group" id="otherCategoryDiv" style="display: none;">
        <label>Please specify</label>
        <input type="text" class="form-control" id="otherCategoryInput" placeholder="Enter category">
    </div>

   


    <div class="form-group">
        <label>Name of Product</label>
        <input type="text" class="form-control" name="product_name"
            value="{{ old('product_name') }}">
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
            <input type="text" class="form-control" name="price_range"
                value="{{ old('price_range') }}">
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
                    <input type="text" class="form-control" name="size"
                        value="{{ old('size') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Weight (Optional)</label>
                    <input type="text" class="form-control" name="weight"
                        value="{{ old('weight') }}">
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
            <option value="Express" {{ old('delivery_mode') == 'Express' ? 'selected' : '' }}>Express
            </option>
        </select>
    </div>


 
<br>

