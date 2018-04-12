<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class DataController extends Controller
{
    public function index()
    {
        $client = new Client();

        $res = $client->get('http://phisix-api3.appspot.com/stocks.json');

        $data = json_decode($res->getBody()->getContents())->stock;

        return response()->json($data);
    }
}
