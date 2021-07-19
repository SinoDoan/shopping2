
@extends('layouts.admin')

@section('title')
    <title>Category</title>
@endsection
@section('header')
    @include('partials.category-header')
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'category', 'key'=>'list'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
              @can('add-category')
            <a href="{{route('categories.create')}}" class="btn btn-success float-right m-2">Add</a>
              @endcan
          </div>
          <div class="col-md-12 ">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Ten danh muc</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $category)


                <tr>
                  <th scope="row">{{ $category->id }}</th>
                  <td>{{ $category->name }}</td>
                  <td>
                      @can('edit-category')
                      <a href="{{ route('categories.edit', ['id' => $category->id ]) }}" class="btn btn-default">Edit</a>
                      @endcan
                      @can('delete-category')
                      <a href="{{ route('categories.delete', ['id' => $category->id ]) }}" class="btn btn-danger">Delete</a>
                          @endcan
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-md-12">
            {{ $categories->links() }}
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection


