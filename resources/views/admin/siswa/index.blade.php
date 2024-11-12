<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
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
            overflow: hidden;
            text-align: center;
        }

        h1 {
            font-size: 2.5rem;
            color: #fff;
            margin-bottom: 20px;
        }

        /* Search and navigation links */
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
            margin-right: 10px;
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

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            text-align: center;
            color: #fff;
            font-size: 1.1rem;
        }

        th, td {
            padding: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        th {
            background-color: rgba(255, 255, 255, 0.3);
            font-weight: bold;
            font-size: 1.1rem;
            text-transform: uppercase;
        }

        /* Image styling with hover effect */
        td img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 2px solid #fff;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        /* Zoom effect on hover */
        td img:hover {
            transform: scale(1.5);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        /* Button styles */
        .btn {
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            color: #fff;
            transition: background-color 0.3s ease;
            font-size: 0.9rem;
        }

        .btn-dark {
            background-color: #333;
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

        /* Pagination Links */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        /* Success Alert */
        .alert-success {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
        }

        /* Background animation */
        @keyframes backgroundFlow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Siswa</h1>

        <div class="nav-links">
            <a href="{{ route('admin/dashboard') }}">Menu Utama</a>
            <a href="{{ route('siswa.create') }}">Tambah Siswa</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <!-- Success Message -->
        @if(Session::has('success'))
        <div class="alert-success">
            {{ Session::get('success') }}
        </div>
        @endif

        <!-- Search Form -->
        <div class="search-container">
            <form action="" method="get">
                <label for="search">Cari :</label>
                <input type="text" name="cari" placeholder="Cari data siswa..." id="search">
                <input type="submit" value="Cari">
            </form>
        </div>

        <!-- Table Data Siswa -->
        <table>
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Kelas</th>
                    <th>No HP</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($siswas as $siswa)
                <tr>
                    <td>
                        <img src="{{ asset('storage/siswas/'.$siswa->image) }}" alt="Foto Siswa">
                    </td>
                    <td>{{ $siswa->nis }}</td>
                    <td><strong>{{ $siswa->name }}</strong></td>
                    <td>{{ $siswa->email }}</td>
                    <td>{{ $siswa->tingkatan }} {{ $siswa->jurusan }} {{ $siswa->kelas }}</td>
                    <td>{{ $siswa->hp }}</td>
                    <td>{{ $siswa->status == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                    <td>
                        <a href="{{ route('siswa.show', $siswa->id) }}" class="btn btn-dark">SHOW</a>
                        <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-primary">EDIT</a>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">HAPUS</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8">Data tidak ditemukan</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="pagination">
            {{ $siswas->links() }}
        </div>
    </div>
</body>
</html>
