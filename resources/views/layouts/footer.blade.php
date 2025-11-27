<!-- FOOTER -->
<footer class="relative py-16 bg-gradient-to-r from-teal-100 via-teal-200 to-teal-100 dark:from-gray-900 dark:via-indigo-900 dark:to-gray-800 text-gray-800 dark:text-gray-400 overflow-hidden border-t-4 border-teal-500 dark:border-teal-400">
    <!-- Floating shapes for depth -->
    <div class="absolute -top-20 -left-16 w-48 h-48 bg-teal-400/20 dark:bg-teal-500/20 rounded-full filter blur-3xl animate-pulse-slow"></div>
    <div class="absolute -bottom-20 -right-16 w-56 h-56 bg-indigo-400/20 dark:bg-indigo-500/20 rounded-full filter blur-3xl animate-pulse-slow"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8">
        <div class="space-y-2">
            <h4 class="text-gray-900 dark:text-white text-2xl font-bold mb-3">GadgetSoko</h4>
            <p class="text-gray-700 dark:text-gray-300/90">Your trusted electronics store — connecting Kenya to the world of tech.</p>
        </div>
        <div class="space-y-2">
            <h4 class="text-gray-900 dark:text-white text-xl font-semibold mb-3">Quick Links</h4>
            <ul class="space-y-2">
                <li><a href="{{ route('home') }}" class="hover:text-teal-600 dark:hover:text-teal-300 transition-colors duration-300">Home</a></li>
                <li><a href="{{ route('product') }}" class="hover:text-teal-600 dark:hover:text-teal-300 transition-colors duration-300">Products</a></li>
                <li><a href="{{ route('testimonial') }}" class="hover:text-teal-600 dark:hover:text-teal-300 transition-colors duration-300">Reviews</a></li>
                <li><a href="{{ route('contact') }}" class="hover:text-teal-600 dark:hover:text-teal-300 transition-colors duration-300">Contact</a></li>
            </ul>
        </div>
        <div class="space-y-2">
            <h4 class="text-gray-900 dark:text-white text-xl font-semibold mb-3">Contact Info</h4>
            <p>Email: <a href="mailto:support@gadgetsoko.com" class="hover:text-teal-600 dark:hover:text-teal-300 transition-colors duration-300">support@gadgetsoko.com</a></p>
            <p>Phone: <a href="tel:+254712345678" class="hover:text-teal-600 dark:hover:text-teal-300 transition-colors duration-300">+254 702 414 485</a></p>
            <p>Address: Westlands, Nairobi, Kenya</p>
        </div>
    </div>

    <div class="text-center mt-12 text-gray-600 dark:text-gray-400 text-sm relative z-10">
        © 2025 GadgetSoko. All rights reserved.
    </div>
</footer>
