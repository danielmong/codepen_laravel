<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Models\CodepenList;

class CodepenListController extends Controller
{
    public function index()
    {
        $codepens = CodepenList::get();
        
        return view('/codepen/list', compact('codepens'));
    }

    public function create()
    {
        return view('/codepen/create');
    }

    public function save(Request $request)
    {
        $codepen = new CodepenList;

        $codepen->user_id = auth()->id();
        $codepen->title = $request->title;
        $codepen->description = $request->description;
        $codepen->content_html = $request->content_html;
        $codepen->content_css = $request->content_css;
        $codepen->content_js = $request->content_js;
        $codepen->status = $request->status ?: 'public';

        $codepen->save();

        return redirect('/codepen/list');
    }
}