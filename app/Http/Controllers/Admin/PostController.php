<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Post;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        $data = [
            'posts' => $posts
        ];

        return view('admin.post.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $data = [
            'tags'=> $tags
        ];
        return view('admin.post.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $idUser= Auth::id();

        $request->validate([
            'title' => 'required|unique:posts|max:100',
            'content' => 'required',
            'image' => 'min:1|max:2048'
        ]);
        $newPost = new Post();
        $newPost->user_id = $idUser;
        $newPost->slug = Str::slug($data['title']);
        $newPost->fill($data);
        
        $cover_path = Storage::put('post_covers', $data['image']);
        // dd($cover_path);
        $data['cover']=$cover_path;
        $newPost->cover = $data['cover'];
        $newPost->save();

        if(array_key_exists('tags', $data)){
            $newPost->tags()->sync($data['tags']);
        }


        return redirect()->route('post.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data=[
        //     'post' => $post
        // ];

        // return view('admin.post.show',$data);

        return view('admin.post.show')->with('post', Post::findOrFail( $id ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {   
        $tags = Tag::all();
        $data = [
            'post'=> $post,
            'tags'=> $tags
        ];

        return view('admin.post.edit', $data);
        // return view('admin.post.edit')->with('post', Post::findOrFail( $id ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data =$request->all();



        if($data['title'] != $post->title){
            $slug = Str::slug($data['title']);
            $data['slug'] = $slug;
        }

        if(array_key_exists('image', $data)){
            $cover_path = Storage::put('post_covers', $data['image']);
            $data['cover']=$cover_path;
        }



        $post->update($data);
        if(array_key_exists('tags', $data)){
            $post->tags()->sync($data['tags']);
        }
        return redirect()->route('post.show', $post); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {   
        $post->tags()->sync([]);
        $post->delete();
        return redirect()->route('post.index')->with('status', 'Post deleted!');
    }
}
