{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - My Laravel App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')

</head>

<body class="bg-cover bg-center min-h-screen flex items-center justify-center" style="background-image: url('https://images.unsplash.com/photo-1483985988355-763728e1935b?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
    <div class="bg-white shadow-2xl rounded-2xl p-10 w-full max-w-md">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Welcome Back!!!</h2>

        @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li class="text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
    @csrf

    <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input
            id="email"
            name="email"
            type="email"
            value="{{ old('email') }}"
            required
            autofocus
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-400 focus:outline-none"
            placeholder="you@example.com"
        >
    </div>

    <div>
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input
            id="password"
            name="password"
            type="password"
            required
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-400 focus:outline-none"
            placeholder="••••••••"
        >
    </div>

    <div class="flex items-center justify-between">
        <label class="flex items-center">
            <input
                id="remember_me"
                name="remember"
                type="checkbox"
                class="form-checkbox text-amber-500"
            >
            <span class="ml-2 text-sm text-gray-600">Remember me</span>
        </label>
        <a href="{{ route('password.request') }}" class="text-sm text-amber-600 hover:underline">
            Forgot Password?
        </a>
    </div>

    <button
        type="submit"
        class="w-full bg-black hover:bg-amber-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300"
    >
        Sign In
    </button>
</form>


        <p class="mt-6 text-center text-gray-600">
            Don't have an account?
            <a href="register" class="text-purple-700 font-semibold hover:underline ml-1">Register</a>
        </p>
    </div>
</body>
<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const passwordType = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', passwordType);
    }
</script>

</html>
