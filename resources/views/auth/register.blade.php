<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Register</title>
    @vite('resources/css/app.css')
    <style>
        .password-toggle-button {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #7c3aed; /* Tailwind purple-600 */
            user-select: none;
            font-size: 1.25rem;
        }
    </style>
</head>

<body class="bg-cover bg-center min-h-screen flex items-center justify-center"
    style="background-image: url('https://images.unsplash.com/photo-1483985988355-763728e1935b?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">

    <div class="bg-white shadow-2xl rounded-2xl p-10 w-full max-w-md">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Create an Account</h2>

        @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input name="name" type="text" value="{{ old('name') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-400 focus:outline-none"
                    placeholder="John Doe" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input name="email" type="email" value="{{ old('email') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-400 focus:outline-none"
                    placeholder="you@example.com" required>
            </div>

            <div class="relative">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input id="password" name="password" type="password" required autocomplete="new-password"
                    placeholder="********"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                <span id="togglePassword" class="password-toggle-button" title="Show/Hide Password" tabindex="0"
                    role="button" aria-label="Toggle password visibility">&#128065;</span>
            </div>

            <div class="relative">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required
                    autocomplete="new-password" placeholder="********"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                <span id="togglePasswordConfirmation" class="password-toggle-button"
                    title="Show/Hide Confirm Password" tabindex="0" role="button"
                    aria-label="Toggle confirm password visibility">&#128065;</span>
            </div>

            <button type="submit"
                class="w-full bg-black hover:bg-amber-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">
                Sign Up
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-600">
            Already have an account?
            <a href="{{ route('login') }}" class="text-amber-600 hover:underline font-medium">Sign in</a>
        </p>
    </div>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
        });

        togglePassword.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                togglePassword.click();
            }
        });

        const togglePasswordConfirmation = document.getElementById('togglePasswordConfirmation');
        const passwordConfirmationInput = document.getElementById('password_confirmation');

        togglePasswordConfirmation.addEventListener('click', function () {
            const type = passwordConfirmationInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordConfirmationInput.setAttribute('type', type);
        });

        togglePasswordConfirmation.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                togglePasswordConfirmation.click();
            }
        });
    </script>

</body>

</html>
