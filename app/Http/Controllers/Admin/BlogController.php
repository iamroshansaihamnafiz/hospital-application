<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    // Blog Index View
    public function index()
    {
        // Get All Blog
        $blogs = Blog::all();
        return view('admin.blog.index', compact('blogs'));
    }


    // Blog Crate View
    public function blog_create(Request $request)
    {
        return view('admin.blog.create');
    }


    // Upload Blog In Database
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
        }
        $rules = [
            'title' => 'required',
            'image' => 'required',
            'description' => 'required',
        ];

        $customMessage = [
            'title.required' => 'Title is required',
            'description.required' => 'Description is required',
            'image.required' => 'Image is required',
        ];

        $validator = Validator::make($data, $rules, $customMessage);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $blog = new Blog();
        $blog->title = $data['title'];
        $blog->tag = $data['tag'];
        $blog->description = $data['description'];

        // Blog Image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('admin/images/upload-blog', $filename);
            $blog->image = $filename;
        }
        $blog->save();
        return redirect()->back()->with('message', 'Blog Created Successfully');
    }


    // Blog View
    public function blog_view($id)
    {
        // Get Blog Details
        $blog = Blog::find($id);
        return view('admin.blog.blog-view', compact('blog'));
    }


    // Update Blog To First Get ID
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.edit', compact('blog'));
    }


    // Update Blog In Database
    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);

        $request->validate([
            'title' => 'required',
            'tag' => 'required',
            'description' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $path = 'admin/images/upload-blog/' . $blog->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('admin/images/upload-blog', $filename);
            $blog->image = $filename;
        }
        $blog->title = $request->title;
        $blog->tag = $request->tag;
        $blog->description = $request->description;
        $blog->update();
        return redirect('/blogs')->with('message', "Blog Updated Successfully");
    }


    // Change Ststus Usign Ajax
    public function change_status(Request $request)
    {
        $blog = Blog::find($request->blog_id);
        $blog->status = $request->status;
        $blog->save();
    }


    // Delete Blog
    public function destroy($id)
    {
        $delete_data = Blog::find($id);
        $delete_data->delete();
        if ($delete_data) {
            return redirect()->back()->with('message', 'Blog Deleted Successfully');
        }
    }

}
