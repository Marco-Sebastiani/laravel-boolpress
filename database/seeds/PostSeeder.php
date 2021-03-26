<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;
use App\User;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<10; $i++){
            $newPost = new Post();
            $userCount = count(User::all()->toArray());
            $newPost->user_id = rand(1,$userCount);


            $newPost->title = $faker->sentence(3);
            $newPost->content = $faker->text(500);
            //QUI GESTISCO L'UNICITA' DELLO SLUG
            $slug = Str::slug($newPost->title);
            $initialSlug = $slug;
            $presentPost=Post::where('slug',$slug)->first();
            $counter = 1;

            while($presentPost){
                $slug = $initialSlug . '-' . $counter;
                $presentPost=Post::where('slug',$slug)->first();
                $counter++;
            }

            $newPost->slug =  $slug;
            $newPost->save();
        }
    }
}
