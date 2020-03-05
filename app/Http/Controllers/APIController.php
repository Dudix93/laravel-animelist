<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIController extends Controller
{
    public function index() {
        $page_name = 'dodo123';
        $client = new \GuzzleHttp\Client([
            'verify' => false,
        ]);
        $res = $client->request('GET', 'https://api.jikan.moe/v3/anime/200', [
            'content-type' => 'application/vnd.api+json',
            // 'access' => 'application/vnd.api+json'
        ]);
        dd($res->getBody()->getContents());
        return view('welcome', ['page_name' => $page_name]);
    }
}
