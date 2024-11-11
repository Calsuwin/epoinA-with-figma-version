@extends('auth.layouts')

@section('content')

<h1>Login</h1>
<a href="{{ route('register') }}">Daftar</a>
<br><br>
<form action="{{ route('authenticate') }}" method="post">
    @csrf
    <label>Email Adress</label><br>
    <input type="email" id="email" name="password"><br><br>
    <input type="submit" value="Login">
</form>

@endsection