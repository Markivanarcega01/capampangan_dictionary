@extends('mainlayout')
@section('content')
    <div class="shared-bg h-screen w-auto">
        <div class="flex flex-col items-center mt-24">
            <strong class="text-3xl mb-20 md:text-6xl md:mb-32 text-center">CAPAMPÁNGAN DICTIONARY</strong>
            <div class="text-center text-base md:text-lg font-serif mb-5">
                <p>Ring Cabaldugan da ring catayá na ning Amánung Sísuan quing English</p>
                <p>(English Definitions of words of the Capampángan Language)</p>
            </div>
            {{-- <input type="text" placeholder="Search" class="rounded h-8 w-1/2" style="text-align:center" id="search"/>
            <button class="searchButton bg-slate-200 rounded p-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
                </svg>
            </button> --}}
            <div class="flex flex-row w-1/2 items-center">
                <input type="search" id="search" class="block w-full h-10 p-4 text-sm rounded text-center" placeholder="Type here to search"/>
                <button class="searchButton p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 text-gray-500"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div class="bg-white font-bold text-center py-10 text-lg">
        <p>BROWSE DICTIONARY</p>
        @php
            $alphabets = range('A', 'Z');
        @endphp

        @foreach ($alphabets as $alphabet)
            <input type="text" class="alphabet" hidden value="{{$alphabet}}">
            <button class="ClickButton bg-lime-600 text-white rounded-full px-3 py-1">{{$alphabet}}</button>
        @endforeach
    </div>
    <footer class="font-sans text-right">
        Capampángan Dictionary © 2018
    </footer>
@endsection

@section('javascript')
<script>
    $(document).on("keypress", function (e) {
        if(e.which == 13){
            let searchValue = $("#search").val()
            if(searchValue == "") return
            $.ajax({
                type: "POST",
                url: "/",
                data: {
                    _token: '{{csrf_token()}}',
                    search: searchValue,
                },
                success: function (response) {
                    console.log(response)
                },
                error: function (error) {
                    console.log(error)
                }
            });
        }
    })

    $(".searchButton").on("click", function () {
        let searchValue = $("#search").val()
        if(searchValue == "") return
        $.ajax({
            type: "POST",
            url: "/",
            data: {
                _token: '{{csrf_token()}}',
                search: searchValue,
            },
            success: function (response) {
                console.log(response)
            },
            error: function (error) {
                console.log(error)
            }
        });
    })

    //The Alphabet buttons at the bottom
    $(".ClickButton").each(function (indexInArray, valueOfElement) {
        $(valueOfElement).on("click", function () {
            let alphabetValue = $(".alphabet")[indexInArray]
            $.ajax({
                type: "POST",
                url: "/",
                data: {
                    _token: '{{csrf_token()}}',
                    search: $(alphabetValue).val(),
                },
                success: function (response) {
                    console.log(response)
                },
                error: function (error) {
                    console.log(error)
                }
            });
        })
    });

</script>
@endsection
