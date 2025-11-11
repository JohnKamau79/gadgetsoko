<!-- NAVBAR -->
<header class="bg-white shadow-md sticky top-0 z-50">
  <div class="max-w-7xl mx-auto flex items-center justify-between py-4 px-6 relative">
    <!-- Logo -->
    <h1 class="text-3xl font-bold text-blue-600">GadgetSoko</h1>

    <!-- Centered nav -->
    <nav class="hidden md:flex space-x-8 text-lg font-semibold text-gray-700 absolute left-1/2 transform -translate-x-1/2">
      <a href="{{ route('home') }}" class="hover:text-blue-600">Home</a>
      <a href="{{ route('product') }}" class="hover:text-blue-600">Products</a>
      <a href="{{ route('about') }}" class="hover:text-blue-600">About</a>
      <a href="{{ route('testimonial') }}" class="hover:text-blue-600">Testimonials</a>
      <a href="{{ route('contact') }}" class="hover:text-blue-600">Contact</a>
    </nav>

    <!-- Profile Dropdown -->
    <details class="relative">
      <summary class="cursor-pointer list-none">
        <img src="https://i.pravatar.cc/40" alt="avatar" class="w-10 h-10 rounded-full object-cover border-2 border-gray-300">
      </summary>

      <div class="absolute left-0 mt-2 w-44 bg-white shadow-lg rounded-md py-2 z-50">
        <div class="px-4 py-2 border-b border-gray-200 font-medium text-gray-700">John Doe</div>
        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">View Profile</a>
        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</a>
      </div>
    </details>
  </div>
</header>
