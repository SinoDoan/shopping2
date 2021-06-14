@extends('layouts.admin')

@section('title')
    <title>user</title>
@endsection
@section('css')
    <link href="{{ asset('vendor\select2\select2.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admins\user\add\add.css') }}" rel="stylesheet"/>
@endsection
@section('js')
    <script src="{{ asset('vendor\select2\select2.min.js') }}"></script>
    <script src="{{ asset('admins\user\add\add.js') }}"></script>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'user', 'key'=>'edit'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('user.update', ['id'=>$userEdit->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Ten</label>
                                <input type="text"
                                       class="form-control"
                                       name='name'
                                       value="{{$userEdit->name}}"
                                       placeholder="Nhap name">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text"
                                       class="form-control"
                                       name='email'
                                       value="{{$userEdit->email}}"
                                       placeholder="Nhap email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password"
                                       class="form-control"
                                       name='password'
                                       value="{{$userEdit->password}}"
                                       placeholder="Nhap password">
                            </div>
                            <div class="form-group">
                                <label>Roles</label>
                                <select name="role_id[]" class="form-control select2_init" multiple="multiple">
                                    <option value=""></option>
                                    @foreach($roles as $roleItem)
                                        <option
                                            {{$roleOfUser->contains('id', $roleItem->id) ? 'selected' : ""}}
                                            value="{{$roleItem->id}}">{{$roleItem->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

