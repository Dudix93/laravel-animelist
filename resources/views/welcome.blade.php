@extends('layouts.app')

@section('content')
<div class="content">
    <form action="/" style="width:50%;" method="GET">
        <div class="form-group">
            <label for="sortBy">Sort by:</label>
            <select class="form-control" id="sortBy" name="sortBy">
                <option value="asc">Title (A-Z)</option>
                <option value="desc">Title (Z-A)</option>
                <option value="score">Score</option>
                <option value="popularity">Popularity</option>
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
    <div class="container">
        <div class="row">
            @foreach ($titles as $anime)
                @if (!$anime->r18)
                    @include('card', [
                        'anime' => $anime,
                    ])
                    @if ($loop->iteration % 3 === 0)
                        </div>    
                        <div class="row">
                    @endif
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection