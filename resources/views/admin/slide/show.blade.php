@extends('admin.layouts')

@section('title', 'Detail slide')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-sm-3">
            <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('slide.index') }}"
                    style="text-decoration: none; color: purple"><i class="fa fa-chevron-left"></i> Back Slide</a>
            </h1>
        </div>
        <div class="col-sm-6"></div>
        <div class="col-sm-3">
            <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('slide.trash') }}"
                    style="text-decoration: none; color: purple">Garbage can <i class="fa fa-chevron-right"></i></a>
            </h1>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            {{-- <div class="col-xl-8 col-lg-7"> --}}
            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ $slide->name }}</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area" style="height: auto">
                        {!! $slide->description !!}
                        <br>
                        <i style="float:right">
                            <span>Last updated: {{ $slide->updated_at }}</span><br>
                            <span>User created: {{ $slide->user_created }}</span><br>
                            <span>User updated: {{ $slide->user_updated }}</span>
                        </i>
                    </div>
                </div>
            </div>
            {{-- </div> --}}

        </div>
    </div>
    <!-- /.container-fluid -->
</div>
@endsection