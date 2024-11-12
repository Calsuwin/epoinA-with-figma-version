<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
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
            background: linear-gradient(135deg, #4e54c8, #8f94fb, #6dd5ed);
            background-size: 400% 400%;
            color: #fff;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            animation: backgroundFlow 10s ease infinite;
        }

        /* Header styling */
        .header {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 1.5rem;
            font-weight: bold;
        }

        /* Logout button */
        .logout-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            font-size: 0.9rem;
            color: #fff;
            background-color: #4e54c8;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
            display: inline-flex;
            align-items: center;
        }

        .logout-btn:hover {
            background-color: #8f94fb;
        }

        .logout-btn svg {
            margin-left: 5px;
            width: 18px;
            height: 18px;
        }

        /* Welcome message */
        .welcome-message {
            font-size: 1.8rem;
            margin-top: 60px;
            color: #fff;
            animation: textMove 5s ease-in-out infinite alternate;
        }

        /* Link styling */
        .nav-link {
            font-size: 1.2rem;
            color: #fff;
            background-color: #4e54c8;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            margin-top: 20px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .nav-link:hover {
            background-color: #8f94fb;
        }

        /* Background animation */
        @keyframes backgroundFlow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Text animation */
        @keyframes textMove {
            0% { transform: translateY(0); }
            100% { transform: translateY(-10px); }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">Halaman Admin</div>

    <!-- Welcome Message -->
    <div class="welcome-message">
        @if ($message = Session::get('success'))
            {{ $message }}
        @else
            Selamat Datang di Dashboard Anda!
        @endif
    </div>

    <!-- Data Siswa Link -->
    <a class="nav-link" href="{{ route('siswa.index') }}">Data Siswa</a>

    <!-- Logout Button -->
    <a href="{{ route('logout') }}" 
       class="logout-btn"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5a2 2 0 00-2-2h-6a2 2 0 00-2 2v14a2 2 0 002 2h6a2 2 0 002-2v-1"/>
        </svg>
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>
