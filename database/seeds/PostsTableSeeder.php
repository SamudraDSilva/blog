<?php

use Illuminate\Database\Seeder;
use App\Post;
Use App\Category;
Use App\Tag;
Use App\User;
use Illuminate\Support\Facades\Hash;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author1 = User::create([
            'name' => 'Sajith Premadasa',
            'email'=> 'sajith@gmail.com',
            'password'=> Hash::make('password'),
            'role'=>'author'
        ]);

        $author2 = User::create([
            'name' => 'Gotabaya Rajapaksha',
            'email'=> 'gota@gmail.com',
            'password'=> Hash::make('password'),
            'role'=>'author'
        ]);

        $category1 = Category::create([
            'name'=> 'News'
        ]);

        $category2 = Category::create([
            'name'=> 'Updates'
        ]);

        $category3 = Category::create([
            'name'=> 'Marketing'
        ]);

        $category4 = Category::create([
            'name'=> 'Partnership'
        ]);

        $category5 = Category::create([
            'name'=> 'Gozip'
        ]);
        
        $tag1 = Tag::create([
            'name'=> 'Job'
        ]);

        $tag2 = Tag::create([
            'name'=> 'Screenshot'
        ]);

        $tag3 = Tag::create([
            'name'=> 'Progress'
        ]);

        $tag4 = Tag::create([
            'name'=> 'Customers'
        ]);

        $tag5 = Tag::create([
            'name'=> 'Hack'
        ]);
        
        $post1 = Post::create([
            'title'=> 'The standard Lorem Ipsum passage, used since the 1500s',
            'content' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.',
            'category_id' => $category1->id,
            'author_id'=> $author1->id,
            'image'=> 'posts/1.jpg',
            'slug'=> 'The-standard-Lorem-Ipsum-passage-used-since-the-1500s',
            'published_at'=>'2019-11-29 12:00:00'
        ]);

        $post2 = Post::create([
            'title'=> 'Where does it come from?',
            'content' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.',
            'category_id' => $category1->id,
            'author_id'=> $author1->id,
            'image'=> 'posts/2.jpg',
            'slug'=> 'Where-does-it-come-from?',
            'published_at'=>'2019-11-29 12:00:00'
        ]);

        $post3 = Post::create([
            'title'=> '1914 translation by H. Rackham',
            'content' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.',
            'category_id' => $category2->id,
            'author_id'=> $author1->id,
            'image'=> 'posts/3.jpg',
            'slug'=> '1914-translation-by-H-Rackham',
            'published_at'=>'2019-11-29 12:00:00'
        ]);

        $post4 = Post::create([
            'title'=> 'perferendis doloribus asperiores repellat',
            'content' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.',
            'category_id' => $category4->id,
            'author_id'=> $author2->id,
            'image'=> 'posts/4.jpg',
            'slug'=> 'perferendis-doloribus-asperiores-repellat',
            'published_at'=>'2019-11-29 12:00:00'
        ]);

        $post1->tags()->attach([$tag1->id,$tag3->id]);
        $post2->tags()->attach([$tag3->id,$tag4->id]);
        $post3->tags()->attach([$tag1->id,$tag2->id]);
        $post4->tags()->attach([$tag4->id,$tag3->id]);
    }
}
