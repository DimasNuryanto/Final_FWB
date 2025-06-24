<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | SwimZone</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body class="bg-blue-50 min-h-screen flex items-center justify-center px-4 py-8">

  <div class="w-full max-w-4xl bg-white shadow-2xl rounded-3xl overflow-hidden flex flex-col lg:flex-row">
    
    <!-- Sidebar Logo -->
    <div class="lg:w-1/3 w-full bg-cyan-100 flex flex-col justify-center items-center p-8 space-y-4">
      <div class="text-blue-600 text-7xl">
        <img src="<?php echo e(asset('logo/logo.png')); ?>" alt="Logo SwimZone" class="w-32 h-32 object-contain" />
      </div>
      
    </div>

    <!-- Form Login -->
    <div class="lg:w-2/3 w-full p-10 flex flex-col justify-center">
      <h3 class="text-2xl font-bold text-blue-800 mb-6 text-center lg:text-left">Masuk ke Akun Anda</h3>

      <?php if(session('success')): ?>
        <div class="mb-4 bg-green-100 border border-green-300 text-green-800 text-sm rounded-xl px-4 py-3">
          <i class="fas fa-check-circle mr-2"></i>
          <?php echo e(session('success')); ?>

        </div>
      <?php endif; ?>

      <?php if($errors->any()): ?>
        <div class="mb-4 bg-red-100 border border-red-300 text-red-800 text-sm rounded-xl px-4 py-3">
          <ul class="list-disc pl-5">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div>
      <?php endif; ?>

      <form action="<?php echo e(route('login.post')); ?>" method="POST" class="space-y-5">
        <?php echo csrf_field(); ?>

        <!-- Email -->
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
          <div class="flex items-center border rounded-xl px-4 py-2 bg-white focus-within:ring-2 focus-within:ring-cyan-400">
            <i class="fas fa-envelope text-gray-400 mr-3"></i>
            <input type="email" id="email" name="email" placeholder="email@example.com"
                   class="w-full bg-transparent focus:outline-none text-sm" required />
          </div>
        </div>

        <!-- Password -->
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
          <div class="flex items-center border rounded-xl px-4 py-2 bg-white focus-within:ring-2 focus-within:ring-cyan-400">
            <i class="fas fa-lock text-gray-400 mr-3"></i>
            <input type="password" id="password" name="password" placeholder="••••••••"
                   class="w-full bg-transparent focus:outline-none text-sm" required />
          </div>
        </div>

        <!-- Tombol Login -->
        <div>
          <button type="submit"
                  class="w-full py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition shadow-md">
            <i class="fas fa-sign-in-alt mr-2"></i> Masuk
          </button>
        </div>
      </form>

      <!-- Link Registrasi -->
      <div class="text-center mt-6">
        <p class="text-sm text-gray-600 mb-2">Belum punya akun?</p>
        <a href="<?php echo e(route('register')); ?>"
           class="inline-block px-6 py-2 bg-cyan-500 hover:bg-cyan-600 text-white font-semibold rounded-xl shadow-md transition">
          <i class="fas fa-user-plus mr-2"></i> Daftar Sekarang
        </a>
      </div>

      <p class="text-xs text-gray-400 text-center mt-6">
        &copy; 2025 SwimZone • Sistem Informasi Reservasi Kolam Renang
      </p>
    </div>
  </div>

</body>
</html>
<?php /**PATH D:\laragon\www\reservasi\resources\views/login.blade.php ENDPATH**/ ?>