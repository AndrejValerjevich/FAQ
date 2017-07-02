<?php
/**
 * Created by PhpStorm.
 * User: Андрей Валерьевич
 * Date: 29.06.2017
 * Time: 19:53
 */

namespace FAQ\Http\Controllers;
use Illuminate\Support\Facades\DB;
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
        $themes = DB::select('select * from themes ORDER BY name ASC');

        $questions = DB::select('select * from questions ORDER BY text ASC');

        return view('admin', ['themes' => $themes], ['questions' => $questions]);
    }

    public function Answer(Request $request) {

        DB::update('update questions set answer = ?, status = 1 where id = ?', [$request->get('answer'), $request->get('hidden_id')]);

        return redirect('admin');

    }
}