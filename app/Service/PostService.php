<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            if (isset($data['tags_id'])){
                $tags_id = $data['tags_id'];
                unset($data['tags_id']);
            }
            if(isset($data['preview_image'])){
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if(isset($data['main_image'])){
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }
            $post = Post::create($data);
            if (isset($tags_id)){
                $post->tags()->attach($tags_id);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            abort(500, $e->getMessage());
        }
    }

    public function update($data, Post $post){
        try {
            DB::beginTransaction();
            if (isset($data['tags_id'])){
                $tags_id = $data['tags_id'];
                unset($data['tags_id']);
            }

            if(isset($data['preview_image'])){
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }

            if(isset($data['main_image'])){
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }
            if (isset($tags_id)){
                $post->tags()->sync($tags_id);
            } else{
                $post->tags()->detach();
            }
            //dd($data);
            $post->update($data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            abort(500, $e->getMessage());
        }
    }
}
