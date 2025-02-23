<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;


class PostController extends Controller
{
    
    // FETCH PUBLISHED BLOGS
    public function index()
    {
        
        $posts = Post::select('id', 'slug', 'title','description', 'created_at', 'image')->where('status', 'published')-> orderBy('created_at', 'desc')->paginate(10);
       
       return response()->json($posts);
    }

    public function all(Request $request) {
        $query = Post::select('id', 'slug', 'title', 'description', 'created_at', 'updated_at', 'image', 'status');
    
        if ($request->has('search')) {
            $search = $request->search;
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        }
    
        $posts = $query->orderBy('created_at', 'desc')->paginate(10);
    
        return response()->json($posts);
    }
    
    
    public function create()
    {
        //
    }

    // PUBLISH POST
    public function store(Request $request)
{
    Log::info("Received data:", $request->all());

    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
    ]);

    if ($request->hasFile('image')) {
        Log::info("Image file received.");
        $imagePath = $request->file('image')->store('uploads', 'public');
    } else {
        Log::error("No image received!");
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

    return response()->json(['message' => 'Blog created successfully', 'post' => $post]);
}

// DRAFT POST
    public function storeDraft(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
        ]);

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
    }
    
    // FETCH SINGLE POST FOR USER DISPLAY
    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)->select('slug','title', 'content', 'image', 'created_at')->where('status','published')->first();
        if(!$post){
            return response()->json(['message'=> 'Post Not Found'],404);
        }
        return response()->json($post);
    }

    // FETCH POST FOR ADMIN EDIT
    public function edit(int $id)
{
    
    $post = Post::select('id', 'title', 'description', 'content', 'image', 'created_at', 'status')
                ->where('id', $id)
                ->first();

    if (!$post) {
        return response()->json(['message' => 'Post Not Found'], 404);
    }

    return response()->json($post);
}


   //UPDATE POST
   public function update(Request $request, int $id)
   {
    return response()->json($request->all());

        
       $request->validate([
           'title' => 'required|string|max:255',
           'description' => 'required|string',
           'content' => 'required|string',
           'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
       ]);
   
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
   
       return response()->json(['message' => 'Post has been updated'], 200);
   }

    // DELETE POST
    public function destroy(int $id)
    {
        $post = Post::destroy($id);
        if(!$post){
            return response()->json(['message'=> 'Cannot Delete Post'],404);
        }

        return response()->json(['message'=>'Post deleted'], 200);
    }
}
