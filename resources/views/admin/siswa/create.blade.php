<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Siswa</title>
  <style>
    /* Reset styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* Background and Body */
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #4e54c8, #8f94fb, #6dd5ed);
      background-size: 400% 400%;
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      animation: backgroundFlow 10s ease infinite;
    }

    /* Form container */
    .form-container {
      width: 90%;
      max-width: 600px;
      background-color: rgba(255, 255, 255, 0.1);
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
      overflow: hidden;
    }

    h1, h2 {
      color: #fff;
      text-align: center;
      margin-bottom: 20px;
    }

    h2 {
      margin-top: 30px;
      font-size: 1.5rem;
    }

    /* Labels and Inputs */
    label {
      display: block;
      font-size: 1rem;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="file"],
    select {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: none;
      border-radius: 5px;
      font-size: 1rem;
      color: #333;
    }

    input[type="file"] {
      padding: 3px;
    }

    /* Buttons */
    .btn-container {
      display: flex;
      justify-content: space-between;
      gap: 10px;
      margin-top: 20px;
    }

    button[type="submit"],
    button[type="reset"],
    .back-button {
      padding: 10px;
      border: none;
      border-radius: 5px;
      font-size: 1rem;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button[type="submit"] {
      background-color: #4caf50;
      color: #fff;
    }

    button[type="reset"] {
      background-color: #ff5252;
      color: #fff;
    }

    .back-button {
      background-color: #4e54c8;
      color: #fff;
      text-decoration: none;
      display: inline-block;
      margin-bottom: 15px;
    }

    button[type="submit"]:hover {
      background-color: #45a049;
    }

    button[type="reset"]:hover {
      background-color: #ff2e2e;
    }

    .back-button:hover {
      background-color: #8f94fb;
    }

    /* Alert */
    .alert {
      background-color: #ff6b6b;
      color: #fff;
      padding: 10px;
      border-radius: 5px;
      margin-bottom: 20px;
      text-align: left;
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
  <div class="form-container">
    <h1>Tambah Siswa</h1>
    <a href="{{ route('siswa.index') }}" class="back-button">Kembali</a>

    <!-- Error Alert -->
    @if ($errors->any())
    <div class="alert">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <!-- Form Tambah Siswa -->
    <form action="{{ route('siswa.store')}}" method="POST" enctype="multipart/form-data">
      @csrf

      <h2>Akun Siswa</h2>
      <label>Nama Lengkap</label>
      <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap">

      <label>Email Address</label>
      <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email">

      <label>Password</label>
      <input type="password" id="password" name="password" placeholder="Masukkan password">

      <label>Confirm Password</label>
      <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi password">

      <h2>Data Siswa</h2>
      <label>Foto Siswa</label>
      <input type="file" name="image" accept="image/*" required>

      <label>NIS Siswa</label>
      <input type="text" name="nis" value="{{ old('nis') }}" placeholder="Masukkan NIS" required>

      <label>Tingkatan</label>
      <select name="tingkatan" required>
        <option value="">Pilih Tingkatan</option>
        <option value="X">X</option>
        <option value="XI">XI</option>
        <option value="XII">XII</option>
      </select>

      <label>Jurusan</label>
      <select name="jurusan" required>
        <option value="">Pilih Jurusan</option>
        <option value="TBSM">TBSM</option>
        <option value="TJKT">TJKT</option>
        <option value="PPLG">PPLG</option>
        <option value="DKV">DKV</option>
        <option value="TOI">TOI</option>
      </select>

      <label>Kelas</label>
      <select name="kelas" required>
        <option value="">Pilih Kelas</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>

      <label>No Hp</label>
      <input type="text" name="hp" value="{{ old('hp') }}" placeholder="Masukkan nomor HP" required>

      <!-- Button Container -->
      <div class="btn-container">
        <button type="submit">SIMPAN DATA</button>
        <button type="reset">RESET FORM</button>
      </div>
    </form>
  </div>
</body>
</html>
