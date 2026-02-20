@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="mb-1">Blog</h2>
                        <p class="text-muted mb-0">Discover articles, tutorials, and insights from our community</p>
                    </div>
                    @auth
                        <a href="{{ route('posts.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-1"></i>Create New Post
                        </a>
                    @endauth
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @forelse($posts as $post)
                    <div class="card blog-post-card mb-4">
                        @if($post->image_path)
                            @php
                                $imgSrc = str_starts_with($post->image_path, 'http')
                                    ? $post->image_path
                                    : asset('storage/' . $post->image_path);
                            @endphp
                            <img src="{{ $imgSrc }}"
                                 class="card-img-top"
                                 alt="{{ $post->title }}"
                                 style="width:100%; height:280px; object-fit:cover; object-position:center; border-radius:1rem 1rem 0 0;">
                        @endif
                        <div class="card-body p-4">
                            <h3 class="card-title">
                                <a href="{{ route('posts.show', $post) }}" class="text-decoration-none text-dark">
                                    {{ $post->title }}
                                </a>
                            </h3>
                            <p class="text-muted small mb-3">
                                <i class="bi bi-person-circle me-1"></i>{{ $post->user->name }}
                                &nbsp;|&nbsp;
                                <i class="bi bi-calendar me-1"></i>{{ $post->created_at->format('M d, Y') }}
                                &nbsp;|&nbsp;
                                <i class="bi bi-chat-dots me-1"></i>{{ $post->comments->count() }} comments
                            </p>
                            <p class="card-text text-muted">{{ Str::limit($post->description, 180) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-outline-primary">
                                    Read More <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                                @can('update', $post)
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-outline-secondary">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Delete this post?')">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info">
                        No posts yet. @auth <a href="{{ route('posts.create') }}">Create the first post!</a> @endauth
                    </div>
                @endforelse

                <div class="d-flex justify-content-center mt-3">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
