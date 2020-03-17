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
        return view('list-view', [
            'userId' => $this->userId,
            'titleIds' => DB::table('user_title')
                ->select('title_id')
                ->where('user_id', $this->userId)
                ->get(),
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
