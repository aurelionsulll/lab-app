<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Wink\WinkPost;

class BlogController extends Controller
{
    public function index()
    {
        $posts = WinkPost::with('tags')
        ->live()
        ->orderBy('publish_date','DESC')
        ->simplePaginate(12);
        
        return view('blogPost')->with('posts',$posts);
    }
    public function show($slug)
    {
        $post = WinkPost::where('slug',$slug)->first();
        return view('post')->with('post',$post);
    }
}
