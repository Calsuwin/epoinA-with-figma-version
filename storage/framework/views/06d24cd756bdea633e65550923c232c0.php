

<?php $__env->startSection('content'); ?>

<h1>Login</h1>
<a href="<?php echo e(route('register')); ?>">Daftar</a>
<br><br>
<form action="<?php echo e(route('authenticate')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <label>Email Adress</label><br>
    <input type="email" id="email" name="password"><br><br>
    <input type="submit" value="Login">
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\calsuwin\epoinA\resources\views/auth/login.blade.php ENDPATH**/ ?>