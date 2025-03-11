<?php

namespace App\Http\Controllers\Post\Like;

use App\Models\Post;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Comment\StoreRequest;


class StoreController extends Controller
{
    public function __invoke(Post $post)
    {
        auth()->user()->likedPosts()->toggle($post->id);
        
       
        return redirect()->back();
    }
}
