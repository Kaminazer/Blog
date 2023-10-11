<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(10)->create();

         Category::factory(5)->create();
         $tags = Tag::factory(5)->create();
         $posts = Post::factory(10)->create();
          foreach ($posts as $post) {
              $post->tags()->attach($tags->random(3)->pluck('id')->toArray());
         }
    }
}
