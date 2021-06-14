@extends('layouts.admin')

@section('title')
    <title>Users</title>
@endsection
@section('css')

@endsection
@section('js')
    <script src="{{ asset('vendor\swalert\sweetalert2@10.js') }}"></script>
    <script src="{{ asset('admins\main.js') }}"></script>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'user', 'key'=>'list'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('user.create')}}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12 ">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ten</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    </td>
                                    <td>
                                        <a href="{{route('user.edit', ['id'=>$user->id] )}}" class="btn btn-default">Edit</a>
                                        <a href="" data-url = "{{route('user.delete', ['id' => $user->id])}}" class="btn btn-danger action_delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $users->links() }}
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

