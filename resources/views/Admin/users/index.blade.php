@extends('layouts.dashboard')

@section('title', 'Admin|User')
@section('contant')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">


            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="h3 mb-2 text-gray-800">ALL USERS</h1>
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Create New User</a>

                </div>

                {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> --}}


                <!-- DataTables Example -->
                <div class="card shadow mb-4">

                    <div class="card-header py-3 d-flex justify-content-between align-items-center flex-wrap">

                        <h6 class="m-0 font-weight-bold text-primary">
                            ALL POSTS
                        </h6>

                        <form action="{{ route('users.index') }}" method="GET" class="form-inline my-2 my-md-0">

                            <div class="input-group">

                                <input type="text" name="search" value="{{ request('search') }}"
                                    class="form-control bg-light border-0 small" placeholder="Search for..."
                                    aria-label="Search users">

                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search"></i>
                                        Search
                                    </button>
                                </div>

                            </div>
                        </form>

                    </div>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->profile->phone ?? 'N/A' }}</td>
                                        <td>{{ $user->profile->address ?? 'N/A' }}</td>
                                        <td>{{ $user->status }}</td>
                                        <td>
                                            {{-- <td><img src="{{ asset('storage/' . $post->image) }}" alt="Post Image"
                                                width="50" height="50"></td> --}}

                                            <a href="{{ route('users.edit', $user->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <a href="{{ route('users.show', $user->id) }}"
                                                class="btn btn-info btn-sm">Show</a>

                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr></tr>
                                    <td colspan="7" class="text-center">No users found.</td>
                                    </tr>
                                @endforelse


                            </tbody>
                        </table>
                        {{ $users->withQueryString()->links() }}
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->



    </div>
@endsection
