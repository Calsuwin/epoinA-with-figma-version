<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login </title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> {{-- Optional: sesuaikan CSS --}}
</head>
<body>
    <div class="container">
        <h2>Login </h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('authenticate') }}" method="POST">
            @csrf
            <div>
                <label>Email:</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div>
                <label>Password:</label>
                <input type="password" name="password" required>
            </div>
            <div>
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
