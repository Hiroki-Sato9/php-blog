<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Post;

class PostController extends Controller
{
    public function index(Post $post) {
        
        return view('posts/index')
            ->with(['posts' => $post
            ->orderByDesc('updated_at')->limit(10)->get()]);
    }
}
