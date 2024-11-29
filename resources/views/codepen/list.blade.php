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
</x-app-layout>
