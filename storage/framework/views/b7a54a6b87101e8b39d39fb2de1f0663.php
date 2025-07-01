<?php $__env->startSection('content'); ?>
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Daftar Produk</h2>

        <!-- Filter berdasarkan kategori -->
        <form action="<?php echo e(route('admin.products.index')); ?>" method="GET" class="mb-4">
            <div class="flex items-center space-x-4">
                <select name="category_id" id="category_id" class="p-2 border border-gray-300 rounded-md">
                    <option value="">-- Pilih Kategori --</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" <?php echo e(request('category_id') == $category->id ? 'selected' : ''); ?>>
                            <?php echo e($category->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                    Filter
                </button>
            </div>
        </form>

        <a href="<?php echo e(route('admin.products.create')); ?>"
            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
            Tambah Produk
        </a>

        <!-- Produk Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300">
                    <div class="h-48 overflow-hidden rounded-t-lg">
                        <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-gray-800"><?php echo e($product->name); ?></h2>
                        <p class="text-sm text-gray-600 mb-1">Kategori: <?php echo e($product->category->name); ?></p>
                        <p class="text-sm text-gray-600 mb-1">Stok: <?php echo e($product->stock); ?></p>
                        <p class="text-blue-500 font-semibold mb-3">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?>

                        </p>

                        <div class="flex justify-between">
                            <a href="<?php echo e(route('admin.products.edit', $product->id)); ?>"
                                class="text-sm text-blue-600 hover:underline">
                                <i class="fas fa-edit mr-1"></i>Edit
                            </a>

                            <form action="<?php echo e(route('admin.products.destroy', $product->id)); ?>" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-sm text-red-600 hover:underline">
                                    <i class="fas fa-trash mr-1"></i>Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Eccommerce\Trenz\resources\views/admin/products/index.blade.php ENDPATH**/ ?>