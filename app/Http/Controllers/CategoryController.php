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

        public function delete_category($id)
        {
            # code...
        
            $category = Category::find($id);
            $category->delete();
            
        }
        
        public function edit_category($id)
        {
            # code...
            $category = Category::find($id);
            return response()->json([
                'category'=>$category
            ],200);
        }

        public function update_category(Request $request, $id)
        {
            # code...
                
        $this->validate($request,[
            'cat_name'=>'required|min:3|max:50|unique:categories'
            ]);
                $category = Category::find($id);
                $category->cat_name = $request->cat_name;
                $category->save();

        }
        
        
    }
    