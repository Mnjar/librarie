@extends("layouts.main")

@section('content')
<div class="p-6 sm:ml-64 mt-10 h-auto w-full">
    <div class="flex justify-between items-center my-10">
     <input class="p-2 border rounded w-1/2" placeholder="Search your book" type="text"/>
     <div class="flex items-center">
      <span class="mr-4">Thursday, 4 Desember 2024</span>
     </div>
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
        <th class="py-2 text-center">Published Year</th>
        <th class="py-2 text-center">Action</th>
       </tr>
      </thead>
      <tbody>
       <tr class="border-b">
        <td class="py-2 flex items-center">
         <input class="mr-2" type="checkbox"/>
         <img alt="Meditations book cover" class="mr-2" height="30" src="https://storage.googleapis.com/a1aa/image/Jrz8YEAUe42CMyaOivpuf28XBoQNWmcTDeNOSWyN2fnF7YsPB.jpg" width="30"/>
         <div>
          <div>Meditations</div>
          <div class="text-sm text-gray-500">Marcus Aurelius</div>
         </div>
        </td>
        <td class="py-2 text-center">Rp.100,000</td>
        <td class="py-2 text-center">74</td>
        <td class="py-2 text-center">161-180 AD</td>
        <td class="py-2 text-center">
            <button class="text-orange-600 mx-5 border rounded-md border-orange-600">
                <p class="p-3">Rent</p>
            </button>
            <button class="text-green-600 mx-5 border rounded-md border-green-600">
                <p class="p-3">Buy</p>
            </button>
        </td>
       </tr>
       <tr class="border-b">
        <td class="py-2 flex items-center">
         <input class="mr-2" type="checkbox"/>
         <img alt="The Myth of Sisyphus book cover" class="mr-2" height="30" src="https://storage.googleapis.com/a1aa/image/1TeeYNxRIbvUNUhMOVHmf0zyKYG1gjcn71b8g5nqJ1TsdM2nA.jpg" width="30"/>
         <div>
          <div>The Myth of Sisyphus</div>
          <div class="text-sm text-gray-500">Albert Camus</div>
         </div>
        </td>
        <td class="py-2 text-center">Rp.100,000</td>
        <td class="py-2 text-center">81</td>
        <td class="py-2 text-center">1942</td>
        <td class="py-2 text-center">
            <button class="text-orange-600 m-5 border rounded-md border-orange-600">
            <p class="p-3">Rent</p>
            </button>
            <button class="text-green-600 m-5 border rounded-md border-green-600">
            <p class="p-3">Buy</p>
            </button>
        </td>
       </tr>
       <tr class="border-b">
        <td class="py-2 flex items-center">
         <input class="mr-2" type="checkbox"/>
         <img alt="Letters from a Stoic book cover" class="mr-2" height="30" src="https://storage.googleapis.com/a1aa/image/RnR5hN4cR5Y4NN9D7hDZqmEPZa3VnOr4UfkqSrOwb7adHj9JA.jpg" width="30"/>
         <div>
          <div>Letters from a Stoic</div>
          <div class="text-sm text-gray-500">Seneca</div>
         </div>
        </td>
        <td class="py-2 text-center">Rp.100,000</td>
        <td class="py-2 text-center">120</td>
        <td class="py-2 text-center">62-65 AD</td>
        <td class="py-2 text-center">
            <button class="text-orange-600 mx-5 border rounded-md border-orange-600">
                <p class="p-3">Rent</p>
            </button>
            <button class="text-green-600 mx-5 border rounded-md border-green-600">
                <p class="p-3">Buy</p>
            </button>
        </td>
       </tr>
       <tr class="border-b">
        <td class="py-2 flex items-center">
         <input class="mr-2" type="checkbox"/>
         <img alt="The Stranger book cover" class="mr-2" height="30" src="https://storage.googleapis.com/a1aa/image/tZ2M7wZP4bpzN9sjoKhdKAVIuF7DLxRq3fmNJWDm32uaHj9JA.jpg" width="30"/>
         <div>
          <div>The Stranger</div>
          <div class="text-sm text-gray-500">Albert Camus</div>
         </div>
        </td>
        <td class="py-2 text-center">Rp.100,000</td>
        <td class="py-2 text-center">392</td>
        <td class="py-2 text-center">1942</td>
        <td class="py-2 text-center">
            <button class="text-orange-600 mx-5 border rounded-md border-orange-600">
                <p class="p-3">Rent</p>
            </button>
            <button class="text-green-600 mx-5 border rounded-md border-green-600">
                <p class="p-3">Buy</p>
            </button>
        </td>
       </tr>
       <tr class="border-b">
        <td class="py-2 flex items-center">
         <input class="mr-2" type="checkbox"/>
         <img alt="Discourses and Enchiridion book cover" class="mr-2" height="30" src="https://storage.googleapis.com/a1aa/image/lrt331ercSVVNabmmMBGJhsveHVpnnbL9GZn03YT0UE4OG7TA.jpg" width="30"/>
         <div>
          <div>Discourses and Enchiridion</div>
          <div class="text-sm text-gray-500">Epictetus</div>
         </div>
        </td>
        <td class="py-2 text-center">Rp.100,000</td>
        <td class="py-2 text-center">384</td>
        <td class="py-2 text-center">108 AD</td>
        <td class="py-2 text-center">
            <button class="text-orange-600 mx-5 border rounded-md border-orange-600">
                <p class="p-3">Rent</p>
            </button>
            <button class="text-green-600 mx-5 border rounded-md border-green-600">
                <p class="p-3">Buy</p>
            </button>
        </td>
       </tr>
       <tr class="border-b">
        <td class="py-2 flex items-center">
         <input class="mr-2" type="checkbox"/>
         <img alt="Nausea book cover" class="mr-2" height="30" src="https://storage.googleapis.com/a1aa/image/P0OmWbS1ShagFR0yya4fRuxkPf3VkGWOniRlcLelbHIydM2nA.jpg" width="30"/>
         <div>
          <div>Nausea</div>
          <div class="text-sm text-gray-500">Jean-Paul Sarte</div>
         </div>
        </td>
        <td class="py-2 text-center">Rp.100,000</td>
        <td class="py-2 text-center">199</td>
        <td class="py-2 text-center">1938</td>
        <td class="py-2 text-center">
            <button class="text-orange-600 mx-5 border rounded-md border-orange-600">
                <p class="p-3">Rent</p>
            </button>
            <button class="text-green-600 mx-5 border rounded-md border-green-600">
                <p class="p-3">Buy</p>
            </button>
        </td>
       </tr>
       <tr>
        <td class="py-2 flex items-center">
         <input class="mr-2" type="checkbox"/>
         <img alt="Existentialism is a Humanism book cover" class="mr-2" height="30" src="https://storage.googleapis.com/a1aa/image/RV9dGTdO9o4HOlPL2krn1eZQl3XbAeicXh7DfFqH6zqndM2nA.jpg" width="30"/>
         <div>
          <div>Existentialism is a Humanism</div>
          <div class="text-sm text-gray-500">Jean-Paul Sarte</div>
         </div>
        </td>
        <td class="py-2 text-center">Rp.100,000</td>
        <td class="py-2 text-center">228</td>
        <td class="py-2 text-center">1946</td>
        <td class="py-2 text-center">
            <button class="text-orange-600 mx-5 border rounded-md border-orange-600">
                <p class="p-3">Rent</p>
            </button>
            <button class="text-green-600 mx-5 border rounded-md border-green-600">
                <p class="p-3">Buy</p>
            </button>
        </td>
       </tr>
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