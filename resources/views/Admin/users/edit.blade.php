@extends('layouts.dashboard')

@section('title', 'Admin|Posts')
@section('contant')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            @if ($errors->any())
                <div class="alert alert-danger m-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Update Post</h1>

                <form class="user" action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" name="title" value="{{ old('title', $post->title) }}"
                            class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control form-control-user" name="content" placeholder="Enter content">{{ old('content', $post->content) }}</textarea>

                    </div>

                    <div class="form-group">
                        <input type="text" name="user_name" value="{{ old('user_name', $post->user_name) }}"
                            class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Enter Author">
                    </div>
                    <div class="form-group">
                        <input type="file" name="image" class="form-control form-control-user"
                            aria-describedby="emailHelp" placeholder="Enter Image">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" width="100" height="100">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Update Post
                    </button>

                </form>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->



    </div>
@endsection
