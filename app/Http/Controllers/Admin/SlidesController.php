<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use Illuminate\Support\Facades\File;

class SlidesController extends Controller
{
    //
    public function list()
    {
        $slide = Slide::all();
        return view('admin.slide.index')->with('slide', $slide);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $courses = Slide::latest()->paginate(5);

        // return view('admin.course.index', compact('courses'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);

        $slide = Slide::all();
        return view('admin.slide.index', compact('slide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slide.create');
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
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('slides'), $imageName);

        /* Store $imageName name in DATABASE from HERE */
        $dateSlide = [
            'title' => $request->title,
            'image_name' => $imageName
        ];

        Slide::create($dateSlide);

        return redirect()->route('slide.index')
            ->with('success', 'เพิ่มรูปภาพสำเร็จแล้ว');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slide  $course
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slide  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        return view('admin.slide.edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slide  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $input = $request->all();
        $imageName = '';
        if ($request->file('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('slides'), $imageName);
        $input['image_name'] = $imageName;
            if ($slide->image_name) {
                File::delete(public_path('slides/'.$slide->image_name));            }
        } else {
        unset($input['image_name']);
        }
        $slide->update($input);

        return redirect()->route('slide.index')
            ->with('success', 'แก้ไขหลักสูตรเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slide  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
        File::delete(public_path('slides/'.$slide->image_name));
        $slide->delete();

        return redirect()->route('slide.index')
            ->with('success', 'ลบหลักสูตรเรียบร้อยแล้ว');
    }
}