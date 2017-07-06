<?php
/**
 * Created by PhpStorm.
 * User: Андрей Валерьевич
 * Date: 04.07.2017
 * Time: 10:45
 */

namespace FAQ\Http\Controllers;

use FAQ\Theme;
use FAQ\Question;
use Illuminate\HTTP\Request;

class EditController extends Controller
{
    public function index(Request $request)
    {
        $themes = Theme::all()->sortBy("name");

        $select_question = Question::where('id', $request->get('hidden_id'))->get();
        $edit_question = $select_question[0];

        return view('edit', compact('edit_question', 'themes'));
    }

    public function EditQuestion(Request $request)
    {
        $themes = Theme::all();
        foreach ($themes as $theme) {
            if ($theme->name == $request->get('category'))
                $theme_id = $theme->id;
        }

        $question = Question::find($request->get('hidden_id'));

        $question->theme_id = $theme_id;
        $question->text = $request->get('text');
        $question->answer = $request->get('answer');
        $question->asking_user_name = $request->get('author');

        $question->save();

        return redirect('admin');
    }
}