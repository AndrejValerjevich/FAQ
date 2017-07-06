<?php
/**
 * Created by PhpStorm.
 * User: Андрей Валерьевич
 * Date: 02.07.2017
 * Time: 23:26
 */

namespace FAQ\Http\Controllers;

use FAQ\User;
use Illuminate\HTTP\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index()
    {

        $users = User::all()->sortBy("name");

        return view('users', ['users' => $users]);
    }

    public function Delete(Request $request)
    {
        User::destroy($request->get('hidden_id'));

        return redirect('users');
    }

    public function ChangePassword(Request $request)
    {
        $password = $request->get('password_confirmation');
        $id = $request->get('hidden_id');
        DB::update('update users set password = ? where id = ?', [$password, $id]);

        return redirect('users');
    }
}