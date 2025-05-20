<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login </title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>"> 
</head>
<body>
    <div class="container">
        <h2>Login </h2>

        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('authenticate')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div>
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo e(old('email')); ?>" required>
            </div>
            <div>
                <label>Password:</label>
                <input type="password" name="password" required>
            </div>
            <div>
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php /**PATH C:\laragon\www\epoinA-with-figma-version\resources\views/auth/login.blade.php ENDPATH**/ ?>