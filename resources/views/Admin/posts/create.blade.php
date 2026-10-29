@extends('layouts.dashboard')

@section('title', 'Admin|Posts')
@section('contant')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            @if ($errors->any())
                <div class="alert alert-danger">
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
                <h1 class="h3 mb-2 text-gray-800">Create New Post</h1>

                <form class="user" action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="title" value="{{ old('title') }}"
                            class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control form-control-user" name="content" placeholder="Enter content">{{ old('content') }}</textarea>

                    </div>

                    <div class="form-group">
                        <select name="user_id" class="form-control form-control-user">
                            <option value="">Select User</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                    </div>
                    <div class="form-group">
                        <input type="file" name="image" class="form-control form-control-user"
                            aria-describedby="emailHelp" placeholder="Enter Image">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Create Post
                    </button>

                </form>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->



    </div>
@endsection
