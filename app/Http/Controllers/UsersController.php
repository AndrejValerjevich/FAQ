<?php
/**
 * Created by PhpStorm.
 * User: Андрей Валерьевич
 * Date: 02.07.2017
 * Time: 23:26
 */

namespace FAQ\Http\Controllers;
use Illuminate\HTTP\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index()
    {

        $users = DB::select('select * from users ORDER BY name ASC');

        return view('users', ['users' => $users]);
    }

    public function Delete(Request $request)
    {

        DB::delete('delete from users where id = ?', [$request->get('hidden_id')]);

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