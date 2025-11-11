@extends('gadgetsoko.layouts.app')

@section('title', 'Contact-Page')

@section('content')

@include('gadgetsoko.components.nav')

  <!-- HERO SECTION -->
  <section class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-24 text-center">
    <h2 class="text-4xl md:text-5xl font-bold mb-4">Get in Touch</h2>
    <p class="text-lg md:text-xl max-w-3xl mx-auto">
      Have questions or need assistance? Fill out the form below, and our team will get back to you as soon as possible.
    </p>
  </section>

  <!-- CONTACT FORM + DETAILS -->
  <section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-start">
      
      <!-- Form -->
      <div class="bg-gray-50 p-8 rounded-xl shadow">
        <h3 class="text-2xl font-bold text-gray-800 mb-6">Send Us a Message</h3>
        <form action="#" method="POST" class="space-y-4">
          <input type="text" name="name" placeholder="Your Name" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" required>
          <input type="email" name="email" placeholder="Your Email" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" required>
          <input type="text" name="subject" placeholder="Subject" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" required>
          <textarea name="message" rows="5" placeholder="Your Message" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" required></textarea>
          <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-500 transition">Send Message</button>
        </form>
      </div>

      <!-- Contact Details -->
      <div class="space-y-8">
        <div>
          <h4 class="text-xl font-semibold text-gray-800 mb-2">Contact Information</h4>
          <p class="text-gray-600">Email: support@gadgetsoko.com</p>
          <p class="text-gray-600">Phone: +254 712 345 678</p>
          <p class="text-gray-600">Address: Westlands, Nairobi, Kenya</p>
        </div>

        <div>
          <h4 class="text-xl font-semibold text-gray-800 mb-2">Business Hours</h4>
          <p class="text-gray-600">Monday - Friday: 9:00 AM - 6:00 PM</p>
          <p class="text-gray-600">Saturday: 10:00 AM - 4:00 PM</p>
          <p class="text-gray-600">Sunday: Closed</p>
        </div>

        <div>
          <h4 class="text-xl font-semibold text-gray-800 mb-2">Find Us Here</h4>
          <img src="https://via.placeholder.com/400x200?text=Map+Placeholder" alt="Map" class="rounded-lg shadow">
        </div>
      </div>
    </div>
  </section>

  <!-- CTA SECTION -->
  <section class="py-16 bg-gradient-to-r from-blue-600 to-indigo-700 text-white text-center">
    <h3 class="text-3xl md:text-4xl font-bold mb-4">Explore Our Products</h3>
    <p class="text-lg mb-6 max-w-2xl mx-auto">Browse our latest gadgets and find the perfect electronics for your needs today.</p>
    <a href="products.html" class="bg-yellow-400 text-gray-900 font-semibold px-8 py-3 rounded-lg hover:bg-yellow-300 transition">Shop Now</a>
  </section>

@include('gadgetsoko.components.footer')
@endsection
