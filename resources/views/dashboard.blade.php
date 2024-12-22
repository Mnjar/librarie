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
     <h2 class="text-xl font-bold mb-4">Book List</h2>
     <div class="flex flex-wrap mb-6 justify-center md:justify-start">
        @foreach ($books as $book)
        <a href="">
            <div class="max-w-44 m-5 bg-white p-4 rounded-lg shadow">
                <img alt="A New Program for Graphic Design book cover" class="w-full h-auto mb-2" height="150" src="{{ $book->image }}" width="100"/>
                <p class="text-sm">{{ $book->title }}</p>
                <p class="text-xs text-gray-500">{{ $book->author }}</p>
            </div>
        </a>
        @endforeach
     </div>
    </div>
    <div>
     <h2 class="text-xl font-bold mb-4">My Books</h2>
     <div class="flex flex-wrap justify-center md:justify-start mb-6">
        @foreach ($booksFromTransactions as $book)
        <div class="max-w-44 m-5 bg-white p-4 rounded-lg shadow">
            <img alt="It Ends with Us book cover" class="w-full h-auto mb-2" height="150" src="{{ $book->image }}" width="100"/>
            <p class="text-sm">{{ $book->title }}</p>
            <p class="text-xs text-gray-500">{{ $book->author }}</p>
            <p class="text-sm">189 Pages</p>
            <div class="w-full bg-gray-200 rounded-full h-2.5 mb-2">
             <div class="bg-blue-600 h-2.5 rounded-full" style="width: 80%">
             </div>
            </div>
           </div>
        @endforeach
     </div>
    </div>
   </div>
@endsection