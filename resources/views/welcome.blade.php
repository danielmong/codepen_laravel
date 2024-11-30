<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
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
            <div class="absolute backdrop-blur-lg rounded-2xl left-1/2 bottom-20 transform -translate-x-1/2 px-6 py-2 text-white border-2 font-black text-lg cursor-pointer hover:bg-blue-800">
                Coding is my life!
            </div>
        </div> 
    </body>
</html>