<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="block">
                    <x-anchor to="{{ route('admin.books.add') }}" class=" mt-3 mr-3">+ Add Book</x-anchor>
                </div>
                <div class="p-6 text-gray-900">
                    <table class="table-fixed w-full text-left">
                        <thead>
                            <tr>
                                <th class="border p-2">Name</th>
                                <th class="border p-2">Author</th>
                                <th class="border p-2">Category</th>
                                <th class="border p-2">Availability</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($books as $book)
                                <tr>
                                    <td class="border p-2">
                                        <a href="{{ route("admin.book.info",['id'=>$book->id]) }}">{{ $book->name }}</a>
                                    </td>
                                    <td class="border">{{ ucwords($book->author) }}</td>
                                    <td class="border">{{ ucwords($book->category->name) }}</td>
                                    <td class="border text-center">{{ $book->is_available ? 'yes' : 'no' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="border">No books found...</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
