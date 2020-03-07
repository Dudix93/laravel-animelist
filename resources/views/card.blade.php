{{-- @extends('layouts.app') --}}
<div class="card" style="width: 18rem; margin:10px">
    <img class="card-img-top" style="height: 300px" src = {{ $anime->image_url}} alt = {{ $anime->title }}>
        <div class="card-body">
            <h5 class="card-title">{{ $anime->title }}</h5>
            <p class="card-text">
                <ul>
                <li>"Score: " {{$anime->score}}</li>
                <li>"Popularity: " {{$anime->members}}</li>
                </ul>
            </p>
            {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
        </div>
</div>