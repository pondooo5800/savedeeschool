<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registerline;
use DOMDocument;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class RegisterlineController extends Controller
{
    public function index()
    {
        $registerlines = Registerline::all();
        return view('admin.registerlines.index', compact('registerlines'));
    }
}
