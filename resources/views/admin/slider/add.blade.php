@extends('layouts.admin')

@section('title')
    <title>Slider</title>
@endsection
@section('css')
    <link href="{{ asset('admins\product\add\add.css') }}" rel="stylesheet"/>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'slider', 'key'=>'add'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Ten slider</label>
                                <input type="text"
                                       class="form-control"
                                       name='name'
                                       value="{{old('name')}}"
                                       placeholder="Nhap ten slider">
                                @error('name')
                                <div class="alert alert-danger alert-css">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control
                      @error('description') is-invalid @enderror "
                                          rows="5" name='description'
                                          placeholder="Nhap description">{{old('description')}}</textarea>
                                @error('description')
                                <div class="alert alert-danger alert-css">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Hinh anh</label>
                                <input type="file"
                                       class="form-control-file"
                                       name='image_path'
                                >
                                @error('image_path')
                                <div class="alert alert-danger alert-css">{{ $message }}</div>
                                @enderror
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

