<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function all_post()
    {
        // $posts = Category::with('posts')->get();
        $posts = Post::all();
        return response()->json(['posts'=> $posts], 200);
    }
}
