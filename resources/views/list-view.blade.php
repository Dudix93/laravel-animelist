<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

@inject('userTitleController', 'App\Http\Controllers\UserTitleController')
@inject('newEpAirDateController', 'App\Http\Controllers\NewEpAirDateController')

@if ( isset($_GET['unfollow']) && !Auth::guest())
  {{ $userTitleController->unfollow($_GET['unfollow']) }}
@endif

@if (sizeof($animes))
  <ul class="list-group">
    <li class="list-group-item">
      <div class="row font-weight-bold"">
        <div class="col-sm d-flex justify-content-center">TITLE</div>
        <div class="col-sm d-flex justify-content-center">GENRE(S)</div>
        <div class="col-sm d-flex justify-content-center">NEXT EPISODE</div>
        <div class="col-sm d-flex justify-content-center">UNFOLLOW</div>
      </div>
      @foreach ($animes as $anime)
        @if ($userTitleController->followed($anime->mal_id))
          <div class="row">
            <div class="col-sm">
              <a href="{{ route('anime-details', ['id' => $anime->mal_id]) }}">
                {{ $anime->title }}
              </a>
            </div>
            <div class="col-sm">
              {{ implode(', ',array_map(
                function($obj) {
                  return $obj->name;
                  }, $anime->genres)) }}
            </div>
            <div class="col-sm d-flex justify-content-center">
              @if ($anime->airing)
                {{ $newEpAirDateController->calculateDate($anime->broadcast) }}
              @else
                NONE
              @endif
            </div>
            <div class="col-sm d-flex justify-content-center">
              <form action="/" method="GET">
                <input type="hidden" value="{{ $anime->mal_id }}" name="unfollow"/>
                <button type="submit" class="btn btn-danger">                
                  <i class="material-icons">notifications_off</i>
                </button>
            </form>
            </div>
          </div>
        @endif
      @endforeach
    </li>
  </ul>
@endif