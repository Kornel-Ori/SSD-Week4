@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mb-3">
                <a href="{{ route('posts.index') }}" class="btn btn-sm btn-outline-secondary">
                    &larr; Back to Posts
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card blog-post-card mb-4">
                @if($post->image_path)
                    <img src="{{ asset('storage/' . $post->image_path) }}" class="card-img-top blog-post-image" alt="{{ $post->title }}">
                @endif
                <div class="card-body p-4">
                    <h1 class="card-title mb-3">{{ $post->title }}</h1>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="text-muted small">
                            <i class="bi bi-person-circle me-1"></i>
                            By <strong>{{ $post->user->name }}</strong> &nbsp;|&nbsp;
                            <i class="bi bi-calendar me-1"></i>
                            {{ $post->created_at->format('F j, Y') }}
                        </div>
                        @can('update', $post)
                            <div>
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil me-1"></i>Edit
                                </a>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Delete this post?')">
                                        <i class="bi bi-trash me-1"></i>Delete
                                    </button>
                                </form>
                            </div>
                        @endcan
                    </div>

                    <div class="post-body">
                        {!! nl2br(e($post->description)) !!}
                    </div>
                </div>
            </div>

            {{-- ===== COMMENTS SECTION ===== --}}
            <div class="card blog-post-card">
                <div class="card-body p-4">
                    <h4 class="mb-4">
                        <i class="bi bi-chat-dots me-2 text-primary"></i>
                        Comments ({{ $post->comments->count() }})
                    </h4>

                    {{-- Comment list --}}
                    @forelse($post->comments as $comment)
                        <div class="comment-item mb-3 p-3 rounded">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <strong><i class="bi bi-person-circle me-1 text-primary"></i>{{ $comment->user->name }}</strong>
                                    <small class="text-muted ms-2">{{ $comment->created_at->diffForHumans() }}</small>
                                </div>
                                @auth
                                    @if(auth()->id() === $comment->user_id)
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('comments.edit', [$post, $comment]) }}"
                                               class="btn btn-sm btn-outline-secondary">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('comments.destroy', [$post, $comment]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Delete this comment?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                @endauth
                            </div>
                            <p class="mt-2 mb-0">{{ $comment->body }}</p>
                        </div>
                    @empty
                        <p class="text-muted">No comments yet. Be the first to comment!</p>
                    @endforelse

                    {{-- Add comment form --}}
                    @auth
                        <hr class="my-4">
                        <h5 class="mb-3">Leave a Comment</h5>
                        <form action="{{ route('comments.store', $post) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <textarea name="body" class="form-control @error('body') is-invalid @enderror"
                                          rows="3" placeholder="Write your comment here...">{{ old('body') }}</textarea>
                                @error('body')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-send me-1"></i>Post Comment
                            </button>
                        </form>
                    @else
                        <hr class="my-4">
                        <p class="text-muted">
                            <a href="{{ route('login') }}">Login</a> to leave a comment.
                        </p>
                    @endauth
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
