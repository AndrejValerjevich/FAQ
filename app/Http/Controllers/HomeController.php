<?php

namespace FAQ\Http\Controllers;

use FAQ\Theme;
use FAQ\Question;
use Illuminate\HTTP\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        $themes = Theme::all()->sortBy("name");
        $questions = Question::all()->sortBy("text");

        return view('home', ['themes' => $themes], ['questions' => $questions]);
    }
}
