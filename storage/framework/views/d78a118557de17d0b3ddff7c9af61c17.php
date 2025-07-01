<?php $__env->startSection('content'); ?>
    <h2 class="text-2xl font-bold mb-4">Kelola Pengiriman</h2>

    <div class="overflow-x-auto bg-white rounded-lg shadow p-4">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">Order ID</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Tanggal</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border-b">
                        <td class="px-4 py-2"><?php echo e($tx->order_id); ?></td>
                        <td class="px-4 py-2"><?php echo e($tx->user->name ?? '-'); ?></td>
                        <td class="px-4 py-2 capitalize"><?php echo e($tx->status); ?></td>
                        <td class="px-4 py-2"><?php echo e($tx->created_at->format('d M Y')); ?></td>
                        <td class="px-4 py-2">
                            <!-- Button untuk menuju detail transaksi -->
                            <a href="<?php echo e(route('admin.transactions.showDetails', $tx->id)); ?>" class="btn btn-info">Detail
                                Pesanan</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Eccommerce\Trenz\resources\views/admin/shipments/index.blade.php ENDPATH**/ ?>