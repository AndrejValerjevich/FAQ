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
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themes = Theme::all()->sortBy("name");
        $questions = Question::all()->sortBy("status");

        return view('admin', ['themes' => $themes], ['questions' => $questions]);
    }

    public function Answer(Request $request) {

        $question = Question::find($request->get('hidden_id'));

        $question->answer = $request->get('answer');

        $question->save();

        return redirect('admin');

    }
}