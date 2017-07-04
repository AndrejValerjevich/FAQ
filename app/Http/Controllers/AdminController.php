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

        return view('admin', compact('questions', 'themes'));
    }

    public function Answer(Request $request) {

        $question = Question::find($request->get('hidden_id'));

        $question->answer = $request->get('answer');

        $question->status = 1;

        $question->save();

        return redirect('admin');
    }

    public function HideQuestion(Request $request)
    {
        if ($request->get('hidden_status') == 1) {
            $status = 2;
        }
        elseif ($request->get('hidden_status') == 2) {
            $status = 1;
        }
        else {
            $status = 0;
        }

        $question = Question::find($request->get('hidden_id'));

        $question->status = $status;

        $question->save();

        return redirect('admin');
    }
}