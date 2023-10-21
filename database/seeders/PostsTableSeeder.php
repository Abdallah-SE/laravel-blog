<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
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
            'name' => 'Sallam said',
            'email' => 'Sallam.said@gmail.com',
            'password' => Hash::make('password')
        ]);
        $author2 = User::create([
            'name' => 'saad said',
            'email' => 'saad.said@gmail.com',
            'password' => Hash::make('password')
        ]);
        $author3 = User::create([
            'name' => 'sallem harb',
            'email' => 'sallem.harb@gmail.com',
            'password' => Hash::make('password')
        ]);
        $author4 = User::create([
            'name' => 'fox aid',
            'email' => 'foxaid@gmail.com',
            'password' => Hash::make('password')
        ]);
        $author5 = User::create([
            'name' => 'sallwa',
            'email' => 'sallwa.said@gmail.com',
            'password' => Hash::make('password')
        ]);
        
        $category1 = Category::create([
            'name' => 'News'
        ]);
        $category2 = Category::create([
            'name' => 'Design'
        ]);
        $category3 = Category::create([
            'name' => 'Partnership'
        ]);
        $category4 = Category::create([
            'name' => 'Marketing'
        ]);
        $category5 = Category::create([
            'name' => 'Updates'
        ]);
        
        $post1 = $author1->posts()->create([
            'title' => 'Best practices for minimalist design with example',
            'description' => 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, ',
            'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'category_id' => $category1->id,
            'image' => 'posts/1.jpg'
        ]);
        $post2 = Post::create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'description' => 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, ',
            'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'category_id' => $category4->id,
            'image' => 'posts/2.jpg',
            'user_id' => $author2->id
        ]);
        $post3 = Post::create([
            'title' => 'Best practices for minimalist design with example',
            'description' => 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, ',
            'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'category_id' => $category4->id,
            'image' => 'posts/3.jpg',
            'user_id' => $author1->id
        ]);
        $post4 = Post::create([
            'title' => 'This is why it\'s time to ditch dress codes at work',
            'description' => 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, ',
            'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'category_id' => $category5->id,
            'image' => 'posts/4.jpg',
            'user_id' => $author3->id
        ]);
        $post5 = Post::create([
            'title' => 'Updates of  for minimalist design with example',
            'description' => 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, ',
            'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'category_id' => $category1->id,
            'image' => 'posts/5.jpg',
            'user_id' => $author4->id
        ]);
        $post6 = Post::create([
            'title' => 'The design of the fine implementation',
            'description' => 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, ',
            'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'category_id' => $category2->id,
            'image' => 'posts/6.jpg',
            'user_id' => $author5->id
        ]);
        
        $tag1 = Tag::create([
            'name' => 'Record'
        ]);
        $tag2 = Tag::create([
            'name' => 'Progress'
        ]);
        $tag3 = Tag::create([
            'name' => 'Customers'
        ]);
        $tag4 = Tag::create([
            'name' => 'Milestone'
        ]);
        $tag5 = Tag::create([
            'name' => 'Design'
        ]);
        $tag6 = Tag::create([
            'name' => 'Job'
        ]);
        
        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag2->id, $tag3->id]);
        $post3->tags()->attach([$tag5->id, $tag2->id]);
        $post4->tags()->attach([$tag3->id, $tag1->id]);
        $post5->tags()->attach([$tag6->id, $tag1->id]);
        $post6->tags()->attach([$tag5->id, $tag4->id]);
    }
}
