<?php

namespace App\Http\Controllers;

use App\Http\Controllers\APIController;

class WelcomeController extends Controller
{
    public function index() {
        echo "<script>
        function focusSelectedFilterChoice(filterId) {
            document.addEventListener('DOMContentLoaded', function(){
                document.getElementById(filterId).setAttribute('selected', true);
                console.log('sortbytitle');
              });
        }
        </script>";
        
        $url = 'https://api.jikan.moe/v3/season/2020/winter';
        // $genresUrl = 'https://api.jikan.moe/v3/genre/anime/';
        $res = APIController::getResource($url);
        $titles = collect(json_decode($res->getBody()->getContents())->anime);
        // $genres = [];

        // for($i=1; $i<=34; $i++) {
        //     $genreUrl = json_decode(APIController::getResource($genresUrl.$i.'/1')
        //     ->getBody()
        //     ->getContents())
        //         ->mal_url
        //         ->url;
        //     $genreUrl = explode('/', $genreUrl);
        //     array_push($genres, $genreUrl[sizeof($genreUrl)-1]);
        // }
        // dd($genres);
        if (isset($_GET['sortBy'])) {
            switch($_GET['sortBy']) {
                case 'asc':
                    $titles = $titles->sortBy('title');
                    echo "<script>focusSelectedFilterChoice('sortByTitleAsc');</script>";
                    break;
                case 'desc':
                    $titles = $titles->sortByDesc('title');
                    echo "<script>focusSelectedFilterChoice('sortByTitleDesc');</script>";
                    break;
                case 'score':
                    $titles = $titles->sortByDesc('score');
                    echo "<script>focusSelectedFilterChoice('sortByScore');</script>";
                    break;
                case 'popularity':
                    $titles = $titles->sortByDesc('members');
                    echo "<script>focusSelectedFilterChoice('sortByPopularity');</script>";
                    break;
                default:
                    break;
            }
        }

        return view('welcome', [
            'titles' => $titles,
        ]);
    }
}
