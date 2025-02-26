<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Siswa</title>
  <link href="<?php echo e(asset('css/show.css')); ?>" rel="stylesheet">
</head>
<body>
  <div class="container">
    <h1>Detail Siswa</h1>
    <a href="<?php echo e(route('siswa.index')); ?>" class="back-link">Kembali</a>

    <div>
      <img src="<?php echo e(asset('storage/siswas/'.$siswa->image)); ?>" alt="Profile Picture" class="profile-img">


    </div>

    <table>
      <tr>
        <th colspan="2">Akun Siswa</th>
        <th colspan="2">Data Siswa</th>
      </tr>
      <tr>
        <th>Nama</th>
        <td><?php echo e($siswa->name); ?></td>
        <th>NIS</th>
        <td><?php echo e($siswa->nis); ?></td>
      </tr>
      <tr>
        <th>Email</th>
        <td><?php echo e($siswa->email); ?></td>
        <th>Kelas</th>
        <td><?php echo e($siswa->tingkatan); ?> <?php echo e($siswa->jurusan); ?> <?php echo e($siswa->kelas); ?></td>
      </tr>
      <tr>
        <th>Status</th>
        <td colspan="3"><?php echo e($siswa->status == 1 ? 'Aktif' : 'Tidak Aktif'); ?></td>
      </tr>
    </table>
  </div>
</body>
</html>
<?php /**PATH C:\laragon\www\epoinA\resources\views/admin/siswa/show.blade.php ENDPATH**/ ?>