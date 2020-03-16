<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserTitleController extends Controller
{
    public function index() {
        return view('list-view', [
            'userId' => DB::table('user_title')->where('id', 1)->value('user_id'),
            'titleId' => DB::table('user_title')->where('id', 1)->value('title_id'),
        ]);
    }
}
