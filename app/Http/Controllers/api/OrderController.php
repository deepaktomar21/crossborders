<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Country;
use App\Models\Service;
use App\Models\Category;
class OrderController extends Controller
{

    public function store(Request $request)
    {
        try {
            // Validate request
            $validatedData = $request->validate([
                'country' => 'required|string',
                'service' => 'required|string',
                'expressCategory' => 'nullable|string',
                'sender_name' => 'nullable|string',
                'sender_phone' => 'nullable|string',
                'sender_address' => 'nullable|string',
                'recipientName' => 'nullable|string',
                'recipientPhone' => 'nullable|string',
                'recipientAddress' => 'nullable|string',
                'productType' => 'nullable|string',
                'productImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'buyer_name' => 'nullable|string|max:255',
                'buyer_phone' => 'nullable|string|max:20',
                'buyer_email' => 'nullable|email|max:255',
                'house_address' => 'required|string',
                'apartment_suite' => 'nullable|string',
                'city' => 'nullable|string|max:255',
                'state' => 'nullable|string|max:255',
                'postcode' => 'nullable|string|max:20',
                'item_category' => 'nullable|string',
                'product_name' => 'nullable|string',
                'product_url' => 'nullable',
                'admin_suggestion' => 'nullable|in:Yes,No',
                'preferred_brand' => 'nullable|string',
                'specific_details' => 'nullable|string',
                'price_range' => 'nullable|string',
                'size' => 'nullable|string',
                'weight' => 'nullable|string',
                'delivery_mode' => 'nullable|string',
            ]);

            // Determine user registration details
            $userName = $request->sender_name ?? $request->buyer_name;
            $userPhone = $request->sender_phone ?? $request->buyer_phone;
            $userEmail = $request->buyer_email ?? null;

            if (!$userPhone && !$userEmail) {
                return response()->json(['error' => 'User details are required.'], 400);
            }

            $user = User::where('phone', $userPhone)->orWhere('email', $userEmail)->first();

            if (!$user && $userName) {
                $user = User::create([
                    'name' => $userName,
                    'phone' => $userPhone,
                    'email' => $userEmail,
                    'password' => bcrypt($userName), // Default password
                ]);
            }

            // Generate unique tracking ID
            do {
                $trackingId = 'CB' . Str::random(8);
            } while (Order::where('tracking_id', $trackingId)->exists());

            // Handle product image upload
            $imagePath = null;
            if ($request->hasFile('productImage')) {
                $imagePath = $request->file('productImage')->store('product_images', 'public');
            }

            // Create new order
            $order = Order::create([
                'tracking_id' => $trackingId,
                'user_id' => $user->id ?? null,
                'country' => $request->country,
                'service' => $request->service,
                'express_category' => $request->expressCategory,
                'sender_name' => $request->sender_name,
                'sender_phone' => $request->sender_phone,
                'sender_address' => $request->sender_address,
                'recipient_name' => $request->recipientName,
                'recipient_phone' => $request->recipientPhone,
                'recipient_address' => $request->recipientAddress,
                'delivery_product_type' => $request->productType,
                'delivery_product_image' => $imagePath,
                'buyer_name' => $request->buyer_name,
                'buyer_phone' => $request->buyer_phone,
                'buyer_email' => $request->buyer_email,
                'house_address' => $request->house_address,
                'apartment_suite' => $request->apartment_suite,
                'city' => $request->city,
                'state' => $request->state,
                'postcode' => $request->postcode,
                'item_category' => $request->item_category,
                'product_name' => $request->product_name,
                'product_url' => $request->product_url,
                'admin_suggestion' => $request->admin_suggestion,
                'preferred_brand' => $request->preferred_brand,
                'specific_details' => $request->specific_details,
                'price_range' => $request->price_range,
                'size' => $request->size,
                'weight' => $request->weight,
                'delivery_mode' => $request->delivery_mode,
            ]);

            return response()->json(['success' => true, 'message' => 'Order submitted successfully!', 'order' => $order], 201);
        } catch (Exception $e) {
            return response()->json(['error' => 'Something went wrong!', 'message' => $e->getMessage()], 500);
        }
    }
    public function trackOrder(Request $request)
    {
        $request->validate([
            'tracking_id' => 'required|string'
        ]);

        $order = Order::where('tracking_id', $request->tracking_id)
            ->whereNotNull('delivery_status')
            ->first();

        if (!$order) {
            return response()->json([
                'status' => 'error',
                'message' => 'Order not found or delivery status unavailable.'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Order status retrieved successfully!',
            'tracking_id' => $order->tracking_id,
            'delivery_status' => $order->delivery_status
        ], 200);
    }

    public function submitOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country' => 'required|string',
            'service' => 'required|string',
            'buyer_name' => 'required|string|max:255',
            'buyer_phone' => 'required|string|max:20',
            'buyer_email' => 'nullable|email|max:255',
            'house_address' => 'required|string',
            'apartment_suite' => 'nullable|string',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postcode' => 'required|string|max:20',
            'item_category' => 'required|string',
            'product_name' => 'nullable|string',
            'product_url' => 'nullable|url',
            'admin_suggestion' => 'required|in:Yes,No',
            'preferred_brand' => 'nullable|string',
            'specific_details' => 'nullable|string',
            'price_range' => 'nullable|string',
            'size' => 'nullable|string',
            'weight' => 'nullable|string',
            'delivery_mode' => 'required|string',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        try {

            $user = User::where('phone', $request->buyer_phone)
                ->orWhere('email', $request->buyer_email)
                ->first();

            if (!$user) {
                $user = User::create([
                    'name' => $request->buyer_name,
                    'phone' => $request->buyer_phone,
                    'email' => $request->buyer_email,
                    'password' => Hash::make($request->buyer_name),
                ]);
            }

            // Handle Product Image Upload
            $product_image = null;
            if ($request->hasFile('product_image')) {
                $product_image = $request->file('product_image')->store('uploads', 'public');
            }

            // Generate Unique Tracking ID
            do {
                $trackingId = 'CB' . Str::random(8);
            } while (Order::where('tracking_id', $trackingId)->exists());

            // Create Order
            $order = Order::create([
                'tracking_id' => $trackingId,
                'user_id' => $user->id,
                'country' => $request->country,
                'service' => $request->service,
                'buyer_name' => $request->buyer_name,
                'buyer_phone' => $request->buyer_phone,
                'buyer_email' => $request->buyer_email,
                'house_address' => $request->house_address,
                'apartment_suite' => $request->apartment_suite,
                'city' => $request->city,
                'state' => $request->state,
                'postcode' => $request->postcode,
                'item_category' => $request->item_category,
                'product_name' => $request->product_name,
                'product_url' => $request->product_url,
                'admin_suggestion' => $request->admin_suggestion,
                'preferred_brand' => $request->preferred_brand,
                'specific_details' => $request->specific_details,
                'price_range' => $request->price_range,
                'product_image' => $product_image,
                'size' => $request->size,
                'weight' => $request->weight,
                'delivery_mode' => $request->delivery_mode,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Order submitted successfully!',
                'data' => $order
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getCountries()
    {
        return response()->json(Country::select('id', 'name')->get());
    }
    
    // Get services based on selected country
    public function getServices($country_id)
    {
        $services = Service::where('country_id', $country_id)->get(['id', 'name']);
        return response()->json($services);
    }
    

    // Get categories based on selected service
    public function getCategories($service_id)
    {
        $categories = Category::where('service_id', $service_id)->get();
        return response()->json($categories);
    }


    ////
    public function getDropdownData($country_id)
    {
        // Get the selected country
        $country = Country::find($country_id);
    
        if (!$country) {
            return response()->json(['error' => 'Country not found'], 404);
        }
    
        // Set service name based on selected country
        $serviceName = ($country->name === 'UK') ? "Want to buy goods from Ghana" : "Want to buy goods from UK";
    
        // Find service ID based on this logic
        $service = Service::where('name', $serviceName)->first();
    
        if (!$service) {
            return response()->json(['error' => 'No service found'], 404);
        }
    
        // Get categories based on the service ID
        $categories = Category::where('service_id', $service->id)->get();
    
        return response()->json([
            'country' => $country,
            'service' => ['id' => $service->id, 'name' => $serviceName],
            'categories' => $categories
        ]);
    }


public function checkService(Request $request)
{
    $service = Service::find($request->service_id);

    if ($service->buy_from) {
        return response()->json(['redirect' => 'buy']);
    } elseif ($service->express_delivery) {
        return response()->json(['redirect' => 'express_delivery']);
    }

    return response()->json(['redirect' => 'step2']);
}

}
