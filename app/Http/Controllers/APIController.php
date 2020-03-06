<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIController extends Controller
{
    public function index() {
        $page_name = 'dodo123';
        // $url = 'https://jsonplaceholder.typicode.com/todos';
        $url = 'https://api.jikan.moe/v3/season/2020/winter';
        $client = new \GuzzleHttp\Client([
            'verify' => false,
        ]);
        $res = $client->request('GET', $url, [
            'content-type' => 'application/vnd.api+json',
            'access' => 'application/vnd.api+json'
        ]);
        // dd(json_decode($res->getBody()->getContents()));
        return view('welcome', [
            'page_name' => $page_name,
            'titles' => json_decode($res->getBody()->getContents())
        ]);
    }
}
