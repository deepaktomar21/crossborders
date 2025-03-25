<div id="expressDeliveryPage">
    <h2 class="text-center">Express Delivery Category</h2>
    <div class="form-group">
        <label>Select Category:</label>
        <select class="form-control" id="expressCategoriesSelect" name="expressCategory">
            <option value="">Select Category</option>
            @foreach ($categoriesData as $category)
                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
            @endforeach
        </select>
    </div>
    
    <script>
        $(document).ready(function() {
    $('#expressCategoriesSelect').change(function() {
        var selectedCategoryId = $(this).val();
        console.log('Selected Category ID: ', selectedCategoryId);
    });
});

        </script>
   
   
    <h2 class="text-center">Express Order Form</h2>

    <div class="form-group">
        <label>Your Name *</label>
        <input type="text" class="form-control" name="sender_name">
    </div>

    <div class="form-group">
        <label>Your Phone Number *</label>
        <input type="tel" class="form-control" name="sender_phone">
    </div>

    <div class="form-group">
        <label>Your Address *</label>
        <input type="text" class="form-control" name="sender_address">
    </div>

    <h4>Send Product To</h4>

    <div class="form-group">
        <label>Recipient Name *</label>
        <input type="text" class="form-control" name="recipientName" >
    </div>

    <div class="form-group">
        <label>Recipient Mobile *</label>
        <input type="tel" class="form-control" name="recipientPhone">
    </div>

    <div class="form-group">
        <label>Recipient Address *</label>
        <input type="text" class="form-control" name="recipientAddress">
    </div>

    <div class="form-group">
        <label>Product Type *</label>
        <input type="text" class="form-control" name="productType">
    </div>

    <div class="form-group">
        <label>Upload Product Image (Optional)</label>
        <input type="file" class="form-control" name="productImage">
    </div>

</div>


    
