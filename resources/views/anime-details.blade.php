@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container w-70">
        <div class="d-flex flex-row">
            <div class="d-flex flex-column">
                <div class="p-2"><img src={{ $anime->image_url }}></div>
                <div class="p-2">Status:
                    @if (NULL === $anime->status)
                    N/A
                    @else
                    {{ $anime->status }}
                    @endif
                </div>
                <div class="p-2">Score: 
                    @if (NULL === $anime->score)
                    N/A
                    @else
                    {{ $anime->score }}
                    @endif
                </div>
            </div>
            <div class="d-flex flex-column">
                <div class="p-2" style="font-size:30px;">{{ $anime->title }}</div>
                    @if (NULL === $anime->synopsis)
                    <div class="p-2">N/A</div>
                    @else
                    <div class="p-2 text-justify">{{ $anime->synopsis }}</div>
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection