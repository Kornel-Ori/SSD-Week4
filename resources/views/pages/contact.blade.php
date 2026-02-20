@extends('layouts.app')

@section('content')

<div class="page-hero py-5 text-white text-center">
    <div class="container py-3">
        <h1 class="display-5 fw-bold mb-3">Contact Us</h1>
        <p class="lead mb-0">Have a question or want to get in touch? We'd love to hear from you.</p>
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4">
                    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card blog-post-card mb-4">
                <div class="card-body p-4">
                    <h4 class="mb-4"><i class="bi bi-envelope-paper me-2 text-primary"></i>Send a Message</h4>

                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Your Name</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                   class="form-control @error('name') is-invalid @enderror"
                                   placeholder="John Doe">
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email Address</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                   class="form-control @error('email') is-invalid @enderror"
                                   placeholder="you@example.com">
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Message</label>
                            <textarea name="message" rows="5"
                                      class="form-control @error('message') is-invalid @enderror"
                                      placeholder="Write your message here...">{{ old('message') }}</textarea>
                            @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-send me-2"></i>Send Message
                        </button>
                    </form>
                </div>
            </div>

        </div>

        <div class="col-md-3">
            <div class="card blog-post-card mb-3">
                <div class="card-body p-4 text-center">
                    <i class="bi bi-envelope-fill fs-2 text-primary mb-2"></i>
                    <h6 class="fw-bold">Email</h6>
                    <p class="text-muted small mb-0">hello@laravelblog.com</p>
                </div>
            </div>
            <div class="card blog-post-card mb-3">
                <div class="card-body p-4 text-center">
                    <i class="bi bi-github fs-2 text-primary mb-2"></i>
                    <h6 class="fw-bold">GitHub</h6>
                    <p class="text-muted small mb-0">github.com/yourusername</p>
                </div>
            </div>
            <div class="card blog-post-card">
                <div class="card-body p-4 text-center">
                    <i class="bi bi-clock-fill fs-2 text-primary mb-2"></i>
                    <h6 class="fw-bold">Response Time</h6>
                    <p class="text-muted small mb-0">Usually within 24 hours</p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
