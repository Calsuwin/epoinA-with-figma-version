<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Pelanggaran</title>
  <style type="text/css">
    table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0px;
    }
    table, th, td {
      border: 1px solid;
    }
  </style>
</head>
<body>
  <h1>Edit Pelanggaran</h1>
  <a href="<?php echo e(route('pelanggaran.index')); ?>">Kembali</a><br><br>

  <?php if($errors->any()): ?>
    <div class="alert alert-danger">
      <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
  <?php endif; ?>

  <?php if(Session::has('success')): ?>
  <div class="alert alert-success"role="alert">
    <?php echo e(Session::get('success')); ?>

  </div>
  <?php endif; ?>

  <form action="<?php echo e(route('pelanggaran.update', $pelanggaran->id)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <h2>Data pelanggaran</h2>

    <label>Jenis Kelamin</label><br>
    <textarea id="jenis" name="jenis" rows="7" cols="50" value="<?php echo e(old('jenis')); ?>"><?php echo e($pelanggaran->jenis); ?></textarea>
    <br><br>

    <label>Konsekuensi</label><br>
    <textarea id="konsekuensi" name="konsekuensi" rows="7" cols="50" value="<?php echo e(old('konsekuensi')); ?>"><?php echo e($pelanggaran->jenis); ?></textarea>
    <br><br>

    <label>poin</label><br>
    <input type="text" name="poin" id="poin" value="<?php echo e($pelanggaran->poin); ?>"><br>
    <br><br>

    <button type="submit">SIMPAN DATA</button>
    <br><br>
  </form>
</body>
</html><?php /**PATH C:\laragon\www\epoinA-with-figma-version\resources\views/admin/pelanggaran/edit.blade.php ENDPATH**/ ?>