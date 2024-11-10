@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-6">
        <h1 class="text-3xl font-bold">Book Details</h1>
        <a href="{{ route('books.index') }}" class="text-blue-500 hover:text-blue-700">Back to List</a>
    </div>

    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <h2 class="text-gray-700 text-sm font-bold mb-2">Title</h2>
            <p class="text-gray-700">{{ $book->title }}</p>
        </div>

        <div class="mb-4">
            <h2 class="text-gray-700 text-sm font-bold mb-2">Author</h2>
            <p class="text-gray-700">{{ $book->author }}</p>
        </div>

        <div class="mb-4">
            <h2 class="text-gray-700 text-sm font-bold mb-2">Description</h2>
            <p class="text-gray-