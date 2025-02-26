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
      
      <label>Hak Akses</label>
      <select name="usertype" required>
        <option <?php echo e('admin' == $akun->usertype ? 'selected' : ''); ?> value="admin">Admin</option>
        <option <?php echo e('ptk' == $akun->usertype ? 'selected' : ''); ?> value="ptk">PTK</option>
      </select>
      
      <button type="submit">SIMPAN DATA</button>
    </form>

    <form action="<?php echo e(route('updateEmail', $akun->id)); ?>" method="POST">
      <?php echo csrf_field(); ?>
      <?php echo method_field('PUT'); ?>

      <label>Email Address</label>
      <input type="email" id="email" name="email" value="<?php echo e($akun->email); ?>">
      
      <button type="submit">SIMPAN EMAIL</button>
    </form>

    <form action="<?php echo e(route('updatePassword', $akun->id)); ?>" method="POST">
      <?php echo csrf_field(); ?>
      <?php echo method_field('PUT'); ?>

      <label>Password</label>
      <input type="password" id="password" name="password">
      
      <label>Confirm Password</label>
      <input type="password" id="password_confirmation" name="password_confirmation">
      
      <button type="submit">SIMPAN PASSWORD</button>
    </form>
  </div>
</body>
</html><?php /**PATH C:\laragon\www\epoinA\resources\views/admin/akun/edit.blade.php ENDPATH**/ ?>