<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Add New Category</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex flex-col">
    <!-- Navbar -->
    <nav class="bg-blue-600 text-white p-4">
        <div class="flex justify-between items-center">
            <h1 class="text-xl font-bold">Admin Dashboard</h1>
            <a href="{{ route('admin.categories.index') }}" class="text-white hover:text-blue-200">Back to Categories List</a>
        </div>
    </nav>

    <!-- Form Add Category -->
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-4">Add New Category</h2>
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-bold mb-2">Category Name</label>
                <input type="text" name="name" id="name" class="w-full px-3 py-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-bold mb-2">Description</label>
                <textarea name="description" id="description" class="w-full px-3 py-2 border rounded-lg"></textarea>
            </div>
            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-lg">Save Category</button>
        </form>
    </div>
</div>

</body>
</html>
