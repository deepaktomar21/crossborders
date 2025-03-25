@extends('website.layouts.app')

@section('title', 'Home')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container text-center shop">
        <h2 class="mt-4 mb-5 title"> Express Delivery of all your items and shopping
            <br>Trade & Personal</h2>

    </div>



    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="mt-2 intro-slider-container">
                    <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl"
                        data-owl-options='{
                        "dots": true,
                        "nav": true, 
                        "responsive": {
                            "1200": {
                                "nav": true,
                                "dots": true
                            }
                        }
                    }'>
                        <div class="intro-slide banner-lg"
                            style="background-image: url('{{ asset('website/assets/images/demos/demo-22/slider/slide-1.jpg') }}');">
                            <div class="intro text-center">
                                <div class="title">
                                    <a>Get Every thing</a>
                                </div>
                                <div class="content">
                                    <h3><span>you need </span>from<br></h3>
                                    <h4>Ghana or UK in 3 Days</h4>
                                </div>

                            </div>

                        </div>

                    </div>
                    <span class="slider-loader"></span>
                </div>
            </div>
        </div>
    </div>

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <style>
        .shop-section {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .shop-section h2 {
            font-weight: bold;
            color: #0a122a;
        }

        .shop-section p {
            color: #000000;
            font-size: 16px;
        }

        .shop-btn {
            /* background-color: #0a0a0a; */
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;

            font-weight: bold;
        }

        .shop-btn:hover {
            /* background-color: #fffb1c; */
        }

        .divider {
            width: 1px;
            background-color: #d1d1d1;
            height: 100%;
            margin: 0 20px;
        }
    </style>
    <div class="container mt-5">
        <div class="shop-section row">
            <div class="col-md-5">
                <h3>Shop from UK to Ghana </h3>

                <h3>Shop from Ghana to UK </h3>
                <h5>—Hassle-Free!</>
                </h5>
            </div>
            <div class="divider d-none d-md-block"></div>
            <div class="col-md-6">
                <p>Pay in Cedis to shop for goods on ebay, Amazon, Costco, Booker, etc and
                    get them shipped to you in Ghana in less than 3 days.!</p>

            </div>
        </div>
    </div>
    <br>

    <style>
        .form-box {
            max-width: 450px;
            width: 100%;
        }

        .step {
            display: none;
        }

        .step.active {
            display: block;
        }

        .country-options {
            display: none;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>


    <div class="container mt-5" id="service">
        <div class="form-box shadow-lg p-4 rounded bg-white">

            <form id="orderForm" enctype="multipart/form-data" method="POST">
                @csrf

                <!-- Step 1: Select Country -->
                <div id="step1">
                    <h2 class="text-center">Are you Currently in ?</h2>

                    <div id="countryButtons" class="d-flex flex-wrap gap-2"></div>
                    <input type="hidden" name="country" id="selectedCountry">
                    <button type="button" class="btn btn-secondary mt-3" id="nextToStep2" disabled>Next</button>
                </div>

                <!-- Step 2: Select Service -->
                <div id="step2" style="display: none;">
                    <h2 class="text-center">Select Service</h2>
                    <div id="serviceButtons" class="d-flex flex-wrap gap-2"></div>
                    <input type="hidden" name="service" id="selectedService">
                    <button type="button" class="btn btn-secondary mt-3" id="backToStep1">Back</button>
                    <button type="button" class="btn btn-primary mt-3" id="nextToStep3" disabled>Next</button>
                </div>

                <!-- Step 3: Dynamic Forms -->
                <div id="step3" style="display: none;">
                    <div id="formContainer"></div> <!-- Buy or Express Form will be injected here -->
                    <button type="button" class="btn btn-secondary mt-3" id="backToStep2">Back</button>
                    <button type="submit" class="btn btn-success mt-3">Submit Order</button>
                </div>
            </form>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <script>
                $(document).ready(function() {
                    let selectedCountryId = null;
                    let selectedServiceId = null;
                    let loadedCountries = false;
                    let loadedServices = {};

                    function fetchCountries() {
                        if (!loadedCountries) {
                            $.ajax({
                                url: "/get-countries",
                                type: "GET",
                                success: function(countries) {
                                    let countryContainer = $("#countryButtons").empty();
                                    $.each(countries, function(index, country) {
                                        countryContainer.append(`
                            <button type="button" class="btn btn-primary w-100 mb-2 select-btn" 
                                data-id="${country.id}">${country.name}
                            </button>
                        `);
                                    });
                                    loadedCountries = true;
                                },
                                error: function() {
                                    alert("Failed to load countries.");
                                }
                            });
                        }
                    }

                    function fetchServices(countryId) {
                        if (!loadedServices[countryId]) {
                            $.ajax({
                                url: `/get-services?country_id=${countryId}`,
                                type: "GET",
                                success: function(services) {
                                    let serviceContainer = $("#serviceButtons").empty();
                                    $.each(services, function(index, service) {
                                        serviceContainer.append(`
                            <button type="button" class="btn btn-outline-info w-100 mb-2 service-btn" 
                                data-id="${service.id}">${service.name}
                            </button>
                        `);
                                    });
                                    loadedServices[countryId] = services;
                                },
                                error: function() {
                                    alert("Failed to load services.");
                                }
                            });
                        }
                    }

                    fetchCountries(); // Load countries on page load

                    // Handle Country Selection
                    $("#countryButtons").on("click", ".select-btn", function() {
                        selectedCountryId = $(this).data("id");
                        $("#selectedCountry").val(selectedCountryId);

                        $(".select-btn").removeClass("btn-primary").addClass("btn-outline-primary");
                        $(this).removeClass("btn-outline-primary").addClass("btn-primary");

                        $("#nextToStep2").prop("disabled", false);
                    });

                    // Move to Step 2 (Service Selection)
                    $("#nextToStep2").click(function() {
                        if (selectedCountryId) {
                            $("#step1").fadeOut(200, function() {
                                $("#step2").fadeIn(200);
                                fetchServices(selectedCountryId);
                            });
                        }
                    });

                    // Handle Service Selection
                    $("#serviceButtons").on("click", ".service-btn", function() {
                        selectedServiceId = $(this).data("id");
                        $("#selectedService").val(selectedServiceId);

                        $(".service-btn").removeClass("btn-info").addClass("btn-outline-info");
                        $(this).removeClass("btn-outline-info").addClass("btn-info");

                        $("#nextToStep3").prop("disabled", false);
                    });

                    // Move to Step 3 (Load Partial Form)
                    $("#nextToStep3").click(function() {
                        if (selectedServiceId) {
                            $("#step2").fadeOut(200, function() {
                                $.ajax({
                                    url: `/check-service-type?service_id=${selectedServiceId}`,
                                    type: "GET",
                                    success: function(data) {
                                        $("#formContainer").html(data.html);
                                        $("#step3").fadeIn(200);
                                    },
                                    error: function() {
                                        alert("Failed to load service details.");
                                        $("#step2").show();
                                    }
                                });
                            });
                        }
                    });

                    // Back Buttons
                    $("#backToStep1").click(function() {
                        $("#step2").fadeOut(200, function() {
                            $("#step1").fadeIn(200);
                        });
                    });

                    $("#backToStep2").click(function() {
                        $("#step3").fadeOut(200, function() {
                            $("#step2").fadeIn(200);
                        });
                    });
                });

                // Assuming you're using jQuery for AJAX
                $(document).on('change', '#serviceIdInput', function() {
                    var serviceId = $(this).val();

                    $.ajax({
                        url: '/check-service-type', // Adjust the URL to your route
                        method: 'GET',
                        data: {
                            service_id: serviceId
                        },
                        success: function(response) {
                            if (response.type === 'buy') {
                                // Populate the buy categories dropdown
                                var buyCategoriesHtml = '';
                                response.categoriesData.forEach(function(category) {
                                    buyCategoriesHtml += '<option value="' + category.id + '">' +
                                        category.name + '</option>';
                                });
                                $('#buyCategories').html(buyCategoriesHtml);
                            } else if (response.type === 'express') {
                                // Populate the express categories dropdown
                                var expressCategoriesHtml = '';
                                response.categoriesData.forEach(function(category) {
                                    expressCategoriesHtml += '<option value="' + category.id + '">' +
                                        category.name + '</option>';
                                });
                                $('#expressCategories').html(expressCategoriesHtml);
                            }
                        }
                    });
                });

                $(document).ready(function() {
    // Handle form submission via AJAX
    $("#orderForm").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Collect form data
        var formData = new FormData(this);

        // Send AJAX request
        $.ajax({
            url: "{{ route('placeorder') }}", // Route to handle form submission
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                // Handle success (e.g., show a success message, redirect, etc.)
                alert(response.message);  // Show success message
                window.location.href = "/"; // Redirect to success page (you can modify the URL)
            },
            error: function(xhr, status, error) {
                // Handle error
                if (xhr.status === 422) {
                    // Validation error, display error messages
                    var errors = xhr.responseJSON.errors;
                    for (var key in errors) {
                        alert(errors[key][0]); // Display the first error message for each field
                    }
                } else {
                    alert("An error occurred while submitting the form.");
                }
            }
        });
    });

    // Additional logic for country and service steps (optional)
    $("#nextToStep2").click(function() {
        // Make sure a country is selected before proceeding
        if ($("#selectedCountry").val()) {
            $("#step1").hide();
            $("#step2").show();
            $("#nextToStep2").prop("disabled", true);
        }
    });

    $("#backToStep1").click(function() {
        $("#step2").hide();
        $("#step1").show();
    });

    $("#nextToStep3").click(function() {
        if ($("#selectedService").val()) {
            $("#step2").hide();
            $("#step3").show();
            $("#nextToStep3").prop("disabled", true);
        }
    });

    $("#backToStep2").click(function() {
        $("#step3").hide();
        $("#step2").show();
    });
});

            </script>




        </div>
    </div>
    <br>

    <div class="container mt-5" id="pricing">
        <div class="shop-section row">
            <div class="col-md-5">
                <h2>Pricing <br></h2>
            </div>
            <div class="divider d-none d-md-block"></div>
            <div class="col-md-6">
                <div class="layoutArea">
                    <div class="column">
                        <p>Affordable and Transparent Pricing for Every Delivery</p>
                        <p>At , we pride ourselves on offering transparent and competitive prices for all
                            shipments, whether you’re sending goods from Ghana to the UK or the UK to Ghana.</p>
                        <div class="page" title="Page 3">
                            <div class="section">
                                <div class="layoutArea">
                                    <div class="column">
                                        <p><strong>Get an Exact Quote</strong><br>Use our Get a Quote tool to calculate the
                                            cost of your shipment based on size, weight, and destination.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelector("a[href='#pricing']").addEventListener("click", function(e) {
                e.preventDefault();
                document.getElementById("pricing").scrollIntoView({
                    behavior: "smooth"
                });
            });
            document.querySelector("a[href='#service']").addEventListener("click", function(e) {
                e.preventDefault();
                document.getElementById("service").scrollIntoView({
                    behavior: "smooth"
                });
            });
        });
    </script>

    <br>
@endsection
