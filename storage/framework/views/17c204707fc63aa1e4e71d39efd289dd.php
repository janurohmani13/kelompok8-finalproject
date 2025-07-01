<?php $__env->startSection('content'); ?>
    <h2 class="text-2xl font-bold mb-4">Detail Transaksi</h2>

    <div class="overflow-x-auto bg-white rounded-lg shadow p-4">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Transaction ID</th>
                    <th class="px-4 py-2">Product Name</th>
                    <th class="px-4 py-2">Quantity</th>
                    <th class="px-4 py-2">Price per Item</th>
                    <th class="px-4 py-2">Special Request</th>
                    <th class="px-4 py-2">Created At</th>
                    <th class="px-4 py-2">Updated At</th>
                    <th class="px-4 py-2">Total Payment</th>
                    <th class="px-4 py-2">Product Image</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $transaction->transactionDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border-b">
                        <td class="px-4 py-2"><?php echo e($detail->id); ?></td>
                        <td class="px-4 py-2"><?php echo e($transaction->order_id); ?></td>
                        <td class="px-4 py-2"><?php echo e($detail->product->name ?? 'Produk Tidak Ditemukan'); ?></td>
                        <td class="px-4 py-2"><?php echo e($detail->quantity); ?></td>
                        <td class="px-4 py-2"><?php echo e(number_format($detail->price_per_item, 2)); ?></td>
                        <td class="px-4 py-2"><?php echo e($detail->special_request ?? '-'); ?></td>
                        <td class="px-4 py-2"><?php echo e($transaction->created_at->format('d M Y')); ?></td>
                        <td class="px-4 py-2"><?php echo e($transaction->updated_at->format('d M Y')); ?></td>
                        <td class="px-4 py-2"><?php echo e(number_format($transaction->total_price, 2)); ?></td>
                        <!-- Total Price from Transaction -->
                        <td class="px-4 py-2">
                            <?php if($detail->product->image): ?>
                                <img src="<?php echo e(asset('storage/' . $detail->product->image)); ?>"
                                    alt="<?php echo e($detail->product->name); ?>" class="w-16 h-16 object-cover">
                            <?php else: ?>
                                <span>No Image</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <!-- Form to change transaction status -->
        <?php if($transaction->status == 'paid'): ?>
            <form action="<?php echo e(route('admin.transactions.updateToProcessed', $transaction->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <br><button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                    Proses Pesanan
                </button>
            </form>
        <?php elseif($transaction->status == 'processed'): ?>
            <form action="<?php echo e(route('admin.transactions.updateToShipped', $transaction->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <br><button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                    Mark as Shipped
                </button>
            </form>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Eccommerce\Trenz\resources\views/admin/transactions/show.blade.php ENDPATH**/ ?>