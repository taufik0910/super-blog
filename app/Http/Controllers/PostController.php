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
        $posts = Post::with('user','category')->orderBy('id','description')->get();
        return response()->json(['posts'=> $posts], 200);
    }
    public function add_posted(Request $request)
    {
        # code...
            $posted = New Post();
            $posted->cat_id  = $request->cat_id;
            $posted->title = $request->title;
            $posted->description  = $request->description ;
            $posted->save();
            return ['message'=>'OK'];
    }
}
