<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    
    public function index() {
        
        return view('welcome')->
                with('tags', Tag::all())->
                with('categories', Category::all())->
                with('posts', Post::searched()->simplepaginate(3));
    }
    
    public function show(Post $post) {
        return view('blog.show')->with('post', $post);
    }
    
    public function category(Category $category) {
        
      
        return view('blog.category')->with('category', $category)->
                with('posts', $category->posts()->searched()->simplepaginate(3))->
                with('categories', Category::all())->
                with('tags', Tag::all());
    }
    public function tag(Tag $tag) {
        
        
        return view('blog.tag')->with('tag', $tag)->
                with('posts', $tag->posts()->searched()->simplePaginate(3))->
                with('categories', Category::all())->
                with('tags', Tag::all());
    }
}
