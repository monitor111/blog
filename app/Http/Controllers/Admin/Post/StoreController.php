<?php

// namespace App\Http\Controllers\Admin\Post;

// use App\Models\Post;
// // use App\Http\Controllers\Post;
// use App\Models\Category;
// use Illuminate\Http\Request;
// use App\Models\Tag;
// use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Storage;
// use App\Http\Requests\Admin\Post\StoreRequest;

// class StoreController extends Controller
// {
//     public function __invoke(StoreRequest $request)
//     {
//         try {
//         $data = $request->validated();
//         $tagIds = $data['tag_ids'];
//         unset($data['tag_ids']);
        
//         $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
//         $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
    
//         $post = Post::firstOrCreate($data);
//         $post->tags()->attach($tagIds);
//         } catch(\Exception $exception) {
//             abort(404);
//         }

//         return redirect()->route('admin.post.index');
//     }
// }






namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Post\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('admin.post.index');
    }
}