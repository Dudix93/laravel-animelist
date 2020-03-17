{{-- @extends('layouts.app') --}}
<ul class="list-group">
  @foreach ($titleIds as $titleId)
    <li class="list-group-item">{{ $titleId->title_id }}</li>
  @endforeach
</ul>