@extends('admin.admin-dashboard')

@section('adminDashboardContent')

<div class="p-6">

    <h1 class="text-3xl font-bold mb-6 text-blue-700">Users Management</h1>

    {{-- SUCCESS MESSAGE --}}
    @if (session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- ERROR MESSAGE --}}
    @if (session('error'))
        <div class="bg-red-200 text-red-800 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white shadow-lg rounded p-6">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="text-left p-3">Name</th>
                    <th class="text-left p-3">Email</th>
                    <th class="text-left p-3">Joined</th>
                    <th class="text-left p-3">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($users as $user)
                    <tr class="border-b">
                        <td class="p-3">{{ $user->firstName }} {{ $user->lastName }}</td>
                        <td class="p-3">{{ $user->email }}</td>
                        <td class="p-3">{{ $user->created_at->format('Y-m-d') }}</td>

                        <td class="p-3">
                            <form action="#"
                                  method="POST">
                                @csrf
                                @method('DELETE')

                                <button 
                                    onclick="return confirm('Remove this user?')"
                                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                    Remove
                                </button>
                            </form>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="4" class="p-3 text-center text-gray-500">
                            No users found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection

