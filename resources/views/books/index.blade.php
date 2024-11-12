@extends('layouts.app')

@section('content')
    <div class="mb-6">
        <h1 class="text-3xl font-bold">Books List</h1>
        <a
            href="{{ route('books.create') }}"
            class="mt-4 inline-block rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-600">
            Add New Book
        </a>
    </div>

    @if ($message = Session::get('success'))
        <div
            class="relative mb-4 rounded border border-green-400 bg-green-100 px-4 py-3 text-green-700">
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @endif

    <div class="overflow-hidden rounded-lg bg-white shadow">
        <table class="min-w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                        Title
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                        Author
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                        Year
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @foreach ($books as $book)
                    <tr>
                        <td class="px-6 py-4">{{ $book->title }}</td>
                        <td class="px-6 py-4">{{ $book->author }}</td>
                        <td class="px-6 py-4">{{ $book->year_published }}</td>
                        <td class="flex gap-2 px-6 py-4">
                            <a
                                href="{{ route('books.show', $book->id) }}"
                                class="text-blue-600 hover:text-blue-900">
                                View
                            </a>
                            <a
                                href="{{ route('books.edit', $book->id) }}"
                                class="text-green-600 hover:text-green-900">
                                Edit
                            </a>
                            <form
                                action="{{ route('books.destroy', $book->id) }}"
                                method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="text-red-600 hover:text-red-900"
                                    onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $books->links() }}
    </div>
@endsection

