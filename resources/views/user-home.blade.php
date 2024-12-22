@extends('layouts.main')

@section('dashboard')
    text-purple-600
@endsection

@section('content')
<div class="flex-1 p-6 mt-12 sm:ml-64">
    <div class="flex justify-center md:justify-between flex-col md:flex-row items-center mb-6">
     <input class="w-1/2 p-2 border border-gray-300 rounded" placeholder="Search your book" type="text"/>
     <span class="text-gray-600 pt-5 md:pt-0">Thursday, 4 December 2024</span>
    </div>
    <div>
     <h2 class="text-xl font-bold mb-4">Popular</h2>
     <div class="flex flex-wrap mb-6 justify-center md:justify-start">
      <div class="max-w-40 m-5 rounded-lg shadow-md">
       <img alt="The Subtle Art of Not Giving a F*ck book cover" class="w-full h-auto mb-2" height="150" src="https://storage.googleapis.com/a1aa/image/lEbKfmsHOjS6AiSdUMXZlo2jluTr1g93uE1Jy8unuonfLG7TA.jpg" width="100"/>
       <p class="text-sm">The Subtle Art Of...<br/>Mark Manson</p>
      </div>
      <div class="max-w-40 m-5 rounded-lg shadow-md">
       <img alt="Happiness by Design book cover" class="w-full h-auto mb-2" height="150" src="https://storage.googleapis.com/a1aa/image/rnQCroonvf06AysWeKjbdq3B5GPHGkm02axB5uisHWZ8LG7TA.jpg" width="100"/>
       <p class="text-sm">Happiness by Design<br/>Paul Dolan</p>
      </div>
      <div class="max-w-40 m-5 rounded-lg shadow-md">
       <img alt="Rich Dad Poor Dad book cover" class="w-full h-auto mb-2" height="150" src="https://storage.googleapis.com/a1aa/image/R57JqDx7LKb2HJqZeuLfyj45kpItNx3TJPflxToBby8wXM2nA.jpg" width="100"/>
       <p class="text-sm">Rich Dad Poor Dad<br/>Robert Kiyosaki</p>
      </div>
      <div class="max-w-40 m-5 rounded-lg shadow-md">
       <img alt="A New Program for Graphic Design book cover" class="w-full h-auto mb-2" height="150" src="https://storage.googleapis.com/a1aa/image/nvvuiDaShRrgPhl9QrGhxmReiFTWQCPxJ6Mvcf8yyu0eXM2nA.jpg" width="100"/>
       <p class="text-sm">A new Program...<br/>David Reinfurt</p>
      </div>
     </div>
    </div>
    <div>
     <h2 class="text-xl font-bold mb-4">My Books</h2>
     <div class="flex flex-wrap justify-center md:justify-start mb-6">
      <div class="max-w-44 m-5 bg-white p-4 rounded-lg shadow">
       <img alt="It Ends with Us book cover" class="w-full h-auto mb-2" height="150" src="https://storage.googleapis.com/a1aa/image/e5QkAMdbtfht80TeWt6ZSZfO1ky8THvq5lbb1qbkCvtRwYsPB.jpg" width="100"/>
       <p class="text-sm">It Ends with Us<br/>Colleen Hoover</p><p class="text-sm">189 Pages</p>
       <div class="w-full bg-gray-200 rounded-full h-2.5 mb-2">
        <div class="bg-blue-600 h-2.5 rounded-full" style="width: 80%">
        </div>
       </div>
      </div>
      <div class="max-w-44 m-5 bg-white p-4 rounded-lg shadow">
       <img alt="Design Thinking book cover" class="w-full h-auto mb-2" height="150" src="https://storage.googleapis.com/a1aa/image/XF5mLVw8Wq7kGdocDWb21j6tHWeVR3jM5WqoOs56bd79Fj9JA.jpg" width="100"/>
       <p class="text-sm">Design Thinking<br/>Daniel Ling</p><p class="text-sm">140 Pages</p>
       <div class="w-full bg-gray-200 rounded-full h-2.5 mb-2">
        <div class="bg-blue-600 h-2.5 rounded-full" style="width: 66%">
        </div>
       </div>
      </div>
      <div class="max-w-44 m-5 bg-white p-4 rounded-lg shadow">
       <img alt="Just My Type book cover" class="w-full h-auto mb-2" height="150" src="https://storage.googleapis.com/a1aa/image/yQUi6yuEgqKrD9wltjfabjvPEOIBKdYiXrcaqqI9eL55LG7TA.jpg" width="100"/>
       <p class="text-sm">Just My Type<br/>Simon Garfield</p><p class="text-sm text-yellow-500">Return until 25.10.2022</p>
       <p class="text-sm text-blue-600">Finished</p>
      </div>
      <div class="max-w-44 m-5 bg-white p-4 rounded-lg shadow">
       <img alt="How to Talk to Anyone book cover" class="w-full h-auto mb-2" height="150" src="https://storage.googleapis.com/a1aa/image/hvjfM3MBPYyekExBf8PypfvnbyMf3WnTOehtjjx8ERF6AjxeJA.jpg" width="100"/>
       <p class="text-sm">How to Talk to Anyone<br/>Leil Lowndes</p><p class="text-sm text-red-500">Returned</p>
      </div>
     </div>
    </div>
   </div>
@endsection