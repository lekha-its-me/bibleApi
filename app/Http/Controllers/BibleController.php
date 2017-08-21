<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

use Response;

class BibleController extends Controller
{
    public function showVerse()
    {
        date_default_timezone_set('Europe/Kiev');
        $today = date("Y-m-d");
        if(isset($_GET['passage']))
        {
            $book = $_GET['book'];
            $passage = explode(":", $_GET['passage']);
            $begin_chapter = (int) $passage[0];
            $end = explode("-", $passage[1]);

            //$begin_chapter = (int) $begin[0];
            $begin_verse = (int) $end[0];
            $end_verse = (int) $end[1];

            //$verse = DB::table('bible')->where("book","=", $book)->where("chapter", ">", $begin_chapter)->where("chapter", "<", $end_chapter)->get();
            //$verse = DB::table('bible')->where("book","=", $book)->whereBetween("chapter", [$begin_chapter, $end_chapter])->get();
            $verse = DB::table('bible')->select('chapter', 'verse_number', 'verse')->
            where("book","=", $book)->
            where("chapter",     "=", $begin_chapter)->
            where("verse_number", ">=", $begin_verse)->
            where("verse_number", "<=", $end_verse)->
            get();

            return Response::json(array(
                'error' => false,
                'status_code' => 200,
                'date' => $today,
                'book' => $this->checkBook($book),
                'data' => $verse
            ));
        }
        else if(isset($_GET['book'])&&isset($_GET['chapter'])&&isset($_GET['verse']))
        {
            $book = $_GET['book'];
            $chapter = $_GET['chapter'];
            $verse = $_GET['verse'];

            $verse = DB::table('bible')->select('chapter', 'verse_number', 'verse')->where("book","=", $book)->where("chapter", "=", $chapter)->where("verse_number", "=", $verse)->get();
            //return view('verse.show')->with(compact('verse'));

            return Response::json(array(
                'error' => false,
                'status_code' => 200,
                'date' => $today,
                'book' => $this->checkBook($book),
                'data' => $verse,
            ));
        }
        else if(isset($_GET['book'])&&isset($_GET['chapter'])&&!isset($_GET['verse']))
        {
            $book = $_GET['book'];
            $chapter = $_GET['chapter'];



            if(stripos($chapter, ','))
            {
                $chapter_array = explode(',', $chapter);
                $min = (int)($chapter_array[0]);
                $max = (int)($chapter_array[count($chapter_array)-1]);

                $verse = DB::table('bible')
                    ->select('chapter', 'verse_number', 'verse')
                    ->where("book","=", $book)
                    ->whereBetween("chapter", [$min, $max])
                    ->get();

                return Response::json(array(
                    'error' => false,
                    'status_code' => 200,
                    'date' => $today,
                    'book' => $this->checkBook($book),
                    'data' => $verse,
                ));
            }
            else
            {
                $verse = DB::table('bible')
                    ->select('chapter', 'verse_number', 'verse')
                    ->where("book","=", $book)
                    ->where("chapter", "=", $chapter)
                    ->get();
            }

            return Response::json(array(
                'error' => false,
                'status_code' => 200,
                'date' => $today,
                'book' => $this->checkBook($book),
                'data' => $verse,
            ));
        }

        else if(!isset($_GET['book'])&&!isset($_GET['chapter'])&&!isset($_GET['verse'])&&!isset($_GET['passage']))
        {
            return view('main.index');
        }

        else
        {
            return Response::json(array(
                'error' => true,
                'status_code' => 404,
                'data' => 'Wrong request',
            ));
        }
    }

    public function checkBook($book)
    {
        switch ($book){
            case '01O':
                return 'Бытие';
            case '02O':
                return 'Исход';
            case '03O':
                return 'Левит';
            case '04O':
                return 'Числа';
            case '05O':
                return 'Второзаконие';
            case '06O':
                return 'Книга Иисуса Навина';
            case '07O':
                return 'Книга Судей';
            case '08O':
                return 'Книга Руфь';
            case '09O':
                return '1-я книга Царств';
            case '10O':
                return '2-я книга Царств';
            case '11O':
                return '3-я книга Царств';
            case '12O':
                return '4-я книга Царств';
            case '13O':
                return '1-я Паралипоменон';
            case '14O':
                return '2-я Паралипоменон';
            case '15O':
                return 'Книга Ездры';
            case '16O':
                return 'Книга Неемии';
            case '17O':
                return 'Книга Есфирь';
            case '18O':
                return 'Книга Иова';
            case '19O':
                return 'Псалтирь';
            case '20O':
                return 'Книга Притчей';
            case '21O':
                return 'Книга Екклесиаста';
            case '22O':
                return 'Книга Песни Песней';
            case '23O':
                return 'Книга Пророка Исаии';
            case '24O':
                return 'Книга Пророка Иеремии';
            case '25O':
                return 'Книга Плач Иеремии';
            case '26O':
                return 'Книга Пророка Иезекииля';
            case '27O':
                return 'Книга Пророка Даниила';
            case '28O':
                return 'Книга Пророка Осии';
            case '29O':
                return 'Книга Пророка Иоиля';
            case '30O':
                return 'Книга Пророка Амоса';
            case '31O':
                return 'Книга Пророка Авдия';
            case '32O':
                return 'Книга Пророка Ионы';
            case '33O':
                return 'Книга Пророка Михея';
            case '34O':
                return 'Книга Пророка Наума';
            case '35O':
                return 'Книга Пророка Аввакума';
            case '36O':
                return 'Книга Пророка Софонии';
            case '37O':
                return 'Книга Пророка Аггея';
            case '38O':
                return 'Книга Пророка Захарии';
            case '39O':
                return 'Книга Пророка Малахии';
            case '40N':
                return 'От Матфея';
            case '41N':
                return 'От Марка';
            case '42N':
                return 'От Луки';
            case '43N':
                return 'От Иоанна';
            case '44N':
                return 'Деяния';
            case '45N':
                return 'Послание Иакова';
            case '46N':
                return '1-е послание Петра';
            case '47N':
                return '2-е послание Петра';
            case '48N':
                return '1-е послание Иоанна';
            case '49N':
                return '2-е послание Иоанна';
            case '50N':
                return '3-е послание Иоанна';
            case '51N':
                return 'Послание Иуды';
            case '52N':
                return 'Послание к Римлянам';
            case '53N':
                return '1-е послание к Коринфянам';
            case '54N':
                return '2-е послание к Коринфянам';
            case '55N':
                return 'Послание к Галатам';
            case '56N':
                return 'Послание к Ефесянам';
            case '57N':
                return 'Послание к Филиппийцам';
            case '58N':
                return 'Послание к Колоссянам';
            case '59N':
                return '1-е послание к Фессалоникийцам';
            case '60N':
                return '2-е послание к Фессалоникийцам';
            case '61N':
                return '1-е послание к Тимофею';
            case '62N':
                return '2-е послание к Тимофею';
            case '63N':
                return 'Послание к Титу';
            case '64N':
                return 'Послание к Филимону';
            case '65N':
                return 'Послание к Евреям';
            case '66N':
                return 'Откровение';

        }
    }
}
