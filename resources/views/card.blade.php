{{-- @extends('layouts.app') --}}
<div class="card" style="width: 18rem; margin:10px">
    <a href="{{ route('anime-details', ['id' => $anime->mal_id]) }}">
    <img class="card-img-top" style="height: 300px" src = {{ $anime->image_url}} alt = {{ $anime->title }}>
    </a>
        <div class="card-body">
            <h5 class="card-title">{{ $anime->title }}</h5>
        </div>
</div>