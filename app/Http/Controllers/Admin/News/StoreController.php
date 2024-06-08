<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\StoreRequest;
use App\Models\News;
use App\Models\TagsNews;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request):RedirectResponse
    {
        $validatedData = $request->validated();
        $validatedTags = $validatedData['tags'];
        unset($validatedData['tags']);
        $validatedData['image'] = Storage::disk('public')->put('/images', $validatedData['image']);
        $convertedTags = explode(',',$validatedTags);
        $allTags = TagsNews::pluck('title')->toArray();
        foreach ($convertedTags as $tag)
        {
            if (in_array($tag, $allTags))
            {
                $existingTags[] = $tag;
            }
        }
        if (empty($existingTags)){
            $this->addLinks($convertedTags);
            $new = News::create($validatedData);
            TagsNews::create([
                'title'=> $tag,
                'news_id'=>$new->id,
            ]);
            return redirect()->route('admin.new.index');
        }
        return back()->withErrors(['tags'=>"Don't use these tags, they are exist in other news: ".implode(", ", $existingTags)]);
    }
     private function addLinks(array $tags){
        $allNews = News::all('id', 'content')->flatten(1);
         foreach ($tags as $tag) {
             $foundedNews = $allNews->filter( function ($news) use ($tag) {
                 return preg_match("/\b$tag\b/iu",$news->content);
             });
             foreach ($foundedNews as $itemNews) {
                 $urlForTag = route('admin.new.show', ["new" => $itemNews->id]);
                 $linkForTag = "<a href = '$urlForTag' >" . $tag . "</a>";
                 $itemNews->content = str_replace($tag, $linkForTag, $itemNews->content);
                 $itemNews->save();
             }
        }

     }
}
