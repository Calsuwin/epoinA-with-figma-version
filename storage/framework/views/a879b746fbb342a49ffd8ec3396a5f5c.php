<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
    <style>
        /* Reset styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body and Background */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #4e54c8, #8f94fb, #6dd5ed);
            background-size: 400% 400%;
            color: #fff;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: backgroundFlow 10s ease infinite;
        }

        /* Container for main content */
        .container {
            width: 90%;
            max-width: 1200px;
            background-color: rgba(255, 255, 255, 0.15);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .search-container, .nav-links {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            align-items: center;
        }

        .search-container input[type="text"] {
            width: 70%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            font-size: 1rem;
            color: #333;
        }

        .search-container input[type="submit"] {
            padding: 10px 20px;
            background-color: #4e54c8;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-container input[type="submit"]:hover {
            background-color: #8f94fb;
        }

        .nav-links a {
            padding: 10px 15px;
            background-color: #4e54c8;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .nav-links a:hover {
            background-color: #8f94fb;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            text-align: center;
        }

        th, td {
            padding: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        th {
            background-color: rgba(255, 255, 255, 0.3);
            font-weight: bold;
            text-transform: uppercase;
        }

        .btn {
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #4e54c8;
        }

        .btn-danger {
            background-color: #ff5252;
        }

        .btn:hover {
            opacity: 0.8;
        }

        @keyframes backgroundFlow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
    </style>
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
<?php /**PATH C:\laragon\www\epoinA\resources\views/admin/akun/index.blade.php ENDPATH**/ ?>