<x-app-layout>
    <div class="py-2 px-4">
        <div class="w-full flex justify-center">
            <div class="rounded-lg shadow px-4 py-2 bg-white flex items-center">
                <div class="border border-purple-500 rounded-xl">
                    <input type="text" class="outline-none w-[240px] rounded-l-xl px-3 text-sm py-1" />
                    <button class="px-4 py-1 bg-purple-500 text-white text-sm rounded-r-lg">
                        Search
                    </button>
                </div>
                <div class="mx-4 h-6 border-r"></div>
                <a class="rounded-full bg-purple-500 text-white px-2 py-2 hover:bg-purple-600 cursor-pointer" href="{{ route('codepenlist.create') }}">
                    <img src="https://img.icons8.com/?size=16&id=9fYfwBJNoMpV&format=png&color=ffffff" />
                </a>
            </div>
        </div>
    </div>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold text-gray-700 mb-6">Codepen List</h1>
        <div class="bg-white shadow rounded-lg p-6">
            <table class="min-w-full table-auto border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="border border-gray-300 px-4 py-2">#</th>
                        <th class="border border-gray-300 px-4 py-2">Title</th>
                        <th class="border border-gray-300 px-4 py-2">Description</th>
                        <th class="border border-gray-300 px-4 py-2">Author</th>
                        <th class="border border-gray-300 px-4 py-2">created_at</th>
                        <th class="border border-gray-300 px-4 py-2">updated_at</th>
                        <th class="border border-gray-300 px-4 py-2">Visibility</th>
                        <th class="border border-gray-300 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($codepens as $codepen)
                    <tr class="text-gray-600">
                        <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration + ($codepens->currentPage() - 1) * $codepens->perPage() }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $codepen->title }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $codepen->description }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $codepen->user->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $codepen->created_at }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $codepen->updated_at }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $codepen->status }}</td>
                        <td class="border border-gray-300 px-4 py-2 flex space-x-2">
                            <!-- Edit Button -->
                            <a href="{{ route('codepenlist.edit', $codepen->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>

                            <!-- Delete Button -->
                            <button type="button" class="text-red-500 hover:text-red-700">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $codepens->links() }}
        </div>
    </div>
</x-app-layout>
