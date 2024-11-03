<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostsRequest;
use App\Post;
use App\Category;
use App\Tag;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;

class PostsController extends Controller
{

    public function __construct(){
        $this->middleware('verifyCategoriesCount')->only(['create','store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create')->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request)
    {
        // upload image to storage
        $image = $request->image->store('posts');

        //create the post
        $post = Post::create([
            'title'=>$request->title,
            'image'=>$image,
            'content'=>$request->content,
            'published_at'=>$request->published_at,
            'category_id'=>$request->category_id,
            'author_id'=>$request->author_id,
            'slug'=> Str::slug($request->title,'-')
        ]);

        if($request->tags){
            $post->tags()->attach($request->tags);
        }
            

        //flash message
        session()->flash('success','Post created successfully');

        //redirect
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.create')->with('post' ,$post)->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostsRequest $request , Post $post)
    {
        $data = $request->only([
            'title',
            'content',
            'published_at',
            'category_id',
            
            ]);
        
        $data['slug'] = Str::slug($request->title,'-');

        //cheack if new image 
        if($request->hasFile('image')){
            //upload it
            $image = $request->image->store('posts');
            //delete old one
            $post->deleteImage();
            $data['image'] = $image;

        }

       

        if($request->tags){
            $post->tags()->sync($request->tags);
        }


        //update attribute
        $post->update($data);

        //flash message
        session()->flash('success','Post updated successfully');

        //redirect
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
            $post->forceDelete();
            $post->deleteImage();
            session()->flash('success','Post deleted successfully');
            return redirect(route('trashed-posts.index'));
        }
        else{

            $post->delete();
            session()->flash('success','Post trashed successfully');
            return redirect(route('posts.index'));
        }

        //redirect

    }

    public function trashed(){
        $trashed = Post::onlyTrashed()->get();
        return view('admin.posts.index')->with('posts', $trashed);
    }

    public function restore($id){
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        $post->restore();
        session()->flash('success','Post restored successfully');
        return redirect(route('trashed-posts.index'));

    }

    
}
