@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight">
        Profile: {{ Auth::user()->firstName }} {{ Auth::user()->lastName }}
    </h2>
@endsection

@section('content')
<div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        {{-- Update Profile Information --}}
        <div class="p-6 bg-white dark:bg-gray-800 shadow-lg sm:rounded-xl transition duration-200 hover:shadow-xl">
            <div class="max-w-xl mx-auto">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        {{-- Update Password --}}
        <div class="p-6 bg-white dark:bg-gray-800 shadow-lg sm:rounded-xl transition duration-200 hover:shadow-xl">
            <div class="max-w-xl mx-auto">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        {{-- Delete User --}}
        <div class="p-6 bg-white dark:bg-gray-800 shadow-lg sm:rounded-xl transition duration-200 hover:shadow-xl">
            <div class="max-w-xl mx-auto">
                @include('profile.partials.delete-user-form')
            </div>
        </div>

    </div>
</div>
@endsection
