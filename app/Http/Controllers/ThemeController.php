<?php

namespace FAQ\Http\Controllers;

use FAQ\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
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
        return view('addTheme');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $theme = new Theme;

        $theme->name = $request->get('theme_name');

        $theme->save();

        return redirect('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \FAQ\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function show(Theme $theme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \FAQ\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme $theme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \FAQ\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theme $theme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \FAQ\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theme $theme)
    {
        $theme->delete();

        return redirect('admin');
    }
}
