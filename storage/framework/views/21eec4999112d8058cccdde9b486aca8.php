<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Siswa</title>
  <link href="<?php echo e(asset('css/edit.css')); ?>" rel="stylesheet">
  
</head>
<body>
  <div class="container">
    <h1>Edit Siswa</h1>
    <a href="<?php echo e(route('siswa.index')); ?>" class="back-link">Kembali</a>

    <?php if($errors->any()): ?>
      <div class="alert alert-danger">
        <ul>
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
    <?php endif; ?>

    <form action="<?php echo e(route('siswa.update', $siswa->id)); ?>" method="POST" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      <?php echo method_field('PUT'); ?>

      <div class="details-section">
        <div class="half-section">
          <label>Foto Siswa</label><br>
          <img src="<?php echo e(asset('storage/siswas/' . $siswa->image)); ?>" class="profile-img" alt=""><br>
          <input type="file" name="image" accept="image/*">
        </div>

        <div class="half-section">
          <label>NIS Siswa</label><br>
          <input type="text" name="nis" value="<?php echo e(old('nis', $siswa->nis)); ?>" required><br><br>

          <label>Nama Lengkap</label><br>
          <input type="text" name="name" value="<?php echo e(old('name', $siswa->name)); ?>" required><br><br>

          <label>Tingkatan</label><br>
          <select name="tingkatan" required>
            <option <?php echo e('X' == $siswa->tingkatan ? 'selected' : ''); ?> value="X">X</option>
            <option <?php echo e('XI' == $siswa->tingkatan ? 'selected' : ''); ?> value="XI">XI</option>
            <option <?php echo e('XII' == $siswa->tingkatan ? 'selected' : ''); ?> value="XII">XII</option>
          </select><br><br>

          <label>Jurusan</label><br>
          <select name="jurusan" required>
            <option <?php echo e('TBSM' == $siswa->jurusan ? 'selected' : ''); ?> value="TBSM">TBSM</option>
            <option <?php echo e('TJKT' == $siswa->jurusan ? 'selected' : ''); ?> value="TJKT">TJKT</option>
            <option <?php echo e('PPLG' == $siswa->jurusan ? 'selected' : ''); ?> value="PPLG">PPLG</option>
            <option <?php echo e('DKV' == $siswa->jurusan ? 'selected' : ''); ?> value="DKV">DKV</option>
            <option <?php echo e('TOI' == $siswa->jurusan ? 'selected' : ''); ?> value="TOI">TOI</option>
          </select><br><br>

          <label>Kelas</label><br>
          <select name="kelas" required>
            <option <?php echo e('1' == $siswa->kelas ? 'selected' : ''); ?> value="1">1</option>
            <option <?php echo e('2' == $siswa->kelas ? 'selected' : ''); ?> value="2">2</option>
            <option <?php echo e('3' == $siswa->kelas ? 'selected' : ''); ?> value="3">3</option>
            <option <?php echo e('4' == $siswa->kelas ? 'selected' : ''); ?> value="4">4</option>
          </select><br><br>

          <label>No Hp</label><br>
          <input type="text" name="hp" value="<?php echo e(old('hp', $siswa->hp)); ?>" required><br><br>

          <label>Status</label><br>
          <select name="status" required>
            <option <?php echo e('1' == $siswa->status ? 'selected' : ''); ?> value="1">Aktif</option>
            <option <?php echo e('0' == $siswa->status ? 'selected' : ''); ?> value="0">Tidak Aktif</option>
          </select><br><br>
        </div>
      </div>

      <button type="submit">SIMPAN DATA</button>
      <button type="reset">RESET FORM</button>
    </form>
  </div>
</body>
</html>
<?php /**PATH C:\laragon\www\epoinA\resources\views/admin/siswa/edit.blade.php ENDPATH**/ ?>