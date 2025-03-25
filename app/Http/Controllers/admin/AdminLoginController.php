<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;



class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }




    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'You have been logged out successfully.');
    }


    public function dashboard(Request $request)
    {
        $filter = $request->input('filter', 'monthly'); // Default to monthly
        $usersQuery = User::query();

        switch ($filter) {
            case 'daily':
                $users = $usersQuery->selectRaw('DATE(created_at) as period, COUNT(*) as count')
                    ->whereDate('created_at', '>=', Carbon::now()->subDays(30))
                    ->groupBy('period')
                    ->orderBy('period')
                    ->get();
                break;

            case 'weekly':
                $users = $usersQuery->selectRaw('YEAR(created_at) as year, WEEK(created_at) as period, COUNT(*) as count')
                    ->whereDate('created_at', '>=', Carbon::now()->subMonths(3))
                    ->groupBy('year', 'period')
                    ->orderBy('year')
                    ->orderBy('period')
                    ->get();
                break;

            case 'monthly':
                $users = $usersQuery->selectRaw('YEAR(created_at) as year, MONTH(created_at) as period, COUNT(*) as count')
                    ->whereDate('created_at', '>=', Carbon::now()->subYears(1))
                    ->groupBy('year', 'period')
                    ->orderBy('year')
                    ->orderBy('period')
                    ->get();
                break;

            case 'quarterly':
                $users = $usersQuery->selectRaw('YEAR(created_at) as year, QUARTER(created_at) as period, COUNT(*) as count')
                    ->whereDate('created_at', '>=', Carbon::now()->subYears(2))
                    ->groupBy('year', 'period')
                    ->orderBy('year')
                    ->orderBy('period')
                    ->get();
                break;

            case 'halfyearly':
                $users = $usersQuery->selectRaw('YEAR(created_at) as year, CEIL(MONTH(created_at)/6) as period, COUNT(*) as count')
                    ->whereDate('created_at', '>=', Carbon::now()->subYears(3))
                    ->groupBy('year', 'period')
                    ->orderBy('year')
                    ->orderBy('period')
                    ->get();
                break;

            default:
                $users = collect(); // Empty collection if filter is invalid
                break;
        }

        $labels = [];
        $counts = [];

        foreach ($users as $user) {
            if ($filter === 'daily') {
                $labels[] = Carbon::parse($user->period)->format('d M Y');
            } elseif ($filter === 'weekly') {
                $labels[] = "Week " . $user->period . " " . $user->year;
            } elseif ($filter === 'monthly') {
                $labels[] = Carbon::create($user->year, $user->period)->format('M Y');
            } elseif ($filter === 'quarterly') {
                $labels[] = "Q" . $user->period . " " . $user->year;
            } elseif ($filter === 'halfyearly') {
                $labels[] = "H" . $user->period . " " . $user->year;
            }
            $counts[] = $user->count;
        }

        $totalOrders = Order::count();
        $pendingOrders = Order::where('order_status', 'pending')->count();
        $DeliveredOrders = Order::where('delivery_status', 'Delivered')->count();
        $inTransitOrders = Order::where('delivery_status', 'in-transit')->count();


        return view('admin.dashboard', compact('labels', 'counts', 'filter', 'totalOrders', 'pendingOrders', 'DeliveredOrders', 'inTransitOrders'));
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.login')
                ->withErrors($validator)
                ->withInput($request->only('email'));
        }

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->filled('remember'))) {
            $admin = Auth::guard('admin')->user();

            // Check if the role is 'admin'
            if ($admin->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Login successful! Welcome to the admin panel.');
            } else {
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->with('error', 'You are not authorized to access this panel.');
            }
        }

        return redirect()->route('admin.login')->with('error', 'Either Email/Password is incorrect.');
    }




    public function showUpdateForm()
    {
        return view('admin.forgot_password');
    }

    public function updatePassword(Request $request)
    {
        // Validate the input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|confirmed|min:4',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find the user by email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Invalid email')->withInput();
        }

        // Update the user's password
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('admin.login')->with('success', 'Password updated successfully');
    }




    public function profile()
    {
        $data =  Auth::user();
        return view('admin.profile', compact('data')); // Create this view file
    }

    public function adminupdate(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'first_name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'nullable|min:6',
            'user_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if ($request->hasFile('user_image')) {
            $img = $request->file('user_image');
            $imgName = time() . '_profile.' . $img->getClientOriginalExtension();
            $img->move(public_path('uploads/profile_images'), $imgName);
            $user->img = 'uploads/profile_images/' . $imgName; // Store image path
        }

        $user->name = $request->first_name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
