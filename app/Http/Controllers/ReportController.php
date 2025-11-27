<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\User;
use App\Models\WebsiteReview;

class ReportController extends Controller
{
    /**
     * Download the selected report as PDF.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function downloadPDF(Request $request)
    {
        $user = Auth::user();
        $type = $request->query('type'); // e.g., orders, products, users, retailers, productReviews, websiteReviews

        // Only admin or retailer can download reports
        if (!in_array($user->role, ['admin', 'retailer'])) {
            abort(403, 'Unauthorized access.');
        }

        // Prepare data, view, and filename based on report type
        switch ($type) {

            // ===== ADMIN REPORTS =====
            case 'orders':
                if ($user->role === 'admin') {
                    $adminOrders = Order::with('user')->get();
                    $pdf = Pdf::loadView('admin.admin-orders', compact('adminOrders'));
                } else {
                    $retailerOrders = Order::whereHas('orderItems.product', fn($q) => $q->where('user_id', $user->id))
                        ->with(['orderItems.product'])
                        ->get();
                    $pdf = Pdf::loadView('retailer.retailer-orders', compact('retailerOrders'));
                }
                $filename = 'orders_report.pdf';
                break;

            case 'products':
                if ($user->role === 'admin') {
                    $adminProducts = Product::with('user')->get();
                    $pdf = Pdf::loadView('admin.admin-products', compact('adminProducts'));
                } else {
                    $retailerProducts = Product::where('user_id', $user->id)->with('user')->get();
                    $pdf = Pdf::loadView('retailer.retailer-products', compact('retailerProducts'));
                }
                $filename = 'products_report.pdf';
                break;

            case 'users':
                if ($user->role !== 'admin') abort(403);
                $users = User::where('role', 'user')->get();
                $pdf = Pdf::loadView('admin.admin-users', compact('users'));
                $filename = 'users_report.pdf';
                break;

            case 'retailers':
                if ($user->role !== 'admin') abort(403);
                $retailers = User::where('role', 'retailer')->get();
                $pdf = Pdf::loadView('admin.admin-retailers', compact('retailers'));
                $filename = 'retailers_report.pdf';
                break;

            case 'productReviews':
                if ($user->role === 'admin') {
                    $adminProductReviews = ProductReview::with(['product', 'user'])->get();
                    $pdf = Pdf::loadView('admin.admin-productReviews', compact('adminProductReviews'));
                } else {
                    $retailerProductReviews = $user->products()->with('reviews.user')->get();
                    $pdf = Pdf::loadView('retailer.retailer-productReviews', compact('retailerProductReviews'));
                }
                $filename = 'product_reviews_report.pdf';
                break;

            case 'websiteReviews':
                if ($user->role !== 'admin') abort(403);
                $adminWebsiteReviews = WebsiteReview::with('user')->get();
                $pdf = Pdf::loadView('admin.admin-websiteReviews', compact('adminWebsiteReviews'));
                $filename = 'website_reviews_report.pdf';
                break;

            default:
                abort(404, 'Report type not found');
        }

        // Download PDF to user's PC
        return $pdf->download($filename);
    }
}
