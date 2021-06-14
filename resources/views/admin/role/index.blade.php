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
    @include('partials.content-header',['name'=>'role', 'key'=>'list'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('role.create')}}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12 ">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Role name</th>
                                <th scope="col">Role description</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <th scope="row">{{$role->id}}</th>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->display_name}}</td>
                                    </td>
                                    <td>
                                        <a href="{{route('role.edit', ['id'=>$role->id])}}" class="btn btn-default">Edit</a>
                                        <a href="" data-url = "{{route('role.delete', ['id' => $role->id])}}" class="btn btn-danger action_delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $roles->links() }}
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

