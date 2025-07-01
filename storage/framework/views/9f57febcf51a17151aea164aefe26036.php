 

<?php $__env->startSection('content'); ?>
    <!-- Main Content -->
    <main class="flex-1 p-6">
        <h1 class="text-2xl font-semibold mb-4">Selamat Datang, Admin!</h1>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-white p-5 rounded-lg shadow">
                <h3 class="text-gray-600 text-sm">Total Produk</h3>
                <p class="text-2xl font-semibold"><?php echo e($totalProducts); ?></p>
            </div>
            <div class="bg-white p-5 rounded-lg shadow">
                <h3 class="text-gray-600 text-sm">Total Transaksi</h3>
                <p class="text-2xl font-semibold"><?php echo e($totalOrders); ?></p>
            </div>
            <div class="bg-white p-5 rounded-lg shadow">
                <h3 class="text-gray-600 text-sm">Total Pengguna</h3>
                <p class="text-2xl font-semibold"><?php echo e($totalUsers); ?></p>
            </div>
        </div>

        <!-- Placeholder for Chart.js -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold mb-2">Statistik Penjualan Bulanan</h2>
            <canvas id="salesChart" height="100"></canvas>
        </div>
    </main>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('salesChart');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                datasets: [{
                    label: 'Penjualan',
                    data: [12, 19, 3, 5, 2, 9],
                    borderColor: '#FF5C39',
                    backgroundColor: 'rgba(255,92,57,0.2)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Dropdown functionality
        const dropdownBtn = document.querySelector('button');
        const dropdownMenu = document.querySelector('.dropdown-menu');

        dropdownBtn.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        window.addEventListener('click', (e) => {
            if (!dropdownBtn.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>
    </body>

    </html>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Eccommerce\Trenz\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>