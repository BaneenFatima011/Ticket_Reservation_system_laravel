<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<style>
    body {
        background-image: url("images/background.jpg");
        background-size: cover;
        background-position: center;
        position: relative; /* Set position to relative for overlay */
    }

    /* Overlay */
    body::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: -1; 
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .login-container {
        background-color: #94918b;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        max-width: 400px; 
        width: 90%; 
        position: relative; 
        z-index: 2; 
        margin: auto; /* Center horizontally and vertically */
    }

    @media (min-width: 640px) {
        .container {
            padding: 0 20px; 
        }

        .login-container {
            width: 400px; 
        }
    }
</style>
<body>
    <div class="container">
        <div class="login-container">
            <h2 class="text-3xl mb-4 text-center text-white font-bold">Login</h2>
            <form action="{{ route('login-user') }}" method="POST" class="space-y-4">
                @csrf 
                @if (Session::has('success'))
              
                <div class="text-green-500 font-bold">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('failure'))
                <div class="text-red-500 font-bold">{{ Session::get('failure') }}</div>
                @endif
                <div>
                 
                    <input type="id" name="id" value="{{ old('cnic') }}" placeholder="CNIC" class="w-full px-4 py-2 border rounded">
                   
                    <span class="text-red-500 font-bold">@error('id') {{ $message }} @enderror</span>
                </div>
                <div>
                    <input type="password" name="password" value="{{ old('password') }}" placeholder="Password" class="w-full px-4 py-2 border rounded">
                    <span class="text-red-500 font-bold">@error('password') {{ $message }} @enderror</span>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">Login</button>
            </form>
            <a href="register" class="block text-center text-white  mt-4">Sign up if not a user</a>
        </div>
    </div>
</body>
</html>
