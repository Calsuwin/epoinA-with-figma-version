<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Akun</title>
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
  <div class="alert alert-success"role="alert">
    <?php echo e(Session::get('success')); ?>

  </div>
  <?php endif; ?>

  <form action="<?php echo e(route('akun.update', $akun->id)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <h2>Data Akun</h2>

    <label>Nama Lengkap</label><br>
    <input type="text" id="name" name="name" value="<?php echo e($akun->name); ?>">
    <br><br>

    <label>Hak Akses</label><br>
    <select name="usertype" required>
      <option <?php echo e('admin' == $akun->usertype ? 'selected' : ''); ?> value="admin">Admin</option>
      <option <?php echo e('ptk' == $akun->usertype ? 'selected' : ''); ?> value="ptk">PTK</option>
    </select>
    <br><br>

    <button type="submit">SIMPAN DATA</button>
    <br><br>
  </form>
  <form action="<?php echo e(route('updateEmail', $akun->id)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <label>Email Adress</label><br>
    <input type="email" id="email" name="email" value="<?php echo e($akun->email); ?>">
    <br><br>

    <button type="submit">SIMPAN EMAIL</button>
    <br><br>
  </form>
  <form action="<?php echo e(route('updatePassword', $akun->id)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <label>Password</label><br>
    <input type="password" id="password" name="password" >
    <br><br>

    <label for="password_confirmation" class="col-md-4 col-form-label text-md-end text-start">Confirm Password</label><br>
    <div class="col-md-6">
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" >
    </div>
    <br><br>

    <button type="submit">SIMPAN PASSWORD</button>
    <br><br>
  </form>
</body>
</html><?php /**PATH C:\laragon\www\epoinA\resources\views/admin/akun/edit.blade.php ENDPATH**/ ?>