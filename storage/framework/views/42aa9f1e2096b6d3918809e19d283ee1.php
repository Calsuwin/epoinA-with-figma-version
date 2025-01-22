<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="<?php echo e(asset('css/register.css')); ?>" rel="stylesheet">
</head>
<body>
    <div class="register-container">
        <h1>Register</h1>
        <a href="<?php echo e(route('login')); ?>">Login</a>
        <form action="<?php echo e(route('store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <label for="name">Nama Lengkap</label>
            <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>">
            <?php if($errors->has('name')): ?>
                <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
            <?php endif; ?>

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>">
            <?php if($errors->has('email')): ?>
                <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
            <?php endif; ?>

            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            <?php if($errors->has('password')): ?>
                <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
            <?php endif; ?>

            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
            
            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\epoinA\resources\views/auth/register.blade.php ENDPATH**/ ?>