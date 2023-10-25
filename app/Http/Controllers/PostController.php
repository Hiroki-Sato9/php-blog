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
    
    public function show($id) 
    {
        $post = Post::find($id);
        return view('posts/show')
            ->with(['post' => $post]);
    }
}
