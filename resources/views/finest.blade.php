@extends('layouts.main')

@section('content')
<div class="flex-1 p-6 sm:ml-64 mt-11">
    <div class="flex justify-between items-center mb-6">
     <input class="w-1/2 p-2 border rounded-md" placeholder="Search your book" type="text"/>
     <div class="flex items-center space-x-4">
      <span class="text-gray-600">Thursday, 4 Desember 2024</span>
     </div>
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
     <table class="w-full">
      <thead>
       <tr class="text-left text-gray-600">
        <th class="pb-4">Book</th>
        <th class="pb-4">Return Date</th>
        <th class="pb-4">Late</th>
        <th class="pb-4">Charge</th>
        <th class="pb-4">Action</th>
       </tr>
      </thead>
      <tbody>
       <tr class="border-t">
        <td class="py-4 flex items-center">
            <img alt="Book Cover" class="w-10 h-10 rounded-full mr-2" height="40" src="https://storage.googleapis.com/a1aa/image/1XyLZeD8jm0UeUZ3HGK24RUbIZDdQiQdnBh1KTizUW4tSG7TA.jpg" width="40"/>
            <div>
                <div class="font-semibold">Meditations</div>
                <div class="text-sm text-gray-500">Marcus Aurelius</div>
            </div>
        </td>
        <td class="py-4">09-02-2021</td>
        <td class="py-4">1d</td>
        <td class="py-4">10-02-2021
            <br/>Rp.15.000,00
        </td>
        <td class="py-4">
            <input class="mr-2" type="checkbox"/>
        </td>
        
    </tr>
    <tr class="border-t">
        <td class="py-4 flex items-center">
            <img alt="Book Cover" class="w-10 h-10 rounded-full mr-2" height="40" src="https://storage.googleapis.com/a1aa/image/1XyLZeD8jm0UeUZ3HGK24RUbIZDdQiQdnBh1KTizUW4tSG7TA.jpg" width="40"/>
            <div>
                <div class="font-semibold">The Myth of Sisyphus</div>
                <div class="text-sm text-gray-500">Albert Camus</div>
            </div>
        </td>
        <td class="py-4">04-02-2021</td>
        <td class="py-4">6d</td>
        <td class="py-4">10-02-2021
            <br/>Rp.90.000,00
        </td>
        <td class="py-4">
            <input class="mr-2" type="checkbox"/>
        </td>
        
    </tr>
    <tr class="border-t">
        <td class="py-4 flex items-center">
            <img alt="Book Cover" class="w-10 h-10 rounded-full mr-2" height="40" src="https://storage.googleapis.com/a1aa/image/1XyLZeD8jm0UeUZ3HGK24RUbIZDdQiQdnBh1KTizUW4tSG7TA.jpg" width="40"/>
            <div>
                <div class="font-semibold">Letters from a Stoic</div>
                <div class="text-sm text-gray-500">Seneca</div>
            </div>
        </td>
        <td class="py-4">5-11-2023</td>
        <td class="py-4">4d</td>
        <td class="py-4">9-11-2023
            <br/>Rp.60.000,00
        </td>
        <td class="py-4">
            <input class="mr-2" type="checkbox"/>
        </td>
       </tr>
      </tbody>
     </table>
    </div>
    <div>
        <div>
            <p class="text-lg text-purple-600 my-4">Total : ?</p>
            <button class="border-purple-600 border rounded-md text-purple-600 hover:text-white hover:bg-purple-600 w-16">
                <p class="p-3">Pay</p>
            </button>
        </div>
    </div>
</div>
@endsection