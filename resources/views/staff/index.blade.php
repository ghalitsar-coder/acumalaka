@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <button class="rounded-lg bg-indigo-600 px-2.5 py-1.5 font-semibold text-white shadow-sm">
            <a href="{{ route('staff.create') }}">Add new Staff</a>
        </button>
        <h1 class="mb-8 text-center text-3xl font-bold">Staff List</h1>
        <div class="overflow-x-auto rounded-md shadow">
            <table class="w-full table-auto border-collapse">
                <thead>
                    <tr
                        class="bg-gray-100 text-left text-xs font-medium uppercase tracking-wider text-gray-700">
                        <th class="px-6 py-4">#</th>
                        <th class="px-6 py-4">First Name</th>
                        <th class="px-6 py-4">Last Name</th>
                        <th class="px-6 py-4">Position</th>
                        <th class="px-6 py-4">Email</th>
                        <th class="px-6 py-4">Phone</th>
                        <th class="px-6 py-4">Hire Date</th>
                        <th class="px-6 py-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staff as $member)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td
                                class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                                {{ $loop->iteration }}
                            </td>
                            <td
                                class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                                {{ $member->first_name }}
                            </td>
                            <td
                                class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                                {{ $member->last_name }}
                            </td>
                            <td
                                class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                                {{ $member->position }}
                            </td>
                            <td
                                class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                                {{ $member->email }}
                            </td>
                            <td
                                class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                                {{ $member->phone }}
                            </td>
                            <td
                                class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                                {{ $member->hire_date }}
                            </td>
                            <td class="flex gap-2 px-6 py-4">
                                <form
                                    action="{{ route('staff.destroy', $member->id_staff) }}"
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
                                <a
                                    href="{{ route('staff.edit', $member->id_staff) }}"
                                    class="text-green-600 hover:text-green-900">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

