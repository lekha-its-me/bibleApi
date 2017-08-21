<?php

namespace App\Http\Controllers;
use DB;
use Response;

use Illuminate\Http\Request;

use GuzzleHttp\Exception\GuzzleException;

use GuzzleHttp\Client as Client;
use GuzzleHttp\Exception\RequestException;

class MainController extends Controller
{
    public function index()
    {
//        try{
//            // Create a client with a base URI
//            $client = new Client();
//            // Send a request to https://foo.com/api/test
//            $response = $client->get('https://bible.lekha.pp.ua/?book=01O&passage=9:4-19');
//
//            $content = json_decode($response->getBody());
//            //$content = '1113';
//
//            return view('main.index')->with(compact('content'));
//        }
//        catch (RequestException $re)
//        {
//            $content = $re;
//            return view('main.index')->with(compact('content'));
//        }
        return view('main.index');
    }

    public function old()
    {
        date_default_timezone_set('Europe/Kiev');
        $today = date("Y-m-d");
        $verse = DB::table('old_schedule')->where("date","=", $today)->get();

        $content = json_decode($verse);

        if($content[0]->passage != "")
        {
            $book = $content[0]->book;
            $passage = $content[0]->passage;

            try{
                $client = new Client();
                $response = $client->request('GET', 'https://bible.lekha.pp.ua/', [
                    'query' =>
                        [
                            'book' => $book,
                            'passage' => $passage
                        ]
                ]);
                $content = json_decode($response->getBody());
                return Response::json($content);
            }
            catch (RequestException $re)
            {
                $content = $re;
                return Response::json($content);
            }
        }
        else
        {
            $book = $content[0]->book;
            $chapter = $content[0]->chapter;
            //$verse_number = $content[0]->verse;

            try{
                $client = new Client();

                $response = $client->request('GET', 'https://bible.lekha.pp.ua/', [
                    'query' =>
                        [
                            'book' => $book,
                            'chapter' => $chapter
                        ]
                ]);
                $content = json_decode($response->getBody());
                return Response::json($content);

            }
            catch (RequestException $re)
            {
                $content = $re;
                return Response::json($content);
            }
        }
    }

    public function newTestament()
    {
        date_default_timezone_set('Europe/Kiev');
        $today = date("Y-m-d");
        $verse = DB::table('new_schedule')->where("date","=", $today)->get();

        $content = json_decode($verse);
        if($content[0]->passage != "")
        {
            $book = $content[0]->book;
            $passage = $content[0]->passage;

            try{
                $client = new Client();
                $response = $client->request('GET', 'https://bible.lekha.pp.ua/', [
                    'query' =>
                        [
                            'book' => $book,
                            'passage' => $passage
                        ]
                ]);
                $content = json_decode($response->getBody());
                return Response::json($content);
            }
            catch (RequestException $re)
            {
                $content = $re;
                return Response::json($content);
            }
        }
        else
        {
            $book = $content[0]->book;
            $chapter = $content[0]->chapter;
            //$verse_number = $content[0]->verse;

            try{
                $client = new Client();
                $response = $client->request('GET', 'https://bible.lekha.pp.ua/', [
                    'query' =>
                        [
                            'book' => $book,
                            'chapter' => $chapter
                        ]
                ]);
                $content = json_decode($response->getBody());
                return Response::json($content);
            }
            catch (RequestException $re)
            {
                $content = $re;
                return Response::json($content);
            }
        }
    }

    public function verse()
    {
        date_default_timezone_set('Europe/Kiev');
        $today = date("Y-m-d");
        $verse = DB::table('verse')->where("date","=", $today)->get();

        $content = json_decode($verse);

        $book = $content[0]->book;
        $chapter = $content[0]->chapter;
        $verse_number = $content[0]->verse;

        try{
            $client = new Client();
            $response = $client->request('GET', 'https://bible.lekha.pp.ua/', [
                'query' =>
                    [
                        'book' => $book,
                        'chapter' => $chapter,
                        'verse' => $verse_number
                    ]
            ]);
            $content = json_decode($response->getBody());
            return Response::json($content);
        }
        catch (RequestException $re)
        {
            $content = $re;
            return Response::json($content);
        }
    }
}