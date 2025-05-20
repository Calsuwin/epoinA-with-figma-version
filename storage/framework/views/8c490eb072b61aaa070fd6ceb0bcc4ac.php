<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Pelanggaran</title>
  <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
  <style>
    /* pagination mungil */
    .pagination {
      font-size: 0.75rem;
      margin: 0;
    }
    .page-item .page-link {
      padding: 0.25rem 0.5rem;
      border-radius: 0.2rem;
    }
  </style>
</head>
<body>
  <h1>Data Pelanggaran</h1>
  <nav>
    <a href="<?php echo e(route('admin/dashboard')); ?>">Menu Utama</a> |
    <a href="<?php echo e(route('logout')); ?>"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
       Logout
    </a>
  </nav>
  <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display:none;">
    <?php echo csrf_field(); ?>
  </form>

  <form method="GET" action="<?php echo e(route('pelanggaran.index')); ?>">
    <label for="cari">Cari:</label>
    <input type="text" name="cari" id="cari" value="<?php echo e(request('cari')); ?>">
    <button type="submit">Cari</button>
  </form>

  <a href="<?php echo e(route('pelanggaran.create')); ?>">Tambah Pelanggaran</a>

  <?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
  <?php endif; ?>

  <table class="table">
    <thead>
      <tr>
        <th>Jenis</th>
        <th>Konsekuensi</th>
        <th>Poin</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $__empty_1 = true; $__currentLoopData = $pelanggarans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pelanggaran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
          <td><?php echo e($pelanggaran->jenis); ?></td>
          <td><?php echo e($pelanggaran->konsekuensi); ?></td>
          <td><?php echo e($pelanggaran->poin); ?></td>
          <td>
            <a href="<?php echo e(route('pelanggaran.edit', $pelanggaran->id)); ?>">Edit</a>
            <form action="<?php echo e(route('pelanggaran.destroy', $pelanggaran->id)); ?>"
                  method="POST" style="display:inline;"
                  onsubmit="return confirm('Yakin ingin menghapus?');">
              <?php echo csrf_field(); ?>
              <?php echo method_field('DELETE'); ?>
              <button type="submit">Hapus</button>
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

  <div class="mt-4">
    <?php echo $pelanggarans->links(); ?>

  </div>
</body>
</html>
<?php /**PATH C:\laragon\www\epoinA-with-figma-version\resources\views/admin/pelanggaran/index.blade.php ENDPATH**/ ?>