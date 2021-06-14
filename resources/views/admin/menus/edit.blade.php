@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   @include('partials.content-header',['name'=>'menus', 'key'=>'edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('menus.update', ['id'=>$menuFollowIdEdit->id]) }}" method="post">
                    @csrf   
                    <div class="form-group">
                      <label>Ten menu</label>
                      <input type="text" 
                             class="form-control" 
                             name='name'
                             value = "{{ $menuFollowIdEdit->name }}"
                             placeholder="Nhap ten menu">
                    </div>
                    <div class="form-group">
                      <label>Chon menu cha</label>
                      <select class="form-control" name = 'parent_id'>
                        <option value="0">Chon menu cha</option>
                        {!! $optionSelect !!} 
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

