<div id="step1">
    <h3>Select Country</h3>
    <div id="countryButtons" class="mt-3"></div>

    <input type="hidden" id="selectedCountry">
    
    <button id="nextToStep2" class="btn btn-primary mt-3" disabled>Next</button>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    let countryContainer = $("#countryButtons");

    // Fetch countries and create buttons dynamically
    $.ajax({
        url: "/api/countries",
        type: "GET",
        success: function(countries) {
            countryContainer.empty();
            $.each(countries, function(index, country) {
                countryContainer.append(
                    `<button type="button" class="btn btn-primary w-100 mb-2 select-btn" 
                        data-id="${country.id}" value="${country.name}">${country.name}
                    </button>`
                );
            });
        }
    });

    // Handle country selection
    $(document).on("click", ".select-btn", function() {
        let selectedCountryId = $(this).data("id");

        $("#selectedCountry").val(selectedCountryId); // Save country ID
        $(".select-btn").removeClass("btn-success").addClass("btn-primary");
        $(this).removeClass("btn-primary").addClass("btn-success");

        $("#nextToStep2").prop("disabled", false); // Enable "Next" button
    });

    // Enable "Next" button if a country is selected from dropdown
    $("#country").change(function() {
        let selectedValue = $(this).val();
        $("#selectedCountry").val(selectedValue);
        $("#nextToStep2").prop("disabled", selectedValue === "");
    });
});
</script>
