<div class="relative mt-3 md:mt-0" x-data={isOpen:true} @click.away="isOpen =false" >
    <input @focus="isOpen=true"
    wire:model.debounce.500ms="search"
    type="text" class="bg-gray-800 text-sm rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline" placeholder="Search"
        @keydown="isOpen = true"
        @keydown.escape.window="isOpen = false"
        @keydown.shift.tab="isOpen = false"
        x-ref="search"
        @keydown.window="
            if (event.keyCode===191){
                event.preventDefault();
                $refs.search.focus();
            }
        "
    >
    <div class="absolute top-0">
        <svg class="fill-current w-4 text-gray-500 mt-2 ml-2" viewBox="0 0 24 24"><path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z"/></svg>
    </div>
    <div wire:loading class="spinner top-0 right-0 mr-4 mt-3"></div>
    @if (strlen($search)>2)
    <div
    class="absolute bg-gray-800 text-sm rounded w-64 mt-4 z-50"
    x-show="isOpen"
    x-transition.opacity
    >
        <ul>
            @if ($searchResults->count()>0)
                    @foreach ($searchResults as $movie )
                        <li class="border-b border-gray-700 px-2 py-2 font-sans text-bold  ">
                            <a href="{{ route('movies.show',$movie['id']) }}"
                            class="hover:bg-gray-500 transition ease-in-out
                            duration-150
                            flex items-center"
                            @if ($loop->last)
                                @keydown.tab="isOpen=false"
                            @endif
                            >
                                @if ($movie['poster_path'])
                                    <img src="https://image.tmdb.org/t/p/w92/{{ $movie['poster_path'] }}" alt="poster" class="w-6">
                                @else
                                    <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                                @endif

                                <span class="ml-4">{{ $movie['title'] }}</span>
                            </a>
                        </li>
                    @endforeach
            @else
            <li class="border-b border-gray-700 px-2 py-2 font-sans text-bold hover:bg-gray-500 transition ease-in-out duration-150 ">
                <span>No Results for {{ $search }}</span>
            </li>
            @endif
        </ul>
    </div>
    @endif

</div>
