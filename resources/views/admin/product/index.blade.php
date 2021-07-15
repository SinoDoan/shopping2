@extends('layouts.admin')

@section('title')
    <title>Add product</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins\product\index\list.css') }}"/>
@endsection
@section('js')
    <script src="{{ asset('vendor\swalert\sweetalert2@10.js') }}"></script>
    <script src="{{ asset('admins\main.js') }}"></script>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'product', 'key'=>'list'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('product.create') }}" class="btn btn-success float-right m-2">Add</a>
          </div>
          <div class="col-md-12 ">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Ten san pham</th>
                  <th scope="col">Price</th>
                  <th scope="col">Image</th>
                  <th scope="col">Category</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                 @foreach ($products as $product)
                <tr>
                  <th scope="row">{{$product->id}}</th>
                  <td>{{$product->name}}</td>
                  <td>{{number_format($product->price)}}</td>
                  <td>
                      <img class="product_image_150_100" src="{{$product->feature_image_path}}" alt="">
                  </td>
                  <td>{{optional($product->category)->name}}</td>
                  <td>
                      <a href="{{route('product.edit', ['id' => $product->id])}}" class="btn btn-default">Edit</a>
                      <a href=""
                         data-url = "{{route('product.delete', ['id'=>$product->id])}}"
                         class="btn btn-danger action_delete">Delete</a>
                  </td>
                </tr>
                 @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-md-12">
             {{ $products->appends($_GET)->links() }}
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

