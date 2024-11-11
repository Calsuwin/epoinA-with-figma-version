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
            background: linear-gradient(135deg, #6dd5ed, #2193b0);
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            text-align: center;
        }

        /* Container */
        .container {
            background-color: #fff;
            padding: 30px 50px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            max-width: 420px;
            width: 100%;
            animation: slideIn 1s ease-out;
        }

        /* Animasi untuk kontainer */
        @keyframes slideIn {
            from {
                transform: translateY(20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Title styling */
        h1 {
            color: #2193b0;
            font-size: 2.2rem;
            margin-bottom: 1rem;
        }

        /* Message styling */
        p {
            font-size: 1.1rem;
            margin: 0.8rem 0;
            color: #555;
        }

        /* Logout button styling */
        a.logout-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 20px;
            padding: 12px 25px;
            font-size: 1rem;
            color: #fff;
            background-color: #2193b0;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.4s ease;
            font-weight: bold;
        }

        /* Icon animasi pada button */
        a.logout-btn svg {
            transition: transform 0.3s ease;
        }

        /* Hover effect pada button */
        a.logout-btn:hover {
            background-color: #6dd5ed;
        }

        /* Hover effect untuk icon */
        a.logout-btn:hover svg {
            transform: translateX(5px);
        }

        /* Icon styling */
        .icon {
            width: 20px;
            height: 20px;
            fill: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Dashboard Admin</h1>
        
        @if ($message = Session::get('success'))
            <p>{{ $message }}</p>
        @else
            <p>You are logged in!</p>
        @endif

        <a href="{{ route('logout') }}" 
           class="logout-btn"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M16 13v-2H7V9l-5 4 5 4v-3h9zM19 3H5c-1.1 0-2 .9-2 2v3h2V5h14v14H5v-3H3v3c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/>
            </svg>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</body>
</html>
