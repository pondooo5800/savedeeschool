<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\License;
use DOMDocument;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class LicenseController extends Controller
{
    public function index()
    {
        $licenses = License::all();
        return view('admin.license.index', compact('licenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.license.create');
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

            $file->move(public_path() . '/licenses/', $filename);
        }
        $dom = new DOMDocument();
        $dom->loadHTML(mb_convert_encoding($request->content, 'HTML-ENTITIES', 'UTF-8'));

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
            $image_name = "/licenses/" . time() . $key . '.png';
            file_put_contents(public_path() . $image_name, $data);

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }
        $content = $dom->saveHTML();
        $request->merge([
            'content' => $content,
        ]);
        License::create($request->all());
        return redirect()->route('license.index')
            ->with('success', 'สร้าง บทความ (รอบรู้เรื่องขับขี่) เรียบร้อย');
    }

    public function show(License $license)
    {
        return view('admin.license.show', compact('license'));
    }

    public function edit(License $license)
    {
        return view('admin.license.edit', compact('license'));
    }

    public function update(Request $request, License $license)
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
            $request->image->move(public_path('licenses'), $imageName);
            $input['image_name'] = $imageName;
            if ($license->imageName) {
                File::delete(public_path('licenses/' . $license->imageName));
            }
        } else {
            unset($input['image_name']);
            $input['image_name'] = $license->imageName;
        }
        $content = $request->content;
        $dom = new DOMDocument();
        $dom->loadHTML(mb_convert_encoding($request->content, 'HTML-ENTITIES', 'UTF-8'));


        $images = $dom->getElementsByTagName('img');
        foreach ($images as $key => $img) {
            if (strpos($img->getAttribute('src'), 'data:image/') === 0) {
                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $image_name = "/license/" . time() . $key . '.png';
                file_put_contents(public_path() . $image_name, $data);

                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }
        $content = $dom->saveHTML();
        $license->update([
            'title' => $request->title,
            'description' => $request->description,
            'imageName' => $input['image_name'],
            'content' => $content
        ]);
        return redirect()->route('license.index')
            ->with('success', 'แก้ไขเรียบร้อย');
    }

    public function destroy(License $license)
    {
        File::delete(public_path('licenses/' . $license->imageName));
        $license->delete();

        return redirect()->route('license.index')
            ->with('success', 'ลบเรียบร้อย');
    }
}
