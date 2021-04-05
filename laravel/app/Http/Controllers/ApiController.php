<?php

namespace App\Http\Controllers;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;

class ApiController extends Controller
{
    public function index()
    {

        try {
            $url = config('newsapi.news_api_url') . "top-headlines?country=jp&category=business&apiKey=" . config('newsapi.news_api_key');
            $method = "GET";
            $count = 15;

            $client = new Client();
            $response = $client->request($method, $url);

            $results = $response->getBody();
            $articles = json_decode($results, true);

            $news = [];

            for ($id = 0; $id < $count; $id++) {
                array_push($news, [
                    'name' => $articles['articles'][$id]['title'],
                    'url' => $articles['articles'][$id]['url'],
                    'thumbnail' => $articles['articles'][$id]['urlToImage'],
                ]);
            }
        } catch (RequestException $e) {
            echo Psr7\Message::toString($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\Message::toString($e->getResponse());
            }
        }
        return view('index', compact('news'));
    }
}
