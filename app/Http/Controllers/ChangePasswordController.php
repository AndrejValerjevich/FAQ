<?php
/**
 * Created by PhpStorm.
 * User: Андрей Валерьевич
 * Date: 03.07.2017
 * Time: 0:57
 */

namespace FAQ\Http\Controllers;
use Illuminate\HTTP\Request;
use Illuminate\Support\Facades\DB;


class ChangePasswordController extends Controller
{
    public function index(Request $request) {

        $user = DB::select('select * from users where id = ?', [$request->get('hidden_id')]);

        return view('changePassword', ['user' => $user]);
    }
}