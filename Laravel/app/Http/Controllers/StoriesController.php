<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;

class StoriesController extends Controller
{
    public function index()
    {
      $stories = App\Story::all();

        return view('stories.index',compact('stories'));
    }

    public function show($id)
    {
      $story = App\Story::find($id);

        return view('stories.show',compact('story'));
    }
}
