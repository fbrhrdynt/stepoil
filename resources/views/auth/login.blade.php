<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | FOTrack</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-md rounded px-8 py-6 w-full max-w-md">
        <div class="text-center mb-4">
            <img src="{{ asset("isi/icons_fotrack/fotrack.png") }}" alt="FOTrack Logo" class="h-16 mx-auto">
        </div>

        @if ($errors->has('login_error'))
            <div class="mb-4 text-red-600 text-sm text-center">{{ $errors->first('login_error') }}</div>
        @endif

        <form method="POST" action="{{ route('login.attempt') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-bold mb-2" for="kode_login">Username</label>
                <input type="text" name="kode_login" id="kode_login"
                       class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-600"
                       value="{{ old('kode_login') }}" required autofocus>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-bold mb-2" for="pass_login">Password</label>
                <input type="password" name="pass_login" id="pass_login"
                       class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-600"
                       required>
            </div>

            <div class="mb-4">
                <button type="submit"
                        class="w-full bg-green-700 text-white font-semibold py-2 px-4 rounded hover:bg-green-800">
                    Login
                </button>
            </div>
        </form>
    </div>
</body>
</html>
