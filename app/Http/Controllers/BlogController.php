<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function articles()
    {
        return view('blogs.articles');
    }



    public function show_article()
    {
        return view('blogs.article');
    }


    public function outreaches()
    {


        return view('blogs.outreaches');
    }


    public function show_outreach()
    {


        return view('blogs.outreach');
    }



    public function events()
    {
        return view('blogs.events');
    }


    public function show_event()
    {

        return view('blogs.event');
    }
}
