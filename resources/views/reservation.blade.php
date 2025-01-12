@extends('layouts.main')

@section('content')
<div class="flex-1 p-6 bg-gray-100 sm:ml-64 mt-12">
    <div class="flex justify-between items-center mb-6">
     <input class="w-1/2 p-2 border border-gray-300 rounded" placeholder="{{ __("messages.search_placeholder") }}" type="text"/>
    </div>
    <div class="bg-white p-4 rounded shadow">
     <table class="w-full">
      <thead>
       <tr class="text-left text-gray-600">
        <th class="py-2">{{ __("messages.book") }}</th>
        <th class="py-2">{{ __("messages.reserve_date") }}</th>
        <th class="py-2">{{ __("messages.return_date") }}</th>
        <th class="py-2">{{ __("messages.price") }}</th>
       </tr>
      </thead>
      <tbody>
       <tr class="border-t">
        <td class="py-2 flex items-center">
         <input class="mr-2" type="checkbox"/>
         <img alt="Book cover" class="mr-2" height="30" src="https://storage.googleapis.com/a1aa/image/SkvyOAiWSfWYPq1qEUgbY1TflejXaAUanzl15DZhrf3eekxeJA.jpg" width="30"/>
         <div>
          <div class="font-bold">Meditations</div>
          <div class="text-gray-500">Marcus Aurelius</div>
         </div>
        </td>
        <td class="py-2">28-11-2024</td>
        <td class="py-2">12-04-2024</td>
        <td class="py-2">Rp.120,000</td>
    </tr>
    <tr class="border-t">
        <td class="py-2 flex items-center">
            <input class="mr-2" type="checkbox"/>
            <img alt="Book cover" class="mr-2" height="30" src="https://storage.googleapis.com/a1aa/image/SkvyOAiWSfWYPq1qEUgbY1TflejXaAUanzl15DZhrf3eekxeJA.jpg" width="30"/>
            <div>
                <div class="font-bold">The Myth of Sisyphus</div>
                <div class="text-gray-500">Albert Camus</div>
            </div>
        </td>
        <td class="py-2">28-11-2024</td>
        <td class="py-2">12-04-2024</td>
        <td class="py-2">Rp.120,000</td>
        {{-- <td class="py-2">
            <button class="p-2 bg-orange-100 text-orange-600 rounded">
                <i class="fas fa-ellipsis-h"></i>
            </button>
        </td> --}}
    </tr>
    <tr class="border-t">
        <td class="py-2 flex items-center">
            <input class="mr-2" type="checkbox"/>
            <img alt="Book cover" class="mr-2" height="30" src="https://storage.googleapis.com/a1aa/image/SkvyOAiWSfWYPq1qEUgbY1TflejXaAUanzl15DZhrf3eekxeJA.jpg" width="30"/>
            <div>
                <div class="font-bold">Letters from a Stoic</div>
                <div class="text-gray-500">Seneca</div>
            </div>
        </td>
        <td class="py-2">28-11-2024</td>
        <td class="py-2">12-04-2024
        </td>
        <td class="py-2">Rp.120,000</td>
        {{-- <td class="py-2">
         <button class="p-2 bg-orange-100 text-orange-600 rounded">
          <i class="fas fa-ellipsis-h"></i>
         </button>
        </td> --}}
       </tr>
      </tbody>
     </table>
    </div>
    <div class="py-3 text-purple-600">
        <P class="text-lg font-bold">{{ __("messages.total_price") }} : Rp.360,000</P>
    </div>
    <div class="py-1 flex justify-center lg:justify-start">
        <button class="border border-purple-600 rounded-md hover:text-white hover:bg-purple-600 text-purple-600">
            <p class="p-3">Checkout</p>
        </button>
    </div>
</div>
@endsection
