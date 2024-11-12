@extends('auth.layouts')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        /* Reset styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #4e54c8, #8f94fb);
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Container for form */
        .register-container {
            background-color: #fff;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        /* Title */
        .register-container h1 {
            color: #4e54c8;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        /* Link to login */
        .register-container a {
            color: #4e54c8;
            font-size: 0.9rem;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
        }

        /* Form styling */
        .register-container form {
            display: flex;
            flex-direction: column;
        }

        /* Input styling */
        .register-container label {
            font-size: 0.9rem;
            color: #555;
            margin-bottom: 5px;
            text-align: left;
        }

        .register-container input[type="text"],
        .register-container input[type="email"],
        .register-container input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            width: 100%;
        }

        /* Error message styling */
        .text-danger {
            color: #ff4d4d;
            font-size: 0.8rem;
            text-align: left;
            margin-top: -10px;
            margin-bottom: 10px;
        }

        /* Button styling */
        .register-container input[type="submit"] {
            padding: 12px;
            background-color: #4e54c8;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .register-container input[type="submit"]:hover {
            background-color: #8f94fb;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>Register</h1>
        <a href="{{ route('login') }}">Login</a>
        <form action="{{ route('store') }}" method="POST">
            @csrf
            <label for="name">Nama Lengkap</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif

            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif

            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
            
            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>
@endsection
