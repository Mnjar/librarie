@extends("layouts.main")

@section('content')
<div class="p-6 sm:ml-64 mt-10 h-auto w-full">
    <div class="flex justify-between items-center my-10">
     <input class="p-2 border rounded w-1/2" placeholder="Search your book" type="text"/>

    </div>
    <div class="flex mb-6 flex-wrap">
        <button class="bg-white text-purple-600 px-4 py-2 border border-purple-600 rounded mr-2">Philosophy</button>
        <button class="bg-white text-gray-700 px-4 py-2 rounded mr-2">Poetry</button>
        <button class="bg-white text-gray-700 px-4 py-2 rounded mr-2">Romance</button>
        <button class="bg-white text-gray-700 px-4 py-2 rounded mr-2">Comedy</button>
        <button class="bg-white text-gray-700 px-4 py-2 rounded mr-2">Biography</button>
        <button class="bg-white text-gray-700 px-4 py-2 rounded mr-2">Thriller</button>
        <button class="bg-white text-gray-700 px-4 py-2 rounded mr-2">Horror</button>
        <button class="bg-white text-gray-700 px-4 py-2 rounded">Adult</button>
    </div>
    <div class="bg-white p-4 rounded shadow w-full">
     <table class="w-full">
      <thead>
       <tr class="text-sm text-gray-600">
        <th class="py-2 text-center">Book</th>
        <th class="py-2 text-center">Price</th>
        <th class="py-2 text-center">Stock</th>
        <th class="py-2 text-center">Action</th>
       </tr>
      </thead>
      <tbody>
        @foreach ($books as $book)
            <tr class="border-b">
                <td class="py-2 flex items-center">
                <input class="mr-2" type="checkbox"/>
                <img alt="Meditations book cover" class="mr-2" height="30" src="{{ $book->image }}" width="30"/>
                <div>
                <div>{{ $book->title }}</div>
                <div class="text-sm text-gray-500">{{ $book->author }}</div>
                </div>
                </td>
                <td class="py-2 text-center">Rp.{{ $book->price }}</td>
                <td class="py-2 text-center">{{ $book->stock }}</td>
                <td class="py-2 text-center">
                    <button class="text-orange-600 mx-5 border rounded-md border-orange-600">
                        <p class="p-3">Rent</p>
                    </button>
                    <button class="text-green-600 mx-5 border rounded-md border-green-600">
                        <p class="p-3">Buy</p>
                    </button>
                </td>
            </tr>
        @endforeach
      </tbody>
     </table>
     <div class="flex justify-center mt-4">
      <button class="px-3 py-1 border rounded-l">&lt;&lt;</button>
      <button class="px-3 py-1 border bg-blue-500 text-white">1</button>
      <button class="px-3 py-1 border">2</button>
      <button class="px-3 py-1 border">3</button>
      <button class="px-3 py-1 border rounded-r">&gt;&gt;</button>
     </div>
    </div>
</div>
@endsection