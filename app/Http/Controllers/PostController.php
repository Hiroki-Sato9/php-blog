<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Post;

class PostController extends Controller
{
    public function index(Post $post) {
        
        return view('posts/index')
            ->with(['posts' => $post->getPaginateByLimit(5)]);
    }
    
    public function show(Post $post) 
    {
        // dd($post);
        return view('posts/show')
            ->with(['post' => $post]);
    }
    
    public function create()
    {
        return view('posts.create');
        
    }
    
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        return redirect('/posts');
    }
}
