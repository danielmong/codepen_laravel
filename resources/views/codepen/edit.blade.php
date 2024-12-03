<x-app-layout>
    <div id="main-container" class="flex w-full m-0 relative" style="height: calc(100vh - 98px)">
        <input type="hidden" id="codepen_id" value="{{ $codepen->id }}">
        <!-- Editor Containers -->
        <div id="container-left" class="w-[450px] h-full flex flex-col">
            <div class="px-2 h-8 flex items-center justify-between">
                <span class="font-semibold text-md text-black">HTML</span>
            </div>
            <div id="html-editor" class="editor border rounded">{{ $codepen->content_html }}</div>
            <div class="px-2 h-8 flex items-center justify-between cursor-row-resize handler">
                <span class="font-semibold text-md text-black">CSS</span>
            </div>
            <div id="css-editor" class="editor border rounded">{{ $codepen->content_css }}</div>
            <div class="px-2 h-8 flex items-center justify-between cursor-row-resize handler">
                <span class="font-semibold text-md text-black">JS</span>
            </div>
            <div id="js-editor" class="editor border rounded">{{ $codepen->content_js }}</div>
            <div class="px-2 h-8 flex items-center justify-between cursor-row-resize handler border-b">
            </div>
            <div id="placehold" class="flex-1"></div>
        </div>
        <div class="resizable-handler w-2 h-full cursor-ew-resize"></div>
        <div id="container-right" class="h-full flex-1 relative">
            <iframe id="result" class="w-full h-full border rounded bg-white"></iframe>
            <div class="w-full h-full opacity-0 absolute top-0 overlay"></div>
            <a class="border border-purple-500 text-purple-500 hover:text-white px-4 py-2 flex items-center hover:bg-purple-600 cursor-pointer shadow-md absolute top-4 right-8 rounded-full" href="{{ route('codepenlist') }}">
                <i class="fa fa-arrow-left"></i>
                <span class="text-sm ml-2">Go To List</span>
            </a>
        </div>
    </div>
    <div class="bg-white w-full h-8 flex justify-end py-1 px-4 items-center">
        <input type="text" id="title" class="border outline-none rounded px-2 py-1 text-sm w-60" placeholder="Title of Code" value="{{ $codepen->title }}{{ $codepen->user_id != auth()->id() ? '-Copy' : '' }}" />
        <input type="text" id="desc" class="border outline-none rounded px-2 py-1 text-sm flex-1 ml-2" placeholder="Description of Code" value="{{ $codepen->description }}" />
        <div class="flex items-center mx-2">
            <input type="checkbox" id="is_public" {{ $codepen->status == "public" ? 'checked' : '' }} />
            <label for="is_public" class="text-sm ml-1">is Public?</label>
        </div>
        @if($codepen->user_id == auth()->id())
        <button class="rounded px-3 border border-purple-500 bg-purple-500 text-white text-sm save-btn" data-type="save">Save</button>
        @else
        <button class="rounded px-3 border border-purple-500 bg-purple-500 text-white text-sm save-btn" data-type="save-as">Save As</button>
        @endif
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/mode-html.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/mode-css.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/mode-javascript.js"></script>
    <script src="/assets/js/codepen/initEditor.js"></script>
    <script src="/assets/js/codepen/edit.js"></script>
</x-app-layout>