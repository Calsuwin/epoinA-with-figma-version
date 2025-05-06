<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Siswa</title>
  {{-- <link href="{{ asset('css/edit.css') }}" rel="stylesheet"> --}}
  
</head>
<body>
  <div class="container">
    <h1>Edit Siswa</h1>
    <a href="{{ route('siswa.index') }}" class="back-link">Kembali</a>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="details-section">
        <div class="half-section">
          <label>Foto Siswa</label><br>
          <img 
  src="{{ asset('storage/siswas/' . $siswa->image) }}" 
  style="height:150px; object-fit:cover; border-radius:35%; border:3px solid #ccc;"
  alt="Foto {{ $siswa->name }}">

          <br>
          <input type="file" name="image" accept="image/*">
        </div>
        <!-- ... bagian form lain ... -->
      </div>
      

        <div class="half-section">
          <label>NIS Siswa</label><br>
          <input type="text" name="nis" value="{{ old('nis', $siswa->nis) }}" required><br><br>

          <label>Nama Lengkap</label><br>
          <input type="text" name="name" value="{{ old('name', $siswa->name) }}" required><br><br>

          <label>Tingkatan</label><br>
          <select name="tingkatan" required>
            <option {{ 'X' == $siswa->tingkatan ? 'selected' : '' }} value="X">X</option>
            <option {{ 'XI' == $siswa->tingkatan ? 'selected' : '' }} value="XI">XI</option>
            <option {{ 'XII' == $siswa->tingkatan ? 'selected' : '' }} value="XII">XII</option>
          </select><br><br>

          <label>Jurusan</label><br>
          <select name="jurusan" required>
            <option {{ 'TBSM' == $siswa->jurusan ? 'selected' : '' }} value="TBSM">TBSM</option>
            <option {{ 'TJKT' == $siswa->jurusan ? 'selected' : '' }} value="TJKT">TJKT</option>
            <option {{ 'PPLG' == $siswa->jurusan ? 'selected' : '' }} value="PPLG">PPLG</option>
            <option {{ 'DKV' == $siswa->jurusan ? 'selected' : '' }} value="DKV">DKV</option>
            <option {{ 'TOI' == $siswa->jurusan ? 'selected' : '' }} value="TOI">TOI</option>
          </select><br><br>

          <label>Kelas</label><br>
          <select name="kelas" required>
            <option {{ '1' == $siswa->kelas ? 'selected' : '' }} value="1">1</option>
            <option {{ '2' == $siswa->kelas ? 'selected' : '' }} value="2">2</option>
            <option {{ '3' == $siswa->kelas ? 'selected' : '' }} value="3">3</option>
            <option {{ '4' == $siswa->kelas ? 'selected' : '' }} value="4">4</option>
          </select><br><br>

          <label>No Hp</label><br>
          <input type="text" name="hp" value="{{ old('hp', $siswa->hp) }}" required><br><br>

          <label>Status</label><br>
          <select name="status" required>
            <option {{ '1' == $siswa->status ? 'selected' : '' }} value="1">Aktif</option>
            <option {{ '0' == $siswa->status ? 'selected' : '' }} value="0">Tidak Aktif</option>
          </select><br><br>
        </div>
      </div>

      <button type="submit">SIMPAN DATA</button>
      <button type="reset">RESET FORM</button>
    </form>
  </div>
</body>
</html>
