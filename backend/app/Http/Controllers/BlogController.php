<?php

namespace App\Http\Controllers;

use Exception;
use Firefly\FilamentBlog\Models\Post;
use Firefly\FilamentBlog\Models\CategoryPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getBlogs(Request $request){
        try{

            $limit = $request->input('limit', 10); 

            $blogs = Post::select('id', 'title', 'slug', 'published_at', 'cover_photo_path', 'photo_alt_text' )->with('categories:name')->orderBy('id')->cursorPaginate($limit);

            return response()->json(['success'=>true, 'message'=>'Blogs fetched successful', 'data'=>$blogs ], 200);

        }catch(Exception $err){
            return response()->json(['success'=>false, 'message'=>$err->getMessage()], 500);
        }
    }

    public function getBlogBySlug($slug){

        try{
           $blog = Post::where('slug', $slug)->where('status', 'published')
            ->first();
            if(!$blog){
                return response()->json(['success'=>false, 'message'=>'Blog Not Found'], 404);
            }

            return response()->json(['success'=>true, 'message'=>'Blog fetched successful', 'data'=>$blog ], 200);
            
        }catch(Exception $err){
            return response()->json(['success'=>false, 'message'=>$err->getMessage()], 500);
        }


    }
}
