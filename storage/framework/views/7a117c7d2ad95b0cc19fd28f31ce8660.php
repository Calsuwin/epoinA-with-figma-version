<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
    
</head>
<body>
    <div class="container">
        <h1>Data User</h1>
        <div class="nav-links">
            <a href="<?php echo e(route('admin/dashboard')); ?>">Menu Utama</a>
            <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        </div>

        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
            <?php echo csrf_field(); ?>
        </form>

        <form class="search-container" action="" method="get">
            <input type="text" name="cari" id="cari" placeholder="Cari user">
            <input type="submit" value="Cari">
        </form>

        <a href="<?php echo e(route('akun.create')); ?>" class="btn btn-primary">Tambah User</a>

        <?php if(Session::has('success')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(Session::get('success')); ?>

            </div>
        <?php endif; ?>

        <table>
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
                        <a href="<?php echo e(route('akun.edit', $user->id)); ?>" class="btn btn-primary">EDIT</a>
                        <form onsubmit="return confirm('Apakah Anda Yakin?');" action="<?php echo e(route('akun.destroy', $user->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">HAPUS</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="4">Data tidak ditemukan</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <?php echo e($users->links()); ?>

    </div>
</body>
</html>
<?php /**PATH C:\laragon\www\epoinA-with-figma-version\resources\views/admin/akun/index.blade.php ENDPATH**/ ?>