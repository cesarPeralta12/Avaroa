@extends('master')

@section('title', $blog_detail->title ?? 'Blog Post')

@section('content')
@php
    $wordCount = str_word_count(strip_tags($blog_detail->details ?? ''));
    $readTime  = max(1, ceil($wordCount / 200));
@endphp

<style>
    :root {
        --primary: #f89c10;
        --primary-dark: #e07a00;
        --accent: #f89c10;
        --gradient: linear-gradient(135deg, #f89c10 0%, #ff9f1c 100%);
        --light-bg: #f8f9fa;
        --border-color: #eaeaea;
        --text-dark: #333;
        --text-light: #6c757d;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: var(--text-dark);
        line-height: 1.6;
        background-color: #fff;
    }

    .blog-detail-header {
        background: var(--gradient);
        color: white;
        padding: 100px 0 70px;
    }
    .blog-detail-title {
        font-size: 2.8rem;
        font-weight: 800;
        line-height: 1.2;
    }

    /* Main Content Area */
    .main-content {
        padding: 60px 0;
    }

    .blog-content {
        font-size: 1.15rem;
        line-height: 1.9;
        color: #444;
    }
    .blog-content h2,
    .blog-content h3 {
        margin-top: 45px;
        color: var(--primary);
        font-weight: 700;
    }
    .blog-content blockquote {
        border-left: 5px solid var(--primary);
        padding: 20px 30px;
        background: #fff8e1;
        font-style: italic;
        margin: 40px 0;
        border-radius: 8px;
    }

    /* Sidebar Styles */
    .sidebar {
        position: sticky;
        top: 30px;
    }

    .sidebar-widget {
        background: white;
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        border: 1px solid var(--border-color);
    }

    .widget-title {
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 3px solid var(--primary);
        color: var(--text-dark);
    }

    /* Author Widget */
    .author-widget {
        text-align: center;
    }
    .author-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        margin: 0 auto 15px;
        border: 3px solid var(--primary);
    }
    .author-name {
        font-weight: 700;
        font-size: 1.2rem;
        margin-bottom: 5px;
    }
    .author-bio {
        color: var(--text-light);
        font-size: 0.95rem;
        margin-bottom: 15px;
    }

    /* Categories Widget */
    .category-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .category-list li {
        padding: 10px 0;
        border-bottom: 1px solid var(--border-color);
    }
    .category-list li:last-child {
        border-bottom: none;
    }
    .category-list a {
        text-decoration: none;
        color: var(--text-dark);
        display: flex;
        justify-content: space-between;
        transition: all 0.3s ease;
    }
    .category-list a:hover {
        color: var(--primary);
    }
    .category-count {
        background: var(--light-bg);
        padding: 2px 8px;
        border-radius: 20px;
        font-size: 0.8rem;
    }

    /* Recent Posts Widget */
    .recent-post {
        display: flex;
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid var(--border-color);
    }
    .recent-post:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }
    .recent-post-img {
        width: 70px;
        height: 70px;
        border-radius: 8px;
        object-fit: cover;
        margin-right: 15px;
    }
    .recent-post-content h5 {
        font-size: 0.95rem;
        margin-bottom: 5px;
        line-height: 1.4;
    }
    .recent-post-content h5 a {
        text-decoration: none;
        color: var(--text-dark);
        transition: all 0.3s ease;
    }
    .recent-post-content h5 a:hover {
        color: var(--primary);
    }
    .recent-post-date {
        font-size: 0.8rem;
        color: var(--text-light);
    }

    /* Tags Widget */
    .tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }
    .tag {
        background: var(--light-bg);
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        text-decoration: none;
        color: var(--text-dark);
        transition: all 0.3s ease;
    }
    .tag:hover {
        background: var(--primary);
        color: white;
    }

    /* Newsletter Widget */
    .newsletter-form .form-control {
        border-radius: 30px;
        padding: 10px 20px;
        margin-bottom: 15px;
        border: 1px solid var(--border-color);
    }
    .newsletter-form .btn {
        width: 100%;
        border-radius: 30px;
        padding: 10px;
    }

    /* Social Links */
    .social-links {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 15px;
    }
    .social-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: var(--light-bg);
        color: var(--text-dark);
        text-decoration: none;
        transition: all 0.3s ease;
    }
    .social-link:hover {
        background: var(--primary);
        color: white;
        transform: translateY(-3px);
    }

    /* Buttons */
    .btn-primary {
        background: var(--gradient);
        border: none;
        border-radius: 30px;
        padding: 10px 28px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        background: var(--primary-dark);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(248, 156, 16, 0.4);
    }

    /* Section Title */
    .section-title {
        position: relative;
        padding-bottom: 15px;
        margin-bottom: 30px;
    }
    .section-title:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 80px;
        height: 4px;
        background: var(--gradient);
        border-radius: 2px;
    }

    /* Like Icon Hover */
    .heart-icon:hover {
        filter: brightness(0) saturate(100%) invert(61%) sepia(93%) saturate(1100%) hue-rotate(10deg) brightness(105%) contrast(101%);
    }

    /* Responsive Adjustments */
    @media (max-width: 991px) {
        .sidebar {
            margin-top: 50px;
        }
    }

    /* Links & Accents */
    a.text-primary,
    .text-primary,
    .replyBtn,
    .btn-link.text-primary {
        color: var(--primary) !important;
    }
    a.text-primary:hover,
    .replyBtn:hover {
        color: var(--primary-dark) !important;
    }

    /* Comment Reply Border */
    .border-primary {
        border-color: var(--primary) !important;
    }
</style>

<!-- Header -->
<div class="blog-detail-header">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 text-center">
                <h1 class="blog-detail-title">{{ $blog_detail->title }}</h1>
                <div class="d-flex justify-content-center flex-wrap mt-4 text-white-50 fs-5">
                    <div class="me-4"><i class="fas fa-calendar-alt"></i> {{ $blog_detail->created_at->format('F d, Y') }}</div>
                    <div class="me-4"><i class="fas fa-clock"></i> {{ $readTime }} min read</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="container">
        <div class="row">
            <!-- Main Blog Content -->
            <div class="col-lg-8">
                <img src="{{ asset($blog_detail->image) }}" class="img-fluid rounded-4 shadow-lg mb-5" alt="{{ $blog_detail->title }}">

                <article class="blog-content">
                    {!! $blog_detail->details !!}
                </article>

                <!-- Tags -->
                @if($blog_detail->tags)
                    <div class="mt-5">
                        <div class="tags">
                            @foreach(explode(',', $blog_detail->tags) as $tag)
                                <a href="#" class="tag">{{ trim($tag) }}</a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Likes -->
                <div class="d-flex align-items-center mt-5 mb-4">
                    <img class="heart-icon me-3" src="{{ asset('assets/heart.svg') }}" alt="Like"
                         style="width:34px;cursor:pointer;transition:0.3s;" data-blog-id="{{ $blog_detail->id }}">
                    <span id="likeText" class="fs-5 fw-bold text-primary">
                        {{ $blog_detail->like_count }} {{ Str::plural('Like', $blog_detail->like_count) }}
                    </span>
                </div>

                <hr class="my-5">

                <!-- Comments Section -->
                <!-- Add your existing comments section here -->

                <!-- Related Posts -->
                @if($latest_posts->count())
                    <h3 class="my-5 section-title">Continue Reading</h3>
                    <div class="row">
                        @foreach($latest_posts->take(3) as $post)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                                    <img src="{{ asset($post->image) }}" class="card-img-top" style="height:200px;object-fit:cover;">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title fw-bold">{{ $post->title }}</h5>
                                        <p class="card-text text-muted small flex-grow-1">
                                            {!! Str::limit(strip_tags($post->short_description), 80) !!}
                                        </p>
                                        <a href="{{ url('blog_detail/'.$post->slug) }}" class="btn btn-primary btn-sm mt-3 align-self-start">Read More</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar">
                    <!-- Author Widget -->
                    <div class="sidebar-widget author-widget">
                        <!-- You can replace this with actual author data from your database -->
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($blog_detail->author ?? 'Admin') }}&background=f89c10&color=fff" alt="Author" class="author-avatar">
                        <h3 class="author-name">{{ $blog_detail->author ?? 'Admin' }}</h3>
                        <p class="author-bio">Experienced writer passionate about sharing knowledge and insights on various topics.</p>
                        <div class="social-links">
                            <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-github"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-medium"></i></a>
                        </div>
                    </div>

                    <!-- Categories Widget -->
                    <div class="sidebar-widget">
                        <h3 class="widget-title">Categories</h3>
                       <ul class="list-unstyled">
                        @foreach($categories as $cat)
                            @if($cat->blogs->count() > 0)
                                <li class="mb-3 pb-3 border-bottom">
                                    <a href="{{ url('blog?category=' . $cat->slug) }}"
                                       class="d-flex justify-content-between align-items-center text-decoration-none
                                              {{ request('category') === $cat->slug ? 'text-primary fw-bold' : 'text-dark' }}">
                                        <span>{{ $cat->name }}</span>
                                        <span class="badge bg-light text-primary rounded-pill">{{ $cat->blogs->count() }}</span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    </div>

                    <!-- Recent Posts Widget -->
                    <div class="sidebar-widget">
                        <h3 class="widget-title">Recent Posts</h3>
                        @if($latest_posts->count())
                            @foreach($latest_posts->take(3) as $post)
                                <div class="recent-post">
                                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="recent-post-img">
                                    <div class="recent-post-content">
                                        <h5><a href="{{ url('blog_detail/'.$post->slug) }}">{{ $post->title }}</a></h5>
                                        <div class="recent-post-date">{{ $post->created_at->format('M d, Y') }}</div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-muted">No recent posts available.</p>
                        @endif
                    </div>

                    <!-- Tags Widget -->
                    <div class="sidebar-widget">
                        <h3 class="widget-title">Popular Tags</h3>
                        <div class="tags">
                            <!-- Replace with dynamic tags from your database -->
                            <a href="#" class="tag">Web Development</a>
                            <a href="#" class="tag">Laravel</a>
                            <a href="#" class="tag">PHP</a>
                            <a href="#" class="tag">JavaScript</a>
                            <a href="#" class="tag">CSS</a>
                            <a href="#" class="tag">HTML</a>
                            <a href="#" class="tag">UX Design</a>
                            <a href="#" class="tag">Responsive</a>
                        </div>
                    </div>

                    <!-- Newsletter Widget -->
                    <div class="sidebar-widget">
                        <h3 class="widget-title">Newsletter</h3>
                        <p class="mb-3">Subscribe to our newsletter to receive updates on new articles.</p>
                        <form class="newsletter-form">
                            @csrf
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Your email address" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

<script>
$(document).ready(function(){
    toastr.options = { positionClass:"toast-top-right", timeOut:4000, progressBar:true };

    $('.heart-icon').on('click', function(){
        $.post(`/blog/{{ $blog_detail->id }}/like`, {_token:'{{csrf_token()}}'}, function(res){
            if(res.success){
                $('#likeText').text(res.like_count + ' ' + (res.like_count == 1 ? 'Like' : 'Likes'));
                toastr.success('Post liked!');
            }
        });
    });

    $('.replyBtn').on('click', function(){
        $('#parent_id').val($(this).data('parent_id'));
    });

    $('#commentForm, #replyForm').on('submit', function(e){
        e.preventDefault();
        const route = this.id === 'commentForm'
            ? "{{ route('blog-comment.store') }}"
            : "{{ route('blog-comment-reply.store') }}";

        $.post(route, $(this).serialize(), function(res){
            if(res.success){
                toastr.success(res.message || 'Success!');
                setTimeout(() => location.reload(), 1200);
            } else {
                toastr.error(res.message || 'Error');
            }
        }).fail(() => toastr.error('Network error'));
    });

    // Newsletter form submission
    $('.newsletter-form').on('submit', function(e){
        e.preventDefault();
        toastr.info('Thank you for subscribing to our newsletter!');
        $(this).find('input[type="email"]').val('');
    });
});
</script>
@endsection
