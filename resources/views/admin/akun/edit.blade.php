<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Akun</title>
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

    /* Form Styling */
    form {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: left;
      margin-top: 20px;
    }

    label {
      font-size: 1rem;
      margin-bottom: 5px;
      color: #4e54c8;
    }

    input, select {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid rgba(78, 84, 200, 0.2);
      border-radius: 5px;
      font-size: 1rem;
    }

    button {
      background-color: #4e54c8;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      margin-top: 10px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button:hover {
      background-color: #8f94fb;
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
    <h1>Edit Akun</h1>
    <a href="{{ route('akun.index') }}">Kembali</a><br><br>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @if(Session::has('success'))
      <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
      </div>
    @endif

    <form action="{{ route('akun.update', $akun->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <label>Nama Lengkap</label>
      <input type="text" id="name" name="name" value="{{ $akun->name }}">
      
      <label>Hak Akses</label>
      <select name="usertype" required>
        <option {{ 'admin' == $akun->usertype ? 'selected' : '' }} value="admin">Admin</option>
        <option {{ 'ptk' == $akun->usertype ? 'selected' : '' }} value="ptk">PTK</option>
      </select>
      
      <button type="submit">SIMPAN DATA</button>
    </form>

    <form action="{{ route('updateEmail', $akun->id) }}" method="POST">
      @csrf
      @method('PUT')

      <label>Email Address</label>
      <input type="email" id="email" name="email" value="{{ $akun->email }}">
      
      <button type="submit">SIMPAN EMAIL</button>
    </form>

    <form action="{{ route('updatePassword', $akun->id) }}" method="POST">
      @csrf
      @method('PUT')

      <label>Password</label>
      <input type="password" id="password" name="password">
      
      <label>Confirm Password</label>
      <input type="password" id="password_confirmation" name="password_confirmation">
      
      <button type="submit">SIMPAN PASSWORD</button>
    </form>
  </div>
</body>
</html>