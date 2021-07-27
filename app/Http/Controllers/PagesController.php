<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Outcome;
use App\Models\Post;
use App\Models\Image;

class PagesController extends Controller
{
    // Home Page

    public function index() {

        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('pages.home')->with('posts', $posts);;

    }
}
