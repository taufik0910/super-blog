<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    
    
    public function add_category(Request $request){
        
        $this->validate($request,[
            'cat_name'=>'required|min:3|max:50|unique:categories'
            ]);
            $category = New Category();
            $category->cat_name = $request->cat_name;
            $category->save();
            return ['message'=>'OK'];

        }

       public function all_category()
        {
            # code...
            $categories = Category::all();
          return response()->json(['categories'=> $categories], 200);
        }
        
        
    }
    