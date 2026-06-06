{{-- resources/views/blog.blade.php --}}
@extends('master')
@section('title', 'Trading Insights & News')

@section('content')
{{-- Define calculateReadTime() once at the top of the file --}}
@php
    function calculateReadTime($content)
    {
        if (!$content) return 1;
        $wordCount = str_word_count(strip_tags($content));
        return max(1, ceil($wordCount / 200));
    }

    $currentCategory = $currentCategory ?? null;
    $queryParam     = $queryParam ?? '';
@endphp

<style>
    :root {
        --primary: #f89c10;
        --primary-dark: #e07a00;
        --gradient: linear-gradient(135deg, #f89c10 0%, #ff9f1c 100%);
        --dark-bg: #1a1d29;
        --text-dark: #2d3748;
        --border: #e2e8f0;
    }

    .blog-hero {
        background: linear-gradient(135deg, var(--dark-bg) 0%, #2d3748 100%);
        padding: 160px 0 100px;
        text-align: center;
        color: white;
    }

    .hero-title {
        font-size: 4.8rem;
        font-weight: 900;
        background: linear-gradient(135deg, #fff 0%, var(--primary) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .section-title {
        font-size: 2.6rem;
        font-weight: 800;
        color: var(--text-dark);
        margin: 90px 0 50px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .see-all {
        color: var(--primary);
        font-weight: 700;
        font-size: 1.1rem;
        text-decoration: none;
    }
    .see-all:hover { color: var(--primary-dark); transform: translateX(8px); }

    .blog-grid-2 {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(520px, 1fr));
        gap: 40px;
        margin-bottom: 70px;
    }

    .blog-card {
        border-radius: 26px;
        overflow: hidden;
        box-shadow: 0 10px 35px rgba(0,0,0,0.12);
        transition: all 0.45s ease;
        border: 1px solid var(--border);
        background: white;
    }
    .blog-card:hover {
        transform: translateY(-18px);
        box-shadow: 0 35px 70px rgba(248,156,16,0.25);
        border-color: var(--primary);
    }

    .blog-card-img {
        height: 340px;
        position: relative;
        overflow: hidden;
    }
    .blog-card-img img {
        width: 100%; height: 100%; object-fit: cover;
        transition: transform 0.8s ease;
    }
    .blog-card:hover img { transform: scale(1.13); }

    .blog-card-category {
        position: absolute;
        top: 22px; left: 22px;
        background: var(--primary);
        color: white;
        padding: 12px 26px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1.3px;
    }

    .card-body { padding: 36px; }

    .btn-outline-primary {
        border: 2px solid var(--primary);
        color: var(--primary);
        border-radius: 50px;
        padding: 12px 32px;
        font-weight: 600;
    }
    .btn-outline-primary:hover {
        background: var(--primary);
        color: white;
    }

    @media (max-width: 992px) {
        .blog-grid-2 { grid-template-columns: 1fr; }
        .hero-title { font-size: 3.5rem; }
    }
</style>

<!-- Hero -->
<section class="blog-hero">
    <div class="container">
        @if($currentCategory)
            <h1 class="hero-title">{{ $currentCategory->name }} Trading</h1>
            <p class="fs-3 mt-4 opacity-90">Latest strategies & in-depth analysis</p>
        @else
            <h1 class="hero-title">Trading Insights & Market Analysis</h1>
            <p class="fs-3 mt-4">Master the markets with expert knowledge</p>
        @endif
    </div>
</section>

<!-- Search -->
<div class="container">
    <div class="bg-white rounded-4 shadow-lg p-5 text-center" style="margin-top: -90px; position: relative; z-index: 10;">
        <form action="{{ url('blog') }}" method="GET">
            <div class="input-group input-group-lg">
                <input type="text" name="query" class="form-control border-0 shadow-sm"
                       placeholder="Search articles..." value="{{ $queryParam }}"
                       style="height: 74px; border-radius: 50px 0 0 50px;">
                <button class="btn btn-primary px-5 fw-bold" style="border-radius: 0 50px 50px 0;">Search</button>
            </div>
        </form>
    </div>
</div>

<div class="container my-5">
    <div class="row g-5">
        <div class="col-lg-8">

            @if($currentCategory)
                <!-- Single Category View -->
                <div class="text-center mb-5">
                    <h1 class="display-4 fw-bold">{{ $currentCategory->name }}</h1>
                </div>

                <div class="blog-grid-2">
                    @forelse($blogs as $blog)
                        @php
                            $catName = \App\Models\BlogCategory::find($blog->blog_category_id)?->name ?? 'Trading';
                        @endphp
                        <article class="blog-card">
                            <div class="blog-card-img">
                                <img src="{{ asset($blog->image_path) }}" alt="{{ $blog->title }}">
                                <div class="blog-card-category">{{ $catName }}</div>
                            </div>
                            <div class="card-body">
                                <small class="text-muted d-block mb-2">{{ $blog->created_at->format('M d, Y') }}</small>
                                <h3 class="fw-bold fs-4 mb-3">{{ $blog->title }}</h3>
                                <p class="text-muted">{!! Str::limit(strip_tags($blog->short_description), 140) !!}</p>
                                <div class="d-flex justify-content-between align-items-center mt-4">
                                    <small class="text-muted">{{ calculateReadTime($blog->details) }} min read</small>
                                    <a href="{{ url('blog_detail/' . $blog->slug) }}" class="btn btn-outline-primary">Read More</a>
                                </div>
                            </div>
                        </article>
                    @empty
                        <p class="text-center py-5 text-muted fs-3">No articles found.</p>
                    @endforelse
                </div>

                {{ $blogs->withQueryString()->links('pagination::bootstrap-5') }}

            @else
                <!-- Homepage -->
                @if($blogs->count() > 0)
                    @php $featured = $blogs->first(); @endphp
                    <div class="row g-0 rounded-4 overflow-hidden shadow-lg mb-5">
                        <div class="col-md-6">
                            <div style="height: 520px; position: relative;">
                                <img src="{{ asset($featured->image_path) }}" alt="{{ $featured->title }}"
                                     style="width:100%; height:100%; object-fit:cover;">
                                <div class="position-absolute top-0 start-0 m-4 bg-primary text-white px-4 py-2 rounded-pill fw-bold">
                                    Featured
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex align-items-center bg-white">
                            <div class="p-5">
                                <small class="text-muted">
                                    {{ $featured->created_at->format('M d, Y') }} • {{ calculateReadTime($featured->details) }} min read
                                </small>
                                <h1 class="display-5 fw-bold mt-3 mb-4">{{ $featured->title }}</h1>
                                <p class="lead text-muted mb-4">
                                    {!! Str::limit(strip_tags($featured->short_description), 260) !!}
                                </p>
                                <a href="{{ url('blog_detail/' . $featured->slug) }}" class="btn btn-primary btn-lg">
                                    Read Full Analysis
                                </a>
                            </div>
                        </div>
                    </div>
                @endif

                @foreach($categories as $category)
                    @if($category->blogs->count() > 0)
                        <div class="section-title">
                            <h2>{{ $category->name }}</h2>
                            <a href="{{ url('blog?category=' . $category->slug) }}" class="see-all">See All</a>
                        </div>

                        <div class="blog-grid-2">
                            @foreach($category->blogs as $blog)
                                <article class="blog-card">
                                    <div class="blog-card-img">
                                        <img src="{{ asset($blog->image_path) }}" alt="{{ $blog->title }}">
                                        <div class="blog-card-category">{{ $category->name }}</div>
                                    </div>
                                    <div class="card-body">
                                        <small class="text-muted d-block mb-2">{{ $blog->created_at->format('M d, Y') }}</small>
                                        <h3 class="fw-bold fs-4 mb-3">{{ $blog->title }}</h3>
                                        <p class="text-muted">{!! Str::limit(strip_tags($blog->short_description), 140) !!}</p>
                                        <div class="d-flex justify-content-between align-items-center mt-4">
                                            <small class="text-muted">{{ calculateReadTime($blog->details) }} min read</small>
                                            <a href="{{ url('blog_detail/' . $blog->slug) }}" class="btn btn-outline-primary">
                                                Read More
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            @endif
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="position-sticky" style="top: 30px;">
                <div class="bg-white rounded-4 shadow p-4 mb-4">
                    <h4 class="fw-bold mb-4">Categories</h4>
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

                @if($latest_posts->count() > 0)
                    <div class="bg-white rounded-4 shadow p-4 mb-4">
                        <h4 class="fw-bold mb-4">Latest Articles</h4>
                        @foreach($latest_posts as $post)
                            <div class="d-flex gap-3 mb-4 pb-3 {{ $loop->last ? '' : 'border-bottom' }}">
                                <img src="{{ asset($post->image_path) }}" class="rounded" width="90" height="90" style="object-fit: cover;">
                                <div>
                                    <h6 class="mb-1">
                                        <a href="{{ url('blog_detail/' . $post->slug) }}" class="text-dark text-decoration-none">
                                            {{ Str::limit($post->title, 60) }}
                                        </a>
                                    </h6>
                                    <small class="text-muted">{{ $post->created_at->format('M d, Y') }}</small>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="text-white rounded-4 p-5" style="background: var(--gradient);">
                    <h4 class="fw-bold mb-3">Stay Updated</h4>
                    <p class="small opacity-90 mb-4">Get daily insights in your inbox</p>
                    <form class="newsletter-form">
                        @csrf
                        <input type="email" class="form-control rounded-pill mb-3" placeholder="Your email" required>
                        <button type="submit" class="btn btn-dark w-100 rounded-pill fw-bold">Subscribe Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelector('.newsletter-form')?.addEventListener('submit', e => {
        e.preventDefault();
        e.target.innerHTML = `<div class="text-center py-4"><h5>Thank you!</h5><p>You're subscribed!</p></div>`;
    });
</script>
@endsection
