<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use DOMDocument;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'content' => 'required',
        ]);


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = rand() . '.' . $file->getClientOriginalName();
            $request->merge([
                'imageName' => $filename
            ]);

            $file->move(public_path() . '/blogs/', $filename);
        }
        $dom = new DOMDocument();
        $dom->loadHTML(mb_convert_encoding($request->content, 'HTML-ENTITIES', 'UTF-8'));

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
            $image_name = "/blogs/" . time() . $key . '.png';
            file_put_contents(public_path() . $image_name, $data);

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }
        $content = $dom->saveHTML();
        $request->merge([
            'content' => $content,
        ]);
        Blog::create($request->all());
        return redirect()->route('blog.index')
            ->with('success', 'สร้าง บทความ (รอบรู้เรื่องขับขี่) เรียบร้อย');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('admin.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
        ]);
        $input = $request->all();
        $imageName = '';
        if ($request->file('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('blogs'), $imageName);
            $input['image_name'] = $imageName;
            if ($blog->imageName) {
                File::delete(public_path('blogs/' . $blog->imageName));
            }
        } else {
            unset($input['image_name']);
            $input['image_name'] = $blog->imageName;
        }
        $content = $request->content;
        $dom = new DOMDocument();
        $dom->loadHTML(mb_convert_encoding($request->content, 'HTML-ENTITIES', 'UTF-8'));


        $images = $dom->getElementsByTagName('img');
        foreach ($images as $key => $img) {
            if (strpos($img->getAttribute('src'), 'data:image/') === 0) {
                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $image_name = "/blogs/" . time() . $key . '.png';
                file_put_contents(public_path() . $image_name, $data);

                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }
        $content = $dom->saveHTML();
        $blog->update([
            'title' => $request->title,
            'description' => $request->description,
            'imageName' => $input['image_name'],
            'content' => $content
        ]);
        return redirect()->route('blog.index')
            ->with('success', 'แก้ไข บทความ (รอบรู้เรื่องขับขี่) เรียบร้อย');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        File::delete(public_path('blogs/' . $blog->imageName));
        $blog->delete();

        return redirect()->route('blog.index')
            ->with('success', 'ลบ บทความ (รอบรู้เรื่องขับขี่) เรียบร้อย');
    }
}
