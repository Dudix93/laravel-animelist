@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container">
        @if (!Auth::guest())
zalogowany
@else
gościu
@endif
        <form action="/" method="GET">
            <div class="form-group d-flex">
                <label style="width:10%; font-size:25;" for="sortBy">Sort by:</label>
                <select class="form-control" style="width:20%;" id="sortBy" name="sortBy">
                    <option id="sortByTitleAsc" value="asc">Title (A-Z)</option>
                    <option id="sortByTitleDesc" value="desc">Title (Z-A)</option>
                    <option id="sortByScore" value="score">Score</option>
                    <option id="sortByPopularity" value="popularity">Popularity</option>
                </select>
            </div>
            {{-- <div class="form-group">
                <label for="genres">Genres:</label>
                <select class="form-control" id="genres" name="genres">
                    <option>Default select</option>
                </select>
            </div> --}}
            <button type="submit" class="btn btn-info">Apply filters</button>
        </form>
        <div class="row justify-content-center">
            @foreach ($titles as $anime)
                @if (!$anime->r18)
                    @include('card', [
                        'anime' => $anime,
                    ])
                    @if ($loop->iteration % 3 === 0)
                        </div>    
                        <div class="row justify-content-center">
                    @endif
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection