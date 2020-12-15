<?php

namespace App\Http\Controllers;


use App\Models\Event;
use App\Models\News;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function events()
    {
        $events = Event::all();

        return response($events);


    }

    public function news()
    {
        $news = News::all();
        return response($news);
    }
}
