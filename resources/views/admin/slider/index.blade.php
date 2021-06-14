@extends('layouts.admin')

@section('title')
    <title>Slider</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins\slider\index\index.css') }}"/>
@endsection
@section('js')
    <script src="{{ asset('vendor\swalert\sweetalert2@10.js') }}"></script>
    <script src="{{ asset('admins\main.js') }}"></script>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'slider', 'key'=>'list'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{route('slider.create')}}" class="btn btn-success float-right m-2">Add</a>
          </div>
          <div class="col-md-12 ">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Ten slider</th>
                  <th scope="col">Decription</th>
                  <th scope="col">Image</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($sliders as $slider)
                <tr>
                  <th scope="row">{{$slider->id}}</th>
                  <td>{{$slider->name}}</td>
                  <td>{{$slider->description}}</td>
                  <td><img class="product_image_150_100" src="{{$slider->image_path}}" alt="">
                  </td>
                  <td>
                      <a href="{{route('slider.edit', ['id' => $slider->id])}}" class="btn btn-default">Edit</a>
                      <a href="" data-url = "{{route('slider.delete', ['id' => $slider->id])}}" class="btn btn-danger action_delete">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-md-12">
            {{ $sliders->links() }}
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

