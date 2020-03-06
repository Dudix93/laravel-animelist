@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container">
        <div class="row">
            @foreach ($titles->anime as $anime)
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