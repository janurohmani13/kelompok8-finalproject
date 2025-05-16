<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Register</title>
</head>
<body class="bg-cover bg-center min-h-screen flex items-center justify-center" style="background-image: url('https://images.unsplash.com/photo-1483985988355-763728e1935b?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">

  <div class="bg-white shadow-2xl rounded-2xl p-10 w-full max-w-md">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Create an Account</h2>
    <form class="space-y-5">
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-400 focus:outline-none" placeholder="John Doe" required>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input type="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-400 focus:outline-none" placeholder="you@example.com" required>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input type="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-400 focus:outline-none" placeholder="••••••••" required>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
        <input type="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-400 focus:outline-none" placeholder="••••••••" required>
      </div>
      <button type="submit" class="w-full bg-black hover:bg-amber-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">
        Sign Up
      </button>
    </form>
    <p class="mt-6 text-center text-sm text-gray-600">
      Already have an account?
      <a href="{{ route('welcome') }}" class="text-amber-600 hover:underline font-medium">Sign in</a>
    </p>
  </div>

</body>
</html>
