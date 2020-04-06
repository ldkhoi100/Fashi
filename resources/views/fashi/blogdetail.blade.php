<title>{{ $blog->title }}</title>
@include('fashi.header')

@include('partials.message')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                    <a href="{{ route('blog') }}">Blog</a>
                    <a href="{{ route('categories.blog', $blog->id_categories) }}">{{ $blog->categories->name }}</a>
                    <span>{{ substr($blog->title, 0, 50) }}...</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Blog Details Section Begin -->
<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-details-inner">
                    <div class="blog-detail-title">
                        <h2>{{ $blog->title }}</h2>
                        <p>{{ $blog->categories->name }} <span> -
                                {{ date("M d, Y H:i", strtotime($blog->created_at)) }}</span></p>
                    </div>
                    <div class="blog-large-pic">
                        <img src="{{ "img/blog/" . $blog->image }}" alt="">
                    </div>
                    <div class="blog-detail-desc">
                        {!! $blog->description !!}
                    </div>
                    <div class="tag-share">
                        <div class="details-tag">
                            <ul>
                                <li><i class="fa fa-tags"></i></li>
                                <li>{{ $blog->categories->name }}</li>
                                <li>{{ $blog->objects->name }}</li>
                            </ul>
                        </div>
                        <span style="float: right; color: #6c757d;"><i class="far fa-eye"></i>
                            {{ $blog->view_count }}</span>
                    </div>

                    <div class="blog-post">
                        <div class="row">

                            @if(!empty($previous_blog->id))
                            <div class="col-lg-5 col-md-6">
                                <a href="{{ route('blogdetail', $previous_blog->id) }}" class="prev-blog">
                                    <div class="pb-pic">
                                        <i class="ti-arrow-left"></i>
                                        <img src="{{ "img/blog/" . $previous_blog->image }}" alt=""
                                            style='border-radius: 50%;'>
                                    </div>
                                    <div class="pb-text">
                                        <span>Previous Post:</span>
                                        <h5>{{ $previous_blog->title }}</h5>
                                    </div>
                                </a>
                            </div>
                            @endif

                            @if(!empty($next_blog->id))
                            <div class="col-lg-5 offset-lg-2 col-md-6">
                                <a href="{{ route('blogdetail', $next_blog->id) }}" class="next-blog">
                                    <div class="nb-pic">
                                        <img src="{{ "img/blog/" . $next_blog->image }}" alt=""
                                            style='border-radius: 50%;'>
                                        <i class="ti-arrow-right"></i>
                                    </div>
                                    <div class="nb-text">
                                        <span>Next Post:</span>
                                        <h5>{{ $next_blog->title }}</h5>
                                    </div>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>

                    {{ csrf_field() }}
                    <div id="post_data"></div>

                    {{-- @foreach ($comments as $comment)

                    <div class="posted-by">
                        <div class="pb-pic">
                            <div
                                style="width: 27px; height: 27px; text-align: center; background: #ddd; font-weight: bold; color: #666">
                                {{ strtoupper(substr($comment->name, 0, 1)) }}
                </div>
            </div>
            <div class="pb-text">
                <a href="#">
                    <h5>{{ ucwords($comment->name) }}</h5>
                </a>
                <p>{{ $comment->comment }}</p>
            </div>
        </div>

        @endforeach --}}

        {{-- Redirect back to this location --}}
        <a name="location"></a>

        <div class="leave-comment">
            <h4>Leave A Comment</h4>
            @comments(['model' => $blog])
            {{-- @if(Auth::user())

            <form action="{{ route('comments') }}" method="POST" class="comment-form">
            @csrf
            <div class="row">
                <input type="hidden" name="id_blogs" value="{{ $blog->id }}">
                <div class="col-lg-12">
                    <textarea placeholder="Messages" name="comment">{{ old('comment') }}</textarea>
                    <button type="submit" class="site-btn">Send message</button>
                </div>
            </div>
            </form>

            @else

            <form action="{{ route('comments') }}" method="POST" class="comment-form">
                @csrf
                <div class="row">
                    <input type="hidden" name="id_blogs" value="{{ $blog->id }}">
                    <div class="col-lg-6">
                        <input type="text" placeholder="Name" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="col-lg-6">
                        <input type="text" placeholder="Email" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="col-lg-12">
                        <textarea placeholder="Messages" name="comment">{{ old('comment') }}</textarea>
                        <button type="submit" class="site-btn">Send message</button>
                    </div>
                </div>
            </form>

            @endif --}}

        </div>
    </div>
    </div>
    </div>
    </div>
</section>
<!-- Blog Details Section End -->

@include('fashi.footer')

{{-- <script>
    $(document).ready(function(){
        var _token = $('input[name="_token"]').val();
        load_data('', _token);
        function load_data(id="", _token)
        {
            $.ajax({
            url:"{{ route('loadingmore.load_data', $id_blog->id) }}",
method:"POST",
data:{id:id, _token:_token},
success:function(data)
{
$('#load_more_button').remove();
$('#post_data').append(data);
}
})
}

$(document).on('click', '#load_more_button', function(){
var id = $(this).data('id');
$('#load_more_button').html('<b>Loading...</b>');
load_data(id, _token);
});
});
</script> --}}