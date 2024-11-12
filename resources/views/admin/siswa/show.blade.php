<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Siswa</title>
  <style>
    /* Base Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* Body Background */
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #4e54c8, #8f94fb, #6dd5ed);
      background-size: 400% 400%;
      color: #4e54c8;
      animation: backgroundFlow 10s ease infinite;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    /* Container */
    .container {
      max-width: 800px;
      background: #fff;
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      text-align: center;
    }

    h1 {
      font-size: 2.5rem;
      color: #4e54c8;
      margin-bottom: 20px;
    }

    /* Back Button */
    .back-link {
      display: inline-block;
      margin-bottom: 20px;
      padding: 10px 15px;
      background-color: #4e54c8;
      color: #fff;
      border-radius: 5px;
      text-decoration: none;
      transition: background-color 0.3s;
    }

    .back-link:hover {
      background-color: #8f94fb;
    }

    /* Table Styling */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      color: #4e54c8;
    }

    th, td {
      padding: 15px;
      border: 1px solid rgba(78, 84, 200, 0.2);
      text-align: left;
    }

    th {
      background-color: rgba(78, 84, 200, 0.1);
    }

    /* Image Styling */
    .profile-img {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      box-shadow: 0 0 20px rgba(255, 0, 255, 0.5), 0 0 30px rgba(0, 255, 255, 0.5);
      margin-bottom: 20px;
    }

    .profile-img:hover {
      transform: scale(1.2);
      box-shadow: 0 0 30px rgba(255, 0, 255, 0.8), 0 0 40px rgba(0, 255, 255, 0.8);
    }

    /* Layout for Account & Student Data */
    .details-section {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }

    .details-section .half-section {
      width: 48%;
    }

    /* Background Animation */
    @keyframes backgroundFlow {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }
  </style>
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
