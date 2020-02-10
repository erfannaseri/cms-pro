<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Portfolio;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $portfolios=Portfolio::orderBy('id','DESC')->get();
        $tags=$portfolios->unique('tag');

        return view('front.home',compact('portfolios','tags'));
    }
}
