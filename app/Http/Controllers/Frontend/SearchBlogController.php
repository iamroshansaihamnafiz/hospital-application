<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class SearchBlogController extends Controller
{
    // Search Blogs
    public function find_blog(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ]);

        $blogs = Blog::where("title", "LIKE", "%" . $request->search . "%")
            ->orWhere('tag', "LIKE", "%" . $request->search . "%")
            ->orWhere('description', "LIKE", "%" . $request->search . "%")
            ->take(5)->get();
        return view('frontend.search.search-blog', compact('blogs'));
    }
}
