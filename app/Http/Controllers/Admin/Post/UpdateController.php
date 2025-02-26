<?php

// namespace App\Http\Controllers\Admin\Post;

// use App\Models\Post;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Storage;
// use App\Http\Requests\Admin\Post\UpdateRequest;

// class UpdateController extends Controller
// {
//     public function __invoke(UpdateRequest $request, Post $post)
//     {
//         $data = $request->validated();

//         $tagIds = $data['tag_ids'];
//         unset($data['tag_ids']);

//         // Проверяем, есть ли в данных изображения, прежде чем их обрабатывать
//         if (isset($data['preview_image'])) {
//             $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
//         }

//         if (isset($data['main_image'])) {
//             $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
//         }

//         // Обновляем пост с новыми данными
//         $post->update($data);
//         $post->tags()->sync($tagIds);

//         return view('admin.post.show', compact('post'));
//     }
// }








namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Post\UpdateRequest;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $post = $this->service->update($data, $post);

        return view('admin.post.show', compact('post'));
    }
}


