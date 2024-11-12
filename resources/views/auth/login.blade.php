@extends('auth.layouts')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        .login-container {
            background-color: #fff;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        /* Title */
        .login-container h1 {
            color: #4e54c8;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        /* Link to register */
        .login-container a {
            color: #4e54c8;
            font-size: 0.9rem;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
        }

        /* Form styling */
        .login-container form {
            display: flex;
            flex-direction: column;
        }

        /* Input styling */
        .login-container label {
            font-size: 0.9rem;
            color: #555;
            margin-bottom: 5px;
            text-align: left;
        }

        .login-container input[type="email"],
        .login-container input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            width: 100%;
        }

        /* Button styling */
        .login-container input[type="submit"] {
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

        .login-container input[type="submit"]:hover {
            background-color: #8f94fb;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <a href="{{ route('register') }}">Daftar</a>
        <form action="{{ route('authenticate') }}" method="post">
            @csrf
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
@endsection
