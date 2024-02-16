<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class VideoController extends Controller
{


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


        Video::create($request->all());
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
        $videos->link = $request->input('link');
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
}
