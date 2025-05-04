<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flowbite in Laravel</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Button with Flowbite
        </button>
    </div>

    <!-- Modal toggle -->
<button data-modal-target="myModal" data-modal-toggle="myModal" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">
    Buka Modal
</button>

<!-- Modal -->
<div id="myModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <div class="relative top-1/4 mx-auto p-5 border w-1/3 shadow-lg rounded-md bg-white">
        <h3 class="text-lg font-semibold text-gray-900">Judul Modal</h3>
        <p class="mt-2 text-sm text-gray-500">Ini adalah isi dari modal.</p>
        <button data-modal-hide="myModal" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">
            Tutup
        </button>
    </div>
</div>

    @vite('resources/js/app.js')
</body>
</html>
