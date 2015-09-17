<?php

namespace App\Http\Controllers;

use App\Comment;

class ClapprController extends Controller
{
    public function show()
    {
        return view('clappr.comment-plugin.show');
    }

    public function commentList($video_id)
    {
    	header('Access-Control-Allow-Origin: *');
    	return response()->json(Comment::all()->toArray());
    }
}