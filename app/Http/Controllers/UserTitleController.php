<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserTitleController extends Controller
{
    private $userId;

    public function __construct()
    {
        $this->userId = Auth::id();
    }

    public function index() {
        $following = [];
        $url = 'https://api.jikan.moe/v3/anime/';
        $ids = DB::table('user_title')
            ->select('title_id')
            ->where('user_id', $this->userId)
            ->get();
        foreach ($ids as $id) {
            $res = APIController::getResource($url.$id->title_id);
            $anime = json_decode($res->getBody()->getContents());
            array_push($following, $anime);
        }
        return view('list-view', [
            'animes' => $following,
        ]);
    }

    public function follow($titleId) {
        DB::table('user_title')
        ->insert([
            'user_id' => $this->userId,
            'title_id' => $titleId,
        ]);
    }

    public function unfollow($titleId) {
        DB::table('user_title')
        ->where([
            ['user_id', '=' ,$this->userId],
            ['title_id', '=', $titleId],
        ])
        ->delete();
    }

    public function followed($titleId) {
        return DB::table('user_title')
            ->where([
                ['user_id', '=' ,$this->userId],
                ['title_id', '=', $titleId],
            ])
            ->exists();
    }
}
