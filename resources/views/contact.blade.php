@extends('layouts.app')

@section('title', 'Contact-Page')

@section('content')

    <!-- HERO SECTION -->
    <section
        class="relative bg-gradient-to-r from-teal-500 via-indigo-500 to-teal-400 dark:from-teal-600 dark:via-indigo-700 dark:to-teal-500 text-white py-24 px-6 min-h-[50vh] flex items-center overflow-hidden">
        <div class="absolute inset-0 bg-teal-50/20 dark:bg-gray-900/20 pointer-events-none animate-pulse-slow"></div>
        <div class="max-w-7xl mx-auto flex flex-col-reverse md:flex-row items-center justify-between relative z-10 w-full">
            <div class="md:w-1/2 space-y-6 text-center md:text-left">
                <h2 class="text-4xl sm:text-5xl font-extrabold leading-tight drop-shadow-lg">
                    Get in Touch
                </h2>
                <p class="text-white/90 dark:text-white/80 text-base sm:text-lg drop-shadow-sm">
                    Have questions or need assistance? Fill out the form below, and our team will get back to you as soon as
                    possible.
                </p>
            </div>
            <div class="md:w-1/2 mb-12 md:mb-0 relative">
                <img src="{{ asset('images/contact.png') }}" alt="Contact Illustration"
                    class="rounded-xl shadow-2xl w-full md:w-1/2 max-w-md mx-auto object-cover transform hover:scale-105 transition duration-500">
                <div
                    class="absolute -bottom-10 -right-10 w-40 h-40 bg-indigo-500/30 rounded-full filter blur-3xl animate-pulse-slow">
                </div>
                <div
                    class="absolute -top-10 -left-10 w-56 h-56 bg-teal-300/30 rounded-full filter blur-3xl animate-pulse-slow">
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT FORM + DETAILS -->
    <section class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-start">

            <!-- Form -->
            <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow">
                <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Send Us a Message</h3>
                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="text" name="name" placeholder="Your Name"
                        class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-teal-500 outline-none dark:bg-gray-700 dark:text-gray-100"
                        required>
                    <input type="email" name="email" placeholder="Your Email"
                        class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-teal-500 outline-none dark:bg-gray-700 dark:text-gray-100"
                        required>
                    <input type="text" name="subject" placeholder="Subject"
                        class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-teal-500 outline-none dark:bg-gray-700 dark:text-gray-100"
                        required>
                    <textarea name="message" rows="5" placeholder="Your Message"
                        class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-teal-500 outline-none dark:bg-gray-700 dark:text-gray-100"
                        required></textarea>
                    <button type="submit"
                        class="w-full bg-amber-400 hover:bg-amber-300 dark:bg-amber-500 dark:hover:bg-amber-400 text-gray-900 dark:text-gray-900 py-3 rounded-lg font-semibold transition">
                        Send Message
                    </button>
                </form>

                @if (session('success'))
                    <p class="text-green-600 dark:text-green-300 mt-2 text-center">{{ session('success') }}</p>
                @endif
                @if (session('error'))
                    <p class="text-red-600 dark:text-red-300 mt-2 text-center">{{ session('error') }}</p>
                @endif
            </div>

            <!-- Contact Details -->
            <div class="space-y-8">
                <div>
                    <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-2">Contact Information</h4>
                    <p class="text-gray-600 dark:text-gray-300">Email: support@gadgetsoko.com</p>
                    <p class="text-gray-600 dark:text-gray-300">Phone: +254 702 414 585</p>
                    <p class="text-gray-600 dark:text-gray-300">Address: Westlands, Nairobi, Kenya</p>
                </div>

                <div>
                    <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-2">Business Hours</h4>
                    <p class="text-gray-600 dark:text-gray-300">Monday - Friday: 9:00 AM - 6:00 PM</p>
                    <p class="text-gray-600 dark:text-gray-300">Saturday: 10:00 AM - 4:00 PM</p>
                    <p class="text-gray-600 dark:text-gray-300">Sunday: Closed</p>
                </div>

                <div>
                    <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-2">Find Us Here</h4>
                    <section class="map mt-6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!..." width="100%" height="450"
                            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </section>

                </div>
            </div>

        </div>
    </section>

    <!-- CTA SECTION -->
    <section
        class="py-16 bg-gradient-to-r from-teal-500 via-indigo-500 to-teal-400 dark:from-teal-600 dark:via-indigo-700 dark:to-teal-500 text-white text-center">
        <h3 class="text-3xl md:text-4xl font-bold mb-4">Explore Our Products</h3>
        <p class="text-lg mb-6 max-w-2xl mx-auto">Browse our latest gadgets and find the perfect electronics for your needs
            today.</p>
        <a href="{{ route('product') }}"
            class="bg-amber-400 hover:bg-amber-300 dark:bg-amber-500 dark:hover:bg-amber-400 text-gray-900 dark:text-gray-900 font-semibold px-8 py-3 rounded-lg transition">
            Shop Now
        </a>
    </section>

@endsection
