<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <title>Laporan Penjualan</title>
</head>
<body>  
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6">
    <h2 class="text-xl font-bold px-6 py-4 bg-white dark:bg-gray-800 dark:text-white">Laporan Penjualan</h2>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300">
            <tr>
                <th scope="col" class="px-6 py-3">No</th>
                <th scope="col" class="px-6 py-3">Tanggal</th>
                <th scope="col" class="px-6 py-3">Nama Produk</th>
                <th scope="col" class="px-6 py-3">Kategori</th>
                <th scope="col" class="px-6 py-3">Jumlah</th>
                <th scope="col" class="px-6 py-3">Harga Satuan</th>
                <th scope="col" class="px-6 py-3">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">1</td>
                <td class="px-6 py-4">2025-05-12</td>
                <td class="px-6 py-4">Produk A</td>
                <td class="px-6 py-4">Elektronik</td>
                <td class="px-6 py-4">3</td>
                <td class="px-6 py-4">Rp100.000</td>
                <td class="px-6 py-4">Rp300.000</td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">2</td>
                <td class="px-6 py-4">2025-05-12</td>
                <td class="px-6 py-4">Produk B</td>
                <td class="px-6 py-4">Fashion</td>
                <td class="px-6 py-4">2</td>
                <td class="px-6 py-4">Rp150.000</td>
                <td class="px-6 py-4">Rp300.000</td>
            </tr>
        </tbody>
        <tfoot>
            <tr class="font-semibold text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-700">
                <td colspan="6" class="px-6 py-4 text-right">Total Penjualan:</td>
                <td class="px-6 py-4">Rp600.000</td>
            </tr>
        </tfoot>
    </table>
</div>

</body>
</html>