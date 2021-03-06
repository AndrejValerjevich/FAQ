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
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
    public function index()
    {

        $users = User::all()->sortBy("name");

        return view('users', compact('users'));
    }

    public function destroy(Request $request)
    {
        $id = $request->get('hidden_id');
        if (Auth::id() != $id) {
            User::destroy($id);
        }

        return redirect(route('users'));
    }
}