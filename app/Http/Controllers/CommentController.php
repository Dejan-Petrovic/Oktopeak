<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller 
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'text' => 'required|string',
        ]);

        Comment::create([
            'name' => $request->name,
            'email' => $request->email,
            'text' => $request->text,
            'status' => Comment::STATUS_PENDING,
        ]);

        return redirect()->back()->with('success', 'Your comment has been submitted and is awaiting approval.');
    }

    public function adminIndex()
    {
        $comments = Comment::all(); // Fetch all comments; you might want to paginate this
        return view('admin_index', compact('comments'));
    }

    public function approve($id)
    {
        $comment = Comment::find($id);
        if ($comment) {
            $comment->status = 'approved'; // Update the status
            $comment->save();
        }
        return redirect('/admin/comments');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect('/admin/comments');
    }
}
