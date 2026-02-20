<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a new comment on a post.
     */
    public function store(Request $request, Post $post): RedirectResponse
    {
        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        $post->comments()->create([
            'user_id' => auth()->id(),
            'body'    => $request->body,
        ]);

        return redirect()->route('posts.show', $post)->with('success', 'Comment posted!');
    }

    /**
     * Show the edit form for a comment.
     */
    public function edit(Post $post, Comment $comment)
    {
        $this->authorize('update', $comment);
        return view('comments.edit', compact('post', 'comment'));
    }

    /**
     * Update a comment.
     */
    public function update(Request $request, Post $post, Comment $comment): RedirectResponse
    {
        $this->authorize('update', $comment);

        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        $comment->update(['body' => $request->body]);

        return redirect()->route('posts.show', $post)->with('success', 'Comment updated!');
    }

    /**
     * Delete a comment.
     */
    public function destroy(Post $post, Comment $comment): RedirectResponse
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return redirect()->route('posts.show', $post)->with('success', 'Comment deleted.');
    }
}
