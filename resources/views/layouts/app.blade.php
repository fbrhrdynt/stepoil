<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Field Operation Track System')</title>

    {{-- ✅ Vite (Tailwind, Alpine, app.js) --}}
    @vite(['resources/css/app.css', 'resources/css/custom.css', 'resources/js/app.js'])

    <style>
    </style>

    {{-- ✅ Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- ✅ Select2 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    {{-- ✅ DataTables CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <script src="//unpkg.com/alpinejs" defer></script>
    @stack('styles')
</head>

@include('partials.head')

<body class="bg-gray-100">
    {{-- ✅ Layout Sections --}}
    @include('partials.navbar')
    @include('partials.header')
    @include('partials.sidebar')
    @include('partials.personalmenu')

    @yield('content')

        @if (session('success'))
            <div id="alertBox" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4 mx-4" role="alert">
                <span class="block sm:inline">{!! session('success') !!}</span>
                <span onclick="document.getElementById('alertBox').remove()" class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer">
                    <svg class="fill-current h-6 w-6 text-green-700" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"><title>Close</title><path d="M14.348 5.652a1 1 0 00-1.414-1.414L10 7.172 7.066 4.238a1 1 0 00-1.414 1.414L8.586 8.586 5.652 11.52a1 1 0 001.414 1.414L10 10.828l2.934 2.934a1 1 0 001.414-1.414L11.414 8.586l2.934-2.934z"/></svg>
                </span>
            </div>

            <script>
                // Auto-close in 5 seconds
                setTimeout(() => {
                    const alert = document.getElementById('alertBox');
                    if (alert) alert.remove();
                }, 5000);
            </script>
        @endif

    @include('partials.footer')

    {{-- ✅ jQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- ✅ Select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- ✅ DataTables --}}
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    {{-- ✅ Flowbite --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

    {{-- ✅ Flowbite UI Components (Demo, optional) --}}
    <script src="https://flowbite.com/application-ui/demo/app.bundle.js"></script>

    {{-- ✅ Tempat script tambahan --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('scripts')
    @stack('scripts')

</body>
</html>
