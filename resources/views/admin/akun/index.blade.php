<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
    <style>
        /* Reset styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body and Background */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #4e54c8, #8f94fb, #6dd5ed);
            background-size: 400% 400%;
            color: #fff;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: backgroundFlow 10s ease infinite;
        }

        /* Container for main content */
        .container {
            width: 90%;
            max-width: 1200px;
            background-color: rgba(255, 255, 255, 0.15);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .search-container, .nav-links {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            align-items: center;
        }

        .search-container input[type="text"] {
            width: 70%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            font-size: 1rem;
            color: #333;
        }

        .search-container input[type="submit"] {
            padding: 10px 20px;
            background-color: #4e54c8;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-container input[type="submit"]:hover {
            background-color: #8f94fb;
        }

        .nav-links a {
            padding: 10px 15px;
            background-color: #4e54c8;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .nav-links a:hover {
            background-color: #8f94fb;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            text-align: center;
        }

        th, td {
            padding: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        th {
            background-color: rgba(255, 255, 255, 0.3);
            font-weight: bold;
            text-transform: uppercase;
        }

        .btn {
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #4e54c8;
        }

        .btn-danger {
            background-color: #ff5252;
        }

        .btn:hover {
            opacity: 0.8;
        }

        @keyframes backgroundFlow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data User</h1>
        <div class="nav-links">
            <a href="{{ route('admin/dashboard') }}">Menu Utama</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <form class="search-container" action="" method="get">
            <input type="text" name="cari" id="cari" placeholder="Cari user">
            <input type="submit" value="Cari">
        </form>

        <a href="{{ route('akun.create') }}" class="btn btn-primary">Tambah User</a>

        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->usertype }}</td>
                    <td>
                        <a href="{{ route('akun.edit', $user->id) }}" class="btn btn-primary">EDIT</a>
                        <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('akun.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">HAPUS</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Data tidak ditemukan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
</body>
</html>
