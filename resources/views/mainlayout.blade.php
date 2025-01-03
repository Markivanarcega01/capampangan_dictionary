<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kapampangan Vocabulary</title>

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</head>

<body class="flex flex-col">
    <nav class="navbar shared-bg flex justify-around py-4 font-sans font-bold sticky top-0 transition duration-500">
        <a href="/" class="title-text text-black transition duration-500 self-center">Kapampangan Vocabulary</a>
        <div class="">
            <a href="/" class="mr-6 text-black transition duration-500">How to Use</a>
            {{-- <a href="/" class="text-black hover:text-white transition duration-500"> --}}
                @if ($isAdmin)
                <div class="relative inline-block text-left">
                    <div>
                      <button type="button" class="dropdown-btn inline-flex w-full justify-center rounded-md bg-transparent px-3 py-2 gap-x-1.5 font-bold text-black" id="menu-button" aria-expanded="true" aria-haspopup="true">
                        Ivan
                        <svg class="-mr-1 size-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                          <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>
                      </button>
                    </div>

                    <div class="hidden dropdown absolute right-0 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button">
                      <div class="py-1" role="none">
                        <!-- Active: "bg-gray-100 text-gray-900 outline-none", Not Active: "text-gray-700" -->
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-item-0">Account settings</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-item-1">Support</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-item-2">License</a>
                        <form method="POST" action="#" role="none">
                          <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-item-3">Sign out</button>
                        </form>
                      </div>
                    </div>
                </div>

                @else
                    <a href="">Login</a>
                @endif
            {{-- </a> --}}
        </div>
    </nav>
    @yield('content')
    @yield('javascript')
</body>
<script>
    let isFullScreen = true
        $(window).on("resize", function () {
            if($(window).width() < 768){
                $(".navbar").removeClass('bg-violet-200').addClass("bg-white")
                $(".title-text").removeClass('text-black').addClass("text-green-500")
                isFullScreen = false
            }else{
                $(".navbar").removeClass("bg-white").addClass("bg-violet-200")
                $(".title-text").removeClass("text-green-500").addClass("text-black")
                isFullScreen = true
            }
        })
        $(window).on("scroll", function () {
            if(isFullScreen){
                if($(window).scrollTop() > 50){
                    console.log('fullscreen')
                    $(".navbar").removeClass('bg-violet-200').addClass("bg-white")
                    $(".title-text").removeClass('text-black').addClass("text-green-500")
                }else{
                    $(".navbar").removeClass("bg-white").addClass("bg-violet-200")
                    $(".title-text").removeClass("text-green-500").addClass("text-black")
                }
            }else{
                console.log('not fullscreen')
            }
        })

    $(document).ready(function(){
        $('.shared-bg').addClass('bg-violet-200')
    })

    $('.dropdown-btn').on('click', function(){
        $('.dropdown').toggleClass('hidden', 'block')
    })
</script>
</html>
