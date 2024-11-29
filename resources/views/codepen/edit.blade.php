<x-app-layout>
    <div id="main-container" class="flex w-full m-0 relative" style="height: calc(100vh - 98px)">
        <input type="hidden" id="codepen_id" value="{{ $codepen->id }}">
        <!-- Editor Containers -->
        <div id="container-left" class="w-[450px] h-full flex flex-col">
            <div class="px-2 h-8 flex items-center justify-between">
                <span class="font-semibold text-md text-black">HTML</span>
            </div>
            <div id="html-editor" class="h-64 border rounded">{{ $codepen->content_html }}</div>
            <div class="px-2 h-8 flex items-center justify-between cursor-row-resize handler">
                <span class="font-semibold text-md text-black">CSS</span>
            </div>
            <div id="css-editor" class="h-64 border rounded">{{ $codepen->content_css }}</div>
            <div class="px-2 h-8 flex items-center justify-between cursor-row-resize handler">
                <span class="font-semibold text-md text-black">JS</span>
            </div>
            <div id="js-editor" class="h-64 border rounded">{{ $codepen->content_js }}</div>
        </div>
        <div id="container-right" class="h-full flex-1">
            <iframe id="result" class="w-full h-full border rounded bg-white"></iframe>
        </div>
    </div>
    <div class="bg-white w-full h-8 flex justify-end py-1 px-4 items-center">
        <input type="text" id="title" class="border outline-none rounded px-2 py-1 text-sm w-60" placeholder="Title of Code" value="{{ $codepen->title }}" {{ $codepen->user_id != auth()->id() ? 'readonly' : '' }} />
        <input type="text" id="desc" class="border outline-none rounded px-2 py-1 text-sm flex-1 ml-2" placeholder="Description of Code" value="{{ $codepen->description }}" {{ $codepen->user_id != auth()->id() ? 'readonly' : '' }} />
        <div class="flex items-center mx-2">
            <input type="checkbox" id="is_public"  {{ $codepen->status == "public" ? 'checked' : '' }} {{ $codepen->user_id != auth()->id() ? 'disabled' : '' }}/>
            <label for="is_public" class="text-sm ml-1">is Public?</label>
        </div>
        @if($codepen->user_id == auth()->id())
        <button class="rounded px-3 border border-purple-500 bg-purple-500 text-white text-sm" id="save-btn">Save</button>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/mode-html.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/mode-css.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/mode-javascript.js"></script>
    <script src="/assets/js/codepen/initEditor.js"></script>
    <script src="/assets/js/codepen/edit.js"></script>
</x-app-layout>
