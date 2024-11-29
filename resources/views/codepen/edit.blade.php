<x-app-layout>
    <div class="flex">
        <!-- Editor Containers -->
        <div class="flex code-panel" style="height: calc(100vh - 80px)">
            <div class="h-full flex flex-col min-w-96">
                <div>
                    <h3 class="text-xl font-semibold">HTML</h3>
                    <div id="html-editor" class="h-64 border rounded">{{ $codepen->content_html }}</div>
                </div>
                <div>
                    <h3 class="text-xl font-semibold">CSS</h3>
                    <div id="css-editor" class="h-64 border rounded">{{ $codepen->content_css }}</div>
                </div>
                <div>
                    <h3 class="text-xl font-semibold">JavaScript</h3>
                    <div id="js-editor" class="h-64 border rounded">{{ $codepen->content_js }}</div>
                </div>
                <input type="hidden" id="codepen_id" value="{{ $codepen->id }}">
            </div>
            <div class="splitter w-2 h-full bg-slate-300"></div> 
        </div>

        <!-- Output Container -->
        <iframe id="result" class="w-full border rounded bg-white h-[500px]"></iframe>
    </div>
    <div class="bg-white w-full h-8 flex justify-end py-1 px-4">
        <button class="rounded px-3 border border-purple-500 bg-purple-500 text-white text-sm" id="save-btn">Save</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/mode-html.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/mode-css.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/mode-javascript.js"></script>
    <script src="/assets/js/edit.js"></script>
</x-app-layout>
