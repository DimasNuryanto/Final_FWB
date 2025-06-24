

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<h2 class="text-3xl font-bold text-blue-700 mb-6">Kolam Tersedia</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    <?php $__empty_1 = true; $__currentLoopData = $pools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pool): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <a href="<?php echo e(route('user.menu.detail', $pool->id)); ?>" class="block group">
            <div class="bg-white rounded-2xl shadow-md overflow-hidden transition transform duration-200 group-hover:scale-105 group-hover:shadow-xl">
                <?php if($pool->image): ?>
                    <img src="<?php echo e($pool->image); ?>" alt="<?php echo e($pool->name); ?>" class="h-40 w-full object-cover">
                <?php else: ?>
                    <div class="h-40 bg-gray-100 flex items-center justify-center text-gray-400">Tidak Ada Gambar</div>
                <?php endif; ?>

                <div class="p-4 space-y-1">
                    <h3 class="text-lg font-semibold text-gray-800 truncate"><?php echo e($pool->name); ?></h3>
                    <p class="text-sm text-gray-600 line-clamp-2">
                        <?php echo e(\Illuminate\Support\Str::limit($pool->description ?? 'Tidak ada deskripsi.', 70)); ?>

                    </p>

                    <div class="flex justify-between items-center mt-2">
                        <span class="text-blue-600 font-bold">Rp<?php echo e(number_format($pool->price, 0, ',', '.')); ?></span>
                        <span class="text-xs px-2 py-1 bg-blue-50 text-blue-600 rounded-md">
                            <?php echo e(ucfirst($pool->category->name ?? '-')); ?>

                        </span>
                    </div>
                </div>
            </div>
        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="col-span-full text-center text-gray-500">Belum ada kolam tersedia.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\reservasi\resources\views/user/dashboard.blade.php ENDPATH**/ ?>