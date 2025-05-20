<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <!-- Link ke file CSS -->
    
</head>
<body>
    <!-- Header -->
    <div class="header">Halaman Admin</div>

    <!-- Welcome Message -->
    <div class="welcome-message">
        <?php if($message = Session::get('success')): ?>
            <?php echo e($message); ?>

        <?php else: ?>
            Selamat Datang di Dashboard Anda!
        <?php endif; ?>
    </div>

    <!-- Data Siswa Link -->
    <a class="nav-link" href="<?php echo e(route('siswa.index')); ?>">Data Siswa</a>
    <a class="nav-link" href="<?php echo e(route('akun.index')); ?>">Data Akun</a>
    <a class="nav-link" href="<?php echo e(route('pelanggaran.index')); ?>">Data Pelanggaran</a>
    <a class="nav-link" href="<?php echo e(route('pelanggar.index')); ?>">Data Pelanggar</a>

    <!-- Logout Button -->
    <a href="<?php echo e(route('logout')); ?>" 
       class="logout-btn"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
        
    </a>

    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
        <?php echo csrf_field(); ?>
    </form>
</body>
</html>
<?php /**PATH C:\laragon\www\epoinA-with-figma-version\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>