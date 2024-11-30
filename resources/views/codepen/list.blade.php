<x-app-layout>
    <div class="py-2 px-4">
        <div class="w-full flex justify-end">
            <div class="px-4 py-2 flex items-center justify-end">
                <!-- <div class="border border-purple-500 rounded-xl">
                    <input type="text" class="outline-none w-[240px] rounded-l-xl px-3 text-sm py-1" />
                    <button class="px-4 py-1 bg-purple-500 text-white text-sm rounded-r-lg">
                        Search
                    </button>
                </div>
                <div class="mx-4 h-6 border-r"></div> -->
                <a class="rounded-full border border-purple-500 text-purple-500 hover:text-white px-4 py-2 flex items-center hover:bg-purple-600 cursor-pointer shadow-md" href="{{ route('codepenlist.create') }}">
                    <i class="fa fa-edit"></i>
                    <span class="text-sm ml-2">New Code</span>
                </a>
            </div>
        </div>
    </div>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold text-gray-700 mb-6">Codepen List</h1>
        <div class="bg-white shadow rounded-lg p-6">
            <table class="min-w-full table-auto border-collapse border text-center border-gray-300">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="border border-gray-300 px-4 py-2">#</th>
                        <th class="border border-gray-300 px-4 py-2">Title</th>
                        <th class="border border-gray-300 px-4 py-2">Description</th>
                        <th class="border border-gray-300 px-4 py-2">Author</th>
                        <th class="border border-gray-300 px-4 py-2">created_at</th>
                        <th class="border border-gray-300 px-4 py-2">updated_at</th>
                        <th class="border border-gray-300 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($codepens as $codepen)
                    <tr class="text-gray-600 code-item cursor-pointer hover:bg-slate-100" data-id="{{ $codepen->id }}">
                        <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration + ($codepens->currentPage() - 1) * $codepens->perPage() }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $codepen->title }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $codepen->description }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $codepen->user->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $codepen->created_at }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $codepen->updated_at }}</td>
                         @if($codepen->user_id == auth()->id())
                        <td class="border border-gray-300 px-4 py-2 flex space-x-2 items-center justify-center">
                            <a href="{{ route('codepenlist.edit', $codepen->id) }}" class="action text-blue-500 hover:text-blue-700">Edit</a>
                            <button type="button" class="text-red-500 hover:text-red-700 action delete-btn" data-id="{{ $codepen->id }}">Delete</button>
                        </td>
                        @else
                        <td class="border border-gray-300 px-4 py-2 flex space-x-2 items-center justify-center">
                            <a href="{{ route('codepenlist.edit', $codepen->id) }}" class="text-blue-500 action hover:text-blue-700">Try it yourself</a>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $codepens-> links() }}
        </div>
    </div>

    <div class="modal hidden w-full h-screen fixed top-0 bg-black/80 transition-all duration-300 py-[5%]">
        
        <div class="w-[80%] h-full bg-white mx-auto align-middle rounded relative">
            <div class="absolute right-2 top-2 flex">
                <button class="rounded-full border mr-2 border-purple-500 text-purple-500 hover:text-white px-4 py-2 flex items-center hover:bg-purple-600 cursor-pointer shadow-md copy" href="{{ route('codepenlist.create') }}">
                    <i class="fa fa-copy"></i>
                    <span class="text-sm ml-2">Make a Copy</span>
                </button>
                <button class="rounded-full border border-purple-500 text-purple-500 hover:text-white px-4 py-2 flex items-center hover:bg-purple-600 cursor-pointer shadow-md close" href="{{ route('codepenlist.create') }}">
                    <i class="fa fa-close"></i>
                    <span class="text-sm ml-2">Close</span>
                </button>
            </div>
            <iframe class="w-full h-full" id="preview"></iframe>
        </div>
    </div>

    <script src="/assets/js/codepen/list.js"></script>
</x-app-layout>