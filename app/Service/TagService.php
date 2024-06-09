<?php

namespace App\Service;

use App\Models\News;
use App\Models\Post;
use App\Models\TagsNews;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TagService
{
    public function addLinks(array $tags){
        $allNews = News::all('id', 'content')->flatten(1);
        foreach ($tags as $tag) {
            $foundedNews = $allNews->filter( function ($news) use ($tag) {
                return preg_match("/\b$tag\b/ui",$news->content);
            });
            foreach ($foundedNews as $itemNews) {
                $urlForTag = route('admin.new.show', ["new" => $itemNews->id]);
                $itemNews->content = preg_replace(
                    "/\b$tag\b/ui",
                    "<a href = '$urlForTag' >$0</a>",
                    $itemNews->content
                );
                $itemNews->save();
            }
        }
    }

    public function checkContent($content)
    {
        $tags = TagsNews::all();
        foreach ( $tags as $tag) {
            preg_match_all("/\b$tag->title\b/ui",$content,$matches );
            if(!empty($matches[0])){
                $idRelatedNews = $tag->new->id;
                $urlForTag = route('admin.new.show', ["new" => $idRelatedNews]);
                $content = preg_replace(
                    "/\b$tag->title\b/ui",
                    "<a href = '$urlForTag' >$0</a>",
                    $content
                );
            }
        }
        return $content;
    }
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

