<form action="<?php echo e($action); ?>" method="POST" enctype="multipart/form-data" class="bg-white shadow rounded p-6">
    <?php echo csrf_field(); ?>
    <?php if($isEdit): ?>
        <!-- Only  if it's editing -->
        <?php echo method_field('PUT'); ?>
    <?php endif; ?>

    <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">

    
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Nama Produk</label>
        <input type="text" name="name" id="name" value="<?php echo e(old('name', $product->name ?? '')); ?>"
            placeholder="Contoh: Kaos Polos Hitam"
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
    </div>

    
    <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
        <textarea name="description" id="description" placeholder="Contoh: Kaos berbahan katun yang nyaman dipakai"
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"><?php echo e(old('description', $product->description ?? '')); ?></textarea>
    </div>

    
    <div class="mb-4">
        <label for="category_id" class="block text-sm font-medium text-gray-700">Kategori</label>
        <select name="category_id" id="category_id"
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            <option disabled selected>-- Pilih Kategori --</option>
            <?php $__currentLoopData = $categories->unique('id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->id); ?>"
                    <?php echo e(old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : ''); ?>>
                    <?php echo e($category->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    
    <div class="mb-4">
        <label for="sku" class="block text-sm font-medium text-gray-700">SKU</label>
        <input type="text" name="sku" id="sku" value="<?php echo e(old('sku', $product->sku ?? '')); ?>"
            placeholder="Contoh: SKU12345" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
    </div>

    
    <div class="mb-4">
        <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
        <input type="number" step="0.01" name="price" id="price"
            value="<?php echo e(old('price', $product->price ?? '')); ?>" placeholder="Contoh: 50000"
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
    </div>

    
    <div class="mb-4">
        <label for="stock" class="block text-sm font-medium text-gray-700">Stok</label>
        <input type="number" name="stock" id="stock" value="<?php echo e(old('stock', $product->stock ?? '')); ?>"
            placeholder="Contoh: 100" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
    </div>

    
    <div class="mb-4">
        <label for="unit" class="block text-sm font-medium text-gray-700">Satuan</label>
        <input type="text" name="unit" id="unit" value="<?php echo e(old('unit', $product->unit ?? 'pcs')); ?>"
            placeholder="Contoh: pcs, pack, liter"
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
    </div>

    
    <div class="mb-4">
        <label for="weight" class="block text-sm font-medium text-gray-700">Berat (gram)</label>
        <input type="number" step="0.1" name="weight" id="weight"
            value="<?php echo e(old('weight', $product->weight ?? 0)); ?>" placeholder="Contoh: 250"
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
    </div>

    
    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Gambar Produk</label>
        <input type="file" name="image" id="image" class="mt-1 block w-full">
        <?php if($isEdit && $product->image): ?>
            <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="Gambar Produk"
                class="mt-2 w-32 h-32 object-cover">
        <?php endif; ?>
    </div>

    
    <div class="mb-4">
        <label class="inline-flex items-center">
            <input type="checkbox" name="is_active" value="1" class="form-checkbox"
                <?php echo e(old('is_active', $product->is_active ?? true) ? 'checked' : ''); ?>>
            <span class="ml-2">Aktif</span>
        </label>
    </div>

    
    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
        <?php echo e($isEdit ? 'Update' : 'Simpan'); ?>

    </button>
</form>
<?php /**PATH C:\xampp\htdocs\Eccommerce\Trenz\resources\views/admin/products/form.blade.php ENDPATH**/ ?>