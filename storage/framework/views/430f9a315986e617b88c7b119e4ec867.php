<?php $__env->startSection('content'); ?>
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Daftar Kategori</h2>

        <a href="<?php echo e(route('admin.categories.create')); ?>"
            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4">Tambah Kategori</a>

        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm">
            <thead>
                <tr>
                    <th class="p-2 text-left">Nama Kategori</th>
                    <th class="p-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="p-2"><?php echo e($category->name); ?></td>
                        <td class="p-2">
                            <a href="<?php echo e(route('admin.categories.edit', $category->id)); ?>"
                                class="text-blue-600 hover:underline">Edit</a>
                            <form action="<?php echo e(route('admin.categories.destroy', $category->id)); ?>" method="POST"
                                class="inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Eccommerce\Trenz\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>