@extends('fashi.layouts')

@section('title', 'home')

@section('content')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                    <a href="{{ route('blog') }}">Blog</a>
                    <span>{{ $id_categories_blog->name }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Blog Section Begin -->
<section class="blog-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1">
                <div class="blog-sidebar">
                    <div style="margin-bottom: 80px;">
                        <h1 style="color: #663399;">{{ $id_categories_blog->name }}</h1>
                    </div>
                    <div class="search-form">
                        <h4>Search</h4>
                        <form action="#">
                            <input type="text" placeholder="Search . . .  ">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="blog-catagory">
                        <h4>Categories</h4>
                        <ul>
                            @foreach ($category_blog as $blog)

                            <li><a href="{{ route('categories.blog', $blog->id) }}">{{ $blog->name }}</a></li>

                            @endforeach
                        </ul>
                    </div>
                    <div class="recent-post">
                        <h4>Recent Post</h4>
                        @foreach ($new_blogs as $blog)

                        <div class="recent-blog">
                            <a href="{{ route('blogdetail', $blog->id) }}" class="rb-item">
                                <div class="rb-pic">
                                    <img src="{{ "img/blog/" . $blog->image }}" alt="" style='border-radius: 50%'>
                                </div>
                                <div class="rb-text">
                                    <h6>{{ substr($blog->title, 0, 30) }}...</h6>
                                    <p>{{ $blog->categories->name }}<span> -
                                            {{ date("M d, Y H:i", strtotime($blog->created_at)) }}</span></p>
                                </div>
                            </a>
                        </div>

                        @endforeach
                    </div>
                    <div class="blog-tags">
                        <h4>Blogs Tags</h4>
                        <div class="tag-item">
                            @foreach ($tags_category_blog as $blog)

                            <a href="{{ route('categories.blog', $blog->id) }}">{{ $blog->name }}</a>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 order-1 order-lg-2">
                <div class="row">
                    @foreach ($blogs as $blog)

                    <div class="col-lg-6 col-sm-6">
                        <div class="blog-item">
                            <div class="bi-pic">
                                <a href="{{ route('blogdetail', $blog->id) }}"><img
                                        src="{{ "img/blog/" . $blog->image }}" alt="" height='300px'></a>
                            </div>
                            <div class="bi-text">
                                <a href="{{ route('blogdetail', $blog->id) }}">
                                    <h4>{{ $blog->title }}</h4>
                                </a>
                                <p>{{ $blog->categories->name }}<span> -
                                        {{ date("M d, Y H:i", strtotime($blog->created_at)) }}</span></p>
                            </div>
                        </div>
                    </div>

                    @endforeach

                    <div class="col-lg-12">
                        <div class="loading-more">
                            {{ $blogs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->

@endsection