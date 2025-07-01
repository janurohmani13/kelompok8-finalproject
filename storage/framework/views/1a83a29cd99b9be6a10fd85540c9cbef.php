<?php $__env->startSection('content'); ?>
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Tambah Produk</h2>

        <!-- Pass variables to the form -->
        <?php echo $__env->make('admin.products.form', [
            'action' => route('admin.products.store'), // Action set to store
            'product' => null, // No product data for creating
            'categories' => $categories, // Categories for selection
            'isEdit' => false, // Not editing, so false
        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Eccommerce\Trenz\resources\views/admin/products/create.blade.php ENDPATH**/ ?>