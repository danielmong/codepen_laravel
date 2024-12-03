<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/css/notify/index.var.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
    <script src="/assets/js/notify/index.var.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="h-screen w-full overflow-auto relative bg-cover" style="background-image: url(/assets/images/bg.jpg)">
        <div class="w-full flex items-center justify-between px-12 py-10">
            <a href="/" class="">
                <span class="font-black text-3xl cursor-pointer text-white">EditNow</span>
            </a>
            <div class="">
                @auth()
                <a href="{{ route('codepenlist') }}" class="mx-1">
                    <button class="font-semibold text-white rounded-xl border-2 px-4 py-1 hover:bg-blue-700 transition duration-200">
                        Go To Codepen List
                    </button>
                </a>
                @else
                <a href="{{ route('login') }}" class="mx-1">
                    <button class="font-semibold text-white rounded-xl border-2 px-4 py-1 hover:bg-blue-700 transition duration-200">
                        Login
                    </button>
                </a>
                <a href="{{ route('register') }}">
                    <button class="font-semibold text-white rounded-xl border-2 px-4 py-1 hover:bg-blue-700 transition duration-200">
                        Register
                    </button>
                </a>
                @endif
            </div>
        </div>
        <div class="my-32 mx-16">
            <div class="font-black text-4xl md:text-5xl lg:text-6xl xl:text-7xl text-white text-center my-4">Practice Your Code Easily</div>
        </div>
        <div class="absolute rounded-2xl left-1/2 bottom-20 transform -translate-x-1/2 px-6 py-2 text-white font-semibold text-lg cursor-pointer">
            <div class="animate-bounce" id="go_to_down">
                <span class="mr-1">
                    <i class="fa fa-arrow-down"></i>
                </span>
                See some Examples
            </div>
        </div>
    </div>
    <div class="flex w-full bg-slate-100 py-12" id="list">
        <div class="container mx-auto">
            @foreach($randomRows as $codepen)
            <div class="my-2 hover:shadow-md rounded px-12 py-6 bg-white cursor-pointer preview-btn" data-id="{{ $codepen->id }}">
                <div class="text-black">
                    <span class="text-lg font-semibold italic">
                        "{{ $codepen->title }}"
                    </span>
                    <span class="text-sm">
                        by
                    </span>
                    <span class="text-sm underline">
                        {{ $codepen->user->name }}
                    </span>
                </div>
                <p class="mt-1 indent-1">{{ $codepen->description }}</p>
            </div>
            @endforeach
        </div>
    </div>

    <div class="modal hidden w-full h-screen fixed top-0 bg-black/80 transition-all duration-300 py-[5%]">

        <div class="w-[80%] h-full bg-white mx-auto align-middle rounded relative">
            <div class="absolute right-2 top-2 flex">
                <!-- <button class="rounded-full border mr-2 border-purple-500 text-purple-500 hover:text-white px-4 py-2 flex items-center hover:bg-purple-600 cursor-pointer shadow-md copy" href="{{ route('codepenlist.create') }}">
                    <i class="fa fa-copy"></i>
                    <span class="text-sm ml-2">Make a Copy</span>
                </button> -->
                <button class="rounded-full border border-purple-500 text-purple-500 hover:text-white px-4 py-2 flex items-center hover:bg-purple-600 cursor-pointer shadow-md close" href="{{ route('codepenlist.create') }}">
                    <i class="fa fa-close"></i>
                    <span class="text-sm ml-2">Close</span>
                </button>
            </div>
            <iframe class="w-full h-full" id="preview"></iframe>
        </div>
    </div>

    <script src="/assets/js/codepen/list.js"></script>
    <script>
        $("#go_to_down").click(function() {
            $('html, body').animate({
                scrollTop: $('#list').offset().top
            }, 1000); // Duration in milliseconds
        })
    </script>
</body>

</html>