<?php

namespace FAQ\Http\Controllers;

use Illuminate\HTTP\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $themes = DB::select('select * from themes ORDER BY name ASC');

        $questions = DB::select('select * from questions ORDER BY text ASC');

        return view('home', ['themes' => $themes], ['questions' => $questions]);
    }

    public function AddQuestion(Request $request)
    {
        $themes = DB::select('select * from themes');
        foreach ($themes as $theme) {
            if ($theme->name == $request->get('category'))
                $theme_id = $theme->id;
        }

        DB::table('questions')->insert(
            ['theme_id' => $theme_id, 'text' => $request->get('question'), 'date' => date('Y-m-d H:i:s'), 'answer' => '', 'status' => 0]
        );

        return redirect('home');
    }
}
