<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    {{-- <link href="{{ asset('css/index.css') }}" rel="stylesheet"> --}}
    <style>
        table img {
            width: 150px;
            height: auto;
            object-fit: cover;
            border-radius: 7px;
        }
        .pagination {
            font-size: 0.75rem;
            margin-top: 1rem;
        }
        table {
  width: 80%;
  border-collapse: collapse;
}
th, td {
  border: 1px solid #ccc;
  padding: 0.5rem;
  text-align: center;
}
thead th {
  background-color: #f5f5f5;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Data Siswa</h1>

        <div class="nav-links">
            <a href="{{ route('admin/dashboard') }}">Menu Utama</a>
            
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               Logout
            </a>
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
            <form action="{{ route('siswa.index') }}" method="get">
                <label for="search">Cari :</label>
                <input type="text" name="cari" placeholder="Cari data siswa..." id="search" value="{{ request('cari') }}">
                <button type="submit">Cari</button>
            </form>
        </div>
<div> <a href="{{ route('siswa.create') }}">Tambah Siswa</a></div>
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
                        @if($siswa->image)
                            <img 
                              src="{{ asset('storage/siswas/' . $siswa->image) }}" 
                              alt="Foto {{ $siswa->name }}">
                        @else
                            <span>No Image</span>
                        @endif
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
                        <form onsubmit="return confirm('Apakah Anda Yakin?');" 
                              action="{{ route('siswa.destroy', $siswa->id) }}" 
                              method="POST" style="display: inline;">
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
            {!! $siswas->links() !!}
        </div>
    </div>
</body>
</html>
