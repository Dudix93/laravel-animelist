<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIController extends Controller
{
    public static function getResource($url) {
        if (isset($url)) {
            $client = new \GuzzleHttp\Client([
                'verify' => false,
            ]);
            $res = $client->request('GET', $url, [
                'content-type' => 'application/vnd.api+json',
                'access' => 'application/vnd.api+json'
            ]);
            return $res->getStatusCode() === 404 ? abort(404) : $res;
        }
        return false;
    }
}
