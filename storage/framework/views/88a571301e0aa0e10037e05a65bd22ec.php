<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link href="<?php echo e(asset('css/index.css')); ?>" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Data Siswa</h1>

        <div class="nav-links">
            <a href="<?php echo e(route('admin/dashboard')); ?>">Menu Utama</a>
            <a href="<?php echo e(route('siswa.create')); ?>">Tambah Siswa</a>
            <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        </div>

        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
            <?php echo csrf_field(); ?>
        </form>

        <!-- Success Message -->
        <?php if(Session::has('success')): ?>
        <div class="alert-success">
            <?php echo e(Session::get('success')); ?>

        </div>
        <?php endif; ?>

        <!-- Search Form -->
        <div class="search-container">
            <form action="" method="get">
                <label for="search">Cari :</label>
                <input type="text" name="cari" placeholder="Cari data siswa..." id="search">
                <input type="submit" value="Cari">
            </form>
        </div>

        <!-- Table Data Siswa -->
        <table>
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Kelas</th>
                    <th>No HP</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $siswas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td>
                        <img src="<?php echo e(asset('storage/siswas/'.$siswa->image)); ?>" alt="Foto Siswa">
                    </td>
                    <td><?php echo e($siswa->nis); ?></td>
                    <td><strong><?php echo e($siswa->name); ?></strong></td>
                    <td><?php echo e($siswa->email); ?></td>
                    <td><?php echo e($siswa->tingkatan); ?> <?php echo e($siswa->jurusan); ?> <?php echo e($siswa->kelas); ?></td>
                    <td><?php echo e($siswa->hp); ?></td>
                    <td><?php echo e($siswa->status == 1 ? 'Aktif' : 'Tidak Aktif'); ?></td>
                    <td>
                        <a href="<?php echo e(route('siswa.show', $siswa->id)); ?>" class="btn btn-dark">SHOW</a>
                        <a href="<?php echo e(route('siswa.edit', $siswa->id)); ?>" class="btn btn-primary">EDIT</a>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="<?php echo e(route('siswa.destroy', $siswa->id)); ?>" method="POST" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">HAPUS</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="8">Data tidak ditemukan</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="pagination">
            <?php echo e($siswas->links()); ?>

        </div>
    </div>
</body>
</html>
<?php /**PATH C:\laragon\www\epoinA\resources\views/admin/siswa/index.blade.php ENDPATH**/ ?>