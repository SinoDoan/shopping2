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
   @include('partials.content-header',['name'=>'slider', 'key'=>'edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('slider.update', ['id'=>$slider->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label>Ten slider</label>
                      <input type="text" 
                             class="form-control" 
                             name='name'
                             value = "{{$slider->name}}"
                             >

                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <textarea class="form-control" rows="5" name='description'>{{$slider->description}}</textarea>
                    </div>
                    <div class="form-group">
                      <label>Hinh anh</label>
                      <input type="file" 
                             class="form-control-file" 
                             name='image_path'
                            >
                            <div class="col-md-12 feature_image">
                                <div class="row">
                                    <img class="product_image_250_200" src="{{$slider->image_path}}" alt="">
                                </div>
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

