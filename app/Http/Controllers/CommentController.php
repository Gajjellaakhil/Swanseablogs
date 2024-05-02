<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Comment;


class CommentController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'body' => 'required',
            'article_id' => 'required|exists:articles,id'
        ]);

        // Create the comment
        Comment::create([
            'body' => $request->input('body'),
            'user_id' => auth()->id(), // Assuming you have authentication
            'article_id' => $request->input('article_id')
        ]);

        // Redirect back or to a specific route
        return redirect()->back()->with('success', 'Comment added successfully');
    }
}
