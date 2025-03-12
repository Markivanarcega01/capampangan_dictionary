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
                <input type="search" id="search" class="block w-full h-10 p-4 text-sm rounded text-center" placeholder="Type here to search" autocomplete="off"/>
                <button class="searchButton p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 text-gray-500"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
                    </svg>
                </button>
            </div>
            <div class="dropdown-menu w-1/2 text-left" id="dropdown-menu">
            </div>
        </div>
    </div>
    <div class="bg-white font-bold text-center py-10 text-lg" id="alphabet">
        <p>BROWSE DICTIONARY</p>
        @php
            $alphabets = range('A', 'Z');
        @endphp

        @foreach ($alphabets as $alphabet)
            <input type="text" class="alphabet" hidden value="{{$alphabet}}">
            <button class="ClickButton bg-lime-600 text-white rounded-full px-3 py-1">{{$alphabet}}</button>
        @endforeach
    </div>
    <div class="bg-slate-100 w-2/3 h-fit flex-col self-center gap-2 p-2 text-lg hidden" id="results"></div>
    <div class="mt-2 w-full bg-green-200" id="paginate"></div>

    <footer class="font-sans text-right">
        Capampángan Dictionary © 2018
    </footer>
@endsection

@section('javascript')
<script>
    let currentIndex = -1
    let pageNumber = 1;
    let divList = $('#dropdown-menu')
    let divResults = $('#results')
    let paginate = $('#paginate')

    function updateActiveItem(items) {
        items.each((index, item) => {
            item.classList.toggle('bg-white', index === currentIndex);
        });
    }

    function displaySearchResult(element){
        let hiddenColumns = [
            'Definition2',
            'Definition3',
            'Definition4',
            'Definition5',
            'Definition6',
            'Definition7',
            'Definition8',
            'Definition9',
            'Definition10',
            'Definition11',
            'Definition12',
            'Definition13',
            'Definition14',
            'Definition15',
            'Definition16',
            'Definition17',
        ]


        if(element){
            let divChild = document.createElement('div')
            let hr = document.createElement('hr')
            hr.style.cssText = `
               height:2px;
               border-width:0;
               color:gray;
               background-color:gray
            `
            for (let key in element) {
                if(element[key] != ''){
                    if(key == 'Definition1'){
                        divChild.innerHTML += `<span class="text-red-500 font-bold">Definition</span>: ${element[key]}<br>`
                    }else if(hiddenColumns.includes(key)){
                        divChild.innerHTML += `: ${element[key]}<br>`
                    }else if(key == 'id'){
                        continue;
                    }else{
                        divChild.innerHTML += `<span class="text-red-500 font-bold">${key}</span>: ${element[key]}<br>`
                    }
                }
            }
            divResults.css('display', 'block')
            divChild.style.cssText = `
                padding-top: 10px;
                padding-bottom: 10px;
            `
            divResults.append(divChild)
            divResults.append(hr)
        }

    }

    //Input listener
    $("#search").on('input', function(event){
        divList.empty()
        let searchValue = $('#search').val()
        $.ajax({
            type:"POST",
            url:"/filter",
            data:{
                _token: '{{csrf_token()}}',
                search: searchValue,
                action: 'searchField',
            },
            success: function(response){
                //console.log(response)
                for(let i =0; i<response.data.data.length; i++){
                    let divChild = document.createElement("DIV")
                    divChild.style.cssText = `
                        width: 95%;
                        padding-left: 6px;
                        border-radius: 2px;
                    `
                    divChild.innerText = response.data.data[i].Word
                    divList.append(divChild)
                }
            },
            error: function(error){
                console.log(error)
            }
        })

        if(searchValue == ""){
            divList.css('display', 'none')
        }else{
            divList.css('display', 'block')
        }
    })

    //Arrow Up and down
    $('#search').on('keyup', (e)=>{
        const items = $('div#dropdown-menu div') || null
        if(items){
            if (e.key === 'ArrowDown') {
                e.preventDefault();
                currentIndex = (currentIndex + 1) % items.length;
                updateActiveItem(items);
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                currentIndex = (currentIndex - 1 + items.length) % items.length;
                updateActiveItem(items);
            } else if (e.key === 'Enter' && currentIndex > -1) {
                e.preventDefault();
                $('#search').val(items[currentIndex].textContent);
                divList.css('display', 'none')
                currentIndex = -1;
                //Add an ajax post request here to search the selected word
            }
        }
        if(e.key === "Enter" && $('#search').val() != ""){

            let searchValue = $('#search').val()
            $.ajax({
                type:"POST",
                url:"/search",
                data:{
                    _token: '{{csrf_token()}}',
                    search: searchValue,
                },
                success: function(response){
                    divResults.empty()
                    console.log("search",response)

                    let countOfResults = document.createElement('div')
                    countOfResults.innerHTML = `Found <b>${response.data.total}</b> results`
                    divResults.append(countOfResults)

                    //Provides the value to be displayed in the #results div
                    for(let i = 0; i<response.data.data.length; i++){
                        displaySearchResult(response.data.data[i])
                    }
                    //paginate.innerText = `${response.data}`


                    const targetElement = document.getElementById('alphabet');
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                },
                error: function(error){
                    console.log(error)
                }
            })

        }
    })

    //Selecting using mouse in suggestions
    divList.on('click', (e)=>{
        if(e.target && e.target.nodeName === 'DIV'){
            $('#search').val(e.target.textContent)
            divList.css('display', 'none')
            currentIndex = -1
        }
    })

    //Search button is clicked
    $(".searchButton").on("click", function () {
        let searchValue = $("#search").val()
        if(searchValue == "") return
        $.ajax({
            type: "POST",
            url: "/search",
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

            function fetchResults(){
                $.ajax({
                    type: "POST",
                    url: `/filter?page=${pageNumber}`,
                    data: {
                        _token: '{{csrf_token()}}',
                        search: $(alphabetValue).val(),
                        action: 'button',
                    },
                    success: function (response) {
                        paginate.empty();
                        console.log(response)
                        divResults.empty()

                        let countOfResults = document.createElement('div')
                        countOfResults.innerHTML = `Found <b>${response.data.total}</b> results`
                        divResults.append(countOfResults)

                        for(let i = 0; i<response.data.data.length; i++){
                            displaySearchResult(response.data.data[i])
                        }

                        // Create pagination buttons dynamically
                        if (response.data.last_page > 1) {

                            for (let i = 1; i <= response.data.last_page; i++) {
                                let pager = document.createElement('button');
                                pager.style.cssText = `padding: 10px; font-weight: bold; margin: 5px;`;
                                pager.innerText = i;
                                pager.onclick = function () {
                                    pageNumber = i; // Update global pageNumber
                                    fetchResults(pageNumber); // Fetch new results
                                };
                                paginate.append(pager);
                            }
                        }

                        const targetElement = document.getElementById('alphabet');
                        targetElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    },
                    error: function (error) {
                        console.log(error)
                    }
                });
            }

            fetchResults()
        })
    });

</script>
@endsection
