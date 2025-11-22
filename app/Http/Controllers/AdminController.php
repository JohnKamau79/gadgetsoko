<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function removeUser($id) {
        $user = User::find($id);

        if(!$user) {
            return redirect()->back()->with('error', 'User not found!');
        }

        if($user->id === Auth::user()->id) {
            return redirect()->back()->with('error', 'You cannot delete yourself!');
        }
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');

    }
}
