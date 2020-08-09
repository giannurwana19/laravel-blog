<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        $blogs = $post->latest()->take(4)->get();
        $tags = Tag::all();
        $categories = Category::all();
        return view('blog', compact('blogs', 'tags', 'categories'));
    }

    public function isi_post($slug)
    {
        $data = Post::where('slug', $slug)->get();
        $tags = Tag::all();
        $categories = Category::all();
        return view('template_blog.isi_post', compact('data', 'categories', 'tags'));
    }

    public function listBlog()
    {
        $tags = Tag::all();
        $categories = Category::all();
        $posts = Post::latest()->paginate(4);
        return view('template_blog.list_post', compact('categories', 'posts', 'tags'));
    }

    public function listCategory(Category $category)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $data = $category->posts()->paginate(2);
        return view('template_blog.list_category', compact('data', 'categories', 'tags'));
    }
}
