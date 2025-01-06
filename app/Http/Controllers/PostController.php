<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller{
    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'title' => 'requred|string|max:255',
            'body' => 'requred|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Post::create([
            'title' => $validate['title'],
            'boody' => $validate['body'],
            'image_url' => $imagePath,
        ]);

        return redirect()->route('home')->with("success", "Post added");
    }
}