<?php
/**
 * Created by PhpStorm.
 * User: Андрей Валерьевич
 * Date: 04.07.2017
 * Time: 10:45
 */

namespace FAQ\Http\Controllers;


use GuzzleHttp\Psr7\Request;

class EditController extends Controller
{
    public function index(Request $request)
    {
        return view('edit');
    }
}