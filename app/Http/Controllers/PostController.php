<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Post;
use App\Http\Requests\PostRequest;

use App\Models\Category;


class PostController extends Controller
{
    
    public function index(Post $post) {
        
        $url = "https://teratail.com/api/v1/questions";
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', $url, [
            'headers' => [
                'Authorization' => 'Bearer ' . config('services.teratail.token')
                ]
            ]
        );
        $questions = json_decode($res->getBody(), true);
        
        return view('posts/index')
            ->with([
                'posts' => $post->getPaginateByLimit(5),
                'questions' => $questions['questions']
                ]);
    }
    
    public function show(Post $post) 
    {
        // dd($post);
        return view('posts/show')
            ->with(['post' => $post]);
    }
    
    public function create(Category $category)
    {
        return view('posts.create')->with(['categories' => $category->get()]);
        
    }
    
    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        // dd($input);
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit')
            ->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        // dd($input);
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id); 
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}
