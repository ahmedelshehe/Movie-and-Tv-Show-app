@extends('layouts.main')
@section('content')
	<div class="container mx-auto px-4 pt-16">
        <div class="popular-tvshows">
            <h2 class="uppercase tracking-wider  text-lg font-semibold text-green-600	">Popular Tv Shows</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @foreach ($popularTv as $tvshow )
            	<x-tv-card :tvshow='$tvshow'/>	 
            @endforeach
        </div>
        <br><hr class="bg-gray-800">
        <div class="top-rated-tvshows">
            <h2 class="uppercase tracking-wider  text-lg font-semibold text-green-600	">Top Rated Tv Shows</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @foreach ($topRatedTv as $tvshow )
            	<x-tv-card :tvshow='$tvshow'/>	 
            @endforeach
        </div>
        
    </div>
    
@endsection