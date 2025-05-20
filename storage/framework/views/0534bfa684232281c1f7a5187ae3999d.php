<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Akun</title>
  
</head>
<body>
  <div class="container">
    <h1>Edit Akun</h1>
    <a href="<?php echo e(route('akun.index')); ?>">Kembali</a><br><br>

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
      <div class="alert alert-success" role="alert">
        <?php echo e(Session::get('success')); ?>

      </div>
    <?php endif; ?>

    <form action="<?php echo e(route('akun.update', $akun->id)); ?>" method="POST" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      <?php echo method_field('PUT'); ?>

      <label>Nama Lengkap</label>
      <input type="text" id="name" name="name" value="<?php echo e($akun->name); ?>">
      <br><br>
      <label>Hak Akses</label>
      <select name="usertype" required>
        <option <?php echo e('admin' == $akun->usertype ? 'selected' : ''); ?> value="admin">Admin</option>
        <option <?php echo e('ptk' == $akun->usertype ? 'selected' : ''); ?> value="ptk">PTK</option>
      </select>
      <br><br>
      <button type="submit">SIMPAN DATA</button>
    </form>

    <form action="<?php echo e(route('updateEmail', $akun->id)); ?>" method="POST">
      <?php echo csrf_field(); ?>
      <?php echo method_field('PUT'); ?>

      <label>Email Address</label>
      <input type="email" id="email" name="email" value="<?php echo e($akun->email); ?>">
      <br><br>
      <button type="submit">SIMPAN EMAIL</button>
    </form>
    <br><br>
    <form action="<?php echo e(route('updatePassword', $akun->id)); ?>" method="POST">
      <?php echo csrf_field(); ?>
      <?php echo method_field('PUT'); ?>

      <label>Password</label>
      <input type="password" id="password" name="password">
      <br><br>
      <label>Confirm Password</label>
      <input type="password" id="password_confirmation" name="password_confirmation">
      <br><br>
      <button type="submit">SIMPAN PASSWORD</button>
    </form>
  </div>
</body>
</html><?php /**PATH C:\laragon\www\epoinA-with-figma-version\resources\views/admin/akun/edit.blade.php ENDPATH**/ ?>