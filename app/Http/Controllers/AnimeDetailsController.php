<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimeDetailsController extends Controller
{
    public function index($id) {
        $url = 'https://api.jikan.moe/v3/anime/'.$id;
        $res = APIController::getResource($url);
        $anime = json_decode($res->getBody()->getContents());
        return view('anime-details', [
            'anime' => $anime,
        ]);
    }
}
