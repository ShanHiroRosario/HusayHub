<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  // Import the Auth facade

class PostController extends Controller
{
    // Show all posts (for the feed)
    public function index()
    {
        $posts = Post::latest()->get(); // Fetch all posts, sorted by the latest first
        return view('index', compact('posts'));
    }

    // Store a new post
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        // Create a new post, using the authenticated user's ID
        Post::create([
            'user_id' => Auth::id(),  // Ensure the user is authenticated
            'content' => $request->content,
        ]);

        // Redirect back to the previous page after posting
        return redirect()->route('index'); // Or redirect to the homepage or feed
    }
}

