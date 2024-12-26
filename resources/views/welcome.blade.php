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
</head>

<body>
    <div class="h-screen w-auto bg-violet-200">
        <nav class="flex justify-around py-4 font-sans font-bold bg-white md:bg-transparent">
            <a href="/" class="text-green-500 md:text-black">Kapampangan Vocabulary</a>
            <div class="">
                <a href="/" class="mr-6">How to Use</a>
                <a href="/" class="">Login</a>
            </div>
        </nav>
        <div class="flex flex-col items-center mt-24">
            <strong class="text-3xl mb-20 md:text-6xl md:mb-32 text-center">CAPAMPÁNGAN DICTIONARY</strong>
            <div class="text-center text-base md:text-lg font-serif mb-5">
                <p>Ring Cabaldugan da ring catayá na ning Amánung Sísuan quing English</p>
                <p>(English Definitions of words of the Capampángan Language)</p>
            </div>
            <input type="text" placeholder="Search" class="rounded h-8 w-1/2" style="text-align:center" />
        </div>
    </div>
    <div class="bg-red-200">
        This is where the definition is
    </div>
</body>

</html>
