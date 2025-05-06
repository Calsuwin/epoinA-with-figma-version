<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Pelanggaran</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <style>
    /* pagination mungil */
    .pagination {
      font-size: 0.75rem;
      margin: 0;
    }
    .page-item .page-link {
      padding: 0.25rem 0.5rem;
      border-radius: 0.2rem;
    }
  </style>
</head>
<body>
  <h1>Data Pelanggaran</h1>
  <nav>
    <a href="{{ route('admin/dashboard') }}">Menu Utama</a> |
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
       Logout
    </a>
  </nav>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
    @csrf
  </form>

  <form method="GET" action="{{ route('pelanggaran.index') }}">
    <label for="cari">Cari:</label>
    <input type="text" name="cari" id="cari" value="{{ request('cari') }}">
    <button type="submit">Cari</button>
  </form>

  <a href="{{ route('pelanggaran.create') }}">Tambah Pelanggaran</a>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="table">
    <thead>
      <tr>
        <th>Jenis</th>
        <th>Konsekuensi</th>
        <th>Poin</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($pelanggarans as $pelanggaran)
        <tr>
          <td>{{ $pelanggaran->jenis }}</td>
          <td>{{ $pelanggaran->konsekuensi }}</td>
          <td>{{ $pelanggaran->poin }}</td>
          <td>
            <a href="{{ route('pelanggaran.edit', $pelanggaran->id) }}">Edit</a>
            <form action="{{ route('pelanggaran.destroy', $pelanggaran->id) }}"
                  method="POST" style="display:inline;"
                  onsubmit="return confirm('Yakin ingin menghapus?');">
              @csrf
              @method('DELETE')
              <button type="submit">Hapus</button>
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

  <div class="mt-4">
    {!! $pelanggarans->links() !!}
  </div>
</body>
</html>
