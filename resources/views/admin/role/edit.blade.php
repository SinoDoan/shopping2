@extends('layouts.admin')

@section('title')
    <title>user</title>
@endsection
@section('css')
    <style>
        .card-header{
            background-color: #6C757D;
        }
        input[type="checkbox"]{
            transform: scale(1.2);
        }
    </style>
@endsection
@section('js')
    <script src="{{ asset('admins\role\add\add.js') }}"></script>
    <script src="{{ asset('admins\role\add\add.js') }}"></script>
    <script src="{{ asset('admins\role\add\add.js') }}"></script>
    <script src="{{ asset('admins\role\add\add.js') }}"></script>
    <script>
        $('.checkbox_wrap').on('click', function (){
            $(this).parents('.card').find('.checkbox_children').prop('checked', $(this).prop('checked'));
        });
    </script>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'role', 'key'=>'edit'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{route('role.update', ['id'=>$roleEdit->id])}}" method="post" enctype="multipart/form-data" style="width: 100%">
                        @csrf

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Ten role</label>
                                <input type="text"
                                       class="form-control"
                                       name='name'
                                       value="{{$roleEdit->name}}"
                                       placeholder="Nhap ten role">
                            </div>
                            <div class="form-group">
                                <label>Role description</label>
                                <textarea type="text"
                                          class="form-control"
                                          name='display_name'
                                          placeholder="Nhap mo ta"
                                          rows="5">{{$roleEdit->display_name}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div>
                                <lable>
                                    <input type="checkbox" class="checkall">
                                </lable>
                                Check All
                            </div>
                        </div>
                        <div class="col-md-12">
                            @foreach($permissionParent as $permissionParentItem)
                                <div class="card border-primary text-black mb-3">
                                    <div class="card-header">
                                        <lable>
                                            <input type="checkbox" value="" class="checkbox_wrap" >
                                        </lable>
                                        {{$permissionParentItem->name}}
                                    </div>
                                    <div class="row">
                                        @foreach($permissionParentItem->permissionChildren as $permissionChildrenItem)
                                            <div class="card-body text-primary col-md-3">
                                                <h5 class="card-title">
                                                    <lable>
                                                        <input type="checkbox"
                                                               class="checkbox_children"
                                                               name="permission_id[]"
                                                               {{$permissionChecked->contains('id',$permissionChildrenItem->id) ? 'checked' : ''}}
                                                               value="{{$permissionChildrenItem->id}}">
                                                    </lable>
                                                    {{$permissionChildrenItem->name}}
                                                </h5>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

