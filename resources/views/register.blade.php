<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
        background-image: url("images/background.jpg");
        background-size: cover;
        background-position: center;
        position: relative; 
    }

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

        .register-container {
            background-color: #94918b;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px; /* Adjust width as needed */
            width: 90%; /* Adjust width as needed */
            position: relative; /* Ensure the container is above the overlay */
            z-index: 1; /* Set z-index higher than overlay */
        }

        @media (min-width: 640px) {
            .container {
                padding: 0 20px; /* Adjust horizontal padding for larger screens */
            }

            .register-container {
                width: 400px; /* Reset width for larger screens */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-container">
            <h2 class="text-3xl mb-4 text-center text-white font-bold ">Register</h2>
            <form action="{{ route('register-user') }}" method="POST" class="space-y-4">
                @csrf <!-- For security purposes -->
                @if (Session::has('success')) <!-- Gets session from function -->
                <div class="text-green-500 font-bold">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('failure'))
                <div class="text-red-500 font-bold">{{ Session::get('failed') }}</div>
                @endif
                <div>
                    <!-- Old value is used to retain the values if an error occurs in input type -->
                    <input type="text" name="passenger_id" placeholder="Id" value="{{ old('passenger_id') }}" class="w-full px-4 py-2 border rounded">
                    <!-- Retrieve error message from function validation -->
                    <span class="text-red-500 font-bold">@error('passenger_id') {{ $message }} @enderror</span>
                </div>
                <div>
                    <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" class="w-full px-4 py-2 border rounded">
                    <span class="text-red-500 font-bold">@error('name') {{ $message }} @enderror</span>
                </div>
                <div>
                    <input type="number" name="age" placeholder="Age" value="{{ old('age') }}"class="w-full px-4 py-2 border rounded">
                    <span class="text-red-500 font-bold">@error('age') {{ $message }} @enderror</span>
                </div>
                <div>
                    <input type="text" name="cnic" placeholder="CNIC" value="{{ old('cnic') }}"  class="w-full px-4 py-2 border rounded">
                    <span class="text-red-500 font-bold">@error('cnic') {{ $message }} @enderror</span>
                </div>
                <div>
                    <input type="text" name="phone" placeholder="Phone Number" value="{{ old('phone') }}"  class="w-full px-4 py-2 border rounded">
                    <span class="text-red-500 font-bold">@error('phone') {{ $message }} @enderror</span>
                </div>
                <div>
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"  class="w-full px-4 py-2 border rounded">
                    <span class="text-red-500 font-bold">@error('email') {{ $message }} @enderror</span>
                </div>
                <div>
                    <input type="password" name="password" placeholder="Password" value="{{ old('password') }}"  class="w-full px-4 py-2 border rounded">
                    <span class="text-red-500 font-bold">@error('password') {{ $message }} @enderror</span>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">Register</button>
            </form>
            <a href="login" class="block text-center text-white mt-4">Login, if already a user</a>
        </div>
    </div>
</body>
</html>
