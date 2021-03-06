<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Image;
use Auth;

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
        $this->validate($request,[
            'title'=>'required|min:3|max:50|unique:posts',
            'description'=>'required|min:3|max:1000|unique:posts'
            ]);
            $strpos =strpos($request->photo, ';');
            $sub = substr($request->photo,0, $strpos);
            $ex =explode('/',$sub)[1];
            $name = time().".".$ex;
            $img = Image::make($request->photo)->resize(400, 400);
            $upload_path = public_path()."/uploadimage/";
            $img->save($upload_path.$name);

            $posted = New Post();
            $posted->cat_id  = $request->cat_id;
            $posted->title = $request->title;
            $posted->description  = $request->description ;
            $posted->user_id = Auth::user()->id;
            $posted->photo = $name;
            $posted->save();
            return ['message'=>'OK'];
    }

    public function delete_post($id)    
    {
        # code...
        $posting = Post::find($id);
        $letak_photo = public_path()."/uploadimage/";
        $identifikasi_photo = $letak_photo. $posting->photo;
        if (file_exists($identifikasi_photo)) {
            # code...
            @unlink($identifikasi_photo);
        }
        $posting->delete();
    }

    public function edit_post($id)
    {
        # code...
        $posting = Post::find($id);
        return response()->json([
            'post' => $posting
        ], 200);
    }

}
