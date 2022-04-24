<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Session;
use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Middleware\verifyCategoriesCount;

class PostsController extends Controller
{
    public function __construct() {
        $this->middleware(verifyCategoriesCount::class)->only(['create', 'store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request)
    {
        /// Upload the image
        $image = $request->image->store('posts');
        
        // Save the post
        $post = Post::create([
                'title' => $request->title,
                'description' => $request->description,
                'content' => $request->content,
                'image' => $image,
                'published_at' => $request->published_at,
                'category_id' => $request->category,
                'user_id' => auth()->user()->id,
        ]);
        
        if($post->tags){
            $post->tags()->attach($request->tags);
        }
        //Display message
        Session::flash('success', 'Great the Post was created successfully');
        return redirect(route('posts.index'));// View Posts
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with('post', $post)->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        /// Hold secure data 
        $data = $request->only(['title', 'description', 'content', 'published_at', 'category']);
        /// check if the user upload new pic
        if($request->hasFile('image')){
          $image = $request->image->store('posts');  
          /// Delete old image
          $post->deleteImage();
          
          $data['image'] = $image;
        }
        
        if($request->tags){
            $post->tags()->sync($request->tags);
        }
        $post->update($data);
        Session::flash('success', 'The Post was updated successfully');
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        if($post->trashed()){
            $post->deleteImage();
            $post->forceDelete();
        }else{
            $post->delete();
        }
        Session::flash('success', 'The Post was deleted successfully');
        return redirect(route('posts.index'));
        
    }
    
    public function trashed() {
        $trashed = Post::onlyTrashed()->get();
        
        return view('posts.index')->with('posts',$trashed);
    }
    
    public function restore($id) {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        $post->restore();
        Session::flash('success', 'The Post was restored successfully');
        return redirect()->back();
    }
    
    
    
}
