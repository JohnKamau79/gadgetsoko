<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function removeUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found!');
        }

        if ($user->id == Auth::user()->id) {
            return redirect()->back()->with('error', 'You cannot delete yourself!');
        }
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');

    }

    public function makeRetailer($id)
    {
        $user = User::findOrFail($id);
        $user->role = 'retailer';
        $user->save();

        return redirect()->back()->with('success', 'User promoted to retailer.');
    }
    public function revokeRetailer($id)
    {
        $user = User::findOrFail($id);
        $user->role = 'user';
        $user->save();

        return redirect()->back()->with('success', 'User demoted to user.');
    }
}
