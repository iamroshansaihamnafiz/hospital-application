<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        // Get All News
        $blogs = Blog::where('status', 1)->paginate(6);
        // Recent Blog
        $recent_blogs = Blog::where('status', 1)->orderBy('id', 'DESC')->limit(3)->get();
        return view('frontend.news.index', compact('blogs', 'recent_blogs'));
    }


    // View Blog
    public function blog_view($id)
    {
        // Get All News
        $blog = Blog::find($id);
        // Recent Blog
        $recent_blogs = Blog::where('status', 1)->orderBy('id', 'DESC')->limit(5)->get();
        return view('frontend.news.news-details', compact('blog', 'recent_blogs'));
    }
}
