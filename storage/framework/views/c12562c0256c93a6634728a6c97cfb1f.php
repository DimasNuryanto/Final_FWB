

<?php $__env->startSection('title', 'Dashboard Staff'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">

    
    <div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white p-6 rounded-2xl shadow-md flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold mb-1">Halo, <?php echo e(Auth::user()->name); ?> 👋</h1>
            <p class="text-sm">Pantau & kelola semua aktivitas pemesanan dengan mudah.</p>
        </div>
        <i class="fas fa-person-booth text-6xl opacity-20"></i>
    </div>

    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php
            $cards = [
                ['label' => 'Pending', 'count' => $pending, 'icon' => 'fa-clock', 'color' => 'sky'],
                ['label' => 'Diproses', 'count' => $processing, 'icon' => 'fa-spinner animate-spin', 'color' => 'blue'],
                ['label' => 'Siap Diambil', 'count' => $ready, 'icon' => 'fa-check-circle', 'color' => 'cyan'],
                ['label' => 'Selesai', 'count' => $completed, 'icon' => 'fa-box-open', 'color' => 'indigo'],
            ];
        ?>

        <?php $__currentLoopData = $cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-<?php echo e($card['color']); ?>-50 border-l-4 border-<?php echo e($card['color']); ?>-400 p-5 rounded-xl shadow hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <h2 class="text-sm font-medium text-<?php echo e($card['color']); ?>-600"><?php echo e($card['label']); ?></h2>
                    <i class="fas <?php echo e($card['icon']); ?> text-<?php echo e($card['color']); ?>-500 text-2xl"></i>
                </div>
                <p class="text-3xl font-bold text-<?php echo e($card['color']); ?>-700 mt-2"><?php echo e($card['count']); ?></p>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    
    <div class="bg-white rounded-2xl shadow-md p-6 border border-blue-100 mt-8">
        <h3 class="text-lg font-semibold text-blue-600 mb-4 flex items-center gap-2">
            <i class="fas fa-info-circle text-blue-500"></i> Aktivitas Hari Ini
        </h3>
        <ul class="text-sm text-gray-700 space-y-2 leading-relaxed">
            <li>📦 Total pesanan aktif: <span class="font-semibold text-blue-600"><?php echo e($pending + $processing + $ready + $completed); ?></span></li>
            <li>✅ Pesanan selesai: <span class="font-semibold text-indigo-600"><?php echo e($completed); ?></span></li>
            <li>🕒 Menunggu konfirmasi: <span class="font-semibold text-sky-500"><?php echo e($pending); ?></span></li>
            <li>🔧 Sedang diproses: <span class="font-semibold text-blue-500"><?php echo e($processing); ?></span></li>
        </ul>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('staff.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\reservasi\resources\views/staff/dashboard.blade.php ENDPATH**/ ?>