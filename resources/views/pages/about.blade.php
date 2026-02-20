@extends('layouts.app')

@section('content')

{{-- Hero --}}
<div class="page-hero py-5 text-white text-center">
    <div class="container py-3">
        <h1 class="display-5 fw-bold mb-3">About This Blog</h1>
        <p class="lead mb-0">A platform built with Laravel to share knowledge and ideas.</p>
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card blog-post-card mb-4">
                <div class="card-body p-4">
                    <h3 class="mb-3"><i class="bi bi-rocket-takeoff me-2 text-primary"></i>Our Mission</h3>
                    <p>This blog was created as a learning project to explore the power of <strong>Laravel</strong> — a modern PHP web application framework. Our goal is to build a space where developers can share tutorials, tips, and experiences.</p>
                    <p class="mb-0">Whether you're just starting out or you're a seasoned developer, there's something here for you.</p>
                </div>
            </div>

            <div class="card blog-post-card mb-4">
                <div class="card-body p-4">
                    <h3 class="mb-3"><i class="bi bi-tools me-2 text-primary"></i>Built With</h3>
                    <div class="row g-3">
                        <div class="col-6 col-md-4">
                            <div class="tech-badge text-center p-3 rounded">
                                <i class="bi bi-filetype-php fs-2 text-primary"></i>
                                <p class="mb-0 mt-2 fw-semibold">Laravel 10</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="tech-badge text-center p-3 rounded">
                                <i class="bi bi-bootstrap fs-2 text-purple"></i>
                                <p class="mb-0 mt-2 fw-semibold">Bootstrap 5</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="tech-badge text-center p-3 rounded">
                                <i class="bi bi-database fs-2 text-primary"></i>
                                <p class="mb-0 mt-2 fw-semibold">MySQL</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card blog-post-card mb-4">
                <div class="card-body p-4">
                    <h3 class="mb-3"><i class="bi bi-person-badge me-2 text-primary"></i>The Developer</h3>
                    <p>This project was built as part of a Server-side Development module. It demonstrates full CRUD functionality, user authentication, database relationships, and custom styling.</p>
                    <a href="{{ route('contact') }}" class="btn btn-primary">
                        <i class="bi bi-envelope me-2"></i>Get In Touch
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
