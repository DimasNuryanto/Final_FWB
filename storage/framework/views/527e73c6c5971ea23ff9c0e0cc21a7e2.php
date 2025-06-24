<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SwimZone | <?php echo $__env->yieldContent('title'); ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body class="bg-blue-50 min-h-screen text-gray-800">

  <!-- Navbar -->
  <nav class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
    <div class="flex items-center space-x-2">
      <i class="fas fa-water text-blue-600 text-2xl"></i>
      <h1 class="text-xl font-bold text-blue-600">SwimZone</h1>
    </div>
    <ul class="flex space-x-6 text-sm font-semibold">
      <li>
        <a href="/userDashboard" class="hover:text-blue-600">
          <i class="fas fa-home mr-1"></i> Dashboard
        </a>
      </li>
      <li>
        <a href="<?php echo e(route('user.riwayat')); ?>" class="hover:text-blue-600">
          <i class="fas fa-clock-rotate-left mr-1"></i> Riwayat
        </a>
      </li>
      <li>
        <a href="<?php echo e(route('user.profil.edit')); ?>" class="hover:text-blue-600">
          <i class="fas fa-user-edit mr-1"></i> Profil
        </a>
      </li>
      <li>
        <a href="/logout" class="text-red-500 hover:text-red-700">
          <i class="fas fa-sign-out-alt mr-1"></i> Logout
        </a>
      </li>
    </ul>
  </nav>

  <!-- Konten -->
  <main class="p-6">
    <?php echo $__env->yieldContent('content'); ?>
  </main>

</body>
</html>
<?php /**PATH D:\laragon\www\reservasi\resources\views/user/master.blade.php ENDPATH**/ ?>