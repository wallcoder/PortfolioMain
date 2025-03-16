<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;


class PostController extends Controller
{
    
  
    public function index()
    {
        try{

        
        
        $posts = Post::select('id', 'slug', 'title','description', 'created_at', 'image')->where('status', 'published')-> orderBy('created_at', 'desc')->paginate(10);
        return response()->json(['success'=>true, 'data'=>$posts, 'message'=>'Posts fetched successfully'], 200);
    }catch(\Exception $e){
        return response()->json('error', $e->getMessage());
    }
       
    }

    public function all(Request $request) {
        try{
        $query = Post::select('id', 'slug', 'title', 'description', 'created_at', 'updated_at', 'image', 'status');
    
        if ($request->has('search')) {
            $search = $request->search;
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        }
    
        $posts = $query->orderBy('created_at', 'desc')->paginate(10);
        return response()->json(['success'=>true, 'data'=>$posts, 'message'=>'All Posts fetched successfully'], 200);
    }catch(\Exception $e){
        return response()->json(['success'=>false, 'message'=>$e->getMessage()], 500);
    }
    }
    
    
    public function create()
    {
        //
    }

    // PUBLISH POST
    public function store(Request $request)
{
    try{

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]
    );
       if($validator->fails()){
        return response()->json(['success'=>false,'message'=> $validator->errors()],400);
       }
    
        if ($request->hasFile('image')) {
           
            $imagePath = $request->file('image')->store('uploads', 'public');
        } else {
            
            $imagePath = null;
        }
    
        $post = Post::create([
            'user_id' => 1,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'content' => $request->content,
            'image' => $imagePath,
            'status' => $request->status
        ]);
    
        return response()->json(['success'=>true, 'message' => 'Blog created successfully', 'post' => $post], 200);

    }catch(\Exception $e){
        return response()->json(['success'=>false, 'message'=>$e->getMessage()], 500);
    }

    
}

// DRAFT POST
    public function storeDraft(Request $request)
    {

        try{

            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'content' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);


            if($validator->fails()){
                return response()->json(['success'=>false,'message'=> $validator->errors()],400);
               }
         
    
            $imagePath = $request->hasFile('image') ? $request->file('image')->store('uploads', 'public') : null;
    
            $post = Post::create([
                'user_id'=> 1,
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'description' => $request->description,
                'content' => $request->content,
                'image' => $imagePath,
                
    
            ]);
    
            return response()->json(['message'=>'Blog created successfully', 'post'=>$post]);

        }catch(\Exception $e){return response()->json(['success'=>false, 'message'=>$e->getMessage()], 500);}
       
    }
    
    // FETCH SINGLE POST FOR USER DISPLAY
    public function show(string $slug)
    {
        try{
            $post = Post::where('slug', $slug)->select('slug','title', 'content', 'image', 'created_at')->where('status','published')->first();
            if(!$post){
                return response()->json(['success'=>false, 'message'=>'Post Not Found'],404);
            }
            return response()->json(['success'=>false, 'message'=>'Post found', 'data'=> $post]);
        }catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=>$e->getMessage()], 500);
        }
       
    }

    // FETCH POST FOR ADMIN EDIT
    public function edit(int $id)
{
    try{
        $post = Post::select('id', 'title', 'description', 'content', 'image', 'created_at', 'status')
                ->where('id', $id)
                ->first();

    if (!$post) {
        return response()->json(['message' => 'Post Not Found'], 404);
    }

    return response()->json(['success'=>true, 'message'=>'Post has been edited', 'data'=>$post], 200);

    }catch(\Exception $e){
        return response()->json(['success'=>false, 'message'=>$e->getMessage()], 500);
    }
    
}


   //UPDATE POST
   public function update(Request $request, int $id)
   {
    // return response()->json($request->all());
    try{

    

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if($validator->fails()){
            return response()->json(['success'=>false,'message'=> $validator->errors()],400);
           }
   
       $post = Post::findOrFail($id);
   
       // Handle image upload if a new file is provided
       if ($request->hasFile('image')) {
           // Delete the old image if it exists
           if ($post->image) {
               Storage::disk('public')->delete($post->image);
           }
   
           // Store new image and update post
           $path = $request->file('image')->store('uploads', 'public');
           $post->image = $path;  // Assign new image path before updating
       }
   
       // Update other fields
       $post->update([
           'title' => $request->title,
           'description' => $request->description,
           'content' => $request->content,
           'status' => $request->status,
           'image' => $post->image, // Ensure the image is updated properly
       ]);
   
       return response()->json(['success'=>true, 'message' => 'Post has been updated'], 200);
    }catch(\Exception $e){
        return response()->json(['success'=>false, 'message'=>$e->getMessage()], 500);
    }
   }

    // DELETE POST
    public function destroy(int $id)
    {
        try{

       
        $post = Post::destroy($id);
        if(!$post){
            return response()->json(['success'=>false, 'message'=> 'Post not found and not deleted'],404);
        }

        return response()->json(['success'=>true,'message'=>'Post deleted'], 200);
    }catch(\Exception $e){
        return response()->json(['success'=>false, 'message'=>$e->getMessage()], 500);
    }
    }
}
