<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //see all the comments

        $commentdata = Comment::with('post')->paginate(10);
        

        return view('comment.index',compact('commentdata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //in view
        // <a href="{{ route('comment.create', ['post' => $post->id, 'user' => $post->user?->id]) }}">Add Comment</a> 
        $users = User::all();
        $postId = $request->query('post'); // getting data from the browser params like  http://127.0.0.1:8000/comment/create?post=2&user=22
        $userId = $request->query('user');

        // Fetch the Post and User models
        $post = Post::findOrFail($postId); // Throws 404 if not found
        $user = User::findOrFail($userId); // Throws 404 if not found

        // Pass the models to the view
        return view('comment.create', compact('post', 'user','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'author'=> 'required|exists:users,name',
            'content' => 'required|string|max:255'
        ]);

        Comment::create($request->all());
        return redirect()->route('posts.show', [$request->post_id])->with('success', 'Comment added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
