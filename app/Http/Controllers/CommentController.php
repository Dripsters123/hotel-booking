<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(Room $room)
    {
        return view('comments.create', compact('room'));
    }

    public function store(Request $request, Room $room)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $comment = new Comment;
        $comment->body = $request->body;
        $comment->user_id = Auth::id();
        $room->comments()->save($comment);

        return back();
    }
}
