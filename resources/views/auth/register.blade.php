@extends('auth.layouts')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    {{-- <link href="{{ asset('css/register.css') }}" rel="stylesheet"> --}}
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
