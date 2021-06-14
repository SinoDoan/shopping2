@extends('layouts.admin')

@section('title')
    <title>Setting</title>
@endsection
@section('css')
    <link href="{{ asset('admins\setting\add\add.css') }}" rel="stylesheet"/>
@endsection
@section('js')
    <script src="{{ asset('vendor\swalert\sweetalert2@10.js') }}"></script>
    <script src="{{ asset('admins\main.js') }}"></script>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'setting', 'key'=>'list'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-group float-right">
                            <a class="btn dropdown-toggle btn-block" data-toggle="dropdown" href="#">
                                Add Setting
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('setting.create') . '?type=Text'}}">Text</a></li>
                                <li><a href="{{route('setting.create') . '?type=Textarea'}}">Text area</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12 ">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Config key</th>
                                <th scope="col">Config value</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($settings as $setting)
                                <tr>
                                    <th scope="row">{{$setting->id}}</th>
                                    <td>{{$setting->config_key}}</td>
                                    <td>{{$setting->config_value}}</td>
                                    <td>
                                        <a href="{{route('setting.edit', ['id'=>$setting->id]) . '?type=' . $setting->type}}" class="btn btn-default">Edit</a>
                                        <a href="" data-url = "{{route('setting.delete', ['id' => $setting->id])}}" class="btn btn-danger action_delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $settings->links() }}
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

