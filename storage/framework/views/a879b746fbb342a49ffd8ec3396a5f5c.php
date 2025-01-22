<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
</head>
<body>
    <h1>Data User</h1>
    <a href="<?php echo e(route('admin/dashboard')); ?>">Menu Utama</a>
    <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
        <?php echo csrf_field(); ?>
    </form>
    
    <br><br>
    
    <form action="" method="get">
        <label for="cari">Cari:</label>
        <input type="text" name="cari" id="cari">
        <input type="submit" value="Cari">
    </form>
    
    <br><br>
    
    <a href="<?php echo e(route('akun.create')); ?>">Tambah User</a>

    <?php if(Session::has('success')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo e(Session::get('success')); ?>

        </div>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($user->name); ?></td>
                <td><?php echo e($user->email); ?></td>
                <td><?php echo e($user->usertype); ?></td>
                <td>
                    <a href="<?php echo e(route('akun.edit' , $user->id)); ?>" class="btn btn-sm btn-primary">EDIT</a>
                    
                    <?php if($user->usertype == 'siswa'): ?>
                    <form onsubmit="return confirm('Jika Akun Siswa Dihapus Maka Data Siswa Akan Ikut Terhapus, Apakah Anda Yakin?');" action="<?php echo e(route('akun.destroy',$user->id)); ?>" method="POST" style="display:inline;">
                    <?php else: ?> 
                    <form onsubmit="return confirm('Apakah Anda Yakin?');" action="<?php echo e(route('akun.destroy',$user->id)); ?>" method="POST" style="display:inline;">
                    <?php endif; ?> 
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit">HAPUS</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="4">
                    <p>Data tidak ditemukan</p>
                </td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php echo e($users->links()); ?>

</body>
</html><?php /**PATH C:\laragon\www\epoinA\resources\views/admin/akun/index.blade.php ENDPATH**/ ?>