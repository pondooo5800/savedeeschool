<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Gallery;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class VideoController extends Controller
{


    public function index_gallery()
    {
        $gallerys = Gallery::all();
        return view('admin.gallery.index', compact('gallerys'));
    }
    public function index()
    {
        $videos = Video::all();
        return view('admin.video.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.video.create');
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
            'link' => 'required'
        ]);
        $videoURL = $request->input('link');
        $convertedURL = str_replace("watch?v=", "embed/", $videoURL);

        $video = new Video;
        $video->link = $convertedURL;
        $video->save();

        return redirect()->back()->with('success', 'สร้าง Video เรียบร้อย');
    }

    public function edit($id)
    {
        $videos = Video::find($id);
        return response()->json([
            'status' => 200,
            'videos' => $videos,
        ]);
    }
    public function update(Request $request)
    {
        $v_id = $request->input('id');
        $videos = Video::find($v_id);
        $videoURL = $request->input('link');
        $convertedURL = str_replace("watch?v=", "embed/", $videoURL);
        $videos->link = $convertedURL;
        $videos->update();
        return redirect()->back()->with('success', 'แก้ไข Video เรียบร้อย');
    }


    public function destroy(Request $request)
    {
        $v_id = $request->input('id');
        $videos = Video::find($v_id);

        $videos->delete();

        return redirect()->back()->with('success', 'ลบ Video เรียบร้อย');
    }
    public function deleteImage(Request $request)
    {
        $g_id = $request->input('id');
        $gallerys = Gallery::find($g_id);

        $gallerys->delete();

        return redirect()->back()->with('success', 'ลบ รูปภาพเรียบร้อย');
    }
    public function fileStore(Request $request)
    {
        if ($request->hasFile('file')) {

            $uploadPath = "gallerys/";

            $file = $request->file('file');

            $extention = $file->getClientOriginalExtension();
            $filename = time() . '-' . rand(0, 99) . '.' . $extention;
            $file->move($uploadPath, $filename);

            $finalImageName = $uploadPath . $filename;

            Gallery::create([
                'image' => $finalImageName
            ]);

            return response()->json(['success' => 'อัปโหลดรูปภาพสำเร็จ']);
        } else {
            return response()->json(['error' => 'การอัปโหลดไฟล์ล้มเหลว']);
        }
    }
    // public function fileStore(Request $request) in production
    // {

    //     if ($request->hasFile('file')) {

    //         $uploadPath = "gallerys/";

    //         $file = $request->file('file');

    //         $extention = $file->getClientOriginalExtension();
    //         $filename = time() . '-' . rand(0, 99) . '.' . $extention;
    //         $file->move(public_path() . $uploadPath, $filename);

    //         $finalImageName = $uploadPath . $filename;

    //         Gallery::create([
    //             'image' => $finalImageName
    //         ]);

    //         return response()->json(['success' => 'อัปโหลดรูปภาพสำเร็จ']);
    //     } else {
    //         return response()->json(['error' => 'การอัปโหลดไฟล์ล้มเหลว']);
    //     }
    // }
}
