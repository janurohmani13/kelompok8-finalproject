<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <title>Daftar User</title>
</head>
<body>
    
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="pb-4 bg-white dark:bg-gray-900">
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative mt-1">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="text" id="table-search" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for users">
        </div>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">No</th>
                <th scope="col" class="px-6 py-3">Nama</th>
                <th scope="col" class="px-6 py-3">Email</th>
                <th scope="col" class="px-6 py-3">Role</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">1</td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">John Doe</td>
                <td class="px-6 py-4">john.doe@example.com</td>
                <td class="px-6 py-4">Admin</td>
                <td class="px-6 py-4">
                    <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline me-2">Edit</a>
                    <a href="#" class="text-red-600 dark:text-red-500 hover:underline">Hapus</a>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">2</td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Jane Smith</td>
                <td class="px-6 py-4">jane.smith@example.com</td>
                <td class="px-6 py-4">User</td>
                <td class="px-6 py-4">
                    <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline me-2">Edit</a>
                    <a href="#" class="text-red-600 dark:text-red-500 hover:underline">Hapus</a>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">3</td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Michael Brown</td>
                <td class="px-6 py-4">michael.brown@example.com</td>
                <td class="px-6 py-4">Moderator</td>
                <td class="px-6 py-4">
                    <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline me-2">Edit</a>
                    <a href="#" class="text-red-600 dark:text-red-500 hover:underline">Hapus</a>
                </td>
            </tr>
        </tbody>

         <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">3</td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Michael Brown</td>
                <td class="px-6 py-4">michael.brown@example.com</td>
                <td class="px-6 py-4">Moderator</td>
                <td class="px-6 py-4">
                    <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline me-2">Edit</a>
                    <a href="#" class="text-red-600 dark:text-red-500 hover:underline">Hapus</a>
                </td>
            </tr>
        </tbody>

         <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">3</td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Michael Brown</td>
                <td class="px-6 py-4">michael.brown@example.com</td>
                <td class="px-6 py-4">Moderator</td>
                <td class="px-6 py-4">
                    <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline me-2">Edit</a>
                    <a href="#" class="text-red-600 dark:text-red-500 hover:underline">Hapus</a>
                </td>
            </tr>
        </tbody>

         <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">3</td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Michael Brown</td>
                <td class="px-6 py-4">michael.brown@example.com</td>
                <td class="px-6 py-4">Moderator</td>
                <td class="px-6 py-4">
                    <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline me-2">Edit</a>
                    <a href="#" class="text-red-600 dark:text-red-500 hover:underline">Hapus</a>
                </td>
            </tr>
        </tbody>

         <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">3</td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Michael Brown</td>
                <td class="px-6 py-4">michael.brown@example.com</td>
                <td class="px-6 py-4">Moderator</td>
                <td class="px-6 py-4">
                    <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline me-2">Edit</a>
                    <a href="#" class="text-red-600 dark:text-red-500 hover:underline">Hapus</a>
                </td>
            </tr>
        </tbody>

         <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">3</td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Michael Brown</td>
                <td class="px-6 py-4">michael.brown@example.com</td>
                <td class="px-6 py-4">Moderator</td>
                <td class="px-6 py-4">
                    <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline me-2">Edit</a>
                    <a href="#" class="text-red-600 dark:text-red-500 hover:underline">Hapus</a>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="flex justify-between items-center px-6 py-4 bg-white dark:bg-gray-900">
        <span class="text-sm text-gray-700 dark:text-gray-400">
            Showing <span class="font-semibold text-gray-900 dark:text-white">1</span> to <span class="font-semibold text-gray-900 dark:text-white">3</span> of <span class="font-semibold text-gray-900 dark:text-white">10</span> Entries
        </span>
        <div class="inline-flex -space-x-px text-sm rtl:space-x-reverse">
            <a href="#" class="px-3 py-2 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
            <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
            <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
            <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">3</a>
            <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
        </div>
    </div>
</div>


</body>
</html>