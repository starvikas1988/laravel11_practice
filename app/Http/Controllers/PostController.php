<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function index(){
        
        $posts = Post::with('user','comments','category')->paginate(10);  
        $users = User::all(); 
        // dump($posts);
       // $posts = Post::with('user')->get();    
       //Log::debug('Posts data:', $posts->toArray());
       Log::debug('Paginated Posts Items:', $posts->items());
        return view('posts.index',compact('posts','users'));
    }

    public function create()
    {
        $users = User::all(); // Fetch all users for the dropdown
        $categories = Category::all(); 
       
        return view('posts.create', compact('users','categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        Post::create($request->all());
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }
    
    // Show a single post with comments
    public function show(Post $post)
    {
        $post->load('comments'); // Eager load comments for the post
        return view('posts.show', compact('post'));
    }

    public function featuredPosts()
    {
        // Fetch all featured posts
        $posts = Post::where('is_featured', true)->with('user', 'comments')->get();

        // Return a custom view with the fetched posts
        return view('posts.featured', compact('posts'));
    }


    public function edit(Post $post)
    {
        $users = User::all(); // Get all users for the dropdown
        $categories = Category::all(); 
        return view('posts.edit', compact('post', 'users','categories'));
    }

    public function update(Request $request, Post $post)
    {
       // dd($post);

        //dd($request->all());

        DB::listen(function ($query) {
            Log::info('Executed Query:', [
                'sql' => $query->sql,
                'bindings' => $query->bindings,
                'time' => $query->time,
            ]);
        });
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'category_id' => 'required|exists:categories,id',
                'title' => 'required|max:255',
                'content' => 'required',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($e->errors()); // Dump the validation errors
        }
        

        $post->update($request->all());
       

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('posts.index')->with('success','Post deleted successfully.');
    }
}
