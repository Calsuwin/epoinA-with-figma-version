<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Pelanggaran</title>
</head>

<body>
   <h1>Tambah Pelanggaran</h1>
   <br><br>
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

   <form action="<?php echo e(route('pelanggaran.store')); ?>" method="POST" >
    <?php echo csrf_field(); ?> 
    <label>Jenis pelangran</label><br>
    <textarea id="jenis" name="jenis" rows="7" cols="50" value="<?php echo e(old('jenis')); ?>"></textarea>
    <br><br>

    <label>Konsekuensi</label><br>
    <textarea id="konsekuensi" name="konsekuensi" rows="7" cols="50" value="<?php echo e(old('konsekuensi')); ?>"></textarea>
    <br><br>

    <label>poin</label><br>
    <input type="text" name="poin" id="poin" value="<?php echo e(old('poin')); ?>"><br>
    <br><br>

     <input type="submit" value="Register">
   </form>
</body>
</html><?php /**PATH C:\laragon\www\epoinA\resources\views/admin/pelanggaran/create.blade.php ENDPATH**/ ?>