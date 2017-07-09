<?php

namespace FAQ\Http\Controllers;

use FAQ\Question;
use FAQ\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $themes = Theme::all();

        return view('ask', ['themes' => $themes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $question->asking_user_name = $request->get('name');
        $question->asking_user_email = $request->get('email');

        $question->save();

        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \FAQ\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $themes = Theme::all()->sortBy("name");

        return view('edit', compact('question', 'themes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \FAQ\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \FAQ\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $themes = Theme::all();
        foreach ($themes as $theme) {
            if ($theme->name == $request->get('category'))
                $theme_id = $theme->id;
        }

        $question->theme_id = $theme_id;
        $question->text = $request->get('text');
        $question->answer = $request->get('answer');
        if ($request->get('answer') != '') {
            $question->status = 1;
        }
        else {
            $question->status = 0;
        }
        $question->asking_user_name = $request->get('author');

        $question->save();

        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \FAQ\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return redirect('admin');
    }

    public function answer(Request $request, Question $question)
    {
        $question->update(['answer' => $request->get('answer'), 'status' => 1]);

        return redirect('admin');
    }

    public function hide(Request $request, Question $question)
    {
        $requestStatus = $request->get('hidden_status');
        $status = ($requestStatus == 1 || $requestStatus == 2) ? $requestStatus : 0;

        $question->update(['status' => $status]);

        return redirect('admin');
    }
}
