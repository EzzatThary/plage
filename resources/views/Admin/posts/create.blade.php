@extends('layouts.dashboard')

@section('title','Admin|Posts')
@section('contant')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Create New Post</h1>

     <form class="user"  action="{{ route('admin.posts.store') }}" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                 aria-describedby="emailHelp"
                                                placeholder="Enter Title">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control form-control-user" placeholder="Enter content"></textarea>

                                        </div>

                                         <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                 aria-describedby="emailHelp"
                                                placeholder="Enter Auther">
                                        </div>
                                         <div class="form-group">
                                            <input type="file" class="form-control form-control-user"
                                                 aria-describedby="emailHelp"
                                                placeholder="Enter Image">
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
