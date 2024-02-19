<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        return view('index', ['blogs' => Blog::take(6)->latest()->get()]);
    }

    public function create()
    {
        return view('post_blog');
    }

    public function store(Request $request)
    {
        $formfields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'banner' => ['max:2000']
        ]);

        if ($request->hasFile('banner')) {
            $formfields['banner'] = $request->file('banner')->store('banners', 'public');
        }

        $formfields['sub_title'] = $request->sub_title;

        $formfields['user_id'] = Auth::user()->id;
        Blog::create($formfields);

        return redirect('/')->with('message', 'Blog created successfully!');
    }

    public function all()
    {
        return view('all_blogs', ['blogs' => Blog::all()]);
    }

    public function show(Blog $blog)
    {
        return view('single_blog', ['blog' => $blog]);
    }

    public function editDelete()
    {
        return view('edit_delete', ['blogs' => Auth::user()->blogs()->get()]);
    }

    public function edit(Blog $blog)
    {
        return view('edit', ['blog' => $blog]);
    }

    public function update(Request $request, Blog $blog)
    {
        if ($blog->user_id != Auth::user()->id) {
            abort(403, 'Unauthorized Action');
        }

        $formfields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'banner' => ['max:2000']
        ]);

        if ($request->hasFile('banner')) {
            $formfields['banner'] = $request->file('banner')->store('banners', 'public');
        }

        $formfields['sub_title'] = $request->sub_title;

        $blog->update($formfields);

        return back()->with('message', 'Blog updated successfully!');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->user_id != Auth::user()->id) {
            abort(403, 'Unauthorized Action');
        }

        if ($blog->banner && Storage::disk('public')->exists($blog->banner)) {
            Storage::disk('public')->delete($blog->banner);
        }

        $blog->delete();

        return redirect('/blogs/edit/delete')->with('message', 'Blog Deleted successfully!');
    }
}
