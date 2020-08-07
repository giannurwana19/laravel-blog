<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::paginate(5);
        return view('admin.post.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $category = Category::all();
        return view('admin.post.create', compact('category', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|min:3',
            'category_id' => 'required',
            'content' => 'required|min:3',
            'gambar' => 'required',
        ]);

        $gambar = $request->gambar;
        $new_gambar = time() . $gambar->getClientOriginalName();
        
        $post = Post::create([
            'judul' => $request->judul,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'gambar' => $new_gambar,
            'slug' => Str::slug($request->judul)
        ]);

        $post->tags()->attach($request->tags);

        // cara 1 
        // $gambar->move('public/uploads/posts/', $new_gambar);

        // cara 2 (lebih efektif)
        Storage::putFileAs('public/posts', $request->file('gambar'), $new_gambar);

        return redirect()->route('post.index')->with('pesan', 'ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $data = Post::findOrFail($post->id);
        return view('admin.post.edit', compact('data', 'tags', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'judul' => 'required|min:3',
            'category_id' => 'required',
            'content' => 'required|min:3',
        ]);

        $post = Post::findOrFail($post->id);

        if($request->file('gambar')){
            $gambar = $request->gambar;
            $new_gambar = time() . $gambar->getClientOriginalName();

            Storage::putFileAs('public/posts', $request->file('gambar'), $new_gambar);
            Storage::delete("public/posts/{$post->gambar}");

        } else {
            $new_gambar = $post->gambar;
        }

        $post->update([
            'judul' => $request->judul,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'gambar' => $new_gambar,
            'slug' => Str::slug($request->judul)
        ]);

        $post->tags()->sync($request->tags);

        return redirect()->route('post.index')->with('pesan', 'Ddiubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $data = Post::findOrFail($post->id);
        $data->delete();
        return redirect()->route('post.index')->with('pesan', 'dihapus!');
    }
}
