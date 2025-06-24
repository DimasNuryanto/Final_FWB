

<?php $__env->startSection('title', 'Dashboard Admin'); ?>
<?php $__env->startSection('page_title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

  
  <div class="bg-gradient-to-tr from-blue-100 to-white p-5 rounded-2xl shadow-md border border-blue-200 flex items-center gap-4">
    <div class="bg-blue-200 text-blue-700 rounded-full p-3">
      <i class="fas fa-users text-2xl"></i>
    </div>
    <div>
      <p class="text-sm text-gray-600">Total Pengguna</p>
      <h3 class="text-2xl font-bold text-blue-800"><?php echo e($users); ?></h3>
    </div>
  </div>

  
  <div class="bg-gradient-to-tr from-blue-100 to-white p-5 rounded-2xl shadow-md border border-blue-200 flex items-center gap-4">
    <div class="bg-blue-200 text-blue-700 rounded-full p-3">
      <i class="fas fa-water-ladder text-2xl"></i>
    </div>
    <div>
      <p class="text-sm text-gray-600">Kolam Aktif</p>
      <h3 class="text-2xl font-bold text-blue-800"><?php echo e($pools); ?></h3>
    </div>
  </div>

  
  <div class="bg-gradient-to-tr from-blue-100 to-white p-5 rounded-2xl shadow-md border border-blue-200 flex items-center gap-4">
    <div class="bg-blue-200 text-blue-700 rounded-full p-3">
      <i class="fas fa-calendar-check text-2xl"></i>
    </div>
    <div>
      <p class="text-sm text-gray-600">Pesanan Hari Ini</p>
      <h3 class="text-2xl font-bold text-blue-800"><?php echo e($bookings); ?></h3>
    </div>
  </div>

  
  

</div>


<div class="mt-10 bg-gradient-to-br from-blue-50 via-white to-blue-100 p-6 rounded-2xl shadow-md border border-blue-200">
  <h2 class="text-lg font-semibold text-blue-700 mb-4 flex items-center gap-2">
    <i class="fas fa-chart-line text-blue-600"></i> Ringkasan Aktivitas
  </h2>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
      <p class="text-sm text-gray-600 mb-2">Status Pesanan</p>
      <ul class="space-y-2 text-sm text-gray-700">
        <li><i class="fas fa-hourglass-half text-yellow-500 mr-2"></i> Pending: <span class="font-semibold"><?php echo e($pending); ?></span></li>
        <li><i class="fas fa-spinner animate-spin text-blue-500 mr-2"></i> Proses: <span class="font-semibold"><?php echo e($processing); ?></span></li>
        <li><i class="fas fa-check-circle text-green-500 mr-2"></i> Selesai: <span class="font-semibold"><?php echo e($completed); ?></span></li>
      </ul>
    </div>
    <div>
      <p class="text-sm text-gray-600 mb-2">Kategori Terlaris</p>
      <ul class="space-y-2 text-sm text-gray-700">
        <li><i class="fas fa-fire text-blue-500 mr-2"></i> Makanan Berat: <span class="font-semibold">120</span></li>
        <li><i class="fas fa-fire text-blue-500 mr-2"></i> Minuman: <span class="font-semibold">95</span></li>
        <li><i class="fas fa-fire text-blue-500 mr-2"></i> Camilan: <span class="font-semibold">72</span></li>
      </ul>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\reservasi\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>