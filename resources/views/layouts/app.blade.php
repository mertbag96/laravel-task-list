<!DOCTYPE html>
<html lang="en">

<head>
    <title>Task List App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <style type="text/tailwindcss">
        .btn {
            @apply rounded-md px-2 py-1 text-center font-medium bg-sky-600 text-white shadow-sm ring-1 ring-slate-700/10 hover:bg-sky-700
        }

        .btn-edit {
            @apply bg-sky-600 text-white hover:bg-sky-700
        }

        .btn-green {
            @apply bg-green-600 text-white hover:bg-green-700
        }

        .btn-red {
            @apply bg-red-600 text-white hover:bg-red-700
        }

        .btn-delete {
            @apply bg-amber-600 text-white hover:bg-amber-700
        }

        .link {
            @apply font-medium text-sky-200 underline
        }

        label {
            @apply block uppercase text-slate-200 mb-2
        }

        input,
        textarea {
            @apply shadow-sm appearance-none border border-slate-600 w-full py-2 px-3 bg-slate-500 text-slate-200 leading-tight focus:outline-none
        }

        .task {
            @apply text-white mb-4
        }

        .error {
            @apply text-red-500 text-sm
        }
    </style>
    @yield('styles')
</head>

<body class="bg-slate-900 container mx-auto mt-10 mb-10 max-w-lg">

    <h1 class="mb-8 text-2xl font-semibold text-sky-400">
        @yield('title')
    </h1>

    <div x-data="{ flash: true }">
        @if (session()->has('message'))
            <div x-show="flash"
                class="relative mb-10 rounded border border-green-700 bg-green-600 px-4 py-3 text-lg text-white"
                role="alert">
                <strong class="font-bold">Success!</strong>

                <div>{{ session('message') }}</div>

                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        @click="flash = false" stroke="currentColor" class="h-6 w-6 cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </div>
        @endif
        @yield('content')
    </div>

</body>

</html>
