

<?php $__env->startSection('content'); ?>
<main class="p-6 bg-gray-50 min-h-screen">
    

    <!-- Notifikasi -->
    <?php if(session('success')): ?>
    <div class="mb-4 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded">
        <i class="fas fa-check-circle mr-2"></i> <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>

    <!-- Tabel User -->
    <div class="bg-white shadow rounded-xl overflow-x-auto">
        <table class="min-w-full table-auto text-sm text-left">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Nama</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Role</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="border-b">
                    <td class="px-6 py-4"><?php echo e($index + 1); ?></td>
                    <td class="px-6 py-4"><?php echo e($user->name); ?></td>
                    <td class="px-6 py-4"><?php echo e($user->email); ?></td>
                    <td class="px-6 py-4 capitalize"><?php echo e($user->role); ?></td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold 
                            <?php echo e($user->status === 'active' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700'); ?>">
                            <?php echo e(ucfirst($user->status)); ?>

                        </span>
                    </td>
                    <td class="px-6 py-4 text-center space-x-2">
                        <!-- Edit -->
                        <a href="<?php echo e(route('user.edit',$user->id)); ?>"
                           class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md text-xs">
                           <i class="fas fa-edit"></i> Edit
                        </a>

                        <!-- Hapus -->
                        <form action="<?php echo e(route('user.delete',$user->id)); ?>" method="POST" class="inline-block"
                              onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-xs">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </button>
                        </form>

                        <!-- Aktifkan / Nonaktifkan -->
                        <?php if($user->status !== 'active'): ?>
                        <form action="<?php echo e(route('user.activate',$user->id)); ?>" method="POST" class="inline-block">
                            <?php echo csrf_field(); ?>
                            <button type="submit"
                                    class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-md text-xs">
                                <i class="fas fa-check-circle"></i> Aktifkan
                            </button>
                        </form>
                        <?php else: ?>
                        <form action="<?php echo e(route('user.deactivate',$user->id)); ?>" method="POST" class="inline-block">
                            <?php echo csrf_field(); ?>
                            <button type="submit"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md text-xs">
                                <i class="fas fa-ban"></i> Nonaktifkan
                            </button>
                        </form>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">Tidak ada user ditemukan.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\reservasi\resources\views/admin/user/index.blade.php ENDPATH**/ ?>