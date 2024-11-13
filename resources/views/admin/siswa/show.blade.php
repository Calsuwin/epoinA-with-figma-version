<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Siswa</title>
  <link href="{{ asset('css/show.css') }}" rel="stylesheet">
</head>
<body>
  <div class="container">
    <h1>Detail Siswa</h1>
    <a href="{{ route('siswa.index')}}" class="back-link">Kembali</a>

    <div>
      <img src="{{ asset('storage/siswas/'.$siswa->image) }}" alt="Profile Picture" class="profile-img">
    </div>

    <table>
      <tr>
        <th colspan="2">Akun Siswa</th>
        <th colspan="2">Data Siswa</th>
      </tr>
      <tr>
        <th>Nama</th>
        <td>{{ $siswa->name }}</td>
        <th>NIS</th>
        <td>{{ $siswa->nis }}</td>
      </tr>
      <tr>
        <th>Email</th>
        <td>{{ $siswa->email }}</td>
        <th>Kelas</th>
        <td>{{ $siswa->tingkatan }} {{ $siswa->jurusan }} {{ $siswa->kelas }}</td>
      </tr>
      <tr>
        <th>Status</th>
        <td colspan="3">{{ $siswa->status == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
      </tr>
    </table>
  </div>
</body>
</html>
