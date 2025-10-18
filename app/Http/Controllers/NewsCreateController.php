<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsCreateController extends Controller
{
    public function create()
    {
        return view('createNew');
    }

    public function store(Request $request)
    {
        $request->validate([
            'header' => 'required|string|max:255',
            'shortText' => 'required|string|max:255',
            'article' => 'required|string',
            'image' => 'required|image|max:2048',
        ]);

        $imageData = file_get_contents($request->file('image')->getRealPath());

        DB::table('news')->insert([
            'header' => $request->input('header'),
            'short_text' => $request->input('shortText'),
            'article' => $request->input('article'),
            'image' => $imageData,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/')->with('success', 'News added successfully!');
    }
}