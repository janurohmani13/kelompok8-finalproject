<?php $__env->startSection('content'); ?>
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Manajemen Pengguna</h2>

        <!-- User List -->
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
            <thead>
                <tr>
                    <th class="py-2 px-4 text-left">Nama</th>
                    <th class="py-2 px-4 text-left">Email</th>
                    <th class="py-2 px-4 text-left">Status</th>
                    <th class="py-2 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="py-2 px-4"><?php echo e($user->name); ?></td>
                        <td class="py-2 px-4"><?php echo e($user->email); ?></td>
                        <td class="py-2 px-4">
                            <span class="<?php echo e($user->is_active ? 'text-green-600' : 'text-red-600'); ?>">
                                <?php echo e($user->is_active ? 'Aktif' : 'Nonaktif'); ?>

                            </span>
                        </td>
                        <td class="py-2 px-4">
                            <a href="<?php echo e(route('admin.users.show', $user->id)); ?>" class="text-blue-500">Lihat</a>
                            <form action="<?php echo e(route('admin.users.updateStatus', $user->id)); ?>" method="POST"
                                style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('POST'); ?>
                                <button type="submit" name="status" value="<?php echo e($user->is_active ? 0 : 1); ?>"
                                    class="text-sm text-yellow-500 hover:underline">
                                    <?php echo e($user->is_active ? 'Nonaktifkan' : 'Aktifkan'); ?>

                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Eccommerce\Trenz\resources\views/admin/users/index.blade.php ENDPATH**/ ?>