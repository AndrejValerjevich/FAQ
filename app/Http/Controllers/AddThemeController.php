<?php
/**
 * Created by PhpStorm.
 * User: Андрей Валерьевич
 * Date: 03.07.2017
 * Time: 0:57
 */

namespace FAQ\Http\Controllers;
use FAQ\Theme;
use FAQ\Question;
use Illuminate\HTTP\Request;
use Illuminate\Support\Facades\DB;


class AddThemeController extends Controller
{
    public function index() {

        return view('addTheme');
    }

    public function AddTheme(Request $request)
    {
        $theme = new Theme;

        $theme->name = $request->get('theme_name');

        $theme->save();

        return redirect('admin');
    }
}