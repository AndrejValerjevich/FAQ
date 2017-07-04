<?php

namespace FAQ\Http\Controllers;

use FAQ\Theme;
use FAQ\Question;
use Illuminate\HTTP\Request;

class HomeController extends Controller
{
    public function index()
    {
        $themes = Theme::all()->sortBy("name");
        $questions = Question::all()->sortBy("text");

        return view('home', ['themes' => $themes], ['questions' => $questions]);
    }

    public function AddQuestion(Request $request)
    {
        $themes = Theme::all();
        foreach ($themes as $theme) {
            if ($theme->name == $request->get('category'))
                $theme_id = $theme->id;
        }

        $question = new Question();

        $question->theme_id = $theme_id;
        $question->text = $request->get('question');
        $question->date = date('Y-m-d H:i:s');
        $question->answer = '';
        $question->status = 0;

        $question->save();

        return redirect('home');
    }
}
