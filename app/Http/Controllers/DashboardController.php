<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\User;
use App\Models\WebsiteReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = Auth::user();

        // ===== COMMON USER DATA =====
        $productReviews = ProductReview::where('user_id', $user->id)->get();
        $websiteReviews = WebsiteReview::where('user_id', $user->id)->get();
        $cartItems = Cart::where('user_id', $user->id)->get();
        $orders = Order::where('user_id', $user->id)->get();

        $totalProductReviews = $productReviews->count();
        $totalWebsiteReviews = $websiteReviews->count();
        $totalCartItems = $cartItems->count();
        $totalOrders = $orders->count();

        $commonData = [
            'user' => $user,
            'productReviews' => $productReviews,
            'totalProductReviews' => $totalProductReviews,
            'websiteReviews' => $websiteReviews,
            'totalWebsiteReviews' => $totalWebsiteReviews,
            'cartItems' => $cartItems,
            'totalCartItems' => $totalCartItems,
            'orders' => $orders,
            'totalOrders' => $totalOrders,
        ];

        // ===== ADMIN DASHBOARD =====
        if ($user->role === 'admin') {

            $adminData = array_merge($commonData, [
                'users' => User::where('role', 'user')->get(),
                'totalUsers' => User::where('role', 'user')->count(),

                'retailers' => User::where('role', 'retailer')->get(),
                'totalRetailers' => User::where('role', 'retailer')->count(),

                'admins' => User::where('role', 'admin')->where('id', '!=', $user->id)->get(),
                'totalAdmins' => User::where('role', 'admin')->count(),

                'adminProducts' => Product::with('user')->get(),
                'totalAdminProducts' => Product::count(),

                'adminOrders' => Order::with('user')->get(),
                'totalAdminOrders' => Order::count(),

                'adminWebsiteReviews' => WebsiteReview::all(),
                'totalAdminWebsiteReviews' => WebsiteReview::count(),

                'adminProductReviews' => ProductReview::all(),
                'totalAdminProductReviews' => ProductReview::count(),
            ]);

            // Determine which admin page to load
            $page = $request->query('page', 'all'); // default = 'all'

            switch ($page) {
                case 'retailers':
                    return view('admin.admin-retailers', $adminData);
                case 'users':
                    return view('admin.admin-users', $adminData);
                case 'admins':
                    return view('admin.admin-admins', $adminData);
                case 'products':
                    return view('admin.admin-products', $adminData);
                case 'websiteReviews':
                    return view('admin.admin-websiteReviews', $adminData);
                case 'productReviews':
                    return view('admin.admin-productReviews', $adminData);
                case 'orders':
                    return view('admin.admin-orders', $adminData);
                case 'all':
                default:
                    return view('admin.admin-all', $adminData);
            }
        }

        // ===== RETAILER DASHBOARD =====
        if ($user->role === 'retailer') {

            $retailerData = array_merge($commonData, [

                'retailerProducts' => Product::where('user_id', $user->id)->with('user')->get(),
                'totalRetailerProducts' => Product::where('user_id', $user->id)->with('user')->count(),

                'retailerOrders' => Order::whereHas('orderItems.product', function ($q) {
                    $q->where('user_id', auth()->id());
                })
                    ->with(['orderItems.product'])
                    ->get()
                ,

                'totalRetailerOrders'=> Order::whereHas('orderItems.product', function ($q) {
                    $q->where('user_id', auth()->id());
                })
                    ->with(['orderItems.product'])
                    ->count()
                ,

                'retailerProductReviews' => Auth::user()->products()->with('reviews.user')->get(),
                'totalRetailerProductReviews' => Auth::user()->products()->withCount('reviews')->get()->sum('reviews_count'),
            ]);

            // Determine which retailer page to load
            $page = $request->query('page', 'all'); // default = 'all'

            switch ($page) {
                case 'products':
                    return view('retailer.retailer-products', $retailerData);
                case 'productReviews':
                    return view('retailer.retailer-productReviews', $retailerData);
                case 'orders':
                    return view('retailer.retailer-orders', $retailerData);
                case 'all':
                default:
                    return view('retailer.retailer-all', $retailerData);
            }
        }

        // ===== NORMAL USER DASHBOARD =====
        if ($user->role === 'user') {

            $page = $request->query('page', 'all'); // default = 'all'

            switch ($page) {
                case 'websiteReviews':
                    return view('user.user-websiteReviews', $commonData);
                case 'productReviews':
                    return view('user.user-productReviews', $commonData);
                case 'orders':
                    return view('user.user-orders', $commonData);
                case 'all':
                default:
                    return view('user.user-all', $commonData);
            }
        }
    }
}
