{{-- resources/views/admin/layout.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

<div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-[#05352D] text-white flex flex-col px-4 py-6">
        <h2 class="text-xl font-bold mb-6">Admin Panel</h2>
        <nav class="flex flex-col gap-3">
            <a href="{{ route('admin.dashboard.index') }}" class="hover:bg-gray-700 px-3 py-2 rounded">
                🏠 Dashboard
            </a>
            <a href="{{ route('admin.form.index') }}" class="hover:bg-gray-700 px-3 py-2 rounded">
                📋 Form Submissions
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8 bg-white rounded-l-lg shadow-lg">
        @yield('content')
    </main>
</div>

</body>
</html>
