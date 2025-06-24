

<?php $__env->startSection('title', 'Kelola Pesanan'); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6 space-y-8">
    <h2 class="text-3xl font-bold text-blue-600 flex items-center gap-2">
        <i class="fas fa-clipboard-list text-blue-500"></i> Kelola Pesanan
    </h2>

    <?php $__currentLoopData = $groupedBookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status => $bookings): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="space-y-4">
            <h3 class="text-2xl font-semibold capitalize text-blue-700 border-b border-blue-200 pb-1">
                <?php echo e(ucfirst($status)); ?> (<?php echo e($bookings->count()); ?>)
            </h3>

            <div class="space-y-4">
                <?php $__empty_1 = true; $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="bg-white rounded-xl shadow-md border border-slate-200 p-5 hover:shadow-lg transition">
                        
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <p class="text-sm text-slate-500">
                                    <strong class="text-slate-700">Pesanan ID:</strong> #<?php echo e($booking->id); ?>

                                </p>
                                <p class="text-sm text-slate-500">
                                    <strong>User:</strong> <?php echo e($booking->user->name ?? '-'); ?>

                                </p>
                            </div>
                            <div class="text-right">
                                <span class="inline-block text-xs px-2 py-1 rounded-full
                                    <?php echo e($booking->is_paid ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'); ?>">
                                    <?php echo e($booking->is_paid ? '✅ Sudah Dibayar' : '❌ Belum Dibayar'); ?>

                                </span>
                            </div>
                        </div>

                        
                        <div class="text-sm text-slate-700 mb-2 space-y-1">
                            <?php $__currentLoopData = $booking->bookingItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="ml-2">🍽️ <?php echo e($item->menu->name ?? '-'); ?> <span class="text-gray-500">(x<?php echo e($item->quantity); ?>)</span></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        
                        <div class="text-sm text-slate-600 mb-4">
                            <p><strong>Total:</strong> Rp<?php echo e(number_format($booking->total_amount, 0, ',', '.')); ?></p>
                            <p><strong>Status:</strong> <?php echo e(ucfirst($booking->status)); ?></p>
                        </div>

                        
                        <form action="<?php echo e(route('staff.bookings.update', $order->id)); ?>"
                              method="POST"
                              class="grid grid-cols-1 sm:grid-cols-4 gap-3 mt-3">
                            <?php echo csrf_field(); ?>

                            <select name="status"
                                    class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
                                <?php $__currentLoopData = ['pending', 'processing', 'ready', 'completed', 'cancelled']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($opt); ?>" <?php echo e($order->status == $opt ? 'selected' : ''); ?>>
                                        <?php echo e(ucfirst($opt)); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                            <input type="number"
                                   name="total_amount"
                                   value="<?php echo e($order->total_amount); ?>"
                                   class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-400 focus:outline-none"
                                   step="0.01" min="0">

                            <select name="is_paid"
                                    class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
                                <option value="1" <?php echo e($order->is_paid ? 'selected' : ''); ?>>Sudah Dibayar</option>
                                <option value="0" <?php echo e(!$order->is_paid ? 'selected' : ''); ?>>Belum Dibayar</option>
                            </select>

                            <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-lg shadow-md transition">
                                Simpan
                            </button>
                        </form>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="bg-blue-50 border border-blue-200 text-blue-700 text-sm p-4 rounded-lg">
                        Tidak ada pesanan dalam status ini.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('staff.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\reservasi\resources\views/staff/bookings/index.blade.php ENDPATH**/ ?>