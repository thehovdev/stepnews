<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\PostLang;
use App\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        $posts = $post->paginate('5');
        return view('post.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create')->withCategories(Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post, CreatePostRequest $request)
    {
        $validatedData = $request->validated();
        $post->user_id = Auth::user()->id;
        $post->category_id = $validatedData['category'];
        $post->save();
        foreach ($validatedData as $key => $value) {
            if (in_array($key, config('app.locales'))) {;
                $lang = new PostLang();
                $lang->post_id = $post->id;
                $lang->lang = $key;
                $lang->title = $value['title'];
                $lang->content = $value['content'];
                $lang->save();
            }
        }
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit')->with([ 
            'post' => $post,
            'categories' => Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post, CreatePostRequest $request)
    {
        $validatedData = $request->validated();
        $post->category_id = $validatedData['category'];
        $post->save();

        foreach ($validatedData as $key => $value) {
            if (in_array($key, config('app.locales'))) {;
                $lang = PostLang::where([
                    'post_id' => $post->id, 
                    'lang' => $key
                    ])->first();
                $lang->title = $value['title'];
                $lang->content = $value['content'];
                $lang->save();
            }
        }
        
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }
}
