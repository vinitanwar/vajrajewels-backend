<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Luxury Register</title>

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

  <!-- Custom Gold Color -->
  <style>
    .text-gold-500 { color: #FFD700; }
    .focus\:border-gold-500:focus { border-color: #FFD700; }
    .focus\:ring-gold-500:focus { box-shadow: 0 0 0 2px #FFD700; }
  </style>
</head>
<body class="bg-black font-sans min-h-screen flex items-center justify-center">

  <div class="w-full max-w-md p-8 bg-gradient-to-br from-gray-900 via-black to-gray-800 rounded-3xl shadow-2xl">
    <h2 class="text-3xl font-bold text-gold-500 text-center mb-6">Register</h2>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
     @csrf
      <div class="relative">
        <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gold-500"></i>
        <input 
          type="text" 
          name="name" 
          placeholder="Your Name" 
          required 
          class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white placeholder-gray-400 focus:outline-none focus:border-gold-500 focus:ring-2 focus:ring-gold-500 transition"
        >
      </div>

      <!-- Email Input -->
      <div class="relative">
        <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-gold-500"></i>
        <input 
          type="email" 
          name="email" 
          placeholder="Email Address" 
          required 
          class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white placeholder-gray-400 focus:outline-none focus:border-gold-500 focus:ring-2 focus:ring-gold-500 transition"
        >
      </div>

      <!-- Password Input -->
      <div class="relative">
        <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gold-500"></i>
        <input 
          type="password" 
          name="password" 
          placeholder="Password" 
          required 
          class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white placeholder-gray-400 focus:outline-none focus:border-gold-500 focus:ring-2 focus:ring-gold-500 transition"
        >
      </div>

      <!-- Confirm Password Input -->
      <div class="relative">
        <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gold-500"></i>
        <input 
          type="password" 
          name="password_confirmation" 
          placeholder="Confirm Password" 
          required 
          class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white placeholder-gray-400 focus:outline-none focus:border-gold-500 focus:ring-2 focus:ring-gold-500 transition"
        >
      </div>

      <!-- Submit Button -->
      <button 
        type="submit" 
        class="w-full py-3 mt-3 bg-gradient-to-r from-yellow-500 via-yellow-600 to-yellow-500 text-black font-bold rounded-xl shadow-lg hover:scale-105 transition transform"
      >
        Register
      </button>
    </form>

    <p class="text-center text-gray-400 mt-4">
      Already have an account? 
      <a href="{{ route('login') }}" class="text-gold-500 hover:underline">Login</a>
    </p>
  </div>

</body>
</html>
