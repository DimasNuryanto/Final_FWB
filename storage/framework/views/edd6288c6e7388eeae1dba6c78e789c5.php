

<?php $__env->startSection('content'); ?>
<div class="p-6 bg-white rounded-xl shadow-md">
    <h2 class="text-xl font-semibold mb-4">Manajemen Pesanan</h2>

    <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">User</th>
                    <th class="px-4 py-2">Metode Ambil</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Total</th>
                    <th class="px-4 py-2">Bayar</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $Bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="border-b">
                    <td class="px-4 py-2"><?php echo e($booking->id); ?></td>
                    <td class="px-4 py-2"><?php echo e($booking->user->name ?? 'Guest'); ?></td>
                    <td class="px-4 py-2 capitalize"><?php echo e($booking->pickup_method); ?></td>
                    <td class="px-4 py-2 capitalize"><?php echo e($booking->status); ?></td>
                    <td class="px-4 py-2">Rp<?php echo e(number_format($booking->total_amount, 0, ',', '.')); ?></td>
                    <td class="px-4 py-2"><?php echo e($booking->is_paid ? '✔️' : '❌'); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="7" class="px-4 py-4 text-center text-gray-500">Belum ada pesanan</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\reservasi\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>