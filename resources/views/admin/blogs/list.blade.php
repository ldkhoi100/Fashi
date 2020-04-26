@extends('admin.layouts')

@section('title', 'Blogs')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
        <a href="{{ route('blogs.create') }}" class="btn btn-primary">Create new blogs</a>
        <a href="{{ route('blogs.trash') }}" class="btn btn-danger" style="float:right">Garbage can</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of blogs</h6>
        </div>

        <div class="col-sm-12">@include('partials.message')</div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                    style="font-size: 14.5px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th width='25%'>Title</th>
                            <th>Categories</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Total comments</th>
                            <th>Views count</th>
                            <th width='10%'>User created</th>
                            <th width='10%'>User updated</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th width='25%'>Title</th>
                            <th>Object</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Total comments</th>
                            <th>Views count</th>
                            <th width='10%'>User created</th>
                            <th width='10%'>User updated</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($blogs as $key => $blogs)

                        <tr>
                            <td>{{ ++$key }}</td>
                            <td><a href="{{ route('blogdetail', Str::slug($blogs->title)) }}"
                                    target="_blank">{{ $blogs->title }}</a>
                            </td>
                            <td>{{ $blogs->categories->name }}</td>
                            {{-- <td><a href="{{ route('blogs.show', $blogs->id) }}">Details</a></td> --}}
                            <td><button data-url="{{ route('blogs.show',$blogs->id) }}" ​ type="button"
                                    data-target="#show" data-toggle="modal"
                                    class="btn btn-info btn-show btn-sm">Detail</button></td>

                            <td><img src="img/blog/{{ $blogs->image }}" alt="" srcset="" width="100px"></td>

                            <td><a href="{{ route('comment.show', $blogs->id) }}">{{ count($blogs->blogcomments) }}</a>
                            </td>

                            <td>{{ $blogs->view_count }}</td>

                            <td><b style="color:orange">{{ $blogs->user_created }}</b> <br>
                                {{ $blogs->created_at }}
                            </td>

                            <td><b style="color:purple">{{ $blogs->user_updated }}</b> <br>
                                {{ $blogs->updated_at }}
                            </td>

                            <td><a href="{{ route('blogs.edit', $blogs->id) }}" class="btn btn-info">
                                    <i class="fa fa-edit" title="Edit"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('blogs.destroy', $blogs->id) }}" method="POST" id="my-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Do you want delete blogs {{$blogs->name}} ?')"
                                        class="btn btn-danger" id="btn-submit" style="border: none"><i
                                            class="fa fa-backspace"></i></button>
                                </form>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection

@push('show-ajax')
{{-- @csrf ajax--}}
<meta name="csrf-token" content="{{ csrf_token() }}">​
<script type="text/javascript" charset="utf-8">
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
</script>
<script>
    $(document).ready(function () {
        $('.btn-show').click(function(){
            var url = $(this).attr('data-url');
            $.ajax({
                type: 'get',
                url: url,
                success: function(response) {
                    // console.log(response)
                    $('h4#name').html(response.data.title)
                    $('h1#descriptor').html(response.data.description)
                    $('span#last_updated').html("Last updated: " + response.data.updated_at.substring(0,19))
                    $('span#user_created').html("User created: " + response.data.user_created)
                    $('span#user_updated').html("User updated: " + response.data.user_updated)
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //xử lý lỗi tại đây
                }
            })
        })
    });
</script>
@endpush