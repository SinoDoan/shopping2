@extends('layouts.admin')

@section('title')
    <title>Setting</title>
@endsection
@section('css')
    <link href="{{ asset('admins\product\add\add.css') }}" rel="stylesheet"/>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'setting', 'key'=>'add'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('setting.store') . '?type=' . request()->type}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Config key</label>
                                <input type="text"
                                       class="form-control" @error('config_key') is-invalid @enderror
                                       name='config_key'
                                       value="{{old('config_key')}}"
                                       placeholder="Nhap config key">
                                @error('config_key')
                                <div class="alert alert-danger alert-css">{{ $message }}</div>
                                @enderror
                            </div>
                            @if(request()->type === 'Text')
                                <div class="form-group">
                                    <label>Config value</label>
                                    <input type="text"
                                           class="form-control" @error('config_value') is-invalid @enderror
                                           name='config_value'
                                           value="{{old('config_value')}}"
                                           placeholder="Nhap config value">
                                    @error('config_value')
                                    <div class="alert alert-danger alert-css">{{ $message }}</div>
                                    @enderror
                                </div>
                            @elseif(request()->type === 'Textarea')
                                <div class="form-group">
                                    <label>Config value</label>
                                    <textarea
                                           class="form-control" @error('config_value') is-invalid @enderror
                                           name='config_value'
                                           placeholder="Nhap config value"
                                           value="{{old('config_value')}}"
                                           rows="4"
                                    ></textarea>
                                    @error('config_value')
                                    <div class="alert alert-danger alert-css">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif
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

