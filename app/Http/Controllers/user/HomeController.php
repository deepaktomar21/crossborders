<?php

namespace App\Http\Controllers\user;

use App\Models\Country;
use App\Models\Service;
use App\Models\Category;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;

class HomeController extends user
{
    public function homepage()
    {

        $countries = Country::all();
        return view('website.home', compact('countries')); // Ensure this view exists
    }

    public function getCountries()
{
    $countries = Country::select('id', 'name')->get();
    return response()->json($countries);
}

    public function getServices(Request $request)
    {
        return response()->json(Service::where('country_id', $request->country_id)->get());
    }

//     public function checkServiceType(Request $request)
// {
//     if (!$request->has('service_id')) {
//         return response()->json(['error' => 'Service ID is missing'], 400);
//     }

//     $service = Service::find($request->service_id);

//     if (!$service) {
//         return response()->json(['error' => 'Service not found'], 404);
//     }

//     if ($service->buy_from) {
//         $html = view('website.forms.buy')->render();
//         return response()->json(['type' => 'buy', 'html' => $html]);
//     } elseif ($service->express_delivery) {
//         $html = view('website.forms.express_delivery')->render();
//         return response()->json(['type' => 'express', 'html' => $html]);
//     }

//     return response()->json(['type' => 'none', 'html' => '']);
// }
public function checkServiceType(Request $request)
{
    if (!$request->has('service_id')) {
        return response()->json(['error' => 'Service ID is missing'], 400);
    }

    // Find the service using the service_id
    $service = Service::find($request->service_id);

    if (!$service) {
        return response()->json(['error' => 'Service not found'], 404);
    }

    // Fetch categories related to the service using service_id and type
    $categories = Category::where('service_id', $service->id)
                           ->whereHas('service', function ($query) use ($service) {
                               $query->where('type', $service->type);
                           })
                           ->get();

    // Prepare categories data
    $categoriesData = $categories->map(function ($category) {
        return [
            'id' => $category->id,
            'name' => $category->name,
        ];
    });

    // Prepare the service data
    $serviceData = [
        'name' => $service->name,
    ];

    // Return the appropriate HTML and category data
    if ($service->type === 'buy') {
        $html = view('website.forms.buy', [
            'service_id' => $request->service_id,
            'serviceData' => $serviceData,
            'categoriesData' => $categoriesData,  // Include the categories for 'buy'
        ])->render();

        return response()->json([
            'type' => 'buy',
            'html' => $html,
            'service_id' => $request->service_id,
            'serviceData' => $serviceData,
            'categoriesData' => $categoriesData,  // Include categories data in the response
        ]);
    } elseif ($service->type === 'express') {
        $html = view('website.forms.express_delivery', [
            'service_id' => $request->service_id,
            'serviceData' => $serviceData,
            'categoriesData' => $categoriesData,  // Include the categories for 'express'
        ])->render();

        return response()->json([
            'type' => 'express',
            'html' => $html,
            'service_id' => $request->service_id,
            'serviceData' => $serviceData,
            'categoriesData' => $categoriesData,  // Include categories data in the response
        ]);
    }

    return response()->json([
        'type' => 'none',
        'html' => '',
        'service_id' => $request->service_id,
        'serviceData' => $serviceData,
        'categoriesData' => $categoriesData,  // Include categories data when type is 'none'
    ]);
}


// public function checkServiceType(Request $request)
// {
//     if (!$request->has('service_id')) {
//         return response()->json(['error' => 'Service ID is missing'], 400);
//     }

//     $service = Service::find($request->service_id);

//     if (!$service) {
//         return response()->json(['error' => 'Service not found'], 404);
//     }

//     // Pass the service_id to the views
//     if ($service->type === 'buy') {
//         $html = view('website.forms.buy', ['service_id' => $request->service_id])->render();
//         return response()->json(['type' => 'buy', 'html' => $html, 'service_id' => $request->service_id]);
//     } elseif ($service->type === 'express') {
//         $html = view('website.forms.express_delivery', ['service_id' => $request->service_id])->render();
//         return response()->json(['type' => 'express', 'html' => $html, 'service_id' => $request->service_id]);
//     }

//     return response()->json(['type' => 'none', 'html' => '', 'service_id' => $request->service_id]);
// }


public function getCategories($service_id)
{
    $categories = DB::table('categories')
                    ->where('service_id', $service_id)
                    ->get();

    // Debugging: Ensure categories are being fetched
    // dd($categories); // This will dump the categories and stop execution

    return response()->json($categories);
}

   

    public function login()
    {
        return view('website.login'); // Ensure this view exists
    }


    public function quickView()
    {
        return view('website.quickView'); // Ensure this view exists
    }
    public function trackOrder()
    {
        return view('website.trackOrder'); // Ensure this view exists
    }

    public function OrderForm()
    {
        $countries = Country::all();
        return view('website.order', compact('countries')); // Ensure this view exists
    }
}
