<?php
/**
 * Created by PhpStorm.
 * User: Андрей Валерьевич
 * Date: 29.06.2017
 * Time: 19:53
 */

namespace FAQ\Http\Controllers;

use FAQ\Theme;
use FAQ\Question;
use Illuminate\HTTP\Request;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themes = Theme::all()->sortBy("name");
        $questions = Question::all()->sortBy("status");

        return view('admin', compact('questions', 'themes'));
    }
}