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

            [
                'title' => 'PHP Basics for Beginners',
                'thumbnail' => 'https://i.ytimg.com/vi/8VJ7tylaaFY/hq720.jpg?sqp=-oaymwEnCNAFEJQDSFryq4qpAxkIARUAAIhCGAHYAQHiAQoIGBACGAY4AUAB&rs=AOn4CLBntq2yFSn4OvSKTiSyOHHvPs214A',
                'url' => 'https://www.youtube.com/watch?v=8VJ7tylaaFY',
            ],

            [
                'title' => 'Краткий пересказ на фильм',
                'thumbnail' => 'https://i.ytimg.com/vi/KfAv_88mp84/hq720.jpg?sqp=-oaymwEnCNAFEJQDSFryq4qpAxkIARUAAIhCGAHYAQHiAQoIGBACGAY4AUAB&rs=AOn4CLALp-03KqC1TX5hZ9GiB-mkMnKVOQ',
                'url' => 'https://www.youtube.com/watch?v=KfAv_88mp84',

                //https://i.ytimg.com/vi/Kky3EBb9Mdw/hq720.jpg?sqp=-oaymwEnCNAFEJQDSFryq4qpAxkIARUAAIhCGAHYAQHiAQoIGBACGAY4AUAB&rs=AOn4CLBfU-cPQBhdn2tYUWgwcQadyXQHjg
            ],

            [
                'title' => 'Про игру престолов',
                'thumbnail' => 'https://i.ytimg.com/vi/Kky3EBb9Mdw/hq720.jpg?sqp=-oaymwEnCNAFEJQDSFryq4qpAxkIARUAAIhCGAHYAQHiAQoIGBACGAY4AUAB&rs=AOn4CLBfU-cPQBhdn2tYUWgwcQadyXQHjg',

                'url' => 'https://www.youtube.com/watch?v=Kky3EBb9Mdw',
            ],

        ];

        return view('videos.index', compact('videos'));
    }
}
