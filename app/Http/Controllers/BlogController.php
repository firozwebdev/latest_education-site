<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function blog()
    {
        $blogs = \App\Models\Blog::where('is_published', true)
            ->latest()
            ->paginate(12);

        return view('pages.resources.blog', compact('blogs'));
    }

    public function blogDetails($blog = null)
    {
        // If no blog param provided, show listing or redirect to a safe page
        if (is_null($blog)) {
            return redirect()->route('blog');
        }

        // Allow slug or id
        $model = null;
        if (is_numeric($blog)) {
            $model = \App\Models\Blog::find($blog);
        } else {
            $model = \App\Models\Blog::where('slug', $blog)->first();
        }

        if (!$model) {
            abort(404);
        }

        // Get related blogs (same category, excluding current blog)
        $relatedBlogs = \App\Models\Blog::where('category', $model->category)
            ->where('id', '!=', $model->id)
            ->where('is_published', true)
            ->latest()
            ->limit(3)
            ->get();

        return view('blog/blogDetails', [
            'blog' => $model,
            'relatedBlogs' => $relatedBlogs,
        ]);
    }

    public function blogGridMinimal()
    {
        return view('blog/blogGridMinimal');
    }

    public function blogList()
    {
        return view('blog/blogList');
    }

    public function blogWithSidebar()
    {
        return view('blog/blogWithSidebar');
    }

    public function postFormatAudio()
    {
        return view('blog/postFormatAudio');
    }

    public function postFormatGallery()
    {
        return view('blog/postFormatGallery');
    }

    public function postFormatQuote()
    {
        return view('blog/postFormatQuote');
    }

    public function postFormatStandard()
    {
        return view('blog/postFormatStandard');
    }

    public function postFormatVideo()
    {
        return view('blog/postFormatVideo');
    }

}
