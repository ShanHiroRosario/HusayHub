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
    // Get the authenticated user
    $user = Auth::user();

    // Retrieve all posts
    $posts = Post::with('user')->latest()->get(); 

    // Pass the user and posts to the view
    return view('index', compact('user', 'posts'));
}


    // Store a new post
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'content' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);
    
        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Save in the 'storage/app/public/images' folder
        }
    
        // Create a new post
        Post::create([
            'user_id' => Auth::id(),
            'content' => $request->content,
            'image_path' => $imagePath, // Save the image path
        ]);
    
        // Redirect back
        return redirect()->route('index');
    }
    
}

