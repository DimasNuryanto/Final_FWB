

<?php $__env->startSection('content'); ?>
<main class="p-6 bg-gradient-to-tr from-orange-50 via-white to-orange-100 min-h-screen">
  <div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-lg border border-orange-200">
    <div class="flex items-center mb-6">
      <i class="fas fa-user-shield text-3xl text-orange-500 mr-3"></i>
      <h2 class="text-3xl font-extrabold text-gray-800">Edit Profil Admin</h2>
    </div>

    
    <?php if(session('success')): ?>
      <div class="mb-4 flex items-center bg-green-100 border border-green-300 text-green-800 text-sm rounded-lg px-4 py-3 shadow">
        <i class="fas fa-check-circle mr-2"></i> <?php echo e(session('success')); ?>

      </div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.profile.update')); ?>" method="POST" class="space-y-6">
      <?php echo csrf_field(); ?>

      
      <div>
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
        <div class="relative">
          <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-orange-400">
            <i class="fas fa-user"></i>
          </span>
          <input type="text" name="name" id="name" value="<?php echo e(old('name', $user->name)); ?>" required
                 class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-orange-400 focus:outline-none">
        </div>
        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <p class="text-sm text-red-600 mt-1"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>

      
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <div class="relative">
          <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-orange-400">
            <i class="fas fa-envelope"></i>
          </span>
          <input type="email" name="email" id="email" value="<?php echo e(old('email', $user->email)); ?>" required
                 class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-orange-400 focus:outline-none">
        </div>
        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <p class="text-sm text-red-600 mt-1"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>

      
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password Baru (Opsional)</label>
        <div class="relative">
          <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-orange-400">
            <i class="fas fa-lock"></i>
          </span>
          <input type="password" name="password" id="password"
                 class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-orange-400 focus:outline-none"
                 placeholder="Biarkan kosong jika tidak ingin mengubah">
        </div>
        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <p class="text-sm text-red-600 mt-1"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>

      
      <div>
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
        <div class="relative">
          <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-orange-400">
            <i class="fas fa-lock"></i>
          </span>
          <input type="password" name="password_confirmation" id="password_confirmation"
                 class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-orange-400 focus:outline-none">
        </div>
      </div>

      
      <div class="pt-4 text-right">
        <button type="submit"
                class="bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition duration-200">
          Simpan Perubahan
        </button>
      </div>
    </form>
  </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\reservasi\resources\views/admin/profile.blade.php ENDPATH**/ ?>