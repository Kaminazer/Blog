<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\StoreRequest;
use App\Models\News;
use App\Models\TagsNews;
use App\Service\TagService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request, TagService $service):RedirectResponse
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
            $service->addLinks($convertedTags);
            $modifiedContent = $service->checkContent($validatedData['content']);
            $validatedData['content'] = $modifiedContent;
            $new = News::create($validatedData);
            TagsNews::create([
                'title'=> $tag,
                'news_id'=>$new->id,
            ]);
            return redirect()->route('admin.new.index');
        }
        return back()->withErrors(['tags'=>"Don't use these tags, they are exist in other news: ".implode(", ", $existingTags)]);
    }
}
