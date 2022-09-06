<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $post = auth()->user()->posts()
                    ->where('title', 'like', '%' . request('keyword') . '%')
                    ->paginate(10);

        return response()->json([
            'message'   => 'success',
            'data'      => PostResource::collection($post),
        ]);
    }

    public function store(Request $request)
    {
        $photo      = $request->file('photo');
        $fileName   = time().'_'.$photo->getClientOriginalName();
        $filePath   = $photo->storeAs('img/post', $fileName, 'public'); 

        $post = auth()->user()->posts()->create([
            'photo'     => $filePath,
            'title'     => $request->title,
            // 'slug'      => \Str::slug($request->title),
            'slug'     => $request->slug,
            'content'   => $request->content,
        ]);

        return response()->json([
            'message'   => 'success',
            'data'      => new PostResource($post),
        ]);
    }

    public function show($id)
    {
        $post = auth()->user()->posts()->find($id);

        if (!$post) {
            return response()->json([
                'message'   => 'error',
                'data'      => 'post not found',
            ]);
        }

        return response()->json([
            'message'   => 'success',
            'data'      => new PostResource($post),
        ]);
    }

    public function update(Request $request, $id)
    {
        $post = auth()->user()->posts()->find($id);

        if (!$post) {
            return response()->json([
                'message'   => 'error',
                'data'      => 'Post not found',
            ]);
        }

        $photo      = $request->file('photo');
        if ($photo) {
            \Storage::delete('public/'.$post->photo);
            $fileName   = time().'_'.$photo->getClientOriginalName();
            $filePath   = $photo->storeAs('public/img/post', $fileName, 'public');
        } else {
            $filePath   = $post->photo;
        }
        

        $post->update([
            'photo'     => $filePath,
            'title'     => $request->title ?? $post->title,
            'slug'      => $request->slug ?? $post->slug,
            'content'   => $request->content ?? $post->content,
        ]);

        return response()->json([
            'message'   => 'success',
            'data'      => new PostResource($post),
        ]);
    }

    public function destroy($id)
    {
        $post = auth()->user()->posts()->find($id);

        if (!$post) {
            return response()->json([
                'message'   => 'error',
                'data'      => 'post not found',
            ]);
        }

        \Storage::delete('public/'.$post->photo);
        $post->delete();

        return response()->json([
            'message'   => 'success',
        ]);
    }


}
