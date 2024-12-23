<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Categories</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex flex-col">
    <!-- Navbar -->
    <nav class="bg-blue-600 text-white p-4">
        <div class="flex justify-between items-center">
            <h1 class="text-xl font-bold">Admin Dashboard</h1>
            <a href="{{ route('admin.dashboard') }}" class="text-white hover:text-blue-200">Back to Dashboard</a>
        </div>
    </nav>

    <!-- Categories List -->
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-4">Categories</h2>
        <a href="{{ route('admin.categories.create') }}" class="bg-blue-600 text-white py-2 px-4 rounded-lg mb-4 inline-block">Add New Category</a>

        <table class="min-w-full bg-white border">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Description</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr class="text-gray-700">
                        <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 border">{{ $category->name }}</td>
                        <td class="px-4 py-2 border">{{ $category->description }}</td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
