<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Facades\DB;


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
        User::factory(15)->hasPosts(4)->create();
        Comment::factory(80)->create();
        Tag::factory(25)->create();

        $categoryCount = Tag::count();
        $postCount = Post::count();
        for($i = 0 ; $i < 150 ; $i++){
            DB::table('tags_posts')->insertOrIgnore(
                ['tag_id' => rand(1, $categoryCount), 
                'post_id' => rand(1, $postCount)]
            );
        }
    }
}
