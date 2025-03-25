@extends('website.layouts.app')

@section('title', 'Home')

@section('content')

<div id="step2">
    <h3>Select Service</h3>
    <div id="serviceNote"></div>
    <div id="serviceButtons" class="mt-3"></div>

    <input type="hidden" id="selectedService">
    
    <button id="proceedService" class="btn btn-primary mt-3" disabled>Proceed</button>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    let countryId = "{{ $country_id }}";
    let serviceNote = $("#serviceNote");
    let serviceContainer = $("#serviceButtons");

    // Set service note based on country
    if (countryId == 1) { 
        serviceNote.html("<strong>Note:</strong> JoSafe helps you access everything available on the open market in Ghana...");
    } else if (countryId == 2) {
        serviceNote.html("<strong>Note:</strong> Do you want to buy something in the UK but having challenges with payment?");
    } else {
        serviceNote.html("");
    }

    // Fetch services for the selected country
    $.ajax({
        url: "/api/services/" + countryId,
        type: "GET",
        success: function(services) {
            serviceContainer.empty();
            $.each(services, function(index, service) {
                serviceContainer.append(
                    `<button type="button" class="btn btn-primary w-100 mb-2 service-btn" 
                        data-id="${service.id}" value="${service.name}">${service.name}
                    </button>`
                );
            });
        }
    });

    // Handle service selection
    $(document).on("click", ".service-btn", function() {
        let selectedServiceId = $(this).data("id");
        $("#selectedService").val(selectedServiceId);
        $(".service-btn").removeClass("btn-success").addClass("btn-primary");
        $(this).removeClass("btn-primary").addClass("btn-success");

        $("#proceedService").prop("disabled", false);
    });

    // Proceed to next step
    $("#proceedService").click(function() {
        let selectedServiceId = $("#selectedService").val();

        if (selectedServiceId == 1 || selectedServiceId == 2) {
            window.location.href = "/express_delivery?service_id=" + selectedServiceId;
        } else if (selectedServiceId == 3 || selectedServiceId == 4) {
            window.location.href = "/buy_blade?service_id=" + selectedServiceId;
        } else {
            alert("Invalid service selection!");
        }
    });
});
</script>
@endsection

