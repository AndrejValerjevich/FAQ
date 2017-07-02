<?php
/**
 * Created by PhpStorm.
 * User: Андрей Валерьевич
 * Date: 29.06.2017
 * Time: 20:34
 */

namespace FAQ\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AskController extends Controller
{
    public function index()
    {
        $themes = DB::select('select * from themes');

        return view('ask', ['themes' => $themes]);
    }
}