@extends('layouts.app')

@inject('userTitleController', 'App\Http\Controllers\UserTitleController')

@section('content')
@if ( isset($_GET['following']) && !Auth::guest())
    @switch($_GET['following'])
        @case('true')
            @if (!$userTitleController->followed($anime->mal_id))
                {{ $userTitleController->follow($anime->mal_id) }}    
            @endif
            @break
        @case('false')
            {{ $userTitleController->unfollow($anime->mal_id) }}
            @break
    @endswitch
@endif
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
                <div class="p-2" style="font-size:30px;">
                    {{ $anime->title }}
                    @if (!Auth::guest())
                        <form action="/anime/{{ $anime->mal_id }}" method="GET">
                            @if ($userTitleController->followed($anime->mal_id))
                                <input type="hidden" value="false" name="following"/>
                                <button type="submit" class="btn btn-danger">Unfollow</button>
                            @else
                                <input type="hidden" value="true" name="following"/>
                                <button type="submit" class="btn btn-primary">Follow</button>
                            @endif
                        </form>
                    @endif
                </div>
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