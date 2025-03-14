@extends('mainlayout')
@section('content')
    <div class="mt-8 flex flex-col w-11/12 place-self-center">
        <button class="p-2 bg-green-500 rounded text-white w-fit min-w-fit self-end">Add Dictionary</button>
        <div class="table w-full border  mt-2">
            <div class="table-header-group bg-slate-100">
                <div class="table-row text-left">
                    <div class="table-cell">Id</div>
                    <div class="table-cell">Word</div>
                    <div class="table-cell">Pronounciation</div>
                    <div class="table-cell">Origin</div>
                    <div class="table-cell">Part of Speech</div>
                    <div class="table-cell">Synonyms</div>
                    <div class="table-cell">Antonyms</div>
                    <div class="table-cell">See Also</div>
                    <div class="table-cell">Actions</div>
                </div>
            </div>
            <div class="table-row-group">
                @if ($dictionary != null)
                    @foreach ($dictionary as $column)
                        <div class="table-row">
                            <div class="table-cell border-r-2 border-b-2 ">{{$column->id}}</div>
                            <div class="table-cell border-r-2 border-b-2">{{$column->Word}}</div>
                            <div class="table-cell border-r-2 border-b-2">{{$column->Pronounciation}}</div>
                            <div class="table-cell border-r-2 border-b-2">{{$column->Origin}}</div>
                            <div class="table-cell border-r-2 border-b-2">{{$column->PartofSpeech}}</div>
                            <div class="table-cell border-r-2 border-b-2 overflow-visible text-clip max-w-64">{{$column->Synonyms}}</div>
                            <div class="table-cell border-r-2 border-b-2 overflow-visible text-clip max-w-64">{{$column->Antonyms}}</div>
                            <div class="table-cell border-r-2 border-b-2 overflow-visible text-clip max-w-64">{{$column->SeeAlso}}</div>
                            <div class="table-cell border-r-2 border-b-2 text-white place-content-center">
                                <button class="px-2 bg-blue-500 rounded w-fit">Edit</button>
                                <button class="px-2 bg-red-500 rounded w-fit">Delete</button>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        {{-- Pagination --}}
        {{-- <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
            <div class="flex flex-1 justify-between sm:hidden">
              <a href="#" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
              <a href="#" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
            </div>
            <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
              <div>
                <p class="text-sm text-gray-700">
                  Showing
                  <span class="font-medium">1</span>
                  to
                  <span class="font-medium">10</span>
                  of
                  <span class="font-medium">97</span>
                  results
                </p>
              </div>
              <div>
                <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                  <a href="#" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                    <span class="sr-only">Previous</span>
                    <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                      <path fill-rule="evenodd" d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                    </svg>
                  </a>
                  <!-- Current: "z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600", Default: "text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0" -->
                  <a href="#" aria-current="page" class="relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">1</a>
                  <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">2</a>
                  <a href="#" class="relative hidden items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">3</a>
                  <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 ring-1 ring-inset ring-gray-300 focus:outline-offset-0">...</span>
                  <a href="#" class="relative hidden items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">8</a>
                  <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">9</a>
                  <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">10</a>
                  <a href="#" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                    <span class="sr-only">Next</span>
                    <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                      <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                    </svg>
                  </a>
                </nav>
              </div>
            </div>
          </div> --}}
        <div class="mt-2">
            @if ($dictionary != null)
                {{$dictionary}}
            @endif
        </div>
    </div>

@endsection

@section('javascript')

@endsection
