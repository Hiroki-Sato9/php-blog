<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Post;
use App\Http\Requests\PostRequest;



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
    
    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit')
            ->with(['post' => $post]);
    }
    
    public function update(Request $request, Post $post)
    {
        $input = $request['post'];
        // dd($input);
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id); 
    }
}
