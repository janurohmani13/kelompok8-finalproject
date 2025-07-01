<?php $__env->startSection('content'); ?>
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4 text-[#5979f5]">Daftar Transaksi</h2>

        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="table-auto w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border text-left">Order ID</th>
                        <th class="px-4 py-2 border text-left">User</th>
                        <th class="px-4 py-2 border text-left">Status</th>
                        <th class="px-4 py-2 border text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b">
                            <td class="px-4 py-2 border"><?php echo e($transaction->order_id); ?></td>
                            <td class="px-4 py-2 border"><?php echo e($transaction->user->name ?? '-'); ?></td>
                            <td class="px-4 py-2 border capitalize">
                                <?php echo e($transaction->payment->status ?? 'Belum Dibayar'); ?>  <!-- Menampilkan status pembayaran -->
                            </td>
                            <td class="px-4 py-2 border">
                                <a href="<?php echo e(route('admin.transactions.show', $transaction->id)); ?>"
                                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                    Lihat Detail Pesanan
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Eccommerce\Trenz\resources\views/admin/transactions/index.blade.php ENDPATH**/ ?>