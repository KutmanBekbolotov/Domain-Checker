<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = [
            [
                'title' => 'Learn Laravel in 10 Minutes',
                'thumbnail' => 'https://img.youtube.com/vi/XY8YV5B4dmA/hqdefault.jpg',
                'url' => 'https://www.youtube.com/watch?v=XY8YV5B4dmA',
            ],
            [
                'title' => 'Bootstrap 5 Crash Course',
                'thumbnail' => 'https://img.youtube.com/vi/5GcQtLDGXy8/hqdefault.jpg',
                'url' => 'https://www.youtube.com/watch?v=5GcQtLDGXy8',
            ],
            [
                'title' => 'PHP Basics for Beginners',
                'thumbnail' => 'https://img.youtube.com/vi/Bx54MGLP5FU/hqdefault.jpg',
                'url' => 'https://www.youtube.com/watch?v=Bx54MGLP5FU',
            ],
        ];

        return view('videos.index', compact('videos'));
    }
}
