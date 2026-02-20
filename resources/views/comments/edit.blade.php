@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card blog-post-card">
                <div class="card-body p-4">
                    <h4 class="mb-4"><i class="bi bi-pencil-square me-2 text-primary"></i>Edit Comment</h4>

                    <form action="{{ route('comments.update', [$post, $comment]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Your Comment</label>
                            <textarea name="body" class="form-control @error('body') is-invalid @enderror"
                                      rows="4">{{ old('body', $comment->body) }}</textarea>
                            @error('body')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle me-1"></i>Update Comment
                            </button>
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
