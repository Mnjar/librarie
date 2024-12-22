@extends('layouts.main')

@section('content')
<div class="flex-1 p-6 sm:ml-64 mt-12">
    <div class="flex justify-between items-center mb-6">
     <div class="flex items-center p-2">
        <input class="w-full p-2 border border-gray-300 rounded" placeholder="Search your book" type="text"/>
        <i class="fas fa-search text-gray-500">
        </i>
     </div>
     <div class="flex items-center space-x-4">
      <span class="text-gray-600">Thursday, 4 Desember 2024</span>
     </div>
    </div>
    <div class="bg-white p-6 rounded shadow">
     <table class="w-full">
      <thead>
       <tr class="text-left text-gray-600">
        <th class="pb-4">Book</th>
        <th class="pb-4">Transaction Date</th>
        <th class="pb-4">Transaction</th>
        <th class="pb-4">Status</th>
       </tr>
      </thead>
      <tbody>
       <tr class="border-t">
        <td class="py-4 flex items-center">
         <img alt="Meditations Book Cover" class="mr-2" height="40" src="https://storage.googleapis.com/a1aa/image/hp2cWOeGtEX1My71kYNdd9qPf89Hixhwe1fm7ri0Nx5vUZsPB.jpg" width="40"/>
         <div>
          <div>Meditations</div>
          <div class="text-gray-500">Marcus Aurelius</div>
         </div>
        </td>
        <td class="py-4">09-02-2021</td>
        <td class="py-4">Rent</td>
        <td class="py-4 text-red-500">On Proccess</td>
       </tr>
       <tr class="border-t">
        <td class="py-4 flex items-center">
         <img alt="The myth of sisyphus Book Cover" class="mr-2" height="40" src="https://storage.googleapis.com/a1aa/image/IzE8LOJohlJMEVhmgNwavMbdLAGHCg3VJ3Wbr3KJ2NvSlxeJA.jpg" width="40"/>
         <div>
          <div>The myth of sisyphus</div>
          <div class="text-gray-500">Albert Camus</div>
         </div>
        </td>
        <td class="py-4">04-02-2021</td>
        <td class="py-4">Buy</td>
        <td class="py-4 text-green-500">Paid</td>
       </tr>
       <tr class="border-t">
        <td class="py-4 flex items-center">
         <img alt="Letters from a Stoic Book Cover" class="mr-2" height="40" src="https://storage.googleapis.com/a1aa/image/o4d8NeVcYK2HG6jSpGeEumae5Gxp4f7zj7OWBWjfJWj4pyYfE.jpg" width="40"/>
         <div>
          <div>Letters from a Stoic</div>
          <div class="text-gray-500">Seneca</div>
         </div>
        </td>
        <td class="py-4">05-11-2023</td>
        <td class="py-4">Buy</td>
        <td class="py-4 text-green-500">Paid</td>
       </tr>
      </tbody>
     </table>
    </div>
</div>
@endsection