<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        Post::factory(10)->create()->each(function ($post) {
            $post->comments()
                ->saveMany(Comment::factory(mt_rand(1, 2))->make());
        });

        Video::factory(10)->create()->each(function ($video) {
            $video->comments()
                ->saveMany(Comment::factory(mt_rand(1, 2))->make());
        });
    }
}
