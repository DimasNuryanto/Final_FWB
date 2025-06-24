

<?php $__env->startSection('title', 'Riwayat Pesanan'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-5xl mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6 text-blue-700">Riwayat Pesanan Anda</h2>

    
    <?php if(session('success')): ?>
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg shadow">
            <i class="fas fa-check-circle mr-2"></i><?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg shadow">
            <i class="fas fa-times-circle mr-2"></i><?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <?php $__empty_1 = true; $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="mb-6 bg-white shadow-md rounded-xl p-5 border border-blue-100">
            <div class="mb-2 text-sm text-gray-700 space-y-1">
                <p><strong>Tanggal Pesanan:</strong> <?php echo e($booking->created_at->format('d M Y, H:i')); ?></p>
                <p>
                    <strong>Status:</strong> 
                    <?php
                        $statusColors = [
                            'pending' => 'bg-yellow-100 text-yellow-700',
                            'processing' => 'bg-blue-100 text-blue-700',
                            'ready' => 'bg-indigo-100 text-indigo-700',
                            'completed' => 'bg-green-100 text-green-700',
                            'cancelled' => 'bg-red-100 text-red-700',
                        ];
                        $color = $statusColors[$order->status] ?? 'bg-gray-100 text-gray-700';
                    ?>
                    <span class="uppercase px-2 py-1 rounded text-xs font-semibold <?php echo e($color); ?>">
                        <?php echo e($booking->status); ?>

                    </span>
                </p>
                <p><strong>Total:</strong> Rp<?php echo e(number_format($booking->total_amount, 0, ',', '.')); ?></p>
            </div>

            <div class="mt-3">
                <p class="font-semibold mb-2 text-gray-600">Item Pesanan:</p>
                <ul class="list-disc list-inside text-sm text-gray-700 space-y-1">
                    <?php $__currentLoopData = $booking->bookingItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <?php echo e($item->pool->name ?? 'Kolam tidak ditemukan'); ?> -
                            <?php echo e($item->quantity); ?> x Rp<?php echo e(number_format($item->price, 0, ',', '.')); ?>

                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            <?php if($booking->status === 'pending'): ?>
                <form action="<?php echo e(route('user.riwayat.batal', $booking->id)); ?>" method="POST" class="mt-4">
                    <?php echo csrf_field(); ?>
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white text-sm font-semibold py-2 px-4 rounded">
                        Batalkan Pesanan
                    </button>
                </form>
            <?php endif; ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="text-gray-500 text-sm">Belum ada riwayat pesanan.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\reservasi\resources\views/user/riwayat.blade.php ENDPATH**/ ?>