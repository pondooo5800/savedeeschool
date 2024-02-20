<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Course;
use App\Models\Blog;
use App\Models\Video;
use App\Models\Gallery;
use App\Models\License;
use App\Models\Registerlog;


class FrontendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $slide = Slide::all();
        $cours = Course::all();
        $blog = Blog::all();
        $video = Video::all();
        return view('frontend.index')->with([
            'slides' => $slide,
            'courses' => $cours,
            'blogs' => $blog,
            'videos' => $video,
        ]);
    }
    public function about($id = null)
    {
        if ($id !== null) {
            $blog = Blog::find($id);
            return view('frontend.about_detail')->with('blog', $blog);
        } else {
            $blogs = Blog::all();
            return view('frontend.about')->with('blogs', $blogs);
        }
    }
    public function course_detail($id)
    {
        $course = Course::find($id);
        $coursAll = Course::all();
        return view('frontend.course_detail')->with([
            'course' => $course,
            'coursAll' => $coursAll
        ]);
    }
    public function contact()
    {
        $coursAll = Course::all();

        return view('frontend.contact')->with('coursAll', $coursAll);
    }
    public function video()
    {
        $video = Video::all();
        return view('frontend.video')->with([
            'videos' => $video,
        ]);
    }
    public function gallery()
    {
        $gallerys = Gallery::all();
        return view('frontend.gallery', compact('gallerys'));
    }
    public function new_license()
    {
        $licenses = License::find(1);
        return view('frontend.new_license', compact('licenses'));
    }
    public function renew_license()
    {
        $licenses = License::find(2);
        return view('frontend.renew_license', compact('licenses'));
    }
    public function internationa_license()
    {
        return view('frontend.internationa_license', compact('licenses'));
    }
    public function theory()
    {
        $licenses = License::find(3);
        return view('frontend.theory', compact('licenses'));
    }
    public function practical()
    {
        $licenses = License::find(4);
        return view('frontend.practical', compact('licenses'));
    }

    public function notify_message($message, $token)
    {
        $queryData = array('message' => $message);
        $queryData = http_build_query($queryData, '', '&');
        $headerOptions = array(
            'http' => array(
                'method' => 'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                    . "Authorization: Bearer " . $token . "\r\n"
                    . "Content-Length: " . strlen($queryData) . "\r\n",
                'content' => $queryData
            ),
        );
        $context = stream_context_create($headerOptions);
        $result = file_get_contents(LINE_API, FALSE, $context);
        $res = json_decode($result);
        return $res;
    }
    public function sendNotification(Request $request)
    {

        $registerLog = Registerlog::create($request->all());
        $newId = $registerLog->id;
        $formattedId = sprintf('%04d', $newId);
        $year = date("Y");
        $lastTwoDigits = substr($year, -2);
        $text = $lastTwoDigits . $formattedId;



        define('LINE_API', "https://notify-api.line.me/api/notify");
        $token = "JnaJsIMMCRGtWpJnbddjgp9gJwXN6EO1hjJiQ5x3QDH"; //ใส่Token ที่copy เอาไว้
        $str = "สมัครเรียนขับรถ:
        เลขที่: " . $text . "
        วันที่: " . date("d-m-Y") . "
        เวลา: " . date("h:i:s") . "
        ชื่อ: " . $request->input('name') . "
        เบอร์โทร: " . $request->input('phone') . "
        Line ID: " . $request->input('line') . "
        หลักสูตร: " . $request->input('course') . "
        รับข้อมูลเพิ่มเติม คลิ๊กที่ http://line.me/ti/p/%40yoz5198g";
        $res = $this->notify_message($str, $token);
        print_r($str);
        // die();
        return redirect()->back()->with('success', 'สมัครเรียนเรียบร้อยแล้ว');

    }
}
