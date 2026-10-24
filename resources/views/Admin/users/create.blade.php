@extends('layouts.dashboard')

@section('title', 'Admin|Users')
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
                <h1 class="h3 mb-2 text-gray-800">Create New User</h1>

                <form class="user" action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Enter Email">
                    </div>

                    <div class="form-group">
                        <input type="text" name="phone" value="{{ old('phone') }}"
                            class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Enter Phone">
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" value="{{ old('address') }}"
                            class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Enter Address">
                    </div>
                     <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Enter Password">
                    </div>

                    <div class="form-group">
                        <input type="password" name="password_confirmation" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Confirm Password">
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
