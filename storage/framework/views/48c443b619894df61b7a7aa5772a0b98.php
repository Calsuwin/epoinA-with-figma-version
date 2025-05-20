<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    
    <style>
        table img {
            width: 150px;
            height: auto;
            object-fit: cover;
            border-radius: 7px;
        }
        .pagination {
            font-size: 0.75rem;
            margin-top: 1rem;
        }
        table {
  width: 80%;
  border-collapse: collapse;
}
th, td {
  border: 1px solid #ccc;
  padding: 0.5rem;
  text-align: center;
}
thead th {
  background-color: #f5f5f5;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Data Siswa</h1>

        <div class="nav-links">
            <a href="<?php echo e(route('admin/dashboard')); ?>">Menu Utama</a>
            
            <a href="<?php echo e(route('logout')); ?>"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               Logout
            </a>
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
            <form action="<?php echo e(route('siswa.index')); ?>" method="get">
                <label for="search">Cari :</label>
                <input type="text" name="cari" placeholder="Cari data siswa..." id="search" value="<?php echo e(request('cari')); ?>">
                <button type="submit">Cari</button>
            </form>
        </div>
<div> <a href="<?php echo e(route('siswa.create')); ?>">Tambah Siswa</a></div>
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
                        <?php if($siswa->image): ?>
                            <img 
                              src="<?php echo e(asset('storage/siswas/' . $siswa->image)); ?>" 
                              alt="Foto <?php echo e($siswa->name); ?>">
                        <?php else: ?>
                            <span>No Image</span>
                        <?php endif; ?>
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
                        <form onsubmit="return confirm('Apakah Anda Yakin?');" 
                              action="<?php echo e(route('siswa.destroy', $siswa->id)); ?>" 
                              method="POST" style="display: inline;">
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
            <?php echo $siswas->links(); ?>

        </div>
    </div>
</body>
</html>
<?php /**PATH C:\laragon\www\epoinA-with-figma-version\resources\views/admin/siswa/index.blade.php ENDPATH**/ ?>