<?php

use App\Article;
use App\Comment;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker\factory::create();
        $article=Article::all()->pluck('id');
        for ($i=0;$i<20;$i++){
            Comment::create([
                'article_id'=>$faker->randomElement($article),
                'name'=>$faker->name,
                'content'=>$faker->paragraph,
                'email'=>$faker->safeEmail,
            ]);
        }
    }
}
