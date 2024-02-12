<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courseopen;
use Illuminate\Support\Facades\File;


class CourseopenController extends Controller
{
    public function index()
    {
        $courseopens = Courseopen::all();
        return view('admin.courseopen.index', compact('courseopens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courseopen.create');
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
        ]);

        $input = $request->all();
        $imageName = '';
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('courseopens'), $imageName);
        $input['image_name'] = $imageName;
        Courseopen::create($input);

        return redirect()->route('courseopen.index')
            ->with('success', 'สร้างหลักสูตรสำเร็จแล้ว');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Courseopen  $courseopen
     * @return \Illuminate\Http\Response
     */
    public function show(Courseopen $courseopen)
    {
        return view('admin.courseopen.show', compact('courseopen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Courseopen  $courseopen
     * @return \Illuminate\Http\Response
     */
    public function edit(Courseopen $courseopen)
    {
        return view('admin.courseopen.edit', compact('courseopen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Courseopen  $courseopen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courseopen $courseopen)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $input = $request->all();
        $imageName = '';
        if ($request->file('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('courseopens'), $imageName);
        $input['image_name'] = $imageName;
            if ($courseopen->image_name) {
                File::delete(public_path('courseopens/'.$courseopen->image_name));            }
        } else {
        unset($input['image_name']);
        }
        $courseopen->update($input);

        $courseopen->update($request->all());
        return redirect()->route('courseopen.index')
            ->with('success', 'แก้ไขหลักสูตรเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Courseopen  $courseopen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courseopen $courseopen)
    {
        File::delete(public_path('courseopens/'.$courseopen->image_name));
        $courseopen->delete();

        return redirect()->route('courseopen.index')
            ->with('success', 'ลบหลักสูตรเรียบร้อยแล้ว');
    }
}