@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'permissions', 'key'=>'add'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('permission.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Chon phan quyen cha</label>
                                <select class="form-control" name="module_parent">
                                    <option value="">Chon tên module</option>
                                    @foreach(config('permissions.module_table') as $moduleItem)
                                        <option value="{{ $moduleItem }}">{{ $moduleItem }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    @foreach(config('permissions.module_children') as $moduleChildrenItem)
                                        <div class="col-md-3">
                                            <lable for="">
                                                <input type="checkbox" value="{{$moduleChildrenItem}}" name="module_children[]" >
                                                {{$moduleChildrenItem}}
                                            </lable>
                                        </div>
                                    @endforeach
                                </div>
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

